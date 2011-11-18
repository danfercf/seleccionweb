<?php
echo $this->Html->script('validate/jquery.validate.js');

?>
<style type="text/css"  >
    #box-members {
    margin: auto;
    width: 330px;
    float: none;
    margin-top:  50px;
    margin-bottom: 50px;

}
#authMessage{
    -moz-border-radius: 5px 5px 5px 5px;
    background: url("../img/exclamation.png") no-repeat scroll 5px center #FEF1EC;
    border: 1px solid #CC0000;
    color: red;
    float: none;
    font-size: 11px;
    margin: 0 5px;
    padding :5px;
    padding-left: 30px;
    position: relative;


}
#box-members form fieldset p{
    font-size: 12px;
    color: #6A6A6A;
}
</style>
<script type="text/javascript" >
    $(function(){
        $("#forgot-password").validate();
    });
</script>
<div id="main-content">
    <div id="box-members">
       <?php echo $this->Session->flash(); ?>
       <?php echo $this->Form->create('User', array('action'=>'forgot_password', 'id'=>'forgot-password', 'class'=>'form-seleccionweb'))?>
       <div class="cont-login-top">
            <h2>Recuperar contrase&ntilde;a</h2>
        </div>
        <ul class="cont-login-center">
            <li>
                <p>
                    Por favor, introduzca la direcci&oacute;n de correo electr&oacute;nico que
                    utiliz&oacute; para registrarse en su cuenta a continuaci&oacute;n.                
                    Su nueva contrase&ntilde;a sera enviada a su correo, si persiste
                    el problema borre el cache de su navegador.
                </p>
            </li>
            <li>
                <label>E-mail</label>
                <?php
                    echo $this->Form->input('username', array('label'=>'', 'div'=>false, 'id'=>'username-login', 'class'=>'required email'))
                ?>                                    
            </li>
            <li class="form-login-buttom">
               <button>Enviar</button>
            </li>
        </ul>
        <div class="cont-login-bottom"></div> 
        <?php echo $this->Form->end();?>
    </div>
</div>
