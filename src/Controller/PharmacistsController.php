<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pharmacists Controller
 *
 * @property \App\Model\Table\PharmacistsTable $Pharmacists
 *
 * @method \App\Model\Entity\Pharmacist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PharmacistsController extends AppController
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
        $pharmacists = $this->paginate($this->Pharmacists);

        $this->set(compact('pharmacists'));
    }

    /**
     * View method
     *
     * @param string|null $id Pharmacist id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pharmacist = $this->Pharmacists->get($id, [
            'contain' => ['Users', 'Medicines']
        ]);

        $this->set('pharmacist', $pharmacist);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pharmacist = $this->Pharmacists->newEntity();
        if ($this->request->is('post')) {
            $pharmacist = $this->Pharmacists->patchEntity($pharmacist, $this->request->getData());
            if ($this->Pharmacists->save($pharmacist)) {
                $this->Flash->success(__('The pharmacist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pharmacist could not be saved. Please, try again.'));
        }
        $users = $this->Pharmacists->Users->find('list', ['limit' => 200]);
        $this->set(compact('pharmacist', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pharmacist id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pharmacist = $this->Pharmacists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacist = $this->Pharmacists->patchEntity($pharmacist, $this->request->getData());
            if ($this->Pharmacists->save($pharmacist)) {
                $this->Flash->success(__('The pharmacist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pharmacist could not be saved. Please, try again.'));
        }
        $users = $this->Pharmacists->Users->find('list', ['limit' => 200]);
        $this->set(compact('pharmacist', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pharmacist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacist = $this->Pharmacists->get($id);
        if ($this->Pharmacists->delete($pharmacist)) {
            $this->Flash->success(__('The pharmacist has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
