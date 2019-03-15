<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Nurses Controller
 *
 * @property \App\Model\Table\NursesTable $Nurses
 *
 * @method \App\Model\Entity\Nurse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NursesController extends AppController
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
        $nurses = $this->paginate($this->Nurses);

        $this->set(compact('nurses'));
    }

    /**
     * View method
     *
     * @param string|null $id Nurse id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nurse = $this->Nurses->get($id, [
            'contain' => ['Users', 'Bedallotments', 'Beds', 'Blooddonors']
        ]);

        $this->set('nurse', $nurse);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nurse = $this->Nurses->newEntity();
        if ($this->request->is('post')) {
            $nurse = $this->Nurses->patchEntity($nurse, $this->request->getData());
            if ($this->Nurses->save($nurse)) {
                $this->Flash->success(__('The nurse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nurse could not be saved. Please, try again.'));
        }
        $users = $this->Nurses->Users->find('list', ['limit' => 200]);
        $this->set(compact('nurse', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nurse id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nurse = $this->Nurses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nurse = $this->Nurses->patchEntity($nurse, $this->request->getData());
            if ($this->Nurses->save($nurse)) {
                $this->Flash->success(__('The nurse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nurse could not be saved. Please, try again.'));
        }
        $users = $this->Nurses->Users->find('list', ['limit' => 200]);
        $this->set(compact('nurse', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nurse id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nurse = $this->Nurses->get($id);
        if ($this->Nurses->delete($nurse)) {
            $this->Flash->success(__('The nurse has been deleted.'));
        } else {
            $this->Flash->error(__('The nurse could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
