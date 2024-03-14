<div class="container-fluid">
	<div class="row justify-content-center mt-5">
		<div class="col-md-6">
			<h2>Login</h2>
			<?php
			echo $this->Form->create('User', array('class' => 'form-control'));
			echo $this->Form->input('email', array('label' => 'Email', 'class' => 'form-control'));
			echo $this->Form->input('password', array('label' => 'Password', 'type' => 'password', 'class' => 'form-control'));
			echo $this->Form->button('Login', array('class' => 'btn btn-primary mt-3'));
			echo $this->Form->end();
			?>
		</div>
	</div>
</div>
