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
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$this->layout = 'ajax';
			if ($this->request->is('post')) {
				if ($this->Auth->login()) {
					$response['success'] = true;
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

	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
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
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$this->layout = 'ajax';
			if ($this->request->is('post')) {
				$this->User->set($this->request->data);
				if ($this->User->validates()) {
					$this->User->create();
					$this->request->data['Users']['created_at'] = date('Y-m-d H:i:s');
					if ($this->User->save($this->request->data)) {
						//$this->render('view');
						$response['success'] = true;
						$response['message'] = 'User registered successfully.';
					} else {
						$response['success'] = false;
						$response['message'] = 'Error occurred while saving user data.';
					}
				} else {
					$errors = array();
					foreach ($this->validationErrors['User'] as $validationError) {
						$errors[] = $validationError;
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

		/*if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}*/
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete($id)) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
