<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Bedallotments Controller
 *
 * @property \App\Model\Table\BedallotmentsTable $Bedallotments
 *
 * @method \App\Model\Entity\Bedallotment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BedallotmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Beds', 'Patients', 'Users']
        ];
        $admissions_table = TableRegistry::get('Admissions');
        $wards_table = TableRegistry::get('Wards');
        $bedallotments = $this->paginate($this->Bedallotments);
        $admissions = $admissions_table->find()->where(['Admissions.status !='=>'Discharged'])
                ->contain(['Patients', 'Wards', 'Beds', 'Users']);
        //debug(json_encode( $bedallotments, JSON_PRETTY_PRINT)); exit;
        $wards = $wards_table->find('list', ['limit' => 200]);
       // $beds = $this->Admissions->Beds->find('list', ['limit' => 200])->where(['status'=>0]);
        $beds = $this->Bedallotments->Beds->find('list', ['limit' => 200])->where(['status'=>0]);
        $patients = $this->Bedallotments->Patients->find('list');
        $this->set(compact('bedallotments','beds','patients','wards','admissions'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id Bedallotment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bedallotment = $this->Bedallotments->get($id, [
            'contain' => ['Beds', 'Patients', 'Users']
        ]);

        $this->set('bedallotment', $bedallotment);
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bedallotment = $this->Bedallotments->newEntity();
        if ($this->request->is('post')) {
            $bedallotment = $this->Bedallotments->patchEntity($bedallotment, $this->request->getData());
            $bedallotment->user_id = $this->Auth->user('id');
            if ($this->Bedallotments->save($bedallotment)) {
                $title = "Allocate Bed";
                $user_id = $this->Auth->user('id');
                $description = "Allocated bed ".$this->request->getData('bed_id');
                $ip = $this->request->clientIp();
                $type = "Add";
                $userController = new UsersController();
                $userController->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The bedallotment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bedallotment could not be saved. Please, try again.'));
        }
        $beds = $this->Bedallotments->Beds->find('list', ['limit' => 200]);
        $patients = $this->Bedallotments->Patients->find('list', ['limit' => 200]);
        $users = $this->Bedallotments->Users->find('list', ['limit' => 200]);
        $this->set(compact('bedallotment', 'beds', 'patients', 'users'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Edit method
     *
     * @param string|null $id Bedallotment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bedallotment = $this->Bedallotments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bedallotment = $this->Bedallotments->patchEntity($bedallotment, $this->request->getData());
            if ($this->Bedallotments->save($bedallotment)) {
                $title = "Edit Bed";
                $user_id = $this->Auth->user('id');
                $description = "Edited Bed ".$this->request->getData('bed_id');
                $ip = $this->request->clientIp();
                $type = "Edit";
                $userController = new UsersController();
                $userController->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The bedallotment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bedallotment could not be saved. Please, try again.'));
        }
        $beds = $this->Bedallotments->Beds->find('list', ['limit' => 200]);
        $patients = $this->Bedallotments->Patients->find('list', ['limit' => 200]);
        $users = $this->Bedallotments->Users->find('list', ['limit' => 200]);
        $this->set(compact('bedallotment', 'beds', 'patients', 'users'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Delete method
     *
     * @param string|null $id Bedallotment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bedallotment = $this->Bedallotments->get($id);
        if ($this->Bedallotments->delete($bedallotment)) {
            $title = "Delete Bed";
            $user_id = $this->Auth->user('id');
            $description = "Deleted bed ".$id;
            $ip = $this->request->clientIp();
            $type = "Delete";
            $userController = new UsersController();
            $userController->makeLog($title, $user_id, $description, $ip, $type);
            $this->Flash->success(__('The bedallotment has been deleted.'));
        } else {
            $this->Flash->error(__('The bedallotment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        $this->viewBuilder()->setLayout('backend');
    }
}
