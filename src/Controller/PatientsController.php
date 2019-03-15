<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\Network\Session;
use Cake\ORM\TableRegistry;

/**
 * Patients Controller
 *
 * @property \App\Model\Table\PatientsTable $Patients
 *
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PatientsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users','Invoices']
        ];
        $patients = $this->paginate($this->Patients);
        //debug(json_encode( $patients, JSON_PRETTY_PRINT)); exit;
        $this->set(compact('patients'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewpatient($id = null) {
        $patient = $this->Patients->get($id, [
            'contain' => [
                'Appointments.Users', 'Bedallotments.Users', 'Invoices.Users', 'Consultations.Treatmentplans.Users.Treatments',
                'Payments', 'Reports.Users', 'Vitals','Consultations','Consultations.Prescriptions.Users',
                'Consultations.Diagnosisreports.Users','Consultations.Diagnosisreports.Diagnosistypes',
                 'Consultations.Treatments.Users',
                ]
        ]);
        //debug(json_encode( $patient, JSON_PRETTY_PRINT)); exit;
        $this->set('patient', $patient);
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function newpatient() {
        $patient = $this->Patients->newEntity();
        $settings_table = TableRegistry::get('Settings');
        $settings = $settings_table->get(1);
        if ($this->request->is('post')) {
            $patient = $this->Patients->patchEntity($patient, $this->request->getData());
            $patient->user_id = $this->Auth->user('id');
            if ($this->Patients->save($patient)) {
                //assign a uniqu ID to this patient
                $this->getpatientid($patient->id);
                //log admin activity
                $userscontroller = new UsersController();
                $ip = $this->get_client_ip();
                $userscontroller->makeLog('New Patient', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' added a patient', $ip, 'Add');
                $this->Flash->success(__('The patient has been saved.'));
                //create invoice
                $this->createinvoice($patient->id,'New Patient Registration',$settings->regfee,'Registration Fee');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patient could not be saved. Please, try again.'));
        }
        $users = $this->Patients->Users->find('list', ['limit' => 200]);
        $this->set(compact('patient', 'users'));
        $this->viewBuilder()->setLayout('backend');
    }

    //generate invoice for the new patient
    public function createinvoice($patient_id,$title,$amount,$reg_fee) {
        $invoices_table = TableRegistry::get('Invoices');
        $invoice = $invoices_table->newEntity();
        $invoice->patient_id = $patient_id;
        $invoice->title = $title;
        $invoice->description = $reg_fee;
        $invoice->amount = $amount;
        $invoice->status = 'Unpaid';
        $invoice->user_id = $this->Auth->user('id');
        $invoices_table->save($invoice);
         //update the invoice id
         $this->generateinvoiceid($patient_id,$invoice->id);
        return;
    }

    
     //method that generates a unique id for every invoice
    private function generateinvoiceid($patient_id,$invoice_id){
         $invoices_table = TableRegistry::get('Invoices');
        $invoice = $invoices_table->get($invoice_id);
        $invoice->invoiceid = 'WWD/Inv/'.$patient_id.'/'.$invoice_id;
        $invoices_table->save($invoice);
        return;
        
    }

    
    
    public function newpatient2() {
        $patient = $this->Patients->newEntity();
        if ($this->request->is('post')) {
            $patient = $this->Patients->patchEntity($patient, $this->request->getData());
            $patient->user_id = $this->Auth->user('id');
            if ($this->Patients->save($patient)) {
                $userscontroller = new UsersController();
                $ip = $this->get_client_ip();
                $userscontroller->makeLog('New Patient', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' added a patient', $ip, 'Add');
                $this->Flash->success(__('The patient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patient could not be saved. Please, try again.'));
        }
        $users = $this->Patients->Users->find('list', ['limit' => 200]);
        $this->set(compact('patient', 'users'));
        $this->viewBuilder()->setLayout('backend');
    }

    //function that generates a unique ID for each
    private function getpatientid($id) {
        $patient = $this->Patients->get($id);
        $patient->uniquid = 'WWD/' . date('y/m') . '/' . $id;
        $this->Patients->save($patient);
        return;
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editpatient($id = null) {
        $patient = $this->Patients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patient = $this->Patients->patchEntity($patient, $this->request->getData());
            if ($this->Patients->save($patient)) {
                //log admin activity
                $userscontroller = new UsersController();
                $ip = $this->get_client_ip();
                $userscontroller->makeLog('Edit Patient', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' Edited a patient '.$patient->uniquid, $ip, 'Edit');
               
                $this->Flash->success(__('The patient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patient could not be saved. Please, try again.'));
        }
        // $users = $this->Patients->Users->find('list', ['limit' => 200]);
        $this->set(compact('patient', 'users'));
        $this->viewBuilder()->setLayout('backend');
    }

    public function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP')) {
            $ipaddress = getenv('HTTP_CLIENT_IP');
        } else if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        } else if (getenv('HTTP_X_FORWARDED')) {
            $ipaddress = getenv('HTTP_X_FORWARDED');
        } else if (getenv('HTTP_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        } else if (getenv('HTTP_FORWARDED')) {
            $ipaddress = getenv('HTTP_FORWARDED');
        } else if (getenv('REMOTE_ADDR')) {
            $ipaddress = getenv('REMOTE_ADDR');
        } else {
            $ipaddress = 'UNKNOWN';
        }

        return $ipaddress;
    }

    
    // doctors method for requesting that a patient be discharged
    public function requestdischarge(){
        $admissions_table = TableRegistry::get('Admissions');
        $admissions = $admissions_table->find()
                ->contain(['Patients'])
                ->order(['admissiondate'=>'DESC']);
       // debug(json_encode( $admission, JSON_PRETTY_PRINT)); exit;
        $this->set(compact('admissions'));
        $this->viewBuilder()->setLayout('backend');
        
    }

    
    
    //shows the patient and treatments given to her
    public function viewtreatments($id){
         $patient = $this->Patients->get($id, [
            'contain' => ['Consultations.Treatments.Users','Invoices.Users','Admissions.Users']
        ]);
        // debug(json_encode($patient, JSON_PRETTY_PRINT)); exit;
          $this->set(compact('patient'));
        $this->viewBuilder()->setLayout('backend');
    }

    




    /**
     * Delete method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $patient = $this->Patients->get($id);
        if ($this->Patients->delete($patient)) {
             //log admin activity
                $userscontroller = new UsersController();
                $ip = $this->get_client_ip();
                $userscontroller->makeLog('Delete Patient', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' Deleted patient '.$id, $ip, 'Delete');
               
            $this->Flash->success(__('The patient has been deleted.'));
        } else {
            $this->Flash->error(__('The patient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
    //method that creates admission request for a patient
    public function admitpatient($patient_id){
         $admissions_table = TableRegistry::get('Admissions');
          $admission = $admissions_table->newEntity();
          $admission->patient_id = $patient_id;
          $admission->user_id = $this->Auth->user('id');
          $admission->status = "pending";
          $admissions_table->save($admission);
          //log activity
           $userscontroller = new UsersController();
           $ip = $this->get_client_ip();
                $userscontroller->makeLog('New Patient Admission Request', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' Requested patient '.$patient_id .'be Admitted', $ip, 'Add');
               
            $this->Flash->success(__('The patient\'s admission request has been set.'));
          return $this->redirect(['action' => 'viewpatient',$patient_id]);
        
    }


}
