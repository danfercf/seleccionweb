<div class="interviews form">
<?php echo $this->Form->create('Interview');?>
	<fieldset>
 		<legend><?php __('Edit Interview'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('applicant_id');
		echo $this->Form->input('url_interview');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Interview.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Interview.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Interviews', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Applicants', true), array('controller' => 'applicants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Applicant', true), array('controller' => 'applicants', 'action' => 'add')); ?> </li>
	</ul>
</div>