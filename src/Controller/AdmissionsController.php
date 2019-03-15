<?php
namespace App\Controller;
use Cake\Event\Event;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Admissions Controller
 *
 * @property \App\Model\Table\AdmissionsTable $Admissions
 *
 * @method \App\Model\Entity\Admission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdmissionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
       // $this->paginate = [
          //  'contain' => ['Patients', 'Wards', 'Beds', 'Users'],
         //   'where' =>['status !='=>'Discharged']
      //  ];
        $admissions = $this->Admissions->find()->where(['Admissions.status !='=>'Discharged'])
                ->contain(['Patients', 'Wards', 'Beds', 'Users']);
        //$admissions = $this->paginate($this->Admissions);

        $this->set(compact('admissions'));
         $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id Admission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admission = $this->Admissions->get($id, [
            'contain' => ['Patients', 'Wards', 'Beds', 'Users']
        ]);

        $this->set('admission', $admission);
    }
    
    
    
    //doctors method for requesting that a patient be discharged
    public function requestdischarge($admission_id = null){
         $admission = $this->Admissions->get($admission_id);
         if( $admission){
         $admission->dischargerequested = 'yes';
         $this->Admissions->save($admission);
          //log admin activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Request Discharge', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' Requested discharge for patient'.$admission->patient_id, $ip, 'Delete');
               
         $this->Flash->success(__('Discharge has been requested for the patient. He/She should please proceed to the nurse'
                 . ' station for further clarance'));
         }
         else{
             $this->Flash->error(__('No admission record found'));  
         }

                return $this->redirect(['controller'=>'Patients','action' => 'requestdischarge']);
         
        
    }

    

//nurse method for viewing discharge requests by the doctor
    public function viewdischargerequests(){
       
        $admissions = $this->Admissions->find()->contain(['Patients'])
                ->where(['dischargerequested'=>'yes']);
       // debug(json_encode( $admission, JSON_PRETTY_PRINT)); exit;
        $this->set(compact('admissions'));
        $this->viewBuilder()->setLayout('backend');
    }

    

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $admission = $this->Admissions->newEntity();
        if ($this->request->is('post')) {
            $admission = $this->Admissions->patchEntity($admission, $this->request->getData());
            if ($this->Admissions->save($admission)) {
                $this->Flash->success(__('The admission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admission could not be saved. Please, try again.'));
        }
        $patients = $this->Admissions->Patients->find('list', ['limit' => 200]);
        $wards = $this->Admissions->Wards->find('list', ['limit' => 200]);
        $beds = $this->Admissions->Beds->find('list', ['limit' => 200]);
        $users = $this->Admissions->Users->find('list', ['limit' => 200]);
        $this->set(compact('admission', 'patients', 'wards', 'beds', 'users'));
    }

    //method that displays all requests for admision by the doctors
    public function admissionrequests(){
        $admission = $this->Admissions->newEntity();
        $admissionrequests = $this->Admissions->find()->where(['status'=>'pending'])
                ->contain(['Patients','Users'])
                ->order(['admissiondate'=>'DESC']);
      
        $wards = $this->Admissions->Wards->find('list', ['limit' => 200]);
        $beds = $this->Admissions->Beds->find('list', ['limit' => 200])->where(['status'=>0]);
        $this->set(compact('admissionrequests','wards','beds','admission'));
        $this->viewBuilder()->setLayout('backend');
    }

    
    //method that allocates beds and wards to a patient
    public function allocatebedward(){
        $admission_id = $this->request->getData('admission_id');
        if(isset($admission_id)){
             $admission = $this->Admissions->get($admission_id);
        }
        else{
          $admission = $this->Admissions->newEntity();  
        }
       
        
        $admission = $this->Admissions->patchEntity($admission, $this->request->getData());
        if(!isset($admission_id)){
             $admission->user_id = $this->Auth->user('id');
        }
       // $admission->ward_id = $ward_id;
        //$admission->bed_id = $bed_id;
        $admission->status = "Admitted";
        $admission->admittedby = $this->Auth->user('fname');
       // debug(json_encode($admission, JSON_PRETTY_PRINT)); exit;
        $this->Admissions->save($admission);
        //log admin activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Allocated Bed/Ward', $this->Auth->user('id'), 'user ' . $this->Auth->user('id')
                        . ' Allocated Bed/Ward to a Patient', $ip, 'Add');
        //update bed status to avoid reasignment
         $this->updatebed($admission->bed_id);
        $this->Flash->success(__('The patient\'s admission,ward and bed allocation was successfull.'));
        return $this->redirect(['action' => 'admissionrequests']);
        
        
    }

    
    //method that updates a bed status to avoid double assignment
      private function updatebed($id){
            $beds_table = TableRegistry::get('Beds');
            $bed = $beds_table->get($id);
            $bed->status = 1;
            $beds_table->save($bed);
            return;
        }
    
    //method that makes a bed free after the occupant has been discharged
    public function dischargeadmission($id=null){
      
         $admission = $this->Admissions->get($id);
           //ensure patient is not owing the hospital
        $controller = new InvoicesController();
       $debt = $controller->checkindebtedness($admission->patient_id);
       if($debt){ //if this patient has an unpaid invoice, dont discharge till payment is made
         $this->Flash->error(__('Sorry, this patient has some unpaid invoices which must be paid before discharge.'));
        return $this->redirect(['controller'=>'Invoices','action' => 'unpaidinvoices']);  
           
       }
         $admission->status = "Discharged";
         $admission->dischargerequested = "Discharged";
         $admission->dischargedate = date('Y-m-d : h:m');
         $this->Admissions->save($admission);
         //log admin activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Discharged a Patient', $this->Auth->user('id'), 'user ' 
                        . $this->Auth->user('id') . ' Discharge patient'.$admission->patient_id, $ip, 'Edit');
         //update bed
         $this->freebed($admission->bed_id);
         $this->Flash->success(__('The patient has been discharged.'));
        return $this->redirect(['action' => 'admissionrequests']);
    }


//method that updates a bed status to avoid double assignment
      private function freebed($id){
            $beds_table = TableRegistry::get('Beds');
            $bed = $beds_table->get($id);
            $bed->status = 0;
            $beds_table->save($bed);
            return;
      }



//disable csfr token
    public function beforeFilter(Event $event) {
      //  if(in_array($this->request->getParam(), ['allocatebedward','admissionrequests'])){
            $this->getEventManager()->off($this->Csrf);
      //  }
        
    }

    


    /**
     * Edit method
     *
     * @param string|null $id Admission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $admission = $this->Admissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admission = $this->Admissions->patchEntity($admission, $this->request->getData());
            if ($this->Admissions->save($admission)) {
                $this->Flash->success(__('The admission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admission could not be saved. Please, try again.'));
        }
        $patients = $this->Admissions->Patients->find('list', ['limit' => 200]);
        $wards = $this->Admissions->Wards->find('list', ['limit' => 200]);
        $beds = $this->Admissions->Beds->find('list', ['limit' => 200]);
        $users = $this->Admissions->Users->find('list', ['limit' => 200]);
        $this->set(compact('admission', 'patients', 'wards', 'beds', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Admission id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admission = $this->Admissions->get($id);
        if ($this->Admissions->delete($admission)) {
            $this->Flash->success(__('The admission has been deleted.'));
        } else {
            $this->Flash->error(__('The admission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
