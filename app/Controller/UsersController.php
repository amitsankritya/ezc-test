<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();

		$this->Auth->allow('signup', 'add');
	}

	public function login() {
		$response = array();

		if($this->Session->check('Auth.User')){
			$this->redirect(array('action' => 'index'));
		}

		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$this->layout = 'ajax';
			if ($this->request->is('post')) {
				if ($this->Auth->login()) {
					$response['success'] = true;
					$response['redirectUrl'] = 'index';
					$response['message'] = 'LoggedIn successfully.';
				} else {
					$response['success'] = false;
					$response['message'] = 'Invalid username or password';
				}
			} else {
				$response['success'] = false;
				$response['message'] = 'Method not allowed';
			}
		}

		//$this->response->type('json');
		$this->response->body(json_encode($response));
	}

	public function logout() {
		$this->Auth->logout();
		$this->redirect('/');
	}

	public function signup() {
		if($this->Session->check('Auth.User')){
			$this->redirect(array('action' => 'index'));
		}
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->paginate = array(
			'limit' => 5
		);
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$response = array();
		if (AuthComponent::user()) {
			$this->Flash->error(__('Logged in user can not register again'));
		}

		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$this->layout = 'ajax';
			if ($this->request->is('post')) {
				$this->User->set($this->request->data);
				if ($this->User->validates()) {
					$this->User->create();
					if ($result = $this->User->save($this->request->data)) {
						$this->Auth->login($result);
						$response['success'] = true;
						$response['redirectUrl'] = 'index';
						$response['message'] = 'User registered successfully.';
					} else {
						$response['success'] = false;
						$response['message'] = 'Error occurred while saving user data.';
					}
				} else {
					$errors = array();
					foreach ($this->User->validationErrors as $field => $error) {
						$errors[$field] = $error;
					}

					$response['success'] = false;
					$response['message'] = $errors;
				}
			}
		} else {
			$this->Flash->set('Invalid request.', array('class' => 'alert alert-danger'));
			$this->redirect(array('controller' => 'users', 'action' => 'login'));
		}

		$this->response->type('json');
		$this->response->body(json_encode($response));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!AuthComponent::user('is_admin')) {
			$this->Flash->error(__('Unauthorised Access'));
			//return $this->redirect(array('action' => 'index'));
		}

		if($this->request->is('ajax')) {
			$this->autoRender = false;
			$this->layout = 'ajax';

			if (!$this->User->exists($id)) {
				throw new NotFoundException(__('Invalid user'));
			}

			if ($this->request->is(array('post', 'put'))) {
				$this->User->set($this->request->data);
				if($this->User->validates()) {
					if ($this->User->save($this->request->data)) {
						$response['success'] = true;
						$response['redirectUrl'] = router::url ("/users",array("controller" => "users", "action" => "index"));
						$response['message'] = 'User updated successfully.';
					} else {
						$this->Flash->error(__('The user could not be saved. Please, try again.'));
					}
				} else {
					$errors = array();
					foreach ($this->User->validationErrors as $field => $error) {
						$errors[$field] = $error;
					}

					$response['success'] = false;
					$response['message'] = $errors;
				}

			} else {
				$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
				$this->request->data = $this->User->find('first', $options);
			}

			$this->response->type('json');
			$this->response->body(json_encode($response));

		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!AuthComponent::user('is_admin')) {
			$this->Flash->error(__('Unauthorised Access!'));
			return $this->redirect(array('action' => 'index'));
		}

		if (AuthComponent::user('id') == $id) {
			$this->Flash->error(__('A user can not delete itself.'));
			return $this->redirect(array('action' => 'index'));
		}

		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}

		$this->request->allowMethod('post');

		if ($this->User->delete($id, false)) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
