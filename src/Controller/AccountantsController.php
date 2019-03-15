<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Accountants Controller
 *
 * @property \App\Model\Table\AccountantsTable $Accountants
 *
 * @method \App\Model\Entity\Accountant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Admins']
        ];
        $accountants = $this->paginate($this->Accountants);

        $this->set(compact('accountants'));
    }

    /**
     * View method
     *
     * @param string|null $id Accountant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $accountant = $this->Accountants->get($id, [
            'contain' => ['Users', 'Admins']
        ]);

        $this->set('accountant', $accountant);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $accountant = $this->Accountants->newEntity();
        if ($this->request->is('post')) {
            $accountant = $this->Accountants->patchEntity($accountant, $this->request->getData());
            if ($this->Accountants->save($accountant)) {
                $this->Flash->success(__('The accountant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accountant could not be saved. Please, try again.'));
        }
        $users = $this->Accountants->Users->find('list', ['limit' => 200]);
        $admins = $this->Accountants->Admins->find('list', ['limit' => 200]);
        $this->set(compact('accountant', 'users', 'admins'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Accountant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $accountant = $this->Accountants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accountant = $this->Accountants->patchEntity($accountant, $this->request->getData());
            if ($this->Accountants->save($accountant)) {
                $this->Flash->success(__('The accountant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accountant could not be saved. Please, try again.'));
        }
        $users = $this->Accountants->Users->find('list', ['limit' => 200]);
        $admins = $this->Accountants->Admins->find('list', ['limit' => 200]);
        $this->set(compact('accountant', 'users', 'admins'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Accountant id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $accountant = $this->Accountants->get($id);
        if ($this->Accountants->delete($accountant)) {
            $this->Flash->success(__('The accountant has been deleted.'));
        } else {
            $this->Flash->error(__('The accountant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
