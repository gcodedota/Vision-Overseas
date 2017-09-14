<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Content Controller
 *
 * @property \App\Model\Table\ContentTable $Content
 */
class ContentController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $content = $this->Content->find('all')->toArray();
        $this->set(compact('content'));
        $this->set('_serialize', ['content']);
    }

    /**
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $content = $this->Content->newEntity();
        if ($this->request->is('post')) {
            $content = $this->Content->patchEntity($content, $this->request->data);
            if ($this->Content->save($content)) {
                $this->Flash->success(__('The content has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The content could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('content'));
        $this->set('_serialize', ['content']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Content id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $content = $this->Content->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $content = $this->Content->patchEntity($content, $this->request->data);
            if ($this->Content->save($content)) {
                $this->Flash->success(__('The content has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The content could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('content'));
        $this->set('_serialize', ['content']);
    }

    public function isAuthorized($user)
    {
        if ($user['level'] == 'staff'  OR ($user['level']=='customer')) {
            if ($this->request->action === 'index') {
                $this->Flash->error(__('Sorry, Only an admin can manage content'));
                return false;
            }
            else {
                return true;
            }
        }
        else if ($user['level']=='admin')  {
    return true;
    }
    }


}