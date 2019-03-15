<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Prescriptions Controller
 *
 * @property \App\Model\Table\PrescriptionsTable $Prescriptions
 *
 * @method \App\Model\Entity\Prescription[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrescriptionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Consultations', 'Consultations.Patients']
        ];
        $prescriptions = $this->paginate($this->Prescriptions);
        //debug(json_encode( $prescriptions, JSON_PRETTY_PRINT)); exit;
        $this->set(compact('prescriptions'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id Prescription id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prescription = $this->Prescriptions->get($id, [
            'contain' => ['Users', 'Consultations', 'Diagnosisreports','Patients']
        ]);

        $this->set('prescription', $prescription);
         $this->viewBuilder()->setLayout('backend');
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addprescription($consult_id,$patient_id)
    {
        $prescription = $this->Prescriptions->newEntity();
        if ($this->request->is('post')) {
            $prescription = $this->Prescriptions->patchEntity($prescription, $this->request->getData());
            $prescription->user_id = $this->Auth->user('id');
            $prescription->patient_id = $patient_id;
            $prescription->consultation_id = $consult_id;
            if ($this->Prescriptions->save($prescription)) {
                 //log activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('New Prescription', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' Added New Prescription', $ip, 'Add');
              
                $this->Flash->success(__('The prescription has been saved.'));

                return $this->redirect(['controller'=>'Patients', 'action' => 'index']);
            }
            $this->Flash->error(__('The prescription could not be saved. Please, try again.'));
        }
        $users = $this->Prescriptions->Users->find('list', ['limit' => 200]);
        $consultations = $this->Prescriptions->Consultations->find('list', ['limit' => 200]);
        $this->set(compact('prescription', 'users', 'consultations'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Edit method
     *
     * @param string|null $id Prescription id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editprescription($id = null)
    {
        $prescription = $this->Prescriptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prescription = $this->Prescriptions->patchEntity($prescription, $this->request->getData());
            $prescription->medication_by = $this->Auth->user('fname');
            $prescription->medication_date = date('Y-m-d h:m:s a');
            if ($this->Prescriptions->save($prescription)) {
                 //log activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Edit Prescription', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' Edited a prescription', $ip, 'Edit');
              
                $this->Flash->success(__('The prescription has been saved.'));

                return $this->redirect(['controller'=>'Patients', 'action' => 'index']);
            }
            $this->Flash->error(__('The prescription could not be saved. Please, try again.'));
        }
        $users = $this->Prescriptions->Users->find('list', ['limit' => 200]);
        $consultations = $this->Prescriptions->Consultations->find('list', ['limit' => 200]);
        $this->set(compact('prescription', 'users', 'consultations'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Delete method
     *
     * @param string|null $id Prescription id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prescription = $this->Prescriptions->get($id);
        if ($this->Prescriptions->delete($prescription)) {
            $this->Flash->success(__('The prescription has been deleted.'));
        } else {
            $this->Flash->error(__('The prescription could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
