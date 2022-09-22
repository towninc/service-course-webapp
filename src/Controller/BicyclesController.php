<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;

/**
 * Bicycles Controller
 *
 * @property \App\Model\Table\BicyclesTable $Bicycles
 *
 * @method \App\Model\Entity\Bicycle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BicyclesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $bicycles = $this->paginate($this->Bicycles);

        $this->set(compact('bicycles'));
    }

    /**
     * View method
     *
     * @param string|null $id Bicycle id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bicycle = $this->Bicycles->get($id, [
            'contain' => []
        ]);

        $this->set('bicycle', $bicycle);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bicycle = $this->Bicycles->newEntity();
        if ($this->request->is('post')) {
            $bicycle = $this->Bicycles->patchEntity($bicycle, $this->request->getData());
            if ($this->Bicycles->save($bicycle)) {
                $this->Flash->success(__('The bicycle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bicycle could not be saved. Please, try again.'));
        }
        $this->set(compact('bicycle'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bicycle id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bicycle = $this->Bicycles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bicycle = $this->Bicycles->patchEntity($bicycle, $this->request->getData());
            if ($this->Bicycles->save($bicycle)) {
                $this->Flash->success(__('The bicycle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bicycle could not be saved. Please, try again.'));
        }
        $this->set(compact('bicycle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bicycle id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bicycle = $this->Bicycles->get($id);
        if ($this->Bicycles->delete($bicycle)) {
            $this->Flash->success(__('The bicycle has been deleted.'));
        } else {
            $this->Flash->error(__('The bicycle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function translate()
    {
        
        $this->autoRender = false;
        $this->autoLayout = false;
        $bicycles = TableRegistry::getTableLocator()->get('Bicycles');
        $this->set(compact('bicycles'));
        $query = $bicycles->find('all');
        $this->response->body(json_encode($query));
    }

    /*public function beforeFilter(Event $event)
    {
        $this->getEventManager()->off($this->Csrf);
    }*/
}
?>
