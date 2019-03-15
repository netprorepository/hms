<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Frontdesks Controller
 *
 * @property \App\Model\Table\FrontdesksTable $Frontdesks
 *
 * @method \App\Model\Entity\Frontdesk[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FrontdesksController extends AppController
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
        $frontdesks = $this->paginate($this->Frontdesks);

        $this->set(compact('frontdesks'));
    }

    /**
     * View method
     *
     * @param string|null $id Frontdesk id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $frontdesk = $this->Frontdesks->get($id, [
            'contain' => ['Users', 'Departments', 'Admins']
        ]);

        $this->set('frontdesk', $frontdesk);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $frontdesk = $this->Frontdesks->newEntity();
        if ($this->request->is('post')) {
            $frontdesk = $this->Frontdesks->patchEntity($frontdesk, $this->request->getData());
            if ($this->Frontdesks->save($frontdesk)) {
                $this->Flash->success(__('The frontdesk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The frontdesk could not be saved. Please, try again.'));
        }
        $users = $this->Frontdesks->Users->find('list', ['limit' => 200]);
        $departments = $this->Frontdesks->Departments->find('list', ['limit' => 200]);
        $admins = $this->Frontdesks->Admins->find('list', ['limit' => 200]);
        $this->set(compact('frontdesk', 'users', 'departments', 'admins'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Frontdesk id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $frontdesk = $this->Frontdesks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $frontdesk = $this->Frontdesks->patchEntity($frontdesk, $this->request->getData());
            if ($this->Frontdesks->save($frontdesk)) {
                $this->Flash->success(__('The frontdesk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The frontdesk could not be saved. Please, try again.'));
        }
        $users = $this->Frontdesks->Users->find('list', ['limit' => 200]);
        $departments = $this->Frontdesks->Departments->find('list', ['limit' => 200]);
        $admins = $this->Frontdesks->Admins->find('list', ['limit' => 200]);
        $this->set(compact('frontdesk', 'users', 'departments', 'admins'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Frontdesk id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $frontdesk = $this->Frontdesks->get($id);
        if ($this->Frontdesks->delete($frontdesk)) {
            $this->Flash->success(__('The frontdesk has been deleted.'));
        } else {
            $this->Flash->error(__('The frontdesk could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
