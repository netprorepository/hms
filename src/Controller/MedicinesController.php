<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Medicines Controller
 *
 * @property \App\Model\Table\MedicinesTable $Medicines
 *
 * @method \App\Model\Entity\Medicine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MedicinesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
         //   'contain' => ['Users','Categories']
        ];
        $medicines = $this->paginate($this->Medicines);
        //debug(json_encode( $medicines, JSON_PRETTY_PRINT)); exit;
        $this->set(compact('medicines'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id Medicine id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medicine = $this->Medicines->get($id, [
            'contain' => ['Users', 'MedicineCategories']
        ]);

        $this->set('medicine', $medicine);
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $medicine = $this->Medicines->newEntity();
        if ($this->request->is('post')) {
            $medicine = $this->Medicines->patchEntity($medicine, $this->request->getData());
            $medicine->user_id = $this->Auth->user('id');
            if ($this->Medicines->save($medicine)) {
                 $title = "Add Medicine";
                 $user_id = $this->Auth->user('id');
                 $description = "Added Medicine ".$this->request->getData('name');
                 $ip = $this->request->clientIp();
                 $type = "Add";
                 $userController = new UsersController();
                 $userController->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The medicine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medicine could not be saved. Please, try again.'));
        }
        $users = $this->Medicines->Users->find('list', ['limit' => 200]);
        $Categories = TableRegistry::get('Categories');
        $category = $Categories->find('list');
        $this->set(compact('medicine', 'users','category'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Edit method
     *
     * @param string|null $id Medicine id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $medicine = $this->Medicines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medicine = $this->Medicines->patchEntity($medicine, $this->request->getData());
            if ($this->Medicines->save($medicine)) {
                 $title = "Edit Medicine";
                 $user_id = $this->Auth->user('id');
                 $description = "Edited Medicine ".$this->request->getData('name');
                 $ip = $this->request->clientIp();
                 $type = "Edit";
                 $userController = new UsersController();
                 $userController->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The medicine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medicine could not be saved. Please, try again.'));
        }
        $users = $this->Medicines->Users->find('list', ['limit' => 200]);
        $Categories = TableRegistry::get('Categories');
        $category = $Categories->find('list');
        $this->set(compact('medicine', 'users','category'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Delete method
     *
     * @param string|null $id Medicine id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $name)
    {
        $this->request->allowMethod(['post', 'delete']);
        $medicine = $this->Medicines->get($id);
        if ($this->Medicines->delete($medicine)) {
            $title = "Delete Medicine";
            $description = "Deleted Medicine ".$name;
            $user_id = $this->Auth->user('id');
            $ip = $this->request->clientIp();
            $type = "Delete";
            $userController = new UsersController();
            $userController->makeLog($title, $user_id, $description, $ip, $type);
            $this->Flash->success(__('The medicine has been deleted.'));
        } else {
            $this->Flash->error(__('The medicine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
