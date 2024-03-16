<div class="table-responsive">
	<h2><?php echo __('Users'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th scope="col"><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th scope="col"><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th scope="col"><?php echo $this->Paginator->sort('email'); ?></th>
			<th scope="col"><?php echo $this->Paginator->sort('phone_number'); ?></th>
			<th scope="col"><?php echo $this->Paginator->sort('is_admin'); ?></th>
			<th scope="col"><?php echo $this->Paginator->sort('address'); ?></th>
			<th scope="col"><?php echo $this->Paginator->sort('state'); ?></th>
			<?php if (AuthComponent::user() && AuthComponent::user('is_admin') == 1) { ?>
			<th  scope="col" class="actions"><?php echo __('Actions'); ?></th>
			<?php } ?>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr class="<?php if(AuthComponent::user('id') == $user['User']['id']) { echo 'table-info'; } ?>">

		<td><?php echo h($user['User']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['phone_number']); ?>&nbsp;</td>
		<td><?php if ($user['User']['is_admin']) { echo "Admin"; } else { echo "User"; }; ?>&nbsp;</td>
		<td><?php echo h($user['User']['address']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['state']); ?>&nbsp;</td>
		<td class="actions">
			<?php if (AuthComponent::user() && AuthComponent::user('is_admin') == 1) { ?>
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['first_name']))); ?>
			<?php } ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<nav aria-label="page navigation example">
		<ul class="pagination">
			<li class="page-item"><?php echo $this->Paginator->prev('< ' . __('previous'), array('class' => 'page-link'), null, array('class' => 'page-link prev disabled'))?></li>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'class' => 'page-link')); ?>
			<li class="page-item"><?php echo $this->Paginator->next(__('next') . ' >', array('class' => 'page-link'), null, array('class' => 'page-link next disabled'));?></a></li>
		</ul>
	</nav>
</div>
<!--<div class="actions">-->
<!--	<h3>--><?php //echo __('Actions'); ?><!--</h3>-->
<!--	<ul>-->
<!--		<li>--><?php //echo $this->Html->link(__('New User'), array('action' => 'add')); ?><!--</li>-->
<!--	</ul>-->
<!--</div>-->


