<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public $components = ['Cookie'];
        
    /**
     * login method
     */
    public function login()
    {
        if ($this->Auth->user()) {
            $this->redirect(array('users' => false,'action' => 'dashboard'));            
        }
        
        if ($this->request->is('post')) { //pr($this->request->data);die;
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }

        $this->viewBuilder()->setLayout('login');
        $this->set('title', 'Login');
        
    }
    
    public function dashboard()
    {
		$this->loadModel('Courses');
        $userCount = $this->Users->find()
                ->where(['Users.role' => 'user'])
                ->count();
        $courseCount = $this->Courses->find()
                ->count();
        $this->set(compact('userCount', 'courseCount'));
    }
    
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
}
