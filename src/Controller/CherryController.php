<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cherry Controller
 *
 * @property \App\Model\Table\CherryTable $Cherry
 *
 * @method \App\Model\Entity\Cherry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CherryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $cherry = $this->paginate($this->Cherry);

        $this->set(compact('cherry'));
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
        $cherry = $this->Cherry->get($id, [
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
        $cherry = $this->Cherry->newEntity();
        if ($this->request->is('post')) {
            $cherry = $this->Cherry->patchEntity($cherry, $this->request->getData());
            if ($this->Cherry->save($cherry)) {
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
        $cherry = $this->Cherry->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cherry = $this->Cherry->patchEntity($cherry, $this->request->getData());
            if ($this->Cherry->save($cherry)) {
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
        $cherry = $this->Cherry->get($id);
        if ($this->Cherry->delete($cherry)) {
            $this->Flash->success(__('The cherry has been deleted.'));
        } else {
            $this->Flash->error(__('The cherry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
