<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Hotel Controller
 *
 *
 * @method \App\Model\Entity\Hotel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HotelsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $hotel = $this->paginate($this->Hotel);

        $this->set(compact('hotel'));
    }

    /**
     * View method
     *
     * @param string|null $id Hotel id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hotel = $this->Hotel->get($id, [
            'contain' => []
        ]);

        $this->set('hotel', $hotel);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hotel = $this->Hotel->newEntity();
        if ($this->request->is('post')) {
            $hotel = $this->Hotel->patchEntity($hotel, $this->request->getData());
            if ($this->Hotel->save($hotel)) {
                $this->Flash->success(__('The hotel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hotel could not be saved. Please, try again.'));
        }
        $this->set(compact('hotel'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hotel id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hotel = $this->Hotel->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hotel = $this->Hotel->patchEntity($hotel, $this->request->getData());
            if ($this->Hotel->save($hotel)) {
                $this->Flash->success(__('The hotel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hotel could not be saved. Please, try again.'));
        }
        $this->set(compact('hotel'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hotel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hotel = $this->Hotel->get($id);
        if ($this->Hotel->delete($hotel)) {
            $this->Flash->success(__('The hotel has been deleted.'));
        } else {
            $this->Flash->error(__('The hotel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function ajaxRequest() {
        //CakePHPのレンダー機能を無効化する
        $this->autoRender = false;
        // $this->request->is('ajax') でAjax通信か判定する
        if ($this->request->is('ajax')) {
            $neLat = $this->request->getQuery('neLat');
            $neLng = $this->request->getQuery('neLng');
            $swLat = $this->request->getQuery('swLat');
            $swLng = $this->request->getQuery('swLng');
            $hotelsTable = TableRegistry::getTableLocator()->get("Hotels");
            $hotels = $hotelsTable->find()
                ->where([
                    'latitude >=' => $swLat,
                    'latitude <=' => $neLat,
                    'longitude >='=> $swLng,
                    'longitude <=' => $neLng,
                ])
                ->toArray();
            
            $this->log($hotels, "debug");
            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode($hotels));

            return $this->response;
        }
    }
}
