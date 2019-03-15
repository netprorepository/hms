<?php
namespace App\Controller;
use Cake\ORM\TableRegistry; 
use Cake\Event\Event;
use Cake\Network\Email\Email;
use App\Controller\AppController;

/**
 * Diagnosisreports Controller
 *
 * @property \App\Model\Table\DiagnosisreportsTable $Diagnosisreports
 *
 * @method \App\Model\Entity\Diagnosisreport[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiagnosisreportsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
      //  $this->paginate = ['contain' => ['Consultations', 'Users']];
        $diagnosisreports = $this->Diagnosisreports->find()->contain(['Consultations.Patients', 'Users','Diagnosistypes']);

        $this->set(compact('diagnosisreports'));
          $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id Diagnosisreport id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewreport($id = null)
    {
//        $diagnosisreport = $this->Diagnosisreports->find()->where(['consultation_id'=>$id])
//                ->contain(['Consultations.Patients', 'Users','Diagnosistypes'])->first();
         
        $diagnosisreport = $this->Diagnosisreports->get($id, [
            'contain' => ['Consultations.Patients', 'Users','Diagnosistypes']
        ]);
   //debug(json_encode(  $diagnosisreport, JSON_PRETTY_PRINT)); exit;
        $this->set('diagnosisreport', $diagnosisreport);
         $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addreport($id)
    {
         $diagnostictypes_table = TableRegistry::get('Diagnosistypes');
        $consultations_table = TableRegistry::get('Consultations');
        $consultation = $consultations_table->get($id);
        $diagnosisreport = $this->Diagnosisreports->newEntity();
        if ($this->request->is('post')) {
           $diagnosistypeid = $this->request->getData('diagnosistype_id');
              $imagearray = $this->request->getData('file_name');
            if (!empty($imagearray['tmp_name'])) {
                $image_name = $this->addimage($imagearray);
            }
            else{
                $image_name = 'none.png';
            }
            $diagnosisreport = $this->Diagnosisreports->patchEntity($diagnosisreport, $this->request->getData());
            $diagnosisreport->file_name = $image_name;
            $diagnosisreport->user_id =  $this->Auth->user('id');
            $diagnosisreport->consultation_id = $id;
            $diagnosisreport->reporttime = date('Y-m-d : H:m a');
            // $diagnosisreport->reportby = $this->Auth->user('fname');
            //  debug(json_encode(  $diagnosisreport, JSON_PRETTY_PRINT)); exit;
            if ($this->Diagnosisreports->save($diagnosisreport)) {
                //create invoice
                $patientscontroller = new PatientsController();
                $diagnosistype = $diagnostictypes_table->get($diagnosistypeid);
                $patientscontroller->createinvoice($consultation->patient_id,'Payment for '.$diagnosistype->name,$diagnosistype->cost,'This is a Payment for '.$diagnosistype->name);
           //log what just happened
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Added Diagnostic Report', $this->Auth->user('id'), 'Laboratorist Added a Diagnostic Report', $ip, 'Add');
                $this->Flash->success(__('The diagnosisreport has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diagnosisreport could not be saved. Please, try again.'));
        }
       // $prescriptions = $this->Diagnosisreports->Prescriptions->find('list', ['limit' => 200]);
        $diagnostictypes = $diagnostictypes_table->find('list', ['limit' => 200]);
        $this->set(compact('diagnosisreport', 'prescriptions','diagnostictypes'));
          $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Edit method
     *
     * @param string|null $id Diagnosisreport id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editreport($id = null)
    {
        $diagnosisreport = $this->Diagnosisreports->get($id, [
            'contain' => ['Diagnosistypes']
        ]);
         $diagnostictypes_table = TableRegistry::get('Diagnosistypes');
        if ($this->request->is(['patch', 'post', 'put'])) {
           
                $imagearray = $this->request->getData('file_name');
            if (!empty($imagearray['tmp_name'])) {
                 //delete old file
            $this->deletefile($diagnosisreport->file_name);
            //upload new file
                $image_name = $this->addimage($imagearray);
            }
            else{
                $image_name = $diagnosisreport->file_name;
            }
            $diagnosisreport = $this->Diagnosisreports->patchEntity($diagnosisreport, $this->request->getData());
            $diagnosisreport->file_name = $image_name;
            $diagnosisreport->reporttime = date('Y-m-d : H:m a');
            $diagnosisreport->reportby = $this->Auth->user('fname');
            if ($this->Diagnosisreports->save($diagnosisreport)) {
                //log what just happened
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Edited Diagnostic Report', $this->Auth->user('id'), 'Laboratorist Edited a Diagnostic Report '.$id, $ip, 'Edit');
               
                $this->Flash->success(__('The diagnosis report has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diagnosisreport could not be saved. Please, try again.'));
        }
       // $prescriptions = $this->Diagnosisreports->Prescriptions->find('list', ['limit' => 200]);
        $diagnostictypes = $diagnostictypes_table->find('list', ['limit' => 200]);
        $this->set(compact('diagnosisreport', 'prescriptions','diagnostictypes'));
        $this->viewBuilder()->setLayout('backend');
    }

    
     //function for adding image to a property
    public function addimage($imagearray) {
        $folder_upload = "img/";
        $extension = array("jpeg", "jpg", "png", "gif");
        if (empty($imagearray['tmp_name'])) {
            return;
        }
        //$message = " ";
        $size = \getimagesize($imagearray['tmp_name']);
        // $mimetype = stripslashes($size['mime']); 
        if ((empty($size) || ($size[0] === 0) || ($size[1] === 0))) {
            throw new \Exception('This is unacceptable!. image must be of type : gif, jpeg, png or jpg and less than 2mb.');
        }
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
//     //$filename = "company_staff_ids/".$staff_id;
        $file_type = $finfo->file(h($imagearray['tmp_name']), FILEINFO_MIME_TYPE);
//    
//    echo $file_type; exit;
        if (!(($file_type == "image/gif") || ($file_type == "image/png") || ($file_type == "image/jpeg") ||
                ($file_type == "image/pjpeg") || ($file_type == "image/x-png"))) {
            throw new \Exception('This is unacceptable!. image must be of type : gif, jpeg, png or jpg and less than 2mb .');
        }

        $file_name = $imagearray['name'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);

        if (in_array($ext, $extension)) {
            $file_name = md5(uniqid($imagearray['name'], true)) . time();

            if (!file_exists($folder_upload . $file_name . '.' . $ext)) {
                $file_name = $file_name . '.' . $ext;
                move_uploaded_file($imagearray["tmp_name"], $folder_upload . $file_name);

                chmod($folder_upload . $file_name, 0644);
                return $message = $file_name;
            } else {
                $filename = basename($file_name, $ext);
                $newFileName = crypt($filename . time()) . "." . $ext;
                // echo $file_name; exit;
                move_uploaded_file($imagearray["tmp_name"], $folder_upload . $newFileName);
                chmod($folder_upload . $newFileName, 0644);
                return $message = $file_name;
            }
        } else {
            return $message = 'Unable to upload image, please ensure you are uploading a jpg,png,gif or Jpeg file. ';
            // debug(json_encode( $error, JSON_PRETTY_PRINT)); exit;
        }


        return $message = "images upload successful";
    }

    
    
    //functionn for deleting a file
    public function deletefile($filename){
         $folder_upload = "img/";
         if (file_exists($folder_upload . $filename)) {
             unlink($folder_upload. $filename);
             return;
             }
             return;
    }
    
    
    /**
     * Delete method
     *
     * @param string|null $id Diagnosisreport id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diagnosisreport = $this->Diagnosisreports->get($id);
        if ($this->Diagnosisreports->delete($diagnosisreport)) {
            //delete the uploaded file
            $this->deletefile($diagnosisreport->file_name);
            
           //log what just happened
                $userscontroller = new UsersController();
                $ip = $userscontroller->get_client_ip();
                $userscontroller->makeLog('Deleted a Diagnostic Report', $this->Auth->user('id'), 'Laboratorist Deleted a Diagnostic Report '.$id, $ip, 'Delete');
                $this->Flash->success(__('The diagnosisreport has been saved.'));
            $this->Flash->success(__('The diagnosis report has been deleted.'));
        } else {
            $this->Flash->error(__('The diagnosis report could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
