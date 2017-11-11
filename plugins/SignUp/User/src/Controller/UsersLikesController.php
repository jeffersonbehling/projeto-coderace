<?php
namespace SignUp\User\Controller;

use SignUp\User\Controller\AppController;
use Cake\Event\Event;


/**
 * UsersLikes Controller
 *
 *
 * @method \SignUp\User\Model\Entity\UsersLike[] paginate($object = null, array $settings = [])
 */
class UsersLikesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('SignUp/User.Likes');
    }
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $usersLikes = $this->paginate($this->UsersLikes);

        $this->set(compact('usersLikes'));
        $this->set('_serialize', ['usersLikes']);
    }

    /**
     * View method
     *
     * @param string|null $id Users Like id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersLike = $this->UsersLikes->get($id, [
            'contain' => []
        ]);

        $this->set('usersLike', $usersLike);
        $this->set('_serialize', ['usersLike']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $likes = $this->Likes->readLikes();

        foreach ($likes as $like) {
            $usersLike = $this->UsersLikes->newEntity();
            $usersLike->user_id = $id;
            $usersLike->like_id = $like;
            if (!$this->UsersLikes->save($usersLike)) {
                $this->Flash->error(__('The users like could not be saved. Please, try again.'));
            }
        }
        return $this->redirect(['plugin' => 'Interests']);

        $this->set(compact('usersLike'));
        $this->set('_serialize', ['usersLike']);
    }
}
