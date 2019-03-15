<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Beds Controller
 *
 * @property \App\Model\Table\BedsTable $Beds
 *
 * @method \App\Model\Entity\Bed[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BedsController extends AppController
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
        $beds = $this->paginate($this->Beds);

        $this->set(compact('beds'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id Bed id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bed = $this->Beds->get($id, [
            'contain' => ['Users', 'Bedallotments']
        ]);

        $this->set('bed', $bed);
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bed = $this->Beds->newEntity();
        if ($this->request->is('post')) {
            $bed = $this->Beds->patchEntity($bed, $this->request->getData());
            $bed->user_id = $this->Auth->user('id');
            if ($this->Beds->save($bed)) {
                $title = "Add Bed";
                $user_id = $this->Auth->user('id');
                $description = "Added a new Bed ".$this->request->getData('bed_number');
                $ip = $this->request->clientIp();
                $type = "Add";
                $userController = new UsersController();
                $userController->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The bed has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bed could not be saved. Please, try again.'));
        }
       // $nurses = $this->Beds->Nurses->find('list', ['limit' => 200]);
        $this->set(compact('bed', 'nurses'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Edit method
     *
     * @param string|null $id Bed id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bed = $this->Beds->get($id, [
            'contain' => ['Users','Bedallotments']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bed = $this->Beds->patchEntity($bed, $this->request->getData());
            $bed->user_id = $this->Auth->user('id');
            if ($this->Beds->save($bed)) {
                $title = "Edit Bed";
                $user_id = $this->Auth->user('id');
                $description = "Edited bed ".$this->request->getData('bed_number');
                $ip = $this->request->clientIp();
                $type = "Edit";
                $userController = new UsersController();
                $userController->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The bed has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bed could not be saved. Please, try again.'));
        }
       // $users = $this->Beds->Users->find('list', ['limit' => 200]);
        $this->set(compact('bed', 'users'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Delete method
     *
     * @param string|null $id Bed id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $bed_number)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bed = $this->Beds->get($id);
        if ($this->Beds->delete($bed)) {
            $title = "Delete Bed";
            $user_id = $this->Auth->user('id');
            $description = "Deleted bed ".$bed_number;
            $ip = $this->request->clientIp();
            $type = "Delete";
            $userController = new UsersController();
            $userController->makeLog($title, $user_id, $description, $ip, $type);
            $this->Flash->success(__('The bed has been deleted.'));
        } else {
            $this->Flash->error(__('The bed could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
