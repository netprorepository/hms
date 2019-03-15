<?php
namespace App\Controller;

use App\Controller\AppController;



/**
 * Departments Controller
 *
 * @property \App\Model\Table\DepartmentsTable $Departments
 *
 * @method \App\Model\Entity\Department[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepartmentsController extends AppController
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
        $departments = $this->paginate($this->Departments);

        $this->set(compact('departments'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $department = $this->Departments->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('department', $department);
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $department = $this->Departments->newEntity();
        if ($this->request->is('post')) {
            //debug(json_encode( $this->request->getData('admin_id'), JSON_PRETTY_PRINT)); exit;
            $department = $this->Departments->patchEntity($department, $this->request->getData());
            $department->user_id =  $this->Auth->user('id');
            if ($this->Departments->save($department)) {
                 $title = "Add Department";
                 $user_id = $this->request->getData('admin_id');
                 $description = "Added a new department ".$this->request->getData('name');
                 $ip = $this->request->clientIp();
                 $type = "Add";
                 $userController = new UsersController();
                $userController->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The department has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The department could not be saved. Please, try again.'));
        }
       // $admins = $this->Departments->Admins->find('list', ['limit' => 200]);
        $this->set(compact('department', 'admins'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Edit method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $department = $this->Departments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $department = $this->Departments->patchEntity($department, $this->request->getData());
            if ($this->Departments->save($department)) {
                $title = "Edit Department";
                 $user_id = $this->request->getData('admin_id');
                 $description = "Edited department ".$this->request->getData('name');
                 $ip = $this->request->clientIp();
                 $type = "Edit";
                 $userController = new UsersController();
                $userController->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The department has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The department could not be saved. Please, try again.'));
        }
        $admins = $this->Departments->Admins->find('list', ['limit' => 200]);
        $this->set(compact('department', 'admins'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Delete method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $name, $user_id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $department = $this->Departments->get($id);
        if ($this->Departments->delete($department)) {
            $title = "Delete Department";
            $description = "Deleted department ".$name;
            $ip = $this->request->clientIp();
            $type = "Delete";
            $userController = new UsersController();
            $userController->makeLog($title, $user_id, $description, $ip, $type);
            $this->Flash->success(__('The department has been deleted.'));
        } else {
            $this->Flash->error(__('The department could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
