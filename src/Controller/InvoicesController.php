<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\Network\Session;
use Cake\ORM\TableRegistry;

/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 *
 * @method \App\Model\Entity\Invoice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Patients', 'Users']
        ];
        $invoices = $this->paginate($this->Invoices);

        $this->set(compact('invoices'));
         $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewinvoice($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => ['Patients', 'Users', 'Payments']
        ]);

        $this->set('invoice', $invoice);
         $this->viewBuilder()->setLayout('backend');
    }

    
    public function printinvoice($id){
         $invoice = $this->Invoices->get($id, [
            'contain' => ['Patients', 'Users', 'Payments']
        ]);
         //log admin activity
                $userscontroller = new UsersController();
               $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Printed Invoice', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' printed an invoice', $ip, 'Print');
               
        $this->set('invoice', $invoice);
     $this->viewBuilder()->setLayout('backend');   
    }




public function printcard($id){
    $patients_table = TableRegistry::get('Patients');
    $patient = $patients_table->get($id);
    //log admin activity
    $userscontroller = new UsersController();
    $ip = $userscontroller->get_client_ip();
    $userscontroller->makeLog('Printed Id Card', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' printed Id Card', $ip, 'Print');
    $this->set('patient', $patient);
    $this->viewBuilder()->setLayout('backend');   
}
    
    
    //method for paid invoices listing
    public function paidinvoices(){
        $invoices = $this->Invoices->find()->contain(['Patients', 'Users', 'Payments'])
                ->where(['status'=>'Paid'])
                ->order(['Invoices.created_date'=>'DESC']);
         $this->set('invoices', $invoices);
        $this->viewBuilder()->setLayout('backend'); 
    }

    
     //method for paid invoices listing
    public function unpaidinvoices(){
        $invoices = $this->Invoices->find()->contain(['Patients', 'Users', 'Payments'])
                ->where(['status'=>'Unpaid'])
                ->order(['Invoices.created_date'=>'DESC']);
         $this->set('invoices', $invoices);
        $this->viewBuilder()->setLayout('backend'); 
    }


//acountant's method that creates a payment each time he collects money and updates an invoice
    private function createpayment($invoice_id, $patient_id,$amount,$description){
          $payments_table = TableRegistry::get('Payments');
          $payment = $payments_table->newEntity();
          $payment->payment_for = "medical services fee";
          $payment->invoice_id = $invoice_id;
          $payment->patient_id = $patient_id;
          $payment->payment_method = "Cash";
          $payment->description = $description;
          $payment->amount = $amount;
          $payments_table->save($payment);
          return;
    }

        /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function newinvoice()
    {
        $invoice = $this->Invoices->newEntity();
        if ($this->request->is('post')) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
            $invoice->user_id = $this->Auth->user('id');
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been Generated.'));
                //update the invoice id
                $this->generateinvoiceid($invoice->patient_id,$invoice->id);
                //log admin activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Created an Invoice', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' created an invoice', $ip, 'Add');
               
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice could not be generated. Please, try again.'));
        }
        $patients = $this->Invoices->Patients->find('list', ['limit' => 20000])->order(['name'=>'DESC']);
       // $users = $this->Invoices->Users->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'patients', 'users'));
         $this->viewBuilder()->setLayout('backend');
    }

    
    //method that generates a unique id for every invoice
    private function generateinvoiceid($patient_id,$invoice_id){
        $invoice = $this->Invoices->get($invoice_id);
        $invoice->invoiceid = 'WWD/Inv/'.$patient_id.'/'.$invoice_id;
        $this->Invoices->save($invoice);
        return;
        
    }

        /**
     * Edit method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editinvoice($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
            if ($this->Invoices->save($invoice)) {
                //log admin activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
               
                $userscontroller->makeLog('Edited an Invoice', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' Edited an Invoice '.$id, $ip, 'Edit');
               
                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
        }
        $patients = $this->Invoices->Patients->find('list', ['limit' => 200]);
        //$users = $this->Invoices->Users->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'patients'));
        $this->viewBuilder()->setLayout('backend');
    }

    
    
    //check for indebtedness, called before discharge
    public function checkindebtedness($patient_id){
        $unpaidinvoices = $this->Invoices->find()
                ->where(['patient_id'=>$patient_id,'status'=>'Unpaid'])
                ->first();
        if($unpaidinvoices){return true;}
        else{return false;}
    }




    //admin method for searching for invoices
    public function searchinvoice(){
        
         if ($this->request->is('post')) {
             $startdate = date('Y-m-d', strtotime(date($this->request->getData('startdate'))));
            
             $enddate = date('Y-m-d', strtotime(date($this->request->getData('enddate'))));
             $status = $this->request->getData('status');
             $invoices = $this->Invoices->find()->contain(['Patients','Users'])
                     ->where(["Invoices.created_date BETWEEN '$startdate' AND '$enddate'"])
                     ->andWhere(['status'=>$status]);
             
             // debug(json_encode( $invoices, JSON_PRETTY_PRINT)); exit;
         }
         else{
              $invoices = $this->Invoices->find()->contain(['Patients', 'Users', 'Payments'])
              //  ->where(['status'=>'Paid'])
                      ->limit(5)
                ->order(['Invoices.created_date'=>'DESC']);
         }
        
         $this->set(compact('invoices'));
        $this->viewBuilder()->setLayout('backend');
    }








    //clark fucntion for generating hospital cards
    public function createcard($patient_id){
        $patients_table = TableRegistry::get('Patients');
        $patient = $patients_table->get($patient_id);
        //log admin activity
                $userscontroller = new UsersController();
               $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Created ID Card', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' Created an ID Card For Patient '.$patient_id, $ip, 'Add');
               
        $this->set(compact('patient'));
         $this->viewBuilder()->setLayout('backend');
    }

    
    //set an invoice as paid
    public function updateinvoice($id=null,$status){
         $invoice = $this->Invoices->get($id);
        $invoice->status = $status;
        $this->Invoices->save($invoice);
        //create payment
        if($invoice->status=='Paid'){
            //log admin activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Recieved Payment', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' Updated invoice '.$id .' To Status '.$status, $ip, 'Edit');
               
        $this->createpayment($id, $invoice->patient_id,$invoice->amount,$invoice->description);
        return $this->redirect(['action' => 'viewinvoice',$id]);
        }
        return $this->redirect(['action' => 'viewinvoice',$id]);
    }

    
    /**
     * Delete method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoice = $this->Invoices->get($id);
       // $invoiceid = $invoice->invoiceid;
        if ($this->Invoices->delete($invoice)) {
           //log admin activity
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Deleted An Invoice', $this->Auth->user('id'), 'user ' . $this->Auth->user('id') . ' Deleted Invoice '.$id, $ip, 'Delete');
               
            $this->Flash->success(__('The invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
