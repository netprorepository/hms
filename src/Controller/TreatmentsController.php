<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Treatments Controller
 *
 * @property \App\Model\Table\TreatmentsTable $Treatments
 *
 * @method \App\Model\Entity\Treatment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TreatmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Consultations']
        ];
        $treatments = $this->paginate($this->Treatments);

        $this->set(compact('treatments'));
    }

    /**
     * View method
     *
     * @param string|null $id Treatment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $treatment = $this->Treatments->get($id, [
            'contain' => ['Users', 'Consultations']
        ]);

        $this->set('treatment', $treatment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addtreatment($consultation_id)
    {
        $treatment = $this->Treatments->newEntity();
        if ($this->request->is('post')) {
            $treatment = $this->Treatments->patchEntity($treatment, $this->request->getData());
             $treatment->consultation_id = $consultation_id;
              $treatment->user_id = $this->Auth->user('id');
            if ($this->Treatments->save($treatment)) {
                 //log activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('New Treatment Plan', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' added a treatment plan', $ip, 'Add');
                
                $this->Flash->success(__('The treatment has been saved.'));

                return $this->redirect(['controller'=>'Patients','action' => 'index']);
            }
            $this->Flash->error(__('The treatment could not be saved. Please, try again.'));
        }
        $users = $this->Treatments->Users->find('list', ['limit' => 200]);
        $consultations = $this->Treatments->Consultations->find('list', ['limit' => 200]);
        $this->set(compact('treatment', 'users', 'consultations'));
         $this->viewBuilder()->setLayout('backend');
    }
    
     public function add($consultation_id)
    {
        $treatmentplan = $this->Treatmentplans->newEntity();
        if ($this->request->is('post')) {
            $treatmentplan = $this->Treatmentplans->patchEntity($treatmentplan, $this->request->getData());
            $treatmentplan->user_id = $this->Auth->user('id');
           $treatmentplan->consultation_id = $consultation_id;
            if ($this->Treatmentplans->save($treatmentplan)) {
                //log activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('New Treatment Plan', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' added a treatment plan', $ip, 'Add');
                
                $this->Flash->success(__('The treatment plan has been saved.'));

                return $this->redirect(['controller'=>'Patients','action' => 'index']);
            }
            $this->Flash->error(__('The treatmentplan could not be saved. Please, try again.'));
        }
        $users = $this->Treatmentplans->Users->find('list', ['limit' => 200]);
        $this->set(compact('treatmentplan', 'users'));
         $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Edit method
     *
     * @param string|null $id Treatment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $treatment = $this->Treatments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $treatment = $this->Treatments->patchEntity($treatment, $this->request->getData());
            if ($this->Treatments->save($treatment)) {
                $this->Flash->success(__('The treatment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The treatment could not be saved. Please, try again.'));
        }
        $users = $this->Treatments->Users->find('list', ['limit' => 200]);
        $consultations = $this->Treatments->Consultations->find('list', ['limit' => 200]);
        $this->set(compact('treatment', 'users', 'consultations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Treatment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treatment = $this->Treatments->get($id);
        if ($this->Treatments->delete($treatment)) {
            $this->Flash->success(__('The treatment has been deleted.'));
        } else {
            $this->Flash->error(__('The treatment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
