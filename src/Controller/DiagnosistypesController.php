<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Diagnosistypes Controller
 *
 * @property \App\Model\Table\DiagnosistypesTable $Diagnosistypes
 *
 * @method \App\Model\Entity\Diagnosistype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiagnosistypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $diagnosistypes = $this->paginate($this->Diagnosistypes);

        $this->set(compact('diagnosistypes'));
         $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id Diagnosistype id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diagnosistype = $this->Diagnosistypes->get($id, [
            'contain' => []
        ]);

        $this->set('diagnosistype', $diagnosistype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function newdiagnosistype()
    {
        $diagnosistype = $this->Diagnosistypes->newEntity();
        if ($this->request->is('post')) {
            $diagnosistype = $this->Diagnosistypes->patchEntity($diagnosistype, $this->request->getData());
            if ($this->Diagnosistypes->save($diagnosistype)) {
                $this->Flash->success(__('The diagnosis Type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diagnosistype could not be saved. Please, try again.'));
        }
        $this->set(compact('diagnosistype'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Edit method
     *
     * @param string|null $id Diagnosistype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diagnosistype = $this->Diagnosistypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diagnosistype = $this->Diagnosistypes->patchEntity($diagnosistype, $this->request->getData());
            if ($this->Diagnosistypes->save($diagnosistype)) {
                $this->Flash->success(__('The diagnosis type has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diagnosistype could not be saved. Please, try again.'));
        }
        $this->set(compact('diagnosistype'));
         $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Delete method
     *
     * @param string|null $id Diagnosistype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diagnosistype = $this->Diagnosistypes->get($id);
        if ($this->Diagnosistypes->delete($diagnosistype)) {
            $this->Flash->success(__('The diagnosis type has been deleted.'));
        } else {
            $this->Flash->error(__('The diagnosistype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
