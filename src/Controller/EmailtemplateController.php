<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Emailtemplate Controller
 *
 * @property \App\Model\Table\EmailtemplateTable $Emailtemplate
 *
 * @method \App\Model\Entity\Emailtemplate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmailtemplateController extends AppController
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
        $emailtemplate = $this->paginate($this->Emailtemplate);

        $this->set(compact('emailtemplate'));
    }

    /**
     * View method
     *
     * @param string|null $id Emailtemplate id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $emailtemplate = $this->Emailtemplate->get($id, [
            'contain' => ['Admins']
        ]);

        $this->set('emailtemplate', $emailtemplate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $emailtemplate = $this->Emailtemplate->newEntity();
        if ($this->request->is('post')) {
            $emailtemplate = $this->Emailtemplate->patchEntity($emailtemplate, $this->request->getData());
            if ($this->Emailtemplate->save($emailtemplate)) {
                $this->Flash->success(__('The emailtemplate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The emailtemplate could not be saved. Please, try again.'));
        }
        $admins = $this->Emailtemplate->Admins->find('list', ['limit' => 200]);
        $this->set(compact('emailtemplate', 'admins'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Emailtemplate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $emailtemplate = $this->Emailtemplate->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $emailtemplate = $this->Emailtemplate->patchEntity($emailtemplate, $this->request->getData());
            if ($this->Emailtemplate->save($emailtemplate)) {
                $this->Flash->success(__('The emailtemplate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The emailtemplate could not be saved. Please, try again.'));
        }
        $admins = $this->Emailtemplate->Admins->find('list', ['limit' => 200]);
        $this->set(compact('emailtemplate', 'admins'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Emailtemplate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $emailtemplate = $this->Emailtemplate->get($id);
        if ($this->Emailtemplate->delete($emailtemplate)) {
            $this->Flash->success(__('The emailtemplate has been deleted.'));
        } else {
            $this->Flash->error(__('The emailtemplate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
