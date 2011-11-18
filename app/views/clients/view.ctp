<div id="mis-datos">
    <h1 class="private-title" style="margin: 0px;"> <span id="logo-aplicantes">Datos del cliente</span> <span style="float: right; margin-right: 10px;"> <?php echo $this->Html->link($this->Html->image('cerrar.png', array('alt'=>'ver', 'style'=>'border:none')), '#', array('escape'=>false, 'class'=>'closeDOMWindow')); ?></span> </h1>
    <div class="left" style="width: 400px;">
    <?php 
    if($client['Client']['type'] == 0){
    ?>
        <div><a style="color:#727272; font-weight: bold;">Nombre: </a> <?php echo $client['Client']['name'].' '.$client['Client']['last_name']; ?></div>
        <div><a style="color:#727272; font-weight: bold;">Direcci&oacute;n: </a> <?php echo $client['Client']['address'] ?></div>
        <div><a style="color:#727272; font-weight: bold;">Tel&eacute;fono:  </a>  <?php if(isset($client['Client']['area'])){echo $client['Client']['area'].'-'.$client['Client']['phone'];}else{ echo $client['Client']['phone'];}?></div>
        <div><a style="color:#727272; font-weight: bold;">C&oacute;digo postal: </a> <?php echo $client['Client']['cod_postal'] ?></div>
        <div><a style="color:#727272; font-weight: bold;">E-mail:  </a> <?php echo $client['Client']['email'] ?></div>        
    <?php }else{ ?>
        <div><a style="color:#727272; font-weight: bold;">Nombre de la empresa: </a> <?php echo $client['Client']['name']; ?></div>
        <div><a style="color:#727272; font-weight: bold;">C&oacute;digo Cuit: </a> <?php echo $client['Client']['cuit']; ?></div>
        <div><a style="color:#727272; font-weight: bold;">Rubro de la empresa: </a> <?php echo $client['Client']['rubro_empresa']; ?></div>
        <div><a style="color:#727272; font-weight: bold;">Direcci&oacute;n: </a> <?php echo $client['Client']['address'] ?></div>
        <div><a style="color:#727272; font-weight: bold;">E-mail:  </a> <?php echo $client['Client']['email'] ?></div>
        <div><a style="color:#727272; font-weight: bold;">C&oacute;digo postal: </a> <?php echo $client['Client']['cod_postal'] ?></div>
        <div><a style="color:#727272; font-weight: bold;">Tel&eacute;fono:  </a>  <?php if(isset($client['Client']['area'])){echo $client['Client']['area'].'-'.$client['Client']['phone'];}else{ echo $client['Client']['phone'];}?></div>        
        <div><a style="color:#727272; font-weight: bold;">Nombre de contacto:  </a> <?php echo $client['Client']['contact_name'] ?></div>
        <div><a style="color:#727272; font-weight: bold;">Email de contacto:  </a> <?php echo $client['Client']['email_contact'] ?></div>
    <?php }?>
        
    </div>
    <div class="right">
        <div id="logo">
            <?php echo $this->Html->image(($client['Client']['logo'] == '') ? 'private/logo-blank.png' : $client['Client']['logo'], array('alt' => 'Logo cliente', 'width' => 150, 'height' => 150, 'id' => 'mi-logo')); ?>
        </div>
    </div>
    <div style="clear: both; border-bottom: none;height: 1px;"></div>
    <div id="users-loaded" class="related">
        <h3 class="private-title"  style="margin: 0px;">Cuentas relacionadas a este cliente  </h3>
        <?php if (!empty($client['User'])){ ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr id="list-users-header">
                <td><span> Cuenta</span></td>
                <td><span>Referencia</span></td>
                <td class="actions"></td>
            </tr>
            <?php foreach ($client['User'] as $user){ ?>
                <tr>

                    <td><span><?php echo $user['username']; ?></span></td>
                    <td><?php echo $user['role']; ?></td>
                    <td class="actions">
                <?php //echo $this->Html->link($this->Html->image('ver.png', array('alt'=>'ver', 'style'=>'border:none')), array('controller' => 'users', 'action' => 'view', $user['id']), array('escape'=>false, 'class'=>'fixedAjaxDOMWindow')); ?>
                <?php //echo $this->Html->link($this->Html->image('pen.png', array('alt'=>'modificar', 'style'=>'border:none')), array('controller' => 'users', 'action' => 'edit', $user['id']), array('escape'=>false, 'class'=>'fixedAjaxDOMWindow')); ?>
                <?php echo ($user['role']!='administrador' )? $this->Html->link($this->Html->image('eliminar.png', array('alt'=>'eliminar', 'style'=>'border:none')), array('controller' => 'users', 'action' => 'delete', $user['id']), array('escape'=>false), sprintf('Esta seguro que desea eliminar esta cuenta "%"?', $user['username'])):''; ?>
            </td>
        </tr>
        <?php } ?>
        </table>
        <?php } ?>
        
    </div>
    <div class="related">
        <h3 class="private-title"  style="margin: 0px;" >Selecciones realizadas por este cliente</h3>
        <?php if (!empty($client['Selection'])) {?>
        <table cellpadding = "0" cellspacing = "0">
            <tr id="list-users-header">
                <td><span>Titulo</span></td>
                <td><span>Referencia</span></td>
                <td><span>Inicia</span></td>
                <td><span>Concluye</span></td>
                <td><span>Entrevistas</span></td>
                <td class="actions"></td>
            </tr>
            <?php foreach ($client['Selection'] as $selection) { ?>
            <tr>
                <td><span>Titulo de la seleccion</span></td>
                <td><span><?php echo $selection['reference']; ?></span></td>
                <td><?php echo date('d-m-Y')?></td>
                <td><?php echo date('d-m-Y', strtotime('now +7 days'))?></td>
                <td><span>7 postulantes</span></td>
                <td class="actions">
                    <?php echo $this->Html->link($this->Html->image('ver.png', array('alt'=>'ver', 'style'=>'border:none')), array('controller' => 'selections', 'action' => 'view', $selection['id']), array('escape'=>false, 'class'=>'fixedAjaxDOMWindow')); ?>
                </td>
            </tr>
            <?php } ?>
        </table>
        <?php } ?>
     </div>
</div>
