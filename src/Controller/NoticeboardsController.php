<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Noticeboards Controller
 *
 * @property \App\Model\Table\NoticeboardsTable $Noticeboards
 *
 * @method \App\Model\Entity\Noticeboard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NoticeboardsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $noticeboards = $this->paginate($this->Noticeboards);

        $this->set(compact('noticeboards'));
    }

    /**
     * View method
     *
     * @param string|null $id Noticeboard id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $noticeboard = $this->Noticeboards->get($id, [
            'contain' => []
        ]);

        $this->set('noticeboard', $noticeboard);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $noticeboard = $this->Noticeboards->newEntity();
        if ($this->request->is('post')) {
            $noticeboard = $this->Noticeboards->patchEntity($noticeboard, $this->request->getData());
            if ($this->Noticeboards->save($noticeboard)) {
                $this->Flash->success(__('The noticeboard has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The noticeboard could not be saved. Please, try again.'));
        }
        $this->set(compact('noticeboard'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Noticeboard id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $noticeboard = $this->Noticeboards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $noticeboard = $this->Noticeboards->patchEntity($noticeboard, $this->request->getData());
            if ($this->Noticeboards->save($noticeboard)) {
                $this->Flash->success(__('The noticeboard has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The noticeboard could not be saved. Please, try again.'));
        }
        $this->set(compact('noticeboard'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Noticeboard id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $noticeboard = $this->Noticeboards->get($id);
        if ($this->Noticeboards->delete($noticeboard)) {
            $this->Flash->success(__('The noticeboard has been deleted.'));
        } else {
            $this->Flash->error(__('The noticeboard could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
