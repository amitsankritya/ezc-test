<?php
echo $this->Html->script('jquery-3.7.1.min', false);
echo $this->Html->script('login', false);
?>

<div class="container-fluid">
	<div class="row justify-content-center mt-5">
		<div class="col-md-6">
			<h2>Login</h2>
			<?php
			echo $this->Form->create('User', array(
					'class' => 'form-control',
					'id' => 'login-form'
			));
			echo $this->Form->input('email', array('label' => 'Email', 'class' => 'form-control', 'id' => 'email'));
			echo $this->Form->error('email', null, array('class' => 'text-danger'));
			echo $this->Form->input('password', array('label' => 'Password', 'type' => 'password', 'class' => 'form-control', 'id' => 'password'));
			echo $this->Form->error('password', null, array('class' => 'text-danger'));
			echo $this->Js->submit('Login', array('class' => 'btn btn-primary mt-3', 'id' => "login-button"));
			echo $this->Form->end();
			echo "Don't have account? " .$this->Html->link('Signup', array('controller' => 'users', 'action' => 'signup'), array('class' => 'justify-content-center')) . " please.";
			?>
		</div>
	</div>
</div>
