<div class="container-fluid">
	<div class="row justify-content-center mt-5">
		<div class="col-md-6">
			<h2>Sign Up</h2>
			<?php
			echo $this->Form->create('User', array('class' => 'signup-form form-control'));
			echo $this->Form->input('first_name', array('label' => 'First Name', 'class' => 'form-control'));
			echo $this->Form->input('last_name', array('label' => 'Last Name', 'class' => 'form-control'));
			echo $this->Form->input('phone_number', array('label' => 'Contact Number', 'class' => 'form-control'));
			echo $this->Form->input('email', array('label' => 'Email', 'class' => 'form-control'));
			echo $this->Form->input('password', array('label' => 'Password', 'type' => 'password', 'class' => 'form-control'));
			echo $this->Form->input('confirm_password', array('label' => 'Confirm Password', 'type' => 'password', 'class' => 'form-control'));
			echo $this->Form->input('address', array('label' => 'Address', 'type' => 'textarea', 'class' => 'form-control'));
			echo $this->Form->input('state', array(
					'label' => 'State',
					'options' => array(
							'Maharashtra' => 'Maharashtra',
							'Gujarat' => 'Gujarat',
							// TODO:load this data from backend
					),
					'class' => 'form-control'
			));
			?>
			<div class="form-group">
				<?php echo $this->Form->submit('Sign Up', array('class' => 'btn btn-primary form-control mt-5')); ?>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
