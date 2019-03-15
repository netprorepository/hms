<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bloodbank Controller
 *
 * @property \App\Model\Table\BloodbankTable $Bloodbank
 *
 * @method \App\Model\Entity\Bloodbank[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BloodbankController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Admins']
        ];
        $bloodbank = $this->paginate($this->Bloodbank);

        $this->set(compact('bloodbank'));
    }

    /**
     * View method
     *
     * @param string|null $id Bloodbank id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bloodbank = $this->Bloodbank->get($id, [
            'contain' => ['Admins']
        ]);

        $this->set('bloodbank', $bloodbank);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bloodbank = $this->Bloodbank->newEntity();
        if ($this->request->is('post')) {
            $bloodbank = $this->Bloodbank->patchEntity($bloodbank, $this->request->getData());
            if ($this->Bloodbank->save($bloodbank)) {
                $this->Flash->success(__('The bloodbank has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bloodbank could not be saved. Please, try again.'));
        }
        $admins = $this->Bloodbank->Admins->find('list', ['limit' => 200]);
        $this->set(compact('bloodbank', 'admins'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bloodbank id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bloodbank = $this->Bloodbank->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bloodbank = $this->Bloodbank->patchEntity($bloodbank, $this->request->getData());
            if ($this->Bloodbank->save($bloodbank)) {
                $this->Flash->success(__('The bloodbank has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bloodbank could not be saved. Please, try again.'));
        }
        $admins = $this->Bloodbank->Admins->find('list', ['limit' => 200]);
        $this->set(compact('bloodbank', 'admins'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bloodbank id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bloodbank = $this->Bloodbank->get($id);
        if ($this->Bloodbank->delete($bloodbank)) {
            $this->Flash->success(__('The bloodbank has been deleted.'));
        } else {
            $this->Flash->error(__('The bloodbank could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
