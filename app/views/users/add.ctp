<?php

?>
<script type="text/javascript" >
    $(function(){
        tipocuenta($('#UserRol').val());
        $('#UserRol').change(function(){
            tipocuenta($(this).val());
        });
        function tipocuenta(tipo){
            if((tipo == 'administrador') || (tipo == 'postulante')){
                $('#UserClientId').slideUp('fast', function(){
                    $('#UserClientIdNone').slideDown('fast');
                });
            }else{
                $('#UserClientIdNone').slideUp('fast', function(){
                    $('#UserClientId').slideDown('fast');
                });
            }
        }
    });
</script>
<style type="text/css" >
    #UserClientIdNone{
        display: none;
}
#UserRole{
    width: 210px;
}
</style>
<div>
    <h1 class="private-title"> <span id="logo-add">Agregar nuevo usuario</span></h1>

    <?php echo $this->Form->create('User', array('action' => 'add', 'id' => 'userFormAdd')) ?>
    <fieldset>
        <?php echo $this->Form->input('Client.name', array('label' => 'Nombre y Apellido')); ?>
        <?php echo $this->Form->input('Client.email'); ?><br><br>
        <?php echo $this->Form->input('User.role', array('label' => 'Tipo de Usuario', 'options' => $roles)); ?>
        <?php echo $this->Form->input('User.password', array('label' => 'Contraseña')); ?><br><br>
        <?php if ($this->Session->read('rol') == 'admin') echo $this->Form->input('User.client_id', array('before'=>'<span class="message-small" style="width: 360px;" id="UserClientIdNone">La cuenta no sera asignada a ningun cliente, se registrara uno nuevo</span>','label' => 'La cuenta sera asignada al cliente', 'options' => $clientes)); ?>
    </fieldset>
    <br />
    <input type="submit" value="Agregar" class="button submit" />
<?php $this->Form->end();?>
</div>
