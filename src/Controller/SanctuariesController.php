<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;

/**
 * Sanctuaries Controller
 *
 *
 * @method \App\Model\Entity\Sanctuary[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SanctuariesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $sanctuaries = $this->paginate($this->Sanctuaries);

        $this->set(compact('sanctuaries'));
    }

    /**
     * View method
     *
     * @param string|null $id Sanctuary id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sanctuary = $this->Sanctuaries->get($id, [
            'contain' => []
        ]);

        $this->set('sanctuary', $sanctuary);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sanctuary = $this->Sanctuaries->newEntity();
        if ($this->request->is('post')) {
            $sanctuary = $this->Sanctuaries->patchEntity($sanctuary, $this->request->getData());
            if ($this->Sanctuaries->save($sanctuary)) {
                $this->Flash->success(__('The sanctuary has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sanctuary could not be saved. Please, try again.'));
        }
        $this->set(compact('sanctuary'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sanctuary id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sanctuary = $this->Sanctuaries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sanctuary = $this->Sanctuaries->patchEntity($sanctuary, $this->request->getData());
            if ($this->Sanctuaries->save($sanctuary)) {
                $this->Flash->success(__('The sanctuary has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sanctuary could not be saved. Please, try again.'));
        }
        $this->set(compact('sanctuary'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sanctuary id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sanctuary = $this->Sanctuaries->get($id);
        if ($this->Sanctuaries->delete($sanctuary)) {
            $this->Flash->success(__('The sanctuary has been deleted.'));
        } else {
            $this->Flash->error(__('The sanctuary could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function ajaxget()
    {
        $this->autoRender = false;
        // $this->autoLayout = false;
 
        // if ($this->request->is('ajax')) {
            $sanctuaries = $this->Sanctuaries->find('all');
            Log::debug($sanctuaries);
            $query = json_encode($sanctuaries);
            Log::debug($query);

            //値を渡すテスト用配列
            // $test = array('1', '2', '3');
            // Log::debug($test);
            // $test2 = json_encode($test);
            // Log::debug($test2);

            return $this->response->withStringBody($query);
    }
    
}
