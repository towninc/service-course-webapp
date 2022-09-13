<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;
/**
 * Medicines Controller
 *
 * @property \App\Model\Table\MedicinesTable $Medicines
 *
 * @method \App\Model\Entity\Medicine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MedicinesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $medicines = $this->paginate($this->Medicines);
        $this->set(compact('medicines'));
    }

    /**
     * View method
     *
     * @param string|null $id Medicine id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medicine = $this->Medicines->get($id, [
            'contain' => []
        ]);

        $this->set('medicine', $medicine);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $medicine = $this->Medicines->newEntity();
        if ($this->request->is('post')) {
            $medicine = $this->Medicines->patchEntity($medicine, $this->request->getData());
            if ($this->Medicines->save($medicine)) {
                $this->Flash->success(__('The medicine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medicine could not be saved. Please, try again.'));
        }
        $this->set(compact('medicine'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Medicine id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $medicine = $this->Medicines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medicine = $this->Medicines->patchEntity($medicine, $this->request->getData());
            if ($this->Medicines->save($medicine)) {
                $this->Flash->success(__('The medicine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medicine could not be saved. Please, try again.'));
        }
        $this->set(compact('medicine'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Medicine id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $medicine = $this->Medicines->get($id);
        if ($this->Medicines->delete($medicine)) {
            $this->Flash->success(__('The medicine has been deleted.'));
        } else {
            $this->Flash->error(__('The medicine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function ajaxget(){

        $this->autoRender = false;
        $this->autoLayout = false;
        $medicines = TableRegistry::getTableLocator()->get('Medicines');
        $query = $medicines->find('all');
        //Log::debug($query);
        $this->response->body(json_encode($query));;
    }
}
