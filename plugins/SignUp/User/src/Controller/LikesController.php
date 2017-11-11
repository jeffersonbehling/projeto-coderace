<?php
namespace SignUp\User\Controller;

use SignUp\User\Controller\AppController;
use Cake\Event\Event;
/**
 * Likes Controller
 *
 * @property \SignUp\User\Model\Table\LikesTable $Likes
 *
 * @method \SignUp\User\Model\Entity\Like[] paginate($object = null, array $settings = [])
 */
class LikesController extends AppController
{

    /**
     * @return \SignUp\User\Model\Table\LikesTable
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('index');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $likes = $this->Likes->find("all")->orderAsc("name");
        if ($this->request->is('post')) {
//            debug($this->request->getData("likes"));
            $this->Likes->saveLikes($this->request->getData("likes"));
            return $this->redirect(['controller' => 'RequestAccount', 'action' => 'register']);
        }
        $this->set(compact('likes'));
        $this->set('_serialize', ['likes']);
    }

    /**
     * View method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $like = $this->Likes->get($id, [
            'contain' => []
        ]);

        $this->set('like', $like);
        $this->set('_serialize', ['like']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $like = $this->Likes->newEntity();
        if ($this->request->is('post')) {
            $like = $this->Likes->patchEntity($like, $this->request->getData());
            if ($this->Likes->save($like)) {
                $this->Flash->success(__('The like has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The like could not be saved. Please, try again.'));
        }
        $this->set(compact('like'));
        $this->set('_serialize', ['like']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $like = $this->Likes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $like = $this->Likes->patchEntity($like, $this->request->getData());
            if ($this->Likes->save($like)) {
                $this->Flash->success(__('The like has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The like could not be saved. Please, try again.'));
        }
        $this->set(compact('like'));
        $this->set('_serialize', ['like']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $like = $this->Likes->get($id);
        if ($this->Likes->delete($like)) {
            $this->Flash->success(__('The like has been deleted.'));
        } else {
            $this->Flash->error(__('The like could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
