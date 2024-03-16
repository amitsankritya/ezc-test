<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('SoftDeleteTrait', 'SoftDeleteTrait.Lib');
/**
 * User Model
 *
 */
class User extends AppModel {
	use SoftDeleteTrait;

	protected function _deletedFieldName() {
		return 'deleted';
	}

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'first_name' => array(
			'rule' => array('custom', '/^[a-zA-Z]+(?: [a-zA-Z]+)*$/'),
			'message' => 'Please enter a valid first name'
		),
		'last_name' => array(
			'rule' => array('custom', '/^[a-zA-Z]+(?: [a-zA-Z]+)*$/'),
			'message' => 'Please enter a valid last name'
		),
		'phone_number' => array(
			'notStartingWithZero' => array(
				'rule' => array('custom', '/^[1-9]\d{9}$/'),
				'message' => 'Phone number can not start with 0 and should be exactly 10 digits'
			),
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Phone number must contain only numeric characters'
			)
		),
		'email' => array(
			'length' => array(
				'rule' => array('maxLength', 100),
				'message' => 'Email must be less than 100 characters long'
			),
			'email' => array(
				'rule' => 'email',
				'message' => 'Please enter a valid email address'
			),
			'unique' => array(
				'rule'    => array('isUniqueEmail'),
				'message' => 'This email is already in use',
			),
		),
		'password' => array(
			'length' => array(
				'rule' => array('between', 6, 20),
				'message' => 'Password must be between 6 and 20 characters long'
			)
		),
		'confirm_password' => array(
			'matchPasswords' => array(
				'rule' => array('comparePasswords', 'password'),
				'message' => 'Passwords do not match'
			)
		),
		'address' => array(
			'length' => array(
				'rule' => array('maxLength', 300),
				'message' => 'Address must be less than 300 characters long'
			),
			'allowedSpecialChars' => array(
				'rule' => array('custom', '/^[a-zA-Z0-9\/. ]*$/'),
				'message' => 'No special characters are allowed except forward slash (/)'
			)
		),
		'state' => array(
			'rule' => array('custom', '/^[a-zA-Z]+$/'),
			'message' => 'Please enter a valid state name'
		)
	);

	public function comparePasswords($confirmPassword, $originalPasswordField) {
		// Get the value of the confirm_password field
		$confirmPasswordValue = array_values($confirmPassword)[0];

		// Get the value of the original password field
		$originalPasswordValue = $this->data[$this->alias][$originalPasswordField];

		// Compare the two values and return true if they match, false otherwise
		return $confirmPasswordValue === $originalPasswordValue;
	}

	function isUniqueEmail($check) {

		$email = $this->find(
			'first',
			array(
				'fields' => array(
					'User.id', 'User.email'
				),
				'conditions' => array(
					'User.email' => $check['email']
				)
			)
		);

		if(!empty($email)){
			if(isset($this->data[$this->alias]['id'])) {
				if($this->data[$this->alias]['id'] == $email['User']['id']){
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return true;
		}
	}

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
		}
		return true;
	}
}
