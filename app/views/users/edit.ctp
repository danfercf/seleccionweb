<script type="text/javascript"  >
$(function(){
    $('select').msDropDown().data("dd");
});
</script>
<h1 class="private-title" style="margin: 0px;"> <span id="logo-aplicantes">Datos de la cuenta</span> <span style="float: right; margin-right: 10px;"> <?php echo $this->Html->link($this->Html->image('cerrar.png', array('alt'=>'ver', 'style'=>'border:none')), '#', array('escape'=>false, 'class'=>'closeDOMWindow')); ?></span> </h1>
<div class="users form" style="margin-top: 30px;">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend>Editar cuenta de usuario</legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('client_id', array('value'=>$this->data['Client']['id'], 'type'=>'hidden'));
		echo $this->Form->input('owner' , array('label'=>'Titular de la cuenta'));
		echo $this->Form->input('username', array('label'=>'Nombre de Usuario'));
        //echo $this->Form->input('password', array('label'=>'Contrase&ntilde;a'));
		echo $this->Form->input('active', array('label'=>'Cuenta Activa'));
		echo $this->Form->input('role', array('style'=>'width:305px;margin-right:100px;', 'label'=>'Rol de la cuenta', 'options'=>array('administrador'=>'Cliente Administrador','cliente' =>'Usuario Cliente', 'video'=>'Video Usuario')));
        if ($this->Session->read('rol') == 'administrador' || $this->Session->read('rol') == 'admin') {
            
        if ($us['User']['role'] == 'administrador' ) 
           echo "<br/>".$this->Form->input('credit', array('label'=>'Agregar Credito?, actual('.$us['User']['credit'].')','value'=>''));
            
        }
	?>
	</fieldset>
    <div style="clear: both; height: 20px;"></div>
    <input type="submit" class="button button-gray" value="actualizar">
<?php echo $this->Form->end();?>
</div>
<!--pre><?php print_r ($us)?></pre-->
