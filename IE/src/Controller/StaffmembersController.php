<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Staffmembers Controller
 *
 * @property \App\Model\Table\StaffmembersTable $Staffmembers
 */
class StaffmembersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $staffmembers = $this->Staffmembers->find('all')->toArray();
        $this->set(compact('staffmembers'));
        $this->set('_serialize', ['staffmembers']);
    }

    /**
     * View method
     *
     * @param string|null $id Staffmember id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staffmember = $this->Staffmembers->get($id, [
            'contain' => []
        ]);

        $this->set('staffmember', $staffmember);
        $this->set('_serialize', ['staffmember']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staffmember = $this->Staffmembers->newEntity();
        $oldImage = $staffmember['image'];
        if ($this->request->is('post')) {
            if (!empty($this->request->data)) {
                $staffmember = $this->Staffmembers->patchEntity($staffmember, $this->request->data);
                if (!empty($this->request->data['image']['name'])) {
                    $file = $this->request->data['image'];
                    $imageTypes = array("image/gif", "image/jpeg", "image/png");
                    if (in_array(strtolower($file['type']), $imageTypes)) {
                        move_uploaded_file($file['tmp_name'], WWW_ROOT ."img\staff\\". $file['name']);
                        $staffmember['image']=$file['name'];
                    }
                } else{
                    $staffmember['image'] = $oldImage;
                }
                if ($this->Staffmembers->save($staffmember)) {
                    $this->Flash->success(__('The staffmember has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The staffmember could not be saved. Please, try again.'));
                }
            }
        }
        $this->set(compact('staffmember'));
        $this->set('_serialize', ['staffmember']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Staffmember id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staffmember = $this->Staffmembers->get($id, [
            'contain' => []
        ]);
        $oldImage = $staffmember['image'];
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (!empty($this->request->data)) {
                $staffmember = $this->Staffmembers->patchEntity($staffmember, $this->request->data);
                if (!empty($this->request->data['image']['name'])) {
                    $file = $this->request->data['image'];
                    $imageTypes = array("image/gif", "image/jpeg", "image/png");
                    if (in_array($file['type'], $imageTypes)) {
                            move_uploaded_file($file['tmp_name'], WWW_ROOT . "img\staff\\" . $file['name']);
                            if (!empty($oldImage)) {
                                unlink(WWW_ROOT . "img\staff\\" . $oldImage);
                            }
                            $staffmember['image'] = $file['name'];
                        }
                    else{
                        if (!empty($oldImage)) {
                            unlink(WWW_ROOT . "img\staff\\" . $oldImage);
                        }
                    }
                }
                else{
                    $staffmember['image'] = $oldImage;
                }
                    if ($this->Staffmembers->save($staffmember)) {
                        $this->Flash->success(__('The staffmember has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('The staffmember could not be saved. Please, try again.'));
                    }
                }
            }
        $this->set(compact('staffmember'));
        $this->set('_serialize', ['staffmember']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Staffmember id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $staffmember = $this->Staffmembers->get($id);
        if ($this->Staffmembers->delete($staffmember)) {
            $this->Flash->success(__('The staffmember has been deleted.'));
        } else {
            $this->Flash->error(__('The staffmember could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        if ($user['level'] == 'staff') {
            if ($this->request->action === 'add') {
                $this->Flash->error(__('Only an admin is allowed to do that'));
                return false;
            }
            if ($this->request->action === 'index') {
                $this->Flash->error(__('Sorry, Only an admin can manage staff'));
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
