<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
/**
 * Feedbacks Controller
 *
 * @property \App\Model\Table\FeedbacksTable $Feedbacks
 */
class FeedbacksController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add');
    }


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $feedbacks = $this->Feedbacks->find('all')->toArray();
        $this->set(compact('feedbacks'));
        $this->set('_serialize', ['feedbacks']);
    }

    /**
     * View method
     *
     * @param string|null $id Feedback id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $feedback = $this->Feedbacks->get($id, [
            'contain' => []
        ]);

        $this->set('feedback', $feedback);
        $this->set('_serialize', ['feedback']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $feedback = $this->Feedbacks->newEntity();
        if ($this->request->is('post')) {
            if(!empty($this->request->data)){
                $response= empty($this->request->data['g-recaptcha-response']);
                if(!$response == true){
                    $feedback = $this->Feedbacks->patchEntity($feedback, $this->request->data);
                    if($this->__checkRecaptchaResponse($this->request->data['g-recaptcha-response'])){
                        if ($this->Feedbacks->save($feedback)) {
//                        echo '<script type="text/javascript">window.alert("Thank you for providing a feedback");
//                window.location.href = "add";</script>';
                            $this->Flash->success(__('Thank you for providing a feedback!.'));
                            return $this->redirect(['controller' => 'pages', 'action' => 'success']);
                        } else {
                            $this->Flash->error('The feedback can\'t be saved, please try again later!.');
                        }
                    } else {
                        $this->Flash->error('Incorrect captcha.');
                    }
                }else{
                    $this->Flash->error('Please enter the captcha.');
                }
            }
        }
        $this->set(compact('feedback'));
        $this->set('_serialize', ['feedback']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Feedback id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $feedback = $this->Feedbacks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $feedback = $this->Feedbacks->patchEntity($feedback, $this->request->data);
            if ($this->Feedbacks->save($feedback)) {
//                $this->Flash->success(__('The feedback has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The feedback could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('feedback'));
        $this->set('_serialize', ['feedback']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Feedback id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $feedback = $this->Feedbacks->get($id);
        if ($this->Feedbacks->delete($feedback)) {
            //           $this->Flash->success(__('The feedback has been deleted.'));
        } else {
            //           $this->Flash->error(__('The feedback could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        return parent::isAuthorized($user);
    }



    public function initialize()
    {
        parent::initialize();
        $this->loadModel('content');

        $footer= $this->content->findByPage('footer')->all();
        $footer = $footer->toArray();
        $this->set('footer',$footer);
    }

    private function __checkRecaptchaResponse($response){
        // verifying the response is done through a request to this URL
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        // The API request has three parameters (last one is optional)
        $data = array('secret' => Configure::read('Recaptcha.SecretKey'),
            'response' => $response,
            'remoteip' => $_SERVER['REMOTE_ADDR']);

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ),
        );

        // We could also use curl to send the API request
        $context  = stream_context_create($options);
        $json_result = file_get_contents($url, false, $context);
        $result = json_decode($json_result);
        return $result->success;
    }

}
