<?php
namespace Interests\Controller;

use Interests\Controller\AppController;

/**
 * Interests Controller
 *
 *
 * @method \Interests\Model\Entity\Interest[] paginate($object = null, array $settings = [])
 */
class InterestsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'actions' => ['index']
        ]);
        $this->loadComponent('Paginator');
        $this->loadModel('Events.Events');
        $this->loadModel('SignUp/User.Users');
        $this->loadModel('Photos.Photos');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $events = $this->Events->find('all')
            ->find('search', $this->Events->filterParams($this->request->getQuery()));

        $this->paginate($events);

        foreach ($events as $event) {
            $interested = $this->Interests->find('all', [
                'contain' => ['Events']
            ])
                ->where(['event_id' => $event->id]);

            $event['interested'] = count($interested->toArray());

            $participating = $this->Interests->find('all', [
                'contain' => ['Events']
            ])
                ->where(['event_id' => $event->id])
                ->andWhere(['user_id' => $this->Auth->user('id')]);

            $event['user_participating'] = count($participating->toArray()) != 0 ? true : false;
        }


        $this->set(compact('events'));
    }

    /**
     * View method
     *
     * @param string|null $id Interest id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($event_id = null)
    {
        $users = $this->Users->find()
            ->where(['id IN' => $this->Interests->find()->select('user_id')->where(['event_id' => $event_id])]);

        $photos = $this->Photos->find()
            ->where(['events_id' => $event_id]);

        $interest = $this->Interests->find()
            ->where(['user_id' => $this->Auth->user('id')])
            ->andWhere(['event_id' => $event_id]);

        $interested = false;

        if ($interest->count() != 0) {
            $interested = true;
        }


        $event = $this->Events->get($event_id, [
            'contain' => []
        ]);

        $this->set(compact('users', 'event', 'photos', 'interested'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($event_id)
    {
        $this->autoRender = false;
        $user_id = $this->Auth->user('id');

        $interest = $this->Interests->newEntity();
        $interest->user_id = $user_id;
        $interest->event_id = $event_id;
        if ($this->Interests->save($interest)) {
            $this->Flash->success(__d('interests', 'Agora você está participando do Evento.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__d('interests', 'Falha ao adicionar você ao evento.'));

        return $this->redirect(['action' => 'index']);
    }

    public function userProfile($id)
    {
        $user = $this->Users->get($id);

        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Interest id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $interest = $this->Interests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $interest = $this->Interests->patchEntity($interest, $this->request->getData());
            if ($this->Interests->save($interest)) {
                $this->Flash->success(__d('interests', 'The interest has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('interests', 'The interest could not be saved. Please, try again.'));
        }
        $this->set(compact('interest'));
        $this->set('_serialize', ['interest']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Interest id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($event_id)
    {
        $interests = $this->Interests->find()
            ->where(['event_id' => $event_id])
            ->andWhere(['user_id' => $this->Auth->user('id')]);

        foreach ($interests as $interest) {
            $interest = $this->Interests->get($interest->id);
            if ($this->Interests->delete($interest)) {
                $this->Flash->success(__d('interests', 'Você cancelou a participação no Evento com sucesso.'));
            } else {
                $this->Flash->error(__d('interests', 'Falha ao cancelar sua participação no Evento. Por favor, tente novamente.'));
            }
        }

        return $this->redirect(['action' => 'index']);
    }
}
