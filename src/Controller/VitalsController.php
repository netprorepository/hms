<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vitals Controller
 *
 * @property \App\Model\Table\VitalsTable $Vitals
 *
 * @method \App\Model\Entity\Vital[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VitalsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Patients']
        ];
        $vitals = $this->paginate($this->Vitals);

        $this->set(compact('vitals'));
    }

    /**
     * View method
     *
     * @param string|null $id Vital id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vital = $this->Vitals->get($id, [
            'contain' => ['Patients']
        ]);

        $this->set('vital', $vital);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function newtriage($patient_id)
    {
        //debug(json_encode( $patient_id, JSON_PRETTY_PRINT)); exit;
        $vital = $this->Vitals->newEntity();
        if ($this->request->is('post')) {
            
            $vital = $this->Vitals->patchEntity($vital, $this->request->getData());
            $vital->patient_id = $patient_id;
            //debug(json_encode( $vital, JSON_PRETTY_PRINT)); exit;
            if ($this->Vitals->save($vital)) {
                $this->Flash->success(__('The Patient\'s vitals has been saved.'));

                return $this->redirect(['controller'=>'Patients','action' => 'viewpatient',$patient_id]);
            }
            $this->Flash->error(__('The vital could not be saved. Please, try again.'));
        }
        $patients = $this->Vitals->Patients->find('list', ['limit' => 200]);
        $this->set(compact('vital', 'patients'));
         $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Edit method
     *
     * @param string|null $id Vital id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vital = $this->Vitals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vital = $this->Vitals->patchEntity($vital, $this->request->getData());
            if ($this->Vitals->save($vital)) {
                $this->Flash->success(__('The vital has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vital could not be saved. Please, try again.'));
        }
        $patients = $this->Vitals->Patients->find('list', ['limit' => 200]);
        $this->set(compact('vital', 'patients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vital id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vital = $this->Vitals->get($id);
        if ($this->Vitals->delete($vital)) {
            $this->Flash->success(__('The vital has been deleted.'));
        } else {
            $this->Flash->error(__('The vital could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
