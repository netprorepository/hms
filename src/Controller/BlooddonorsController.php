<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Blooddonors Controller
 *
 * @property \App\Model\Table\BlooddonorsTable $Blooddonors
 *
 * @method \App\Model\Entity\Blooddonor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlooddonorsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $blooddonors = $this->paginate($this->Blooddonors);

        $this->set(compact('blooddonors'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id Blooddonor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $blooddonor = $this->Blooddonors->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('blooddonor', $blooddonor);
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $blooddonor = $this->Blooddonors->newEntity();
        if ($this->request->is('post')) {
            $blooddonor = $this->Blooddonors->patchEntity($blooddonor, $this->request->getData());
            if ($this->Blooddonors->save($blooddonor)) {
                $this->Flash->success(__('The blooddonor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blooddonor could not be saved. Please, try again.'));
        }
        $nurses = $this->Blooddonors->Nurses->find('list', ['limit' => 200]);
        $this->set(compact('blooddonor', 'nurses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Blooddonor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editdonor($id = null) {
        $blooddonor = $this->Blooddonors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blooddonor = $this->Blooddonors->patchEntity($blooddonor, $this->request->getData());
            if ($this->Blooddonors->save($blooddonor)) {
                //log admin activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Updated a Donor', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' Updated a Blood Donor', $ip, 'Edit');

                $this->Flash->success(__('The blood donor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blood donor could not be saved. Please, try again.'));
        }
        // $nurses = $this->Blooddonors->Nurses->find('list', ['limit' => 200]);
        $this->set(compact('blooddonor'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Delete method
     *
     * @param string|null $id Blooddonor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $blooddonor = $this->Blooddonors->get($id);
        if ($this->Blooddonors->delete($blooddonor)) {
            $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Deleted a Donor', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' Deleted a Blood Donor', $ip, 'Delete');

               
            $this->Flash->success(__('The blooddonor has been deleted.'));
        } else {
            $this->Flash->error(__('The blooddonor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
