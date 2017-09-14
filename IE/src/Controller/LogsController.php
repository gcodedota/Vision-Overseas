<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Logs Controller
 *
 * @property \App\Model\Table\LogsTable $Logs
 */
class LogsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $logs = $this->Logs->find('all', ['contain' => ['Users']]);
        $this->set(compact('logs'));
        $this->set('_serialize', ['logs']);
    }
    /**
     * Delete method
     *
     * @param string|null $id Log id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $log = $this->Logs->get($id);
        if ($this->Logs->delete($log)) {
            $this->Flash->success(__('The log has been deleted.'));
        } else {
            $this->Flash->error(__('The log could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
{
    if ($user['level'] == 'staff'  OR ($user['level']=='admin')) {
        if ($this->request->action === 'index') {
//                $this->Flash->error(__('Only an admin is allowed to do that'));
            return true;
        }
//            if ($this->request->action === 'delete') {
//                $this->Flash->error(__('Only an admin is allowed to do that'));
//                return false;
//            }
//            if ($this->request->action === 'edit') {
//                $this->Flash->error(__('Only an admin is allowed to do that'));
//                return false;
//            }
    }
}
}
