<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersCourses Controller
 *
 * @property \App\Model\Table\UsersCoursesTable $UsersCourses
 *
 * @method \App\Model\Entity\UsersCourse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersCoursesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        $query = $this->UsersCourses->find('all')->where(['user_id' => $id])->contain(['Users', 'Courses']);
        $this->set('usersCourses', $this->paginate($query));
    }

    /**
     * View method
     *
     * @param string|null $id Users Course id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersCourse = $this->UsersCourses->get($id, [
            'contain' => ['Users', 'Courses']
        ]);

        $this->set('usersCourse', $usersCourse);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersCourse = $this->UsersCourses->newEntity();
        if ($this->request->is('post')) {
            $usersCourse = $this->UsersCourses->patchEntity($usersCourse, $this->request->getData());
            if ($this->UsersCourses->save($usersCourse)) {
                $this->Flash->success(__('The users course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users course could not be saved. Please, try again.'));
        }
        $users = $this->UsersCourses->Users->find('list', ['limit' => 200]);
        $courses = $this->UsersCourses->Courses->find('list', ['limit' => 200]);
        $this->set(compact('usersCourse', 'users', 'courses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Course id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersCourse = $this->UsersCourses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersCourse = $this->UsersCourses->patchEntity($usersCourse, $this->request->getData());
            if ($this->UsersCourses->save($usersCourse)) {
                $this->Flash->success(__('The users course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users course could not be saved. Please, try again.'));
        }
        $users = $this->UsersCourses->Users->find('list', ['limit' => 200]);
        $courses = $this->UsersCourses->Courses->find('list', ['limit' => 200]);
        $this->set(compact('usersCourse', 'users', 'courses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Course id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersCourse = $this->UsersCourses->get($id);
        if ($this->UsersCourses->delete($usersCourse)) {
            $this->Flash->success(__('The users course has been deleted.'));
        } else {
            $this->Flash->error(__('The users course could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
