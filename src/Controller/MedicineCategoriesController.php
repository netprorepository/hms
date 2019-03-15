<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MedicineCategories Controller
 *
 * @property \App\Model\Table\MedicineCategoriesTable $MedicineCategories
 *
 * @method \App\Model\Entity\MedicineCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MedicineCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Medicines', 'Categories']
        ];
        $medicineCategories = $this->paginate($this->MedicineCategories);

        $this->set(compact('medicineCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Medicine Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medicineCategory = $this->MedicineCategories->get($id, [
            'contain' => ['Medicines', 'Categories']
        ]);

        $this->set('medicineCategory', $medicineCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $medicineCategory = $this->MedicineCategories->newEntity();
        if ($this->request->is('post')) {
            $medicineCategory = $this->MedicineCategories->patchEntity($medicineCategory, $this->request->getData());
            if ($this->MedicineCategories->save($medicineCategory)) {
                $this->Flash->success(__('The medicine category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medicine category could not be saved. Please, try again.'));
        }
        $medicines = $this->MedicineCategories->Medicines->find('list', ['limit' => 200]);
        $categories = $this->MedicineCategories->Categories->find('list', ['limit' => 200]);
        $this->set(compact('medicineCategory', 'medicines', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Medicine Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $medicineCategory = $this->MedicineCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medicineCategory = $this->MedicineCategories->patchEntity($medicineCategory, $this->request->getData());
            if ($this->MedicineCategories->save($medicineCategory)) {
                $this->Flash->success(__('The medicine category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medicine category could not be saved. Please, try again.'));
        }
        $medicines = $this->MedicineCategories->Medicines->find('list', ['limit' => 200]);
        $categories = $this->MedicineCategories->Categories->find('list', ['limit' => 200]);
        $this->set(compact('medicineCategory', 'medicines', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Medicine Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $medicineCategory = $this->MedicineCategories->get($id);
        if ($this->MedicineCategories->delete($medicineCategory)) {
            $this->Flash->success(__('The medicine category has been deleted.'));
        } else {
            $this->Flash->error(__('The medicine category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
