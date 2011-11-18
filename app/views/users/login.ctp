<?php
$e = $this->requestAction("/languages/reader/etiqueta");
$b = $this->requestAction("/languages/reader/botones");
$ba = $this->requestAction("/languages/reader/banner");
$f = $this->requestAction("/languages/reader/form");
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
        margin: 0 5px 0 0;
        padding :5px;
        padding-left: 30px;
        position: relative;


    }
</style>

<div id="main-content">
    <div id="box-members">
        <?php echo $this->Form->create('User', array('action' => 'login', 'id' => 'login-members', 'class' => 'form-seleccionweb')) ?>
        <div class="cont-login-top">
            <h2>Acceso a clientes</h2>
        </div>
        <ul class="cont-login-center">
            <li>
                <?php echo $session->flash('auth'); ?>
            </li>
            <li>
                <label>Usuario</label>
                <?php
                echo $this->Form->input('username', array('label' => '', 'div' => false, 'id' => 'username-login'))
                ?>                                     
            </li>
            <li>
                <label>Contrase&ntilde;a</label>
                <?php
                echo $this->Form->input('password', array('label' => '', 'div' => false, 'id' => 'password-login'))
                ?>                                         
            </li>
            <li>
                <?php echo $this->Html->link('Olvido su contraseña ?', array('controller' => 'users', 'action' => 'forgot_password')) ?>                                                                           
            </li>
            <li class="form-login-buttom">
               <button>Entrar</button>
            </li>
        </ul>
        <div class="cont-login-bottom"></div>  
        <?php echo $this->Form->end(); ?>
    </div>
</div>
