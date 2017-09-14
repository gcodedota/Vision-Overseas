<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Visas Controller
 *
 * @property \App\Model\Table\VisasTable $Visas
 */
class VisasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $visas = $this->Visas->find('all', ['contain' => ['Categories']]);

        $this->set(compact('visas'));
        $this->set('_serialize', ['visas']);
    }

    /**
     * View method
     *
     * @param string|null $id Visa id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visa = $this->Visas->get($id, [
            'contain' => ['Categories']
        ]);

        $this->set('visa', $visa);
        $this->set('_serialize', ['visa']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visa = $this->Visas->newEntity();
        if ($this->request->is('post')) {
            $visa = $this->Visas->patchEntity($visa, $this->request->data);
            if ($this->Visas->save($visa)) {
                $this->Flash->success(__('The visa has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visa could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Visas->Categories->find('list', ['limit' => 200]);
        $this->set(compact('visa', 'categories'));
        $this->set('_serialize', ['visa']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visa id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visa = $this->Visas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visa = $this->Visas->patchEntity($visa, $this->request->data);
            if ($this->Visas->save($visa)) {
                $this->Flash->success(__('The visa has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visa could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Visas->Categories->find('list', ['limit' => 200]);
        $this->set(compact('visa', 'categories'));
        $this->set('_serialize', ['visa']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visa id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visa = $this->Visas->get($id);
        if ($this->Visas->delete($visa)) {
            $this->Flash->success(__('The visa has been deleted.'));
        } else {
            $this->Flash->error(__('The visa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function isAuthorized($user)
    {
        if ($user['level'] == 'staff'  OR ($user['level']=='customer')) {
            if ($this->request->action === 'index') {
                $this->Flash->error(__('Sorry, Only an admin can manage visas'));
                return false;
            }
            if ($this->request->action === 'add') {
                $this->Flash->error(__('Only an admin can do that'));
                return false;
            }
            if ($this->request->action === 'edit') {
                $this->Flash->error(__('Only an admin is allowed to do that'));
                return false;
            }
            if ($this->request->action === 'delete') {
                $this->Flash->error(__('Only an admin is allowed to do that'));
                return false;
            }
            else {
                return true;
            }
        } else if ($user['level'] == 'admin') {
            return true;

        }
    }
}
