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
			echo $this->Form->input('last_name', array('label' => 'Last Name', 'class' => 'form-control', 'id' => 'last_name'));
			echo $this->Form->input('phone_number', array('label' => 'Contact Number', 'class' => 'form-control', 'id' => 'phone_number'));
			echo $this->Form->input('email', array('label' => 'Email', 'class' => 'form-control', 'id' => 'email'));
			echo $this->Form->input('password', array('label' => 'Password', 'type' => 'password', 'class' => 'form-control', 'id' => 'password'));
			echo $this->Form->input('confirm_password', array('label' => 'Confirm Password', 'type' => 'password', 'class' => 'form-control', 'id' => 'confirm_password'));
			echo $this->Form->input('address', array('label' => 'Address', 'type' => 'textarea', 'class' => 'form-control', 'rows' => 2, 'id' => 'address'));
			echo $this->Form->input('state', array(
					'label' => 'State',
					'options' => array(
						'Andhra Pradesh' => 'Andhra Pradesh',
						'Arunachal Pradesh' => 'Arunachal Pradesh',
						'Assam' => 'Assam',
						'Bihar' => 'Bihar',
						'Chhattisgarh' => 'Chhattisgarh',
						'Goa' => 'Goa',
						'Gujarat' => 'Gujarat',
						'Haryana' => 'Haryana',
						'Himachal Pradesh' => 'Himachal Pradesh',
						'Jharkhand' => 'Jharkhand',
						'Karnataka' => 'Karnataka',
						'Kerala' => 'Kerala',
						'Madhya Pradesh' => 'Madhya Pradesh',
						'Maharashtra' => 'Maharashtra',
						'Manipur' => 'Manipur',
						'Meghalaya' => 'Meghalaya',
						'Mizoram' => 'Mizoram',
						'Nagaland' => 'Nagaland',
						'Odisha' => 'Odisha',
						'Punjab' => 'Punjab',
						'Rajasthan' => 'Rajasthan',
						'Sikkim' => 'Sikkim',
						'Tamil Nadu' => 'Tamil Nadu',
						'Telangana' => 'Telangana',
						'Tripura' => 'Tripura',
						'Uttar Pradesh' => 'Uttar Pradesh',
						'Uttarakhand' => 'Uttarakhand',
						'West Bengal' => 'West Bengal',
						'Andaman and Nicobar Islands' => 'Andaman and Nicobar Islands',
						'Chandigarh' => 'Chandigarh',
						'Dadra and Nagar Haveli' => 'Dadra and Nagar Haveli',
						'Daman and Diu' => 'Daman and Diu',
						'Lakshadweep' => 'Lakshadweep',
						'Delhi' => 'Delhi',
						'Puducherry' => 'Puducherry',
					),
					'selected' => 'Please select',
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


