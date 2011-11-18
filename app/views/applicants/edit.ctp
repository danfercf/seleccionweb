<div class="applicants form">
<?php echo $this->Form->create('Applicant');?>
	<fieldset>
 		<legend><?php __('Edit Applicant'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('selecction_id');
		echo $this->Form->input('name');
		echo $this->Form->input('gender');
		echo $this->Form->input('birth');
		echo $this->Form->input('address');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Applicant.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Applicant.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Applicants', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Selecctions', true), array('controller' => 'selecctions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selecction', true), array('controller' => 'selecctions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ratings', true), array('controller' => 'ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rating', true), array('controller' => 'ratings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interviews', true), array('controller' => 'interviews', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interview', true), array('controller' => 'interviews', 'action' => 'add')); ?> </li>
	</ul>
</div>