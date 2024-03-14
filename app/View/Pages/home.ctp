
<div class="container-fluid cp-container-fluid d-flex flex-column justify-content-center align-items-center min-vh-100" style="background-color: #f8f9fa;">
	<div class="text-center">
		<h1 class="display-2">Welcome to Test</h1>
		<div class="mt-4">
			<?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-primary btn-lg me-2')); ?>
			<?php echo $this->Html->link('Signup', array('controller' => 'users', 'action' => 'signup'), array('class' => 'btn btn-secondary btn-lg')); ?>
		</div>
	</div>
</div>
