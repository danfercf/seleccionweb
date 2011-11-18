<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script type="text/javascript"  >
$(function(){
    $('#add-creditos').click(function(){
        $('#add-c').toggle();
    });
});
</script>

<div id="mis-datos" class="datos">
    <h1 class="private-title" style="margin: 0px;"> <span id="logo-aplicantes">Datos del cliente</span> <span style="float: right; margin-right: 10px;"> <?php echo $this->Html->link($this->Html->image('cerrar.png', array('alt'=>'ver', 'style'=>'border:none')), '#', array('escape'=>false, 'class'=>'closeDOMWindow')); ?></span> </h1>
    <div class="left" style="width: 400px;">
    <?php if($user['Client']['type'] == 0){?>
        <div><a style="color:#727272; font-weight: bold;">Nombre: </a> <?php echo $user['Client']['name'].' '.$user['Client']['last_name']; ?></div>
        <div><a style="color:#727272; font-weight: bold;">Direcci&oacute;n: </a> <?php echo $user['Client']['address'] ?></div>
        <div><a style="color:#727272; font-weight: bold;">Tel&eacute;fono:  </a>  <?php if(isset($user['Client']['area'])){echo $user['Client']['area'].'-'.$user['Client']['phone'];}else{ echo $user['Client']['phone'];}?></div>
        <div><a style="color:#727272; font-weight: bold;">C&oacute;digo postal: </a> <?php echo $user['Client']['cod_postal'] ?></div>
        <div><a style="color:#727272; font-weight: bold;">E-mail:  </a> <?php echo $user['Client']['email'] ?></div>      
    <?php }else{ ?>
        <div><a style="color:#727272; font-weight: bold;">Nombre de la empresa: </a> <?php echo $user['Client']['name']; ?></div>
        <div><a style="color:#727272; font-weight: bold;">C&oacute;digo Cuit: </a> <?php echo $user['Client']['cuit']; ?></div>
        <div><a style="color:#727272; font-weight: bold;">Rubro de la empresa: </a> <?php echo $user['Client']['rubro_empresa']; ?></div>
        <div><a style="color:#727272; font-weight: bold;">Direcci&oacute;n: </a> <?php echo $user['Client']['address'] ?></div>
        <div><a style="color:#727272; font-weight: bold;">E-mail:  </a> <?php echo $user['Client']['email'] ?></div>
        <div><a style="color:#727272; font-weight: bold;">C&oacute;digo postal: </a> <?php echo $user['Client']['cod_postal'] ?></div>
        <div><a style="color:#727272; font-weight: bold;">Tel&eacute;fono:  </a>  <?php if(isset($user['Client']['area'])){echo $user['Client']['area'].'-'.$user['Client']['phone'];}else{ echo $user['Client']['phone'];}?></div>        
        <div><a style="color:#727272; font-weight: bold;">Nombre de contacto:  </a> <?php echo $user['Client']['contact_name'] ?></div>
        <div><a style="color:#727272; font-weight: bold;">Email de contacto:  </a> <?php echo $user['Client']['email_contact'] ?></div> 
    <?php } ?>
        <h3>Datos de la cuenta </h3>
        <?php if($user['User']['role']!='video' && $user['User']['role']!='admin'){?>
        <div><a style="color:#727272;">Video selecciones restantes: </a> <?php echo $user['User']['credit'] ?> <?php if($user['User']['role']!='administrador'){ ?><span id="add-creditos" style="color: red;">agregar creditos</span><?php }?> </div>
        <div  id="add-c" class="formulario-oculto "><?php
            echo $this->Form->create('User', array('action' => 'edit'));
            ?>
            <input name="data[User][credit]" type="text" size="5"> <a style="font-size: 12px; color: #727272; font-weight: normal;">Video Selecciones</a>
            <input type="hidden" name="data[User][id]" value="<?php echo $user['User']['id']?>">
            <input type="submit" value="agregar creditos" class="button" style="width: 100px;">
            <?php
            echo $this->Form->end();
            ?>
        </div>
        <?php }?>
        <div><a style="color:#727272;">Titular de la cuenta: </a> <?php echo $user['User']['owner'] ?></div>
        <div><a style="color:#727272;">Nombre de la cuenta: </a> <?php echo $user['User']['username'] ?></div>
        <div><a style="color:#727272;">Tipo de cuenta: </a> <?php echo $user['User']['role'] ?></div>
        <div><a style="color:#727272;">La cuenta fue creada el :  </a> <?php echo $user['User']['created'] ?></div>
        <div><a style="color:#727272;">Ultima modificacion:  </a>  <?php echo $user['User']['modified'] ?></div>

    </div>
    <div class="right">
        <div id="logo">
            <?php echo $this->Html->image(($user['Client']['logo'] == '') ? 'private/logo-blank.png' : $user['Client']['logo'], array('alt' => 'Logo cliente', 'width' => 150, 'height' => 150, 'id' => 'mi-logo')); ?>
        </div>
    </div>
    <div style="clear: both; border-bottom: none;height: 1px;"></div>
    <?php if($user['User']['role']!='video'){?>
    <div class="related">
        <h3 class="private-title"  style="margin: 0px;" >Selecciones realizadas por este cliente</h3>
        <?php if (!empty($user['Selecction'])) {?>
        <table cellpadding = "0" cellspacing = "0">
            <tr id="list-users-header">
                <td><span>Titulo</span></td>
                <td><span>Referencia</span></td>
                <td><span>Inicia</span></td>
                <td><span>Concluye</span></td>
                <td><span>Entrevistas</span></td>
                <td class="actions"></td>
            </tr>
            <?php foreach ($user['Selecction'] as $selection) { ?>
            <tr <?php echo ($selection['status']==0)?'class="activo"':'';?>>
                <td><span><?php echo $selection['name'];?></span></td>
                <td><span><?php echo $selection['reference']; ?></span></td>
                <td><?php echo $selection['start']?></td>
                <td><?php echo $selection['end']?></td>
                <td><span><?php echo $selection['sent']."/".$selection['answered']?> postulantes</span></td>
                <td class="actions">
                    <?php echo $this->Html->link($this->Html->image('ver.png', array('alt'=>'ver', 'style'=>'border:none')), array('controller' => 'selecctions', 'action' => 'view', $selection['id']), array('escape'=>false, 'class'=>'fixedAjaxDOMWindow')); ?>
                </td>
            </tr>
            <?php } ?>
        </table>
        <?php
        } else {
            echo "<p>No tiene selecciones creadas</p>";
        }
        ?>

     </div>
    <?php }?>
</div>
