<?php
namespace App\Controller;
use Cake\ORM\TableRegistry; 
use Cake\Event\Event;
use Cake\Network\Email\Email;
use App\Controller\AppController;

/**
 * Doctors Controller
 *
 * @property \App\Model\Table\DoctorsTable $Doctors
 *
 * @method \App\Model\Entity\Doctor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DoctorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Departments', 'Admins']
        ];
        $doctors = $this->paginate($this->Doctors);

        $this->set(compact('doctors'));
    }

    /**
     * View method
     *
     * @param string|null $id Doctor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $doctor = $this->Doctors->get($id, [
            'contain' => ['Users', 'Departments', 'Appointments', 'Prescriptions', 'Reports']
        ]);

        $this->set('doctor', $doctor);
    }

    
    
    //doctor function for viewing all blood donors
    public function blooddonors(){
        $blooddonors_table = TableRegistry::get('Blooddonors');
     $blooddonors = $blooddonors_table->find()->order(['last_donation_timestamp'=>'DESC']);
          $this->set('blooddonors', $blooddonors);
         $this->viewBuilder()->setLayout('backend');
    }

    
    //doctor's method for viewing the blood bank
    public function viewbloodbank(){
        $bloodbank_table = TableRegistry::get('Bloodbank');
        $bloodbanks =  $bloodbank_table->find(); 
        $this->set('bloodbanks', $bloodbanks);
         $this->viewBuilder()->setLayout('backend');
        
    }

    
    
    
    //doctors method for creating appointment
    public function newappointment(){  
         $appointments_table = TableRegistry::get('Appointments');
         $users_table = TableRegistry::get('Users');
          $appointment =  $appointments_table->newEntity();
        if ($this->request->is('post')) {
            debug(json_encode($this->request->getData(), JSON_PRETTY_PRINT)); exit;
             $appointment_time = $this->request->getData('appointment_time');
            $appointment_date = $this->request->getData('appointment_date');
            $time = $appointment_date.' '.$appointment_time;
            $appointment =  $appointments_table->patchEntity($appointment, $this->request->getData());
             $appointment->appointment_date = date('Y-m-d H:i A', strtotime($time));
             $appointment->user_id =  $this->Auth->user('id');
             debug(json_encode($appointment, JSON_PRETTY_PRINT)); exit;
            if ( $appointments_table->save($appointment)) {
                //log what just happened
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip_server();
                  $userscontroller->makeLog('Scheduled Appointment', $this->Auth->user('id'), 'Doctor scheduled an appointment', $ip, 'Add');
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['action' => 'viewappointments']);
            }
            $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
        }
        $doctors =  $users_table->find('list', ['limit' => 200])->where(['role_id'=>2]);
        $patients =  $appointments_table->Patients->find('list', ['limit' => 200]);
        $this->set(compact('appointment', 'doctors', 'patients'));
        
        
         $this->viewBuilder()->setLayout('backend');
    }

    
    
    //doctor's method for viewing all appointments
    public function viewappointments(){
         $appointments_table = TableRegistry::get('Appointments');
        $appointments = $appointments_table->find()->contain(['Users','Patients'])->order(['appointment_date'=>'DESC']);
        $this->set('appointments', $appointments);
          $this->viewBuilder()->setLayout('backend');
    }

    
    
    
    //doctors method for editing an appointment
    public function editappointment($id = null){
         $appointments_table = TableRegistry::get('Appointments');
         $users_table = TableRegistry::get('Users');
         $appointment = $appointments_table->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appointment_time = $this->request->getData('appointment_time');
            $appointment_date = $this->request->getData('appointment_date');
            $time = $appointment_date.' '.$appointment_time;
            $appointment = $appointments_table->patchEntity($appointment, $this->request->getData());
            $appointment->appointment_date = date('Y-m-d H:i A', strtotime($time));
            if ($appointments_table->save($appointment)) {
                 $userscontroller = new UsersController();
                 $ip = $userscontroller->get_client_ip_server();
                  $userscontroller->makeLog('Scheduled Appointment', $this->Auth->user('id'), 'Doctor edited an appointment', $ip, 'Edit');
                $this->Flash->success(__('The appointment has been updated.'));

                return $this->redirect(['action' => 'viewappointments']);
            }
            $this->Flash->error(__('The appointment could not be updated. Please, try again.'));
        }
         $doctors =  $users_table->find('list', ['limit' => 200])->where(['role_id'=>2]);
        $patients =  $appointments_table->Patients->find('list', ['limit' => 200]);
        $this->set(compact('appointment', 'doctors', 'patients'));
        
        $this->viewBuilder()->setLayout('backend');
    }

    

    
    //doctors method for making a prescription
    public function newprescriptions(){
        $prescriptions_table = TableRegistry::get('Prescriptions');
       // $users_table = TableRegistry::get('Users');
        $prescription = $prescriptions_table->newEntity();
        if ($this->request->is('post')) {
            $prescription = $prescriptions_table->patchEntity($prescription, $this->request->getData());
             $prescription->user_id =  $this->Auth->user('id');
            if ($prescriptions_table->save($prescription)) {
                 $userscontroller = new UsersController();
                 $ip = $userscontroller->get_client_ip_server();
                  $userscontroller->makeLog('Added New Prescription', $this->Auth->user('id'), 'Doctor added new prescription', $ip, 'Add');
                $this->Flash->success(__('The prescription has been saved.'));

                return $this->redirect(['action' => 'viewprescriptions']);
            }
            $this->Flash->error(__('The prescription could not be saved. Please, try again.'));
        }
       // $doctors =  $users_table->find('list', ['limit' => 200])->where(['role_id'=>2]);
        $patients = $prescriptions_table->Patients->find('list', ['limit' => 200]);
        $this->set(compact('prescription', 'doctors', 'patients'));
         $this->viewBuilder()->setLayout('backend');
    }

    
    
    //doctors method for viewing all prescriptions
    public function viewprescriptions(){
        
         $prescriptions_table = TableRegistry::get('Prescriptions');
         $prescriptions = $prescriptions_table->find()->contain(['Users','Patients'])->order(['creation_timestamp'=>'Desc']);
         $this->set('prescriptions', $prescriptions);
         $this->viewBuilder()->setLayout('backend');
    }

    
    
      //doctors method for viewing a prescription
    public function prescriptiondetail($id = null){
        
         $prescriptions_table = TableRegistry::get('Prescriptions');
         
         
         $prescription = $prescriptions_table->get($id, [
            'contain' => ['Users', 'Patients']
        ]);
         $this->set('prescription', $prescription);
         // debug(json_encode( $prescription->patient->id, JSON_PRETTY_PRINT)); exit;
         $this->viewBuilder()->setLayout('backend');
    }
    
    
    
    
    //doctors method for editing a prescription
    public function editprescription($id = null){
         $prescriptions_table = TableRegistry::get('Prescriptions');
        
         $prescription =  $prescriptions_table->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prescription =  $prescriptions_table->patchEntity($prescription, $this->request->getData());
            if ( $prescriptions_table->save($prescription)) {
                 $userscontroller = new UsersController();
                 $ip = $userscontroller->get_client_ip_server();
                  $userscontroller->makeLog('Edited a Prescription', $this->Auth->user('id'), 'Doctor edited a Prescription', $ip, 'Edit');
                $this->Flash->success(__('The prescription has been updated.'));

                return $this->redirect(['action' => 'viewprescriptions']);
            }
            $this->Flash->error(__('The prescription could not be saved. Please, try again.'));
        }
       // $doctors = $this->Prescriptions->Doctors->find('list', ['limit' => 200]);
        $patients =  $prescriptions_table->Patients->find('list', ['limit' => 200]);
        $this->set(compact('prescription', 'patients'));
         
          $this->viewBuilder()->setLayout('backend');
    }

        /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $doctor = $this->Doctors->newEntity();
        if ($this->request->is('post')) {
            $doctor = $this->Doctors->patchEntity($doctor, $this->request->getData());
            if ($this->Doctors->save($doctor)) {
                $this->Flash->success(__('The doctor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The doctor could not be saved. Please, try again.'));
        }
        $users = $this->Doctors->Users->find('list', ['limit' => 200]);
        $departments = $this->Doctors->Departments->find('list', ['limit' => 200]);
        $admins = $this->Doctors->Admins->find('list', ['limit' => 200]);
        $this->set(compact('doctor', 'users', 'departments', 'admins'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Doctor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $doctor = $this->Doctors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $doctor = $this->Doctors->patchEntity($doctor, $this->request->getData());
            if ($this->Doctors->save($doctor)) {
                $this->Flash->success(__('The doctor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The doctor could not be saved. Please, try again.'));
        }
        $users = $this->Doctors->Users->find('list', ['limit' => 200]);
        $departments = $this->Doctors->Departments->find('list', ['limit' => 200]);
        $admins = $this->Doctors->Admins->find('list', ['limit' => 200]);
        $this->set(compact('doctor', 'users', 'departments', 'admins'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Doctor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $doctor = $this->Doctors->get($id);
        if ($this->Doctors->delete($doctor)) {
            $this->Flash->success(__('The doctor has been deleted.'));
        } else {
            $this->Flash->error(__('The doctor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
