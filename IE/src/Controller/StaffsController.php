<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Staffs Controller
 *
 * @property \App\Model\Table\StaffsTable $Staffs
 */
class StaffsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $staffs = $this->Staffs->find('all', ['contain' => ['Users']]);

        $this->set(compact('staffs'));
        $this->set('_serialize', ['staffs']);
    }

    /**
     * View method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staff = $this->Staffs->get($id, [
            'contain' => ['Customers','Users']
        ]);

        $this->set('staff', $staff);
        $this->set('_serialize', ['staff']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staff = $this->Staffs->newEntity();
        if ($this->request->is('post')) {
            $staff = $this->Staffs->patchEntity($staff, $this->request->data);
            if ($this->Staffs->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The staff could not be saved. Please, try again.'));
            }
        }
        $users = $this->Staffs->Users->find('list',['conditions' => ['level' => 'staff']]);
        $this->set(compact('staff','users'));
        $this->set('_serialize', ['staff']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staff = $this->Staffs->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staff = $this->Staffs->patchEntity($staff, $this->request->data);
            if ($this->Staffs->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The staff could not be saved. Please, try again.'));
            }
        }
        $users = $this->Staffs->Users->find('list',['conditions' => ['level' => 'staff']]);
        $this->set(compact('staff','users'));
        $this->set('_serialize', ['staff']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
}
