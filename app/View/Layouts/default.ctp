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
		<?php //echo $cakeDescription ?>:
		<?php //echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('app');

		echo $this->fetch('script');
		echo $this->Html->script('bootstrap.min')
	?>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-custom-navbar">
		<div class="container">
			<a class="navbar-brand" href="#">
				<?php echo $this->Html->link('EZC Assessment', array('controller' => 'pages', 'action' => 'display', 'home')); ?>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse d-flex ms-auto" id="navbarNav">
				<ul class="navbar-nav">
<!--					<li class="nav-item">-->
<!--						--><?php //echo $this->Html->link('Home', array('controller' => 'pages', 'action' => 'display', 'home'), array('class' => 'nav-link')); ?>
<!--					</li>-->
<!--					<li class="nav-item">-->
<!--						--><?php //echo $this->Html->link('About', array('controller' => 'pages', 'action' => 'display', 'about'), array('class' => 'nav-link')); ?>
<!--					</li>-->
					<li class="nav-item">
						<?php echo $this->Html->link('Signup', array('controller' => 'users', 'action' => 'signup'), array('class' => 'nav-link')); ?>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container mt-4">
		<?php echo $this->Flash->render(); ?>
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>

	<footer class="bg-dark text-white text-center py-3">
		<div class="container">
			&copy; <?php echo date('Y'); ?> EZC Assessment
		</div>
	</footer>

</body>
</html>
