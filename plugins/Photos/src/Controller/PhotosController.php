<?php
namespace Photos\Controller;

use Photos\Controller\AppController;

/**
 * Photos Controller
 *
 * @property \Photos\Model\Table\PhotosTable $Photos
 *
 * @method \Photos\Model\Entity\Photo[] paginate($object = null, array $settings = [])
 */
class PhotosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events']
        ];
        $photos = $this->paginate($this->Photos);

        $this->set(compact('photos'));
        $this->set('_serialize', ['photos']);
    }

    /**
     * View method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $photo = $this->Photos->get($id, [
            'contain' => ['Events', 'Phinxlog']
        ]);

        $this->set('photo', $photo);
        $this->set('_serialize', ['photo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($eventId = null)
    {
        $photo = $this->Photos->newEntity();
        $photo->events_id = $eventId;
        if ($this->request->is('post')) {
            $photo->directory = $this->request->getData('directory');

            if(!empty($this->request->getData(['directory', 'name']))) {
                $file = $this->request->getData(['directory']);

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions

                //only process if the extension is valid
                if(in_array($ext, $arr_ext))
                {
                    //do the actual uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it

                    $file_name = md5(uniqid()) . '-' . time() . '.' . $ext;

                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/' . $file_name);

                    //prepare the filename for database entry
                    $photo->directory = $file_name;
                }
            }
            if ($this->Photos->save($photo)) {
                $this->Flash->success(__('The photo has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The photo could not be saved. Please, try again.'));
        }
        $events = $this->Photos->Events->find('list', ['limit' => 200]);
        $phinxlog = $this->Photos->Phinxlog->find('list', ['limit' => 200]);
        $this->set(compact('photo', 'events', 'phinxlog'));
        $this->set('_serialize', ['photo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $photo = $this->Photos->get($id, [
            'contain' => ['Phinxlog']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $photo = $this->Photos->patchEntity($photo, $this->request->getData());
            if ($this->Photos->save($photo)) {
                $this->Flash->success(__('The photo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The photo could not be saved. Please, try again.'));
        }
        $events = $this->Photos->Events->find('list', ['limit' => 200]);
        $phinxlog = $this->Photos->Phinxlog->find('list', ['limit' => 200]);
        $this->set(compact('photo', 'events', 'phinxlog'));
        $this->set('_serialize', ['photo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $photo = $this->Photos->get($id);
        if ($this->Photos->delete($photo)) {
            $this->Flash->success(__('The photo has been deleted.'));
        } else {
            $this->Flash->error(__('The photo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
