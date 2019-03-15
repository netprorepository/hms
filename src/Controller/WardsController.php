<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Wards Controller
 *
 * @property \App\Model\Table\WardsTable $Wards
 *
 * @method \App\Model\Entity\Ward[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WardsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $wards = $this->paginate($this->Wards);

        $this->set(compact('wards'));
    }

    /**
     * View method
     *
     * @param string|null $id Ward id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ward = $this->Wards->get($id, [
            'contain' => ['Admissions']
        ]);

        $this->set('ward', $ward);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ward = $this->Wards->newEntity();
        if ($this->request->is('post')) {
            $ward = $this->Wards->patchEntity($ward, $this->request->getData());
            if ($this->Wards->save($ward)) {
                $this->Flash->success(__('The ward has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ward could not be saved. Please, try again.'));
        }
        $this->set(compact('ward'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ward id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ward = $this->Wards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ward = $this->Wards->patchEntity($ward, $this->request->getData());
            if ($this->Wards->save($ward)) {
                $this->Flash->success(__('The ward has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ward could not be saved. Please, try again.'));
        }
        $this->set(compact('ward'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ward id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ward = $this->Wards->get($id);
        if ($this->Wards->delete($ward)) {
            $this->Flash->success(__('The ward has been deleted.'));
        } else {
            $this->Flash->error(__('The ward could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
