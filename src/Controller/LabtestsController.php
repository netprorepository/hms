<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Labtests Controller
 *
 * @property \App\Model\Table\LabtestsTable $Labtests
 *
 * @method \App\Model\Entity\Labtest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LabtestsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Prescriptions', 'Users']
        ];
        $labtests = $this->paginate($this->Labtests);

        $this->set(compact('labtests'));
          $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id Labtest id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewreport($id = null)
    {
        $labtest = $this->Labtests->get($id, [
            'contain' => ['Prescriptions.Patients', 'Users']
        ]);

        $this->set('labtest', $labtest);
         $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addtests($prescription_id)
    {
        $labtest = $this->Labtests->newEntity();
        if ($this->request->is('post')) {
            $labtest = $this->Labtests->patchEntity($labtest, $this->request->getData());
            $labtest->prescription_id = $prescription_id;
            $labtest->user_id =  $this->Auth->user('id');
            //  debug(json_encode( $labtest, JSON_PRETTY_PRINT)); exit;
            if ($this->Labtests->save($labtest)) {
                $this->Flash->success(__('The lab test has been saved.'));

                return $this->redirect(['controller'=>'Doctors','action' => 'viewprescriptions']);
            }
            $this->Flash->error(__('The labtest could not be saved. Please, try again.'));
        }
       // $prescriptions = $this->Labtests->Prescriptions->find('list', ['limit' => 200]);
       // $users = $this->Labtests->Users->find('list', ['limit' => 200]);
        $this->set(compact('labtest', 'prescriptions', 'users'));
         $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Edit method
     *
     * @param string|null $id Labtest id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editreport($id = null)
    {
        $labtest = $this->Labtests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $labtest = $this->Labtests->patchEntity($labtest, $this->request->getData());
            if ($this->Labtests->save($labtest)) {
                $this->Flash->success(__('The labtest has been saved.'));

                return $this->redirect(['controller'=>'Doctors','action' => 'viewprescriptions']);
            }
            $this->Flash->error(__('The labtest could not be saved. Please, try again.'));
        }
        $prescriptions = $this->Labtests->Prescriptions->find('list', ['limit' => 200]);
        $users = $this->Labtests->Users->find('list', ['limit' => 200]);
        $this->set(compact('labtest', 'prescriptions', 'users'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Delete method
     *
     * @param string|null $id Labtest id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $labtest = $this->Labtests->get($id);
        if ($this->Labtests->delete($labtest)) {
            $this->Flash->success(__('The labtest has been deleted.'));
        } else {
            $this->Flash->error(__('The labtest could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
