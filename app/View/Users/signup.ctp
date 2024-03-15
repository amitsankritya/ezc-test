<?php
echo $this->Html->script('jquery-3.7.1.min', false);
echo $this->Html->script('signup', false);
?>

<div class="container-fluid">
	<div class="row justify-content-center mt-5">
		<div class="col-md-6">
			<h2>Sign Up</h2>
			<?php
			$this->Flash->render();
			echo $this->Form->create('User', array(
					'class' => 'signup-form form-control',
					'url' => array('controller' => 'users', 'action' => 'add'),
					'id' => 'signup-form'
			));
			echo $this->Form->input('first_name', array('label' => 'First Name', 'class' => 'form-control', 'id' => 'first_name'));
			echo $this->Form->error('first_name', null, array('class' => 'text-danger'));
			echo $this->Form->input('last_name', array('label' => 'Last Name', 'class' => 'form-control', 'id' => 'last_name'));
			echo $this->Form->error('last_name', null, array('class' => 'text-danger'));
			echo $this->Form->input('phone_number', array('label' => 'Contact Number', 'class' => 'form-control', 'id' => 'phone_number'));
			echo $this->Form->error('phone_number', null, array('class' => 'text-danger'));
			echo $this->Form->input('email', array('label' => 'Email', 'class' => 'form-control', 'id' => 'email'));
			echo $this->Form->error('email', null, array('class' => 'text-danger'));
			echo $this->Form->input('password', array('label' => 'Password', 'type' => 'password', 'class' => 'form-control', 'id' => 'password'));
			echo $this->Form->error('password', null, array('class' => 'text-danger'));
			echo $this->Form->input('confirm_password', array('label' => 'Confirm Password', 'type' => 'password', 'class' => 'form-control', 'id' => 'confirm_password'));
			echo $this->Form->error('confirm_password', null, array('class' => 'text-danger'));
			echo $this->Form->input('address', array('label' => 'Address', 'type' => 'textarea', 'class' => 'form-control', 'rows' => 2, 'id' => 'address'));
			echo $this->Form->error('address', null, array('class' => 'text-danger'));
			echo $this->Form->input('state', array(
					'label' => 'State',
					'options' => array(
							'Maharashtra' => 'Maharashtra',
							'Gujarat' => 'Gujarat',
						// TODO: Load this data from backend
					),
					'class' => 'form-control',
					'id' => 'state'
			));
			echo $this->Form->error('state', null, array('class' => 'text-danger'));
			?>
			<div class="form-group">
				<?php echo $this->Js->submit('Sign Up', array('class' => 'btn btn-primary form-control mt-5', 'id' => "signup-button")); ?>
			</div>
			<?php echo $this->Form->end(); ?>
			<?php echo "Already Registered? " .$this->Html->link('Login', array('controller' => 'users', 'action' => 'signup'), array('class' => 'justify-content-center mt-5')) . " please.";?>
		</div>
	</div>
</div>


