<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Consultations Controller
 *
 * @property \App\Model\Table\ConsultationsTable $Consultations
 *
 * @method \App\Model\Entity\Consultation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConsultationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
       // $this->paginate = ['contain' => ['Patients', 'Users']];
        
        $consultations = $this->Consultations->find()->contain(['Patients', 'Users'])->order(['consultationday'=>'DESC']);

        $this->set(compact('consultations'));
         $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id Consultation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function consultationdetail($id = null)
    {
        $consultation = $this->Consultations->get($id, [
            'contain' => ['Patients', 'Users']
        ]);

        $this->set('consultation', $consultation);
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function newconsultation($patient_id)
    {
        $consultation = $this->Consultations->newEntity();
        if ($this->request->is('post')) {
            
            $consultation = $this->Consultations->patchEntity($consultation, $this->request->getData());
          //  debug(json_encode( $consultation, JSON_PRETTY_PRINT)); exit;
            $consultation->user_id = $this->Auth->user('id');
            $consultation->patient_id = $patient_id;
            if ($this->Consultations->save($consultation)) {
                  //log activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('New Consultation', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' Added New Consultation', $ip, 'Add');
              
                $this->Flash->success(__('The consultation has been saved.'));

                return $this->redirect(['controller'=>'Patients','action' => 'viewpatient',$patient_id]);
            }
            $this->Flash->error(__('The consultation could not be saved. Please, try again.'));
        }
       // $patients = $this->Consultations->Patients->find('list', ['limit' => 200]);
        //$users = $this->Consultations->Users->find('list', ['limit' => 200]);
        $this->set(compact('consultation', 'patients', 'users'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Edit method
     *
     * @param string|null $id Consultation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editconsultation($id = null)
    {
        $consultation = $this->Consultations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $consultation = $this->Consultations->patchEntity($consultation, $this->request->getData());
            if ($this->Consultations->save($consultation)) {
                  //log activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Edit Consultation', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' Edited A Consultation', $ip, 'Edit');
              
                $this->Flash->success(__('The consultation has been updated.'));

               return $this->redirect(['controller'=>'Patients','action' => 'viewpatient',$consultation->patient_id]);
            }
            $this->Flash->error(__('The consultation could not be saved. Please, try again.'));
        }
       // $patients = $this->Consultations->Patients->find('list', ['limit' => 200]);
       // $users = $this->Consultations->Users->find('list', ['limit' => 200]);
        $this->set(compact('consultation', 'patients', 'users'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Delete method
     *
     * @param string|null $id Consultation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $consultation = $this->Consultations->get($id);
        if ($this->Consultations->delete($consultation)) {
             //log activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Delete Consultation', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' Deleted A Consultation', $ip, 'Delete');
              
            $this->Flash->success(__('The consultation has been deleted.'));
        } else {
            $this->Flash->error(__('The consultation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
