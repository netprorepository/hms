<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\Network\Session;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Roles', 'Countries', 'States', 'Departments']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Countries', 'States', 'Departments', 'Invoices', 'Logs' => function($q) {
         
                    return $q->order(['timestamp' => 'DESC'])
                            ->limit(20);
                }, 'Messages']
        ]);
        // debug(json_encode( $user, JSON_PRETTY_PRINT)); exit;
        $this->set('user', $user);
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function newstaff() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            //upload image if any
              $imagearray = $this->request->getData('passport');
            if (!empty($imagearray['tmp_name'])) {
                $image_name = $this->addimage($imagearray);
            } else {
                $image_name = null;
            }
            $user->passport = $image_name;
            if ($this->Users->save($user)) {
                $title = "Add New Staff";
                $user_id = $this->Auth->user('id');
                $description = "Added Staff " . $this->request->getData('fname') .
                        " " . $this->request->getData('lname') . " to the system";
                $ip = $this->request->clientIp();
                $type = "Add";
                $this->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $states = $this->Users->States->find('list', ['limit' => 200]);
        $departments = $this->Users->Departments->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'countries', 'states', 'departments'));
         $this->viewBuilder()->setLayout('backend');
    }

    
    
    //gets the states when a country is selected
    public function getstates($stateid){
     $states = $this->Users->States->find('list', ['limit' => 200])
             ->where(['country_id'=>$stateid]); 
     $this->set(compact('states'));
     //debug(json_encode( $states, JSON_PRETTY_PRINT)); exit;
    // return $states;
    }

    



    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $imagearray = $this->request->getData('passport');
            if (!empty($imagearray['tmp_name'])) {
                $image_name = $this->addimage($imagearray);
            } else {
                $image_name = $user->passport;
            }
            $user->passport = $image_name;
            if ($this->Users->save($user)) {
                $title = "Edit User";
                $user_id = $this->request->getData('created_by');
                $description = "Edited User " . $this->request->getData('fname') .
                        " " . $this->request->getData('lname') . " to the system";
                $ip = $this->request->clientIp();
                $type = "Edit Profile";
                $this->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The user has been updated.'));
                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $countries = $this->Users->Countries->find('list', ['limit' => 200]);
        $states = $this->Users->States->find('list', ['limit' => 200]);
        $departments = $this->Users->Departments->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'countries', 'states', 'departments'));
        $this->viewBuilder()->setLayout('backend');
    }

    //function for adding a staff image
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
    public function deletefile($filename) {
        $folder_upload = "img/";
        if (file_exists($folder_upload . $filename)) {
            unlink($folder_upload . $filename);
            return;
        }
        return;
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $returnurl) {
        $this->request->allowMethod(['post', 'delete','put']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $title = "Deleted a staff";
            $description = "Deleted a staff from the system".($user->fname);
            $ip = $this->request->clientIp();
            $type = "Delete";
            $this->makeLog($title, $this->Auth->user('id'), $description, $ip, $type);
            $this->Flash->success(__('The staff has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => $returnurl]);
    }

    public function dashboard() {
        $users = $this->Users->find();
        $this->set('users', $users);
        $patients_able = TableRegistry::get('Patients');
        $appointments_able = TableRegistry::get('Appointments');
        $payments_able = TableRegistry::get('Payments');
        $invoicess_table = TableRegistry::get('Invoices');
        $admisions_table = TableRegistry::get('Admissions');
        $bloodbank_table = TableRegistry::get('Bloodbank');
        $medicines_table = TableRegistry::get('Medicines');
        $bedallotments_table = TableRegistry::get('Bedallotments');
        $departtments_table = TableRegistry::get('Departments');
        $departtments = $departtments_table->find()->count();
        $admisions = $admisions_table->find()->where(['status !=' => 'Discharged'])->count();
        $invoices = $invoicess_table->find();
        $bedallotments = $bedallotments_table->find()->count();
        $medicines = $medicines_table->find()->count();
        $bloodbank = $bloodbank_table->find()->count();
        $payments = $payments_able->find()->count();
        $appointments = $appointments_able->find()->count();
        $patients = $patients_able->find()->count();

        $this->set(compact('patients', 'appointments', 'payments', 'bloodbank', 'medicines', 'bedallotments', 'departtments', 'admisions', 'invoices'));
        $this->viewBuilder()->setLayout('backend');
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $RolesTable = TableRegistry::get('Roles');
                $roles = $RolesTable->get($user['role_id']);
                $this->updateLogout($user['id']);
                $this->createLogin($user['id']);

                /* $StaffsTable = TableRegistry::get('Staffs');
                  $staffs =  $StaffsTable->find()
                  ->contain(['Countries','States'])
                  ->where(['user_id'=>$user['id']])
                  ->first();
                  $this->updateLogout($user['id']);
                  $this->createLogin($user['id']); */

                //debug(json_encode( $user, JSON_PRETTY_PRINT)); exit;
                /* $this->request->session()->write('usersprofile', $staffs); */
                $this->request->getSession()->write('usersinfo', $user);
                $this->request->getSession()->write('usersroles', $roles);
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
            } else {
                $this->Flash->error('Bad Credentials');
            }
        }
        $this->viewBuilder()->setLayout('login');
    }

    public function logout($user_id) {
        $UserLoginTable1 = TableRegistry::get('Userlogins');
        $userLogin = $UserLoginTable1->find()
                ->where(['logouttime' => '0000-00-00 00:00:00', 'user_id' => $user_id])
                ->first();
        if ($userLogin) {
            $userLogin->logouttime = date('Y-m-d H:i:s');
            $UserLoginTable1->save($userLogin);
            //debug(json_encode( $userLogin, JSON_PRETTY_PRINT)); exit;
            $this->request->getSession()->destroy();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        } else {
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    // allow unrestricted pages
    public function beforeFilter(Event $event) {
       // $this->Auth->allow(['getstates']);
    }

    public function updateLogout($user_id) {
        $UserLoginTable1 = TableRegistry::get('Userlogins');
        $userLogin = $UserLoginTable1->find()
                ->where(['logouttime' => '0000-00-00 00:00:00', 'user_id' => $user_id])
                ->first();
        if ($userLogin) {
            $userLogin->logouttime = date('Y-m-d H:i:s');
            $UserLoginTable1->save($userLogin);
            //debug(json_encode( $userLogin, JSON_PRETTY_PRINT)); exit;
        } else {
            return;
        }
    }

    public function createLogin($user_id) {
        $UserLoginTable = TableRegistry::get('Userlogins');
        $newUserLogin0 = $UserLoginTable->newEntity();
        $newUserLogin0->user_id = $user_id;
        $UserLoginTable->save($newUserLogin0);
        return;
    }

    public function listdoctor() {
        $doctors = $this->Users->find()
                ->contain(['Departments', 'Countries', 'States', 'Roles'])
                ->where(['role_id' => 2]);
        $this->set(compact('doctors', $doctors));
        $this->viewBuilder()->setLayout('backend');
    }

    //function that adds new staff
    public function newclark() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->created_by = $this->Auth->user('id');
            // debug(json_encode( $user, JSON_PRETTY_PRINT)); exit;
            //upload passport
            $file = $this->request->getData('passport');
            $diagnosiscontroller = new DiagnosisreportsController();
            if (!empty($file['tmp_name'])) {

                //upload new file
                $image_name = $diagnosiscontroller->addimage($file);
            } else {
                $image_name = " ";
            }
            $user->passport = $image_name;
            if ($this->Users->save($user)) {
                $title = "Add Staff";
                $user_id = $this->Auth->user('id');
                $description = "Added a new staff " . $this->request->getData('fname') .
                        " " . $this->request->getData('fname') . " to the system";

                $ip = $this->request->clientIp();
                $type = "Add";
                $this->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'listclarks']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $Country = TableRegistry::get('Countries');
        $country = $Country->find('list')
                ->where(['id' => 160]);


        $State = TableRegistry::get('States');
        $state = $State->find('list')
                ->where(['country_id' => 160]);
        //present all roles
        $roles_table = TableRegistry::get('Roles');
        $roles = $roles_table->find('list');
        $Department = TableRegistry::get('Departments');
        $department = $Department->find('list');

        $this->set(compact('country', $country, 'roles', 'user'));
        $this->set(compact('state', $state));
        $this->set(compact('department', $department));
        $this->viewBuilder()->setLayout('backend');
    }

    //admin method for editing a clark

    public function editclark($id) {
        $user = $this->Users->get($id, ['contain' => ['Departments', 'Roles']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // $user->created_by = $this->Auth->user('id');
            // debug(json_encode( $user, JSON_PRETTY_PRINT)); exit;
            if ($this->Users->save($user)) {
                $title = "Edit Staff";
                $user_id = $this->Auth->user('id');
                $description = "Edited a staff " . $this->request->getData('fname') .
                        " " . $this->request->getData('fname') . " to the system";

                $ip = $this->request->clientIp();
                $type = "Edit";
                $this->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The staff has been updated.'));
                return $this->redirect(['action' => 'listclarks']);
            }
            $this->Flash->error(__('The staff could not be saved. Please, try again.'));
        }
        $Country = TableRegistry::get('Countries');
        $country = $Country->find('list')
                ->where(['id' => 160]);


        $State = TableRegistry::get('States');
        $state = $State->find('list')
                ->where(['country_id' => 160]);
        //present all roles
        $roles_table = TableRegistry::get('Roles');
        $roles = $roles_table->find('list');
        $Department = TableRegistry::get('Departments');
        $department = $Department->find('list');

        $this->set(compact('country', $country, 'roles', 'user'));
        $this->set(compact('state', $state));
        $this->set(compact('department', $department));
        $this->viewBuilder()->setLayout('backend');
    }

    //function that list all clarks
    public function listclarks() {
        $clarks = $this->Users->find()->contain(['Departments'])->where(['role_id' => 7]);

        $this->set('clarks', $clarks);
        $this->viewBuilder()->setLayout('backend');
    }

    public function adddoctor() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = 2;
            //debug(json_encode( $user, JSON_PRETTY_PRINT)); exit;
            if ($this->Users->save($user)) {
                $title = "Add doctor";
                $user_id = $this->request->getData('created_by');
                $description = "Added a new doctor " . $this->request->getData('fname') .
                        " " . $this->request->getData('fname') . " to the system";

                $ip = $this->request->clientIp();
                $type = "Add";
                $this->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'listdoctor']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $Country = TableRegistry::get('Countries');
        $country = $Country->find('list')
                ->where(['id' => 160]);


        $State = TableRegistry::get('States');
        $state = $State->find('list')
                ->where(['country_id' => 160]);

        $Department = TableRegistry::get('Departments');
        $department = $Department->find('list');

        $this->set(compact('country', $country));
        $this->set(compact('state', $state));
        $this->set(compact('department', $department));
        $this->viewBuilder()->setLayout('backend');
    }

    public function makeLog($title, $user_id, $description, $ip, $type) {
        $LogsTable = TableRegistry::get('Logs');
        $logs = $LogsTable->newEntity();
        $logs->title = $title;
        $logs->user_id = $user_id;
        $logs->description = $description;
        $logs->ip = $ip;
        $logs->type = $type;
        // debug(json_encode( $logs, JSON_PRETTY_PRINT)); exit;
        $LogsTable->save($logs);
    }

    public function addnurse() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = 3;
            //debug(json_encode( $user, JSON_PRETTY_PRINT)); exit;
            if ($this->Users->save($user)) {
                $title = "Add Nurse";
                $user_id = $this->request->getData('created_by');
                $description = "Added a new nurse " . $this->request->getData('fname') .
                        " " . $this->request->getData('fname') . " to the system";
                $ip = $this->request->clientIp();
                $type = "Add";
                $this->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'listnurse']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $Country = TableRegistry::get('Countries');
        $country = $Country->find('list')
                ->where(['id' => 160]);


        $State = TableRegistry::get('States');
        $state = $State->find('list')
                ->where(['country_id' => 160]);

        $Department = TableRegistry::get('Departments');
        $department = $Department->find('list');

        $this->set(compact('country', $country));
        $this->set(compact('state', $state));
        $this->set(compact('department', $department));
        $this->viewBuilder()->setLayout('backend');
    }

    public function listnurse() {
        $nurses = $this->Users->find()
                ->contain(['Departments', 'Countries', 'States', 'Roles'])
                ->where(['role_id' => 3]);
        $this->set(compact('nurses', $nurses));
        $this->viewBuilder()->setLayout('backend');
    }

    public function addpharmacist() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = 4;
            //debug(json_encode( $user, JSON_PRETTY_PRINT)); exit;
            if ($this->Users->save($user)) {
                $title = "Add Pharmacist";
                $user_id = $this->request->getData('created_by');
                $description = "Added a new Pharmacist " . $this->request->getData('fname') .
                        " " . $this->request->getData('fname') . " to the system";
                $ip = $this->request->clientIp();
                $type = "Add";
                $this->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'listpharmacist']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $Country = TableRegistry::get('Countries');
        $country = $Country->find('list')
                ->where(['id' => 160]);


        $State = TableRegistry::get('States');
        $state = $State->find('list')
                ->where(['country_id' => 160]);

        $Department = TableRegistry::get('Departments');
        $department = $Department->find('list');

        $this->set(compact('country', $country));
        $this->set(compact('state', $state));
        $this->set(compact('department', $department));
        $this->viewBuilder()->setLayout('backend');
    }

    public function listpharmacist() {
        $pharmacists = $this->Users->find()
                ->contain(['Departments', 'Countries', 'States', 'Roles'])
                ->where(['role_id' => 4]);
        $this->set(compact('pharmacists', $pharmacists));
        $this->viewBuilder()->setLayout('backend');
    }

    public function addlaboratorist() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = 5;
            //debug(json_encode( $user, JSON_PRETTY_PRINT)); exit;
            if ($this->Users->save($user)) {
                $title = "Add Laboratorist";
                $user_id = $this->request->getData('created_by');
                $description = "Added a new Laboratorist " . $this->request->getData('fname') .
                        " " . $this->request->getData('fname') . " to the system";
                $ip = $this->request->clientIp();
                $type = "Add";
                $this->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'listlaboratorist']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $Country = TableRegistry::get('Countries');
        $country = $Country->find('list')
                ->where(['id' => 160]);


        $State = TableRegistry::get('States');
        $state = $State->find('list')
                ->where(['country_id' => 160]);

        $Department = TableRegistry::get('Departments');
        $department = $Department->find('list');

        $this->set(compact('country', $country));
        $this->set(compact('state', $state));
        $this->set(compact('department', $department));
        $this->viewBuilder()->setLayout('backend');
    }

    public function listlaboratorist() {
        $laboratorists = $this->Users->find()
                ->contain(['Departments', 'Countries', 'States', 'Roles'])
                ->where(['role_id' => 5]);
        $this->set(compact('laboratorists', $laboratorists));
        $this->viewBuilder()->setLayout('backend');
    }

    public function addaccountant() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = 6;
            //debug(json_encode( $user, JSON_PRETTY_PRINT)); exit;
            if ($this->Users->save($user)) {
                $title = "Add Accountant";
                $user_id = $this->request->getData('created_by');
                $description = "Added a new accountant " . $this->request->getData('fname') .
                        " " . $this->request->getData('fname') . " to the system";
                $ip = $this->request->clientIp();
                $type = "Add";
                $this->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'listaccountant']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $Country = TableRegistry::get('Countries');
        $country = $Country->find('list')
                ->where(['id' => 160]);


        $State = TableRegistry::get('States');
        $state = $State->find('list')
                ->where(['country_id' => 160]);

        $Department = TableRegistry::get('Departments');
        $department = $Department->find('list');

        $this->set(compact('country', $country));
        $this->set(compact('state', $state));
        $this->set(compact('department', $department));
        $this->viewBuilder()->setLayout('backend');
    }

    public function listaccountant() {
        $accountants = $this->Users->find()
                ->contain(['Departments', 'Countries', 'States', 'Roles'])
                ->where(['role_id' => 6]);
        $this->set(compact('accountants', $accountants));
        $this->viewBuilder()->setLayout('backend');
    }

    public function addfrontdesk() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = 7;
            //debug(json_encode( $user, JSON_PRETTY_PRINT)); exit;
            if ($this->Users->save($user)) {
                $title = "Add Frontdesk";
                $user_id = $this->request->getData('created_by');
                $description = "Added a new frontdesk officer " . $this->request->getData('fname') .
                        " " . $this->request->getData('fname') . " to the system";
                $ip = $this->request->clientIp();
                $type = "Add";
                $this->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'listfrontdesk']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $Country = TableRegistry::get('Countries');
        $country = $Country->find('list')
                ->where(['id' => 160]);


        $State = TableRegistry::get('States');
        $state = $State->find('list')
                ->where(['country_id' => 160]);

        $Department = TableRegistry::get('Departments');
        $department = $Department->find('list');

        $this->set(compact('country', $country));
        $this->set(compact('state', $state));
        $this->set(compact('department', $department));
        $this->viewBuilder()->setLayout('backend');
    }

    //admin method for view all activity logs
    public function activitylogs() {
        $logs_table = TableRegistry::get('Logs');
        $logs = $logs_table->find()->contain(['Users'])->order(['timestamp' => 'DESC']);
        $this->set(compact('logs'));

        $this->viewBuilder()->setLayout('backend');
    }

    //admin method for viewing user login and log out periods
    public function viewlogins() {
        $userlogins_table = TableRegistry::get('Userlogins');
        $userlogins = $userlogins_table->find()->contain(['Users'])->order(['Userlogins.id' => 'DESC']);
        $this->set(compact('userlogins'));

        $this->viewBuilder()->setLayout('backend');
    }

    //staff method for changing their password
    public function changepassword(){
        $user = $this->Users->find()->where(['id' => $this->Auth->user('id')])->first();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
           // debug(json_encode( $user, JSON_PRETTY_PRINT)); exit;  
            if ($this->Users->save($user)) {
                $title = "Password Change";
                $user_id = $this->Auth->user('id');
                $description = "Changed password for " . $user_id;
                $ip = $this->request->clientIp();
                $type = "Edit";
                $this->makeLog($title, $user_id, $description, $ip, $type);
                $this->Flash->success(__('Your Password has been updated.'));
                return $this->redirect(['action' => 'view', $user_id]);
            } else {
                $this->Flash->error(__('Sorry, unable to change password. Please try again'));
                return $this->redirect(['action' => 'view', $this->Auth->user('id')]);
            }
        }
        $this->set(compact('user'));
        $this->viewBuilder()->setLayout('backend');
    }

    public function listfrontdesk() {
        $frontdesks = $this->Users->find()
                ->contain(['Departments', 'Countries', 'States', 'Roles'])
                ->where(['role_id' => 7]);
        $this->set(compact('frontdesks', $frontdesks));
        $this->viewBuilder()->setLayout('backend');
    }

    
    
    //method for listing all staff
    public function allstaff(){
          $staff = $this->Users->find()
                ->contain(['Departments', 'Countries', 'States', 'Roles']);
        $this->set(compact('staff', $staff));
        
        $this->viewBuilder()->setLayout('backend');
        
    }


    
    //admin method for reseting a user's password to a default password
    public function resetpassword($user_id){
        $user =  $this->Users->get($user_id);
        $user->password = "password123";
       //$user->password = "password123";
       if($this->Users->save($user)){
            $this->Flash->success(__($user->fname. '\'s password has been reset to the default password (password123)'));
                return $this->redirect(['action' => 'allstaff']);
       }
       else{
          $this->Flash->error(__(' Unable to reset password. Please try again'));
                return $this->redirect(['action' => 'allstaff']); 
       }
        // $this->viewBuilder()->setLayout('backend');
        
    }




    // Function to get the client ip address
    public function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP')) {
            $ipaddress = getenv('HTTP_CLIENT_IP');
        } else if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        } else if (getenv('HTTP_X_FORWARDED')) {
            $ipaddress = getenv('HTTP_X_FORWARDED');
        } else if (getenv('HTTP_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        } else if (getenv('HTTP_FORWARDED')) {
            $ipaddress = getenv('HTTP_FORWARDED');
        } else if (getenv('REMOTE_ADDR')) {
            $ipaddress = getenv('REMOTE_ADDR');
        } else {
            $ipaddress = 'UNKNOWN';
        }

        return $ipaddress;
    }

}
