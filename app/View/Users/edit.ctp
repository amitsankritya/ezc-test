<?php
echo $this->Html->script('jquery-3.7.1.min', false);
echo $this->Html->script('edit-user', false);
?>
<div class="container-fluid">
	<div class="row justify-content-center mt-5">
		<div class="col-md-6">
			<h2>Edit User</h2>
			<?php
			echo $this->Form->create('User', array(
					'class' => 'edit-user from-control',
					'id' => 'edit-user'
			));
			?>
			<?php
			echo $this->Form->input('id', array('div' => false, 'class' => 'form-control'));
			echo $this->Form->input('first_name', array('div' => false, 'class' => 'form-control', 'id' => 'first_name'));
			echo $this->Form->input('last_name', array('div' => false, 'class' => 'form-control', 'id' => 'last_name'));
			echo $this->Form->input('email', array('div' => false, 'class' => 'form-control', 'id' => 'email'));
			echo $this->Form->input('phone_number', array('div' => false, 'class' => 'form-control', 'id' => 'phone_number'));
			echo $this->Form->input('address', array('div' => false, 'class' => 'form-control', 'id' => 'address'));
			echo $this->Form->input('state', array(
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
					'div' => false,
					'class' => 'form-control',
					'id' => 'state'
			));
			echo $this->Form->input('is_admin', array('id' => 'is_admin'));
			?>
			<div class="form-group"> <!-- Bootstrap form group class -->
				<?php echo $this->Js->submit(__('Edit User'), array('class' => 'btn btn-primary form-control mt-5', 'id' => 'edit-button')); ?>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
