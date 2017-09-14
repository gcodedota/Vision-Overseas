<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Event\Event;
use Cake\Error\Debugger;
use Cake\I18n\Time;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;
use Cake\I18n\FrozenTime;

/**
 * Bookings Controller
 *
 * @property \App\Model\Table\BookingsTable $Bookings
 */
class BookingsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add','cancel','finish']);
    }

    public function isAuthorized($user)
    {
            if ($this->request->action === 'add') {
                return true;
            }
            if ($this->request->action === 'cancel') {
                return true;
            }

        return parent::isAuthorized($user);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $bookings = $this->Bookings->find('all')->toArray();
        $this->set(compact('bookings'));
        $this->set('_serialize', ['bookings']);
    }

    /**
     * View method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => []
        ]);
        $this->set('booking', $booking);
        $this->set('_serialize', ['booking']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $this->loadModel('Calendars');
        $calendar = $this->Calendars->find('all')->toArray();
        $longName = $this->Calendars->find('list')->toArray();

        $this->loadModel('Categories');
        $categories = $this->Categories->find('list')->toArray();
        $categoryName = $this->Categories->find('all')->toArray();

        $booking = $this->Bookings->newEntity();
        $random = rand(55555,99999);
        if ($this->request->is('post')) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->data);
            $booking['validationCode'] = $random;
            foreach($calendar as $calendar){
                if($booking['consultant']== $calendar['id']){
                    $booking['consultant'] = $calendar['longName'];
                    $selectedEmail = $calendar['calendarID'];
                }
            }
            foreach($categoryName as $categoryName){
                if($booking['visatype']== $categoryName['id']){
                    $booking['visatype'] = $categoryName['category'];
                }
            }
            if ($this->Bookings->save($booking)) {
                //load service account's information
//                putenv('GOOGLE_APPLICATION_CREDENTIALS=service-account.json');
                $guzzleClient = new \GuzzleHttp\Client(['verify' => false]);

                //create new Google Client to be able to send request, include all the headers
                $client = new \Google_Client();
//                $file = File.open('/path/to/your/file', 'r')
                $client->setAuthConfig(WWW_ROOT .'service/service-account.json');

                $client->setHttpClient($guzzleClient);
                $client->useApplicationDefaultCredentials();
                $client->addScope(\Google_Service_Calendar::CALENDAR);
                $service = new \Google_Service_Calendar($client);

                //get the event from booking page, creat new google event object
                $event = new \Google_Service_Calendar_Event(array(
                    'summary' => 'Appointment: '.$booking['name'],
                    'id'=>'booking'.$booking['id'],
                    'start' => array(
                        'dateTime' => $booking['start'],
                        'timeZone' => 'Australia/Melbourne',
                    ),
                    'end' => array(
                        'dateTime' => $booking['end'],
                        'timeZone' => 'Australia/Melbourne',
                    ),
                ));
                $calendarId = $selectedEmail;

                //sending insert request
                $response = $service->events->insert($calendarId, $event);
                if(!is_null($response['htmlLink'])){
                    //sending email after created event
                    $startTime =  date('d-m-Y g:i A',strtotime($booking['start']));
                    $endTime = date('d-m-Y g:i A',strtotime($booking['end']));
                    $string1 = $booking["name"]." booked an appointment from: ".$startTime.' to: '.$endTime;
                    $string2 = "Thank You for booking an appointment with us. You booked an appointment from: ".$startTime.' to: '.$endTime.". Your booking number is: ".$booking['id'].'. If you want to cancel the booking, please use this validation code: '.$booking['validationCode']. ". We will be looking forward to meet you.";

                    $this->loadModel('Emails');
                    $data = $this->Emails->findById(1)->all()->toArray();
                    $email = new Email('default');
                    $email->viewVars(['startTime'=>$startTime,'endTime'=>$endTime,'id'=>$booking['id'],'validationCode'=>$booking['validationCode'],
                        'header'=>$data[0]['header'],'footer'=>$data[0]['footer'],'top'=>$data[0]['top'],'bottom'=>$data[0]['bottom'],'content'=>$data[0]['content'],]);
                    $email->from(['team37ie@gmail.com' => 'Vision Overseas'])
                        ->to($selectedEmail)
                        ->subject('Vision Overseas Appointment')
                        ->send($string1);

                    $email->from(['team37ie@gmail.com' => 'Vision Overseas'])
                        ->to($booking['email'])
                        ->subject('Vision Overseas Appointment')
                        ->emailFormat('html')
                        ->template('newappointment')
                        ->send();
                    //If not logged in, redirect back to appointment page
                    $this->Flash->success(__('Thank You for booking an appointment with us'));
                    return $this->redirect(['action' => 'finish',$booking['id']]);
                } else {
                    $this->Bookings->delete($booking['id']);
                    $this->Flash->error(__('Couldn\'t book appointment, please call our staff for details'));
                }
            } else {
                $this->Flash->error(__('The booking could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('booking'));
        $this->set('calendar',$calendar);
        $this->set('longName',$longName);
        $this->set('categories',$categories);
        $this->set('_serialize', ['booking']);
    }

    public function finish($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => []
        ]);
        $this->set('booking', $booking);
        $this->set('_serialize', ['booking']);
    }

    public function cancelsuccess($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => []
        ]);
        $this->set('booking', $booking);
        $this->set('_serialize', ['booking']);
    }

    public function cancel()
    {
        if ($this->request->is('post')) {
            $id = $this->Bookings->find('all')->toArray();
            //this variable to check if we have this booking in our database
            $false = false;
            //also check if the booking is upcoming
            for ($x = 0; $x < count($id); $x++) {
                if ($id[$x]['id'] == $this->request->data['id'] && $id[$x]['status'] === 'upcoming') {
                    $false = true;
                }
            }
            //if we have this booking, then check the validation code
            if ($false) {
                $booking = $this->Bookings->get($this->request->data['id'], [
                    'contain' => []
                ]);
                    if ($booking['validationCode'] == $this->request->data['validationCode']) {
                        //check booking time
                        $timeVal = false;
                        $now = Time::now();
                        $timediff = $now->diff($booking['start']);
                        //more than 1 day, return true
                        if ($timediff->format("%d") > 0) {
                            $timeVal = true;
                            //more than 3 hours, in same day return true;
                        } elseif (($timediff->format("%H") >= 3) && ($timediff->format("%d") == 0)) {
                            $timeVal = true;
                        }
                        //checking the time, if user cancel booking 3 hours before the meeting
                        if ($timeVal) {
                            //loading google service account and run google api

                            $guzzleClient = new \GuzzleHttp\Client(['verify' => false]);
                            $client = new \Google_Client();
                            $client->setAuthConfig(WWW_ROOT .'service/service-account.json');
                            $client->setHttpClient($guzzleClient);
                            $client->useApplicationDefaultCredentials();
                            $client->addScope(\Google_Service_Calendar::CALENDAR);
                            $service = new \Google_Service_Calendar($client);

                            $eventID = 'booking' . $booking['id'];

                            $this->loadModel('Calendars');
                            $calendar = $this->Calendars->find('all')->toArray();

                            foreach ($calendar as $calendar) {
                                if ($booking['consultant'] == $calendar['longName']) {
                                    $calendarID = $calendar['calendarID'];
                                }
                            }
                            $booking['status'] = 'canceled';
                            if ($this->Bookings->save($booking)) {
                                //perform deleting event
                                try {
                                    $service->events->delete($calendarID, $eventID, array('sendNotifications' => true));
                                    $this->Flash->success(__('Your booking has been canceled.'));
                                    return $this->redirect(['action' => 'cancelsuccess',$booking['id']]);
                                } catch (\Exception  $e) {
                                    $this->Flash->error(__('Can\'t cancel the booking, please contact with our staff for more detail'));
                                    $booking['status'] = 'upcoming';
                                    $this->Bookings->save($booking);
                                    return $this->redirect(['controller'=>'pages','action' => 'homepage']);
                                }
                            } else {
                                $this->Flash->error(__('We cannot cancel your booking now, please try again later..'));
                            }
                        } else {
                            $this->Flash->error(__('You can only cancel 3 hours before the appointment starts'));
                        }
                    } else {

                        $this->Flash->error(__('Incorrect Validation code'));
                    }
                } else {
                $this->Flash->error(__('Can\'t cancel the booking, please contact with our staff for more detail'));
                }
        }
    }
    /**
     * Edit method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    /**
     * Delete method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => []
        ]);
        if($booking['status']==='upcoming'){
                //check booking time
                $timeVal = false;
                $now = Time::now();
                $timediff = $now->diff($booking['start']);
//            debug($timediff->format("%H"));
//            die();
                //more than 1 day, return true
                if($timediff->format("%d") > 0){
                    $timeVal=true;
                    //more than 3 hours, in same day return true;
                }elseif (($timediff->format("%H") >=0)&&($timediff->format("%d") ==0)){
                    $timeVal=true;
                }
                //checking the time, if user cancel booking 3 hours before the meeting
                if ($timeVal){
                    //loading google service account and run google api
                    $guzzleClient = new \GuzzleHttp\Client(['verify' => false]);
                    $client = new \Google_Client();
                    $client->setAuthConfig(WWW_ROOT .'service/service-account.json');
                    $client->setHttpClient($guzzleClient);
                    $client->useApplicationDefaultCredentials();
                    $client->addScope(\Google_Service_Calendar::CALENDAR);
                    $service = new \Google_Service_Calendar($client);

                    $eventID = 'booking'.$booking['id'];

                    $this->loadModel('Calendars');
                    $calendar = $this->Calendars->find('all')->toArray();

                    foreach($calendar as $calendar){
                        if($booking['consultant']== $calendar['longName']){
                            $calendarID = $calendar['calendarID'];
                        }
                    }
                    $booking['status'] ='canceled';
                    if ($this->Bookings->save($booking)) {
                        //perform deleting event
                        try {
                            $service->events->delete($calendarID, $eventID, array('sendNotifications' => true));
                            $this->Flash->success(__('Your booking has been canceled.'));
                        } catch (\Exception  $e) {
                            $this->Flash->error(__('Error occurs, please delete event in your calendar manually'));
                        }
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('We cannot cancel your booking now, please try again later..'));
                        return $this->redirect(['action' => 'index']);
                    }
                } else{
                    $this->Flash->error(__('You can only cancel 3 hours before the appointment starts'));
                    return $this->redirect(['action' => 'index']);
                }
        } else{
            $this->Flash->error(__('Your appointment has already been canceled'));
            return $this->redirect(['action' => 'index']);
        }
    }
}
