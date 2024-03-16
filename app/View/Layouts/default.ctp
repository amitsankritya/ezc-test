<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php //echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('app');

		echo $this->fetch('script');
		echo $this->Html->script('bootstrap.min');
		//echo $this->Js->writeBuffer();
	?>
</head>
<body>
	<nav class="navbar navbar-expand-lg d-lg-flex navbar-dark bg-custom-navbar">
		<div class="container">
			<a class="navbar-brand" href="#">
				<?php echo $this->Html->link('EZC Assessment', array('controller' => 'users', 'action' => 'index'), array('class' => 'nav-link')); ?>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav justify-content-end">
					<?php if (AuthComponent::user()) { ?>
						<li class="nav-item">
							<?php echo $this->Form->postLink(__('Logout'), array('action' => 'logout'), array('confirm' => 'Are you sure you want to logout?')); ?>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<?php echo $this->Html->link('SignIn', array('controller' => 'users', 'action' => 'login'), array('class' => 'nav-link')); ?>
						</li>
						<li class="nav-item">
							<?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'signup'), array('class' => 'nav-link')); ?>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container mt-4">
		<?php echo $this->Flash->render(); ?>
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>

	<footer class="bg-dark text-white text-center py-3 footer">
		<div class="container">
			&copy; <?php echo date('Y'); ?> EZC Assessment
		</div>
	</footer>

</body>
</html>
