<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
/**
 * Childrens Controller
 *
 * @property \App\Model\Table\ChildrensTable $Childrens
 *
 * @method \App\Model\Entity\Children[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChildrensController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $childrens = $this->paginate($this->Childrens);

        $this->set(compact('childrens'));
    }

    /**
     * View method
     *
     * @param string|null $id Children id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $children = $this->Childrens->get($id, [
            'contain' => []
        ]);

        $this->set('children', $children);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $children = $this->Childrens->newEntity();
        if ($this->request->is('post')) {
            $children = $this->Childrens->patchEntity($children, $this->request->getData());
            if ($this->Childrens->save($children)) {
                $this->Flash->success(__('The children has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The children could not be saved. Please, try again.'));
        }
        $this->set(compact('children'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Children id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $children = $this->Childrens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $children = $this->Childrens->patchEntity($children, $this->request->getData());
            if ($this->Childrens->save($children)) {
                $this->Flash->success(__('The children has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The children could not be saved. Please, try again.'));
        }
        $this->set(compact('children'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Children id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $children = $this->Childrens->get($id);
        if ($this->Childrens->delete($children)) {
            $this->Flash->success(__('The children has been deleted.'));
        } else {
            $this->Flash->error(__('The children could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function ajaxget(){
        $this->autoRender = false;
        $this->autoLayout = false;
        $childrens = TableRegistry::getTableLocator()->get('Childrens');
        $query = $childrens->find('all');
        //Log::debug($query);
        $this->response->body(json_encode($query));
    }
    public function ajaxpost(){
        // $this->autoRender = false;
        // $this->autoLayout = false;
        // $request =$this->request->input('json_decode');
        // $request_array = json_decode(json_encode($request), true);
        // $childrens = TableRegistry::getTableLocator()->get('Childrens');
        // $query = $childrens->find('all');
        // $query_json=json_encode($query);
        // $query_array =json_decode($query_json);
        // $name_list = array_column( $query_array, 'name' );
        // $result = array_search($request_array['serch_text'], $name_list);
        // Log::debug($request_array['serch_text']);
        // Log::debug($name_list);
        // Log::debug($result);

        // $this->autoRender = false;
        // $this->autoLayout = false;        
        // $request =$this->request->input('json_decode');
        // $request_array = json_decode(json_encode($request), true);
        // $childrens = TableRegistry::getTableLocator()->get('Childrens');
        // $query = $childrens->find('all');
        // $query_json=json_encode($query);
        // $query_array =json_decode($query_json);
        // $name_list = array_column( $query_array, 'name' );
        // for($i=0;$i<=count($query_array);$i++){
        //     if(strpos($query_array[$i],$request_array['serch_text']) !== false){
        //         $this->response->body($query_array[$i]);
        // }
        
    }

}
