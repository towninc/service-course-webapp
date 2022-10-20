<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;


/**
 * Cherrys Controller
 *
 * @property \App\Model\Table\CherrysTable $Cherrys
 *
 * @method \App\Model\Entity\Cherry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CherrysController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Security');
    }

    public function mapCherrySearch()
    {
    }

    public function mapCherryResult()
    {
        header("Content-Type: application/json; charset=UTF-8"); //ヘッダー情報の明記。必須。
        
        $lat = $this->request->getData('lat');
        $lng = $this->request->getData('lng');

        $sql = "CALL `findNearestCherry`(" . $lat . ", " . $lng . ");";

        $connection = ConnectionManager::get('default');
        // 複数行を取得する場合はfetch → fetchall('assoc')にします
        $cherrys = $connection->execute($sql)->fetchall('assoc');
        // debug($cherrys);

        $this->set(compact('cherrys'));
        $this->set(compact('lat'));
        $this->set(compact('lng'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $cherrys = $this->paginate($this->Cherrys);

        $this->set(compact('cherrys'));
    }

    /**
     * View method
     *
     * @param string|null $id Cherry id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cherry = $this->Cherrys->get($id, [
            'contain' => []
        ]);

        $this->set('cherry', $cherry);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cherry = $this->Cherrys->newEntity();
        if ($this->request->is('post')) {
            $cherry = $this->Cherrys->patchEntity($cherry, $this->request->getData());
            if ($this->Cherrys->save($cherry)) {
                $this->Flash->success(__('The cherry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cherry could not be saved. Please, try again.'));
        }
        $this->set(compact('cherry'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cherry id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cherry = $this->Cherrys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cherry = $this->Cherrys->patchEntity($cherry, $this->request->getData());
            if ($this->Cherrys->save($cherry)) {
                $this->Flash->success(__('The cherry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cherry could not be saved. Please, try again.'));
        }
        $this->set(compact('cherry'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cherry id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cherry = $this->Cherrys->get($id);
        if ($this->Cherrys->delete($cherry)) {
            $this->Flash->success(__('The cherry has been deleted.'));
        } else {
            $this->Flash->error(__('The cherry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
