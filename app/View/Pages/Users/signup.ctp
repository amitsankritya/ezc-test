<h2>Sign Up</h2>
<div class="row">
	<div class="col-md-6">
		<?php
		echo $this->Form->create('User', array('class' => 'signup-form'));
		echo $this->Form->input('first_name', array('label' => 'First Name'));
		echo $this->Form->input('last_name', array('label' => 'Last Name'));
		echo $this->Form->input('phone_number', array('label' => 'Contact Number'));
		echo $this->Form->input('email', array('label' => 'Email'));
		echo $this->Form->input('password', array('label' => 'Password', 'type' => 'password'));
		echo $this->Form->input('confirm_password', array('label' => 'Confirm Password', 'type' => 'password'));
		echo $this->Form->input('address', array('label' => 'Address', 'type' => 'textarea'));
		echo $this->Form->input('state', array(
			'label' => 'State',
			'options' => array(
				'Maharashtra' => 'Maharashtra',
				'Gujarat' => 'Gujarat',
				// Add other Indian states here
			)
		));
		?>
		<div class="form-group">
			<?php echo $this->Form->submit('Sign Up', array('class' => 'btn btn-primary')); ?>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
