<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Treatmentplans Controller
 *
 * @property \App\Model\Table\TreatmentplansTable $Treatmentplans
 *
 * @method \App\Model\Entity\Treatmentplan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TreatmentplansController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $treatmentplans = $this->paginate($this->Treatmentplans);

        $this->set(compact('treatmentplans'));
    }

    /**
     * View method
     *
     * @param string|null $id Treatmentplan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $treatmentplan = $this->Treatmentplans->get($id, [
            'contain' => ['Users', 'Consultations']
        ]);

        $this->set('treatmentplan', $treatmentplan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function newtreatmentplan($consultation_id)
    {
        $treatmentplan = $this->Treatmentplans->newEntity();
        if ($this->request->is('post')) {
            $treatmentplan = $this->Treatmentplans->patchEntity($treatmentplan, $this->request->getData());
            $treatmentplan->user_id = $this->Auth->user('id');
           $treatmentplan->consultation_id = $consultation_id;
            if ($this->Treatmentplans->save($treatmentplan)) {
                //log activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('New Treatment Plan', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' added a treatment plan', $ip, 'Add');
                
                $this->Flash->success(__('The treatment plan has been saved.'));

                return $this->redirect(['controller'=>'Patients','action' => 'index']);
            }
            $this->Flash->error(__('The treatmentplan could not be saved. Please, try again.'));
        }
        $users = $this->Treatmentplans->Users->find('list', ['limit' => 200]);
        $this->set(compact('treatmentplan', 'users'));
         $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Edit method
     *
     * @param string|null $id Treatmentplan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editplan($id = null)
    {
        $treatmentplan = $this->Treatmentplans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $treatmentplan = $this->Treatmentplans->patchEntity($treatmentplan, $this->request->getData());
            if ($this->Treatmentplans->save($treatmentplan)) {
                 //log activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Edited Treatment Plan', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' Edited a treatment plan', $ip, 'Edit');
              
                $this->Flash->success(__('The treatmentplan has been saved.'));

                return $this->redirect(['controller'=>'Patients','action' => 'index']);
            }
            $this->Flash->error(__('The treatmentplan could not be saved. Please, try again.'));
        }
        $users = $this->Treatmentplans->Users->find('list', ['limit' => 200]);
        $this->set(compact('treatmentplan', 'users'));
         $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Delete method
     *
     * @param string|null $id Treatmentplan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treatmentplan = $this->Treatmentplans->get($id);
        if ($this->Treatmentplans->delete($treatmentplan)) {
            $this->Flash->success(__('The treatmentplan has been deleted.'));
        } else {
            $this->Flash->error(__('The treatmentplan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
