<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Laboratorists Controller
 *
 * @property \App\Model\Table\LaboratoristsTable $Laboratorists
 *
 * @method \App\Model\Entity\Laboratorist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LaboratoristsController extends AppController
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
        $laboratorists = $this->paginate($this->Laboratorists);

        $this->set(compact('laboratorists'));
    }

    /**
     * View method
     *
     * @param string|null $id Laboratorist id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $laboratorist = $this->Laboratorists->get($id, [
            'contain' => ['Users', 'Admins', 'Diagnosisreports']
        ]);

        $this->set('laboratorist', $laboratorist);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $laboratorist = $this->Laboratorists->newEntity();
        if ($this->request->is('post')) {
            $laboratorist = $this->Laboratorists->patchEntity($laboratorist, $this->request->getData());
            if ($this->Laboratorists->save($laboratorist)) {
                $this->Flash->success(__('The laboratorist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The laboratorist could not be saved. Please, try again.'));
        }
        $users = $this->Laboratorists->Users->find('list', ['limit' => 200]);
        $admins = $this->Laboratorists->Admins->find('list', ['limit' => 200]);
        $this->set(compact('laboratorist', 'users', 'admins'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Laboratorist id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $laboratorist = $this->Laboratorists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $laboratorist = $this->Laboratorists->patchEntity($laboratorist, $this->request->getData());
            if ($this->Laboratorists->save($laboratorist)) {
                $this->Flash->success(__('The laboratorist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The laboratorist could not be saved. Please, try again.'));
        }
        $users = $this->Laboratorists->Users->find('list', ['limit' => 200]);
        $admins = $this->Laboratorists->Admins->find('list', ['limit' => 200]);
        $this->set(compact('laboratorist', 'users', 'admins'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Laboratorist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $laboratorist = $this->Laboratorists->get($id);
        if ($this->Laboratorists->delete($laboratorist)) {
            $this->Flash->success(__('The laboratorist has been deleted.'));
        } else {
            $this->Flash->error(__('The laboratorist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
