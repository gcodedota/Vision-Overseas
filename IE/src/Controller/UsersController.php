<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Customer;
use App\Model\Entity\Staff;
use App\Model\Entity\Admin;
use Cake\I18n\Time;
use Cake\Core\InstanceConfigTrait;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Database\Type\BinaryType;
use Cake\Network\Http\Client;
use Cake\Routing\Router;
use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\Network;
use Cake\ORM\Table;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->Users->findByStatus('active')->all();

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    public function inactiveusers()
    {
        $users = $this->Users->findByStatus('inactive')->all();
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);

    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($user['level']==='customer'){
           $this->loadModel('Customers');
           $userData = $this->Customers->find('all',['conditions'=>['users_id'=>$id]]);
        } elseif ($user['level']==='staff'){
            $this->loadModel('Staffs');
            $userData = $this->Staffs->find('all',['conditions'=>['users_id'=>$id]]);
        } elseif ($user['level']==='admin'){
            $this->loadModel('Admins');
            $userData = $this->Admins->find('all',['conditions'=>['users_id'=>$id]]);
        } else{
            return $this->Flash->error('Can\'t retrieve data,  please try again');
        }


        $this->set('user', $user);
        $this->set('userData', $userData);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Customers');
        $this->loadModel('Admins');
        $this->loadModel('Staffs');
        $user = $this->Users->newEntity();
        $staff = $this->Staffs->newEntity();
        $customer = $this->Customers->newEntity();
        $admin = $this->Admins->newEntity();

        if ($this->request->is('post')) {

            $formdata = $this->request->data;
            $user = $this->Users->patchEntity($user, $formdata);
            if ($this->Users->save($user)) {
                $formdata['users_id']= $user['id'];
                if ($user['level']==='customer'){
                    $customer = $this->Customers->patchEntity($customer,$formdata);
                    if ($this->Customers->save($customer)) {
                        if($formdata['dropbox']==='yes'){
                            $returnVal = $this->folder($user['id']);
                            if(!is_null($returnVal)){
                                $this->Flash->success(('A new Customer has been saved with dropbox folder: '.$returnVal));
                                return $this->redirect(['action' => 'index']);
                            }else{
                                $this->Flash->error(('Can\'t create dropbox folder, please try again'));
                                $this->Customers->delete($customer['id']);
                                $this->Users->delete($user['id']);
                            }
                        }else{
                            $this->Flash->success(('A new Customer has been saved without dropbox folder'));
                            return $this->redirect(['action' => 'index']);
                        }
                    }
                    else{
                        $this->Users->delete($user['id']);
                        $this->Flash->error(__('The information cannot be saved.'));
                    }
                }
                elseif ($user['level']==='staff'){
                    $staff = $this->Staffs->patchEntity($staff,$formdata);
                    if ($this->Staffs->save($staff)) {
//                        debug($staff);die();
                        $this->Flash->success(__('The Staff has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    }
                    else{
                        $this->Users->delete($user['id']);
                        $this->Flash->error(__('The Staff cannot be saved.'));
                    }
                } elseif ($user['level']==='admin'){
                    $admin = $this->Admins->patchEntity($admin,$formdata);
                    if ($this->Admins->save($admin)) {
                        $this->Flash->success(__('The Admin has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    }
                    else{
                        $this->Users->delete($user['id']);
                        $this->Flash->error(__('The Admin cannot be saved.'));
                    }
                } else{
                    $this->Users->delete($user['id']);
                    $this->Flash->error(__('The data cannot be saved.'));
                }
            } else {
                $this->Flash->error(__('Cannot create account, please try again.'));
            }
        }
        $staffs = $this->Customers->Users->find('list',['conditions' => ['level' => 'staff']]);
        $this->set(compact('user','staffs'));
        $this->set('_serialize', ['user']);
        $this->set(compact('admin'));
        $this->set('_serialize', ['admin']);
        $this->set(compact('staff'));
        $this->set('_serialize', ['staff']);
        $this->set(compact('customer'));
        $this->set('_serialize', ['customer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        //Loading data
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $this->loadModel('Customers');
        $this->loadModel('Staffs');
        $this->loadModel('Admins');
        if ($user['level']==='customer'){
            $userData = $this->Customers->find('all',['conditions'=>['users_id'=>$id]])->first();
//            $userData = $this->Customers->get($id, ['conditions'=>['users_id'=>$id]]);
        } elseif ($user['level']==='staff'){
            $userData = $this->Staffs->find('all',['conditions'=>['users_id'=>$id]])->first();
        } elseif ($user['level']==='admin'){
            $userData = $this->Admins->find('all',['conditions'=>['users_id'=>$id]])->first();
        } else{
            return $this->Flash->error('Can\'t retrieve data,  please try again');
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formdata = $this->request->data;
            $user = $this->Users->patchEntity($user, $formdata);
            if ($this->Users->save($user)) {
                $formdata['users_id'] = $user['id'];
                if ($user['level'] === 'customer') {
                    $userData = $this->Customers->patchEntity($userData, $formdata);
                    if ($this->Customers->save($userData)) {
                        $this->Flash->success(__('Customer data has been updated.'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('The information cannot be saved.'));
                    }
                } elseif ($user['level'] === 'staff') {
                    $userData = $this->Staffs->patchEntity($userData, $formdata);
                    if ($this->Staffs->save($userData)) {
                        $this->Flash->success(__('Staff data has been updated.'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('The information cannot be saved.'));
                    }
                } elseif ($user['level'] === 'admin') {
                    $userData = $this->Admins->patchEntity($userData, $formdata);
                    if ($this->Admins->save($userData)) {
                        $this->Flash->success(__('Admin data has been updated.'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('The information cannot be saved.'));
                    }
                } else {
                    $this->Flash->error(__('The information cannot be saved.'));
                }
            } else {
                $this->Flash->error(__('The information cannot be saved.'));
            }
        }
        $this->set('user', $user);
        $this->set('userData', $userData);
        $this->set('_serialize', ['userData']);
        $this->set('_serialize', ['user']);
    }

    public function resetpassword($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $user['confirm_password'] = $user['password'];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('new password has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The password could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);
        $this->loadModel('content');

        $this->loadComponent('Paginator');
        $this->loadComponent('RequestHandler');
    }

    // control user login

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                //if logging in as a customer user, redirect to upload page
                if ($user['level'] === 'customer' && $user['status'] == 'active'){
                    $this->Auth->setUser($user);
                    $this->loadModel('Logs');
                    $log = $this->Logs->newEntity();
                    $log['users_id'] = $this->Auth->user('id');
                    $this->Logs->save($log);
                    $this->Flash->success('You logged in successfully');
                    return $this->redirect(['action' => 'upload']);
                }
                //if logging in as an admin or staff user, redirect to users page
                else if (($user['level'] === 'admin' || $user['level'] === 'staff') && $user['status'] == 'active') {
                    $this->Auth->setUser($user);
                    $log['users_id'] = $this->Auth->user('id');
      //              $this->Logs->save($log);
                    $this->Flash->success('You logged in successfully');
                    return $this->redirect(['controller'=>'pages','action' => 'homepage']);
                }
                else {
                    $this->Flash->error('Your account has been deactivated');
                    //                 return $this->redirect(['action' => 'index']);
                }
            }
            else {
                $this->Flash->error('Your username or password is incorrect.');
            }
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        $this->Auth->logout();
        return $this->redirect($this->Auth->config('logoutRedirect'));
    }


//    upload new file to dropbox
    public function upload()
    {
        $id = ($this->Auth->user('id'));
//            find the folder of this user
        $upload = $this->Users->findById($id)->all()->toArray();
        //prepare a string, use to call api in javascript of upload.ctp
        $upload = $upload['0']['upload'];
        $folder = '{"path":"/' . $upload . '"}';
        $str1 = "/".$upload."/";
        if ($this->request->is('post')) {
            $email = new Email('default');
            $email->from(['team37ie@gmail.com' => 'Vision Overseas'])
                ->to('enquiry@visionoverseas.com.au')
                ->subject('Vision Overseas Appointment')
                ->send("This customer uploaded new file(s) in folder:".$upload);
        }
        $this->set('str1',$str1);
    }

    //creating new folder when creating new user
    public function folder($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        //create new string, is the folder name belong to this customer
       if(is_null($user['folder'])){
           $dobFormat = ($user['dob']?$user['dob']->format('d/m/Y'):'');
//           debug($dobFormat);
//           die();
//           $krr = explode('-',$dobFormat);
//        debug($krr);
//           $dobStr = implode("",$krr);
           $folder1 = $user['first_name'].' '.$user['last_name'].' ('.$dobFormat.')';
//        debug($folder1);
//        die();
           //create 2 nested folder, "uploadfolder" inside "folder"
           $folder = '{"path":"/' . $folder1 . '"}';
           $uploadFolder = '{"path":"/' . $folder1 . '/upload"}';
           $user['folder'] = $folder1;
           //these folder names will be saved into database
           $user['upload'] = $folder1.'/upload';
           //create new http request with all the header and API token is included
           $http = new Client(['headers' => [
               'Content-Type' => 'application/json',
               'Authorization' => 'Bearer 8UAOxH2ahaAAAAAAAAAACP1D9Cn8SPxi-pUKfOHbu9YoEWxBykf9NVfzltcgcR3t'
           ]]);
           //send request
           $response1 = $http->post('https://api.dropboxapi.com/2/files/create_folder', $folder);
           $response2 = $http->post('https://api.dropboxapi.com/2/files/create_folder', $uploadFolder);
           if(is_null($response1)||is_null($response2)){
               return false;
           }else{
               $this->Users->save($user);
               return $folder1;
           }
       } else{
       }
    }

    public function listfile($id = null){
//            find the folder of this user
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if( is_null($user['upload'])){
            return $this->redirect(['action' => 'newfolder',$id]);
        } else{
            $upload = "/".$user['upload']."/";
            $this->set('str1',$upload);
        }
    }

    //creating new folder for acount that doesn't have existed folder
    public function newfolder($id = null){
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $dobFormat = ($user['dob']?$user['dob']->format('d/m/Y'):'');
//        $krr = explode('-',$dobFormat);
//        debug($krr);
//        $dobStr = implode("",$krr);
        $folder1 = $user['first_name'].' '.$user['last_name'].' ('.$dobFormat.')';
        if($this->request->is('post')){
            $returnVal = $this->folder($id);
            if(!is_null($returnVal)){
                $this->Flash->success(__('New Dropbox Folder has been created: '.$returnVal));
                return $this->redirect(['action' => 'index']);
            } else{
                $this->Flash->error(__('Can\'t create folder, please try again'));
            }
        }
        $this->set('folder1',$folder1);

    }

    public function isAuthorized($user)
    {
        if ($user['level'] == 'staff') {
            if ($this->request->action === 'add') {
                $this->Flash->error(__('Only an admin is allowed to do that'));
                return false;
            }
            if ($this->request->action === 'delete') {
                $this->Flash->error(__('Only an admin is allowed to do that'));
                return false;
            }
            if ($this->request->action === 'edit') {
                $this->Flash->error(__('Only an admin is allowed to do that'));
                return false;
            }
        }

        // All registered users can add articles
        if ($user['level'] == 'customer'){
            if ($this->request->action === 'upload') {
                return true;
            }
            elseif ($this->request->action === 'listfile') {
                return true;
            }
            else{
                return false;
            }
        }

        return parent::isAuthorized($user);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['login','logout']);
    }
}