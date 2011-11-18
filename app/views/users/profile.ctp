<?php
echo $this->Html->script('jquery/jquery.DOMWindow.js');
echo $this->Html->css('tablas-seleccionweb.css');
echo $this->Html->script('qtip/jquery.qtip-1.0.0-rc3.min.js');
echo $this->Html->css('forms.css');
$this->set('empresa', $this->Session->read('user'));
$this->set('tab', 'profile');
$this->set('mensages', isset($more['Message']) ? count($more['Message']) : 0);
?>


<script type="text/javascript">
    $(function(){
        $('#cuenta').tabs();
        $( "#accordion" ).accordion({
			autoHeight: false,
			navigation: true
		});
        var vacio="";
        var listado=$('.ac_0');
        for (i=0;i<listado.length;i++)
        { vacio+="<div style=' padding: 2px 0px'>"+$(listado[i]).html()+"</div>"; }
        $("#secc0").html(vacio)
        listado.remove();
        
        var vacio="";
        var listado=$('.ac_1');
        for (i=0;i<listado.length;i++)
        { vacio+="<div style=' padding: 2px 0px'>"+$(listado[i]).html()+"</div>"; }
        $("#secc1").html(vacio)
        listado.remove();
        
         var vacio="";
        var listado=$('.ac_2');
        for (i=0;i<listado.length;i++)
        { vacio+="<div style=' padding: 2px 0px'>"+$(listado[i]).html()+"</div>"; }
        $("#secc2").html(vacio)
        listado.remove();
        
        
        $("#myTable").tablesorter();
         var sorting = [[1,0],[0,0]];
         
        $("#myTable").trigger("sorton",[sorting]);
        
        //$('input[type="radio"]').ezMark();
        //$('select').msDropDown().data("dd");
        $('#b-nombre').click(function(){
            $('#c-nombre').toggle('slow');
        });
        $('#b-email').click(function(){
            $('#c-email').toggle('slow');
        });
        $('#b-password').click(function(){
            $('#c-password').toggle('slow');
        });
        $('#b-telefono').click(function(){
            $('#c-telefono').toggle('slow');
        });
        $('#b-foto').click(function(){
            $('#c-foto').toggle('slow');
        });
        $('#mostrar-logo').click(function(){
            $('#mi-logo').slideDown('slow');
        });
        $('#ocultar-logo').click(function(){
            $('#mi-logo').slideUp('slow');
        });
         $('.box_concluidas').hide('fast');
        
         $('.concluidas').click(function(){
            $('.box_concluidas').toggle('fast');
        });
        
        

        $('.fixedAjaxDOMWindow').openDOMWindow({
            height:450,
            width:630,
            eventType:'click',
            loader:1,
            loaderImagePath:'<?php echo $this->Html->url('/') ?>img/ajax-loader.gif',
            loaderHeight:16,
            loaderWidth:17,
            windowSource:'ajax',
            windowHTTPType:'post'
        });
        $('.fixedAjaxDOMWindow2').openDOMWindow({
            height:500,
            width:940,
            eventType:'click',
            loader:1,
            loaderImagePath:'<?php echo $this->Html->url('/') ?>img/ajax-loader.gif',
            loaderHeight:16,
            loaderWidth:17,
            windowSource:'ajax',
            windowHTTPType:'post'
        });
        
         $("#cuenta a.ss").qtip({
            content: 'Administre las Selecciones',
            corner: {
                target: 'leftTop',
                tooltip: 'bottomLeft'
            },
            style: {
                width: 180,
                height: 20,
                padding: 0,
                background: '#4077A8',
                color: 'white',
                textAlign: 'center',
                border: {
                    width: 2,
                    radius: 3,
                    color: '#4077A8'
                },
                tip: { // Now an object instead of a string
                    corner: 'topLeft', // We declare our corner within the object using the corner sub-option
                    color: '#4077A8',
                    size: {
                        x: 20, // Be careful that the x and y values refer to coordinates on screen, not height or width.
                        y : 8 // Depending on which corner your tooltip is at, x and y could mean either height or width!
                    }
                }
            }

        });
        $("a.del_user").qtip({
            content: 'Eliminar Usuario',
            corner: {
                target: 'leftTop',
                tooltip: 'bottomLeft'
            },
            style: {
                width: 140,
                height: 20,
                padding: 0,
                background: '#4077A8',
                color: 'white',
                textAlign: 'center',
                border: {
                    width: 2,
                    radius: 3,
                    color: '#4077A8'
                },
                tip: { // Now an object instead of a string
                    corner: 'topLeft', // We declare our corner within the object using the corner sub-option
                    color: '#4077A8',
                    size: {
                        x: 20, // Be careful that the x and y values refer to coordinates on screen, not height or width.
                        y : 8 // Depending on which corner your tooltip is at, x and y could mean either height or width!
                    }
                }
            }

        });
        
        
        $("a.fixedAjaxDOMWindow").qtip({
            content: 'Ver datos y<br/>asignar creditos a Usuario',
            corner: {
                target: 'leftTop',
                tooltip: 'bottomLeft'
            },
            style: {
                width: 180,
                height: 40,
                padding: 0,
                background: '#4077A8',
                color: 'white',
                textAlign: 'center',
                border: {
                    width: 2,
                    radius: 3,
                    color: '#4077A8'
                },
                tip: { // Now an object instead of a string
                    corner: 'topLeft', // We declare our corner within the object using the corner sub-option
                    color: '#4077A8',
                    size: {
                        x: 20, // Be careful that the x and y values refer to coordinates on screen, not height or width.
                        y : 8 // Depending on which corner your tooltip is at, x and y could mean either height or width!
                    }
                }
            }

        });
        
        
    });

</script>


<style type="text/css">
    .ui-tabs-nav li.ui-tabs-selected{

        background: #F5F5F5 scroll repeat;
        border-top: #5B8EBB 2px solid!important;
        color: #5B8EBB;
    }
    .ui-tabs .ui-tabs-nav {
        margin: 0;
        padding: 0;
    }
    .ui-tabs .ui-tabs-nav li.ui-tabs-selected, .ui-tabs .ui-tabs-nav li {
        width: 150px;
        padding: 0px !important;
        height: 30px;
        border-top-width: 0;
        margin-right: 0;
        border-left-width: 0px; border-right-width: 0px; bottom: 0px; top: 0px;

    }
    .ui-tabs .ui-tabs-nav li a {
        width: 100px;
        font-size: 10px;
        font-weight: bold;
    }
    .ui-tabs .ui-tabs-nav li.ui-tabs-selected a{
        color: #5b8ebb;
    }
    .ui-tabs .ui-tabs-nav lu{
        border-width: 0 !important;
    }
    .ui-widget-content {
        background-color: #F5F5F5 !important;
    }
    .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
        background: none repeat scroll 0 0 #FFFFFF;
        border: 1px solid #D3D3D3;
        color: #555555;
        font-weight: normal;
    }
    .ui-corner-all {
        -moz-border-radius: 0px 0px 0px 0px !important;
    }

    .ui-widget-header {
        background: #f5f5f5;        
        color: #222222;
        font-weight: bold;
    }
    #cuenta{
        border-width: 0px;
        padding: 0px;
    }
    #cuenta ul{
        border: none;
    }
    #selecciones-creadas, #preguntas-disponibles{
        color: #A3A3A3;
        font-size: 10px;
        font-weight: bold;
        overflow: hidden;
    }
    #preguntas-disponibles div{
        margin: 10px 0px;
    }
    #selecciones-creadas span, #preguntas-disponibles span{
        color: #5B8EBB;
        font-weight: bold;
        font-size: 10px;
        float: right;
    }
    .inactive{
        color: #A3A3A3 !important;
        font-weight: normal !important;
    }
    .ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited {
        color: #9f9f9f;
        text-decoration: none;
    }

    #mis-datos div div#logo {
        border-bottom: none;
    }
    #mis-datos div div#logo div{
        width: 395px;
        margin-left: 200px;
    }
    #mis-datos div div#logo div#view-logo{
        border: none;
        font-weight: normal;
        color: #727272;
    }
    .spacing{
        margin-left: 50px;
    }
    .clear_space_2h{
        clear: both;
        height: 20px;
    }

    #userFormAdd{
       /* width: 620px; */
        
        margin: auto;
        padding: 20px 0px;
        color: #A4A4A4;

    }
    #userFormAdd fieldset label{
        color: #A4A4A4;
    }
    #userFormAdd fieldset input{
        border-top: 2px #A4A4A4 ridge;
        width: 205px;
        margin-right: 10px;
        background-color: #F8F8F8;
        font-size: 80%;
    }
    .button{
        text-align: center;
        color: #FFFFFF;
        font-size: 10px;
        font-weight: bold;
        background: #365E8F !important;
        width: 50px !important;
        float: right;
        border: medium none;
        margin-right: 5px;
        cursor: pointer;
    }
    .button.submit{
        background-image: url(../img/private/button-submit.png) !important;
        height: 24px !important;
        margin-right: 10px;
        width: 150px !important;
    }

    .pending-messages{
        float: right;
    }
    .formulario-oculto{
        display: none;
    }
    select#UserRol{
        width: 189px;
        margin-left: 25px;
    }
    select#UserClientId{
        width: 400px;
    }
    .concluidas{
        cursor: pointer;
    }

</style>

<div id="mis-datos" class="left-private datos">
    <div>
        <h1 class="private-title"> <span id="logo-aplicantes">Mis Datos</span> </h1>
        <div><a style="color:#727272;">Nombre: </a> <?php echo utf8_encode($profile['Client']['name']." ".$profile['Client']['last_name']); ?> <?php if ($this->Session->read('rol') != 'video') { ?><span id="b-nombre">modificar</span><?php } ?> </div>
        <div id="c-nombre" class="formulario-oculto ">
            <?php
            echo $this->Form->create('Client', array('action' => 'edit'));
            ?>            
           <?php if($profile['Client']['type'] == 0){ ?>
            <span style="float: none; cursor: default; font-size: 11px;">Nuevo nombre : </span>
            <input name="data[Client][name]" type="text" size="25"/>
            <span style="float: none; cursor: default; font-size: 11px;">Nuevo apellido : </span>
            <input name="data[Client][last_name]" type="text" size="25"/>
            <?php }else{ ?>
            <span style="float: none; cursor: default; font-size: 11px;">Nuevo nombre de la empresa : </span>
            <input name="data[Client][name]" type="text" size="40"/>   
            <?php } ?>
            <input type="hidden" name="data[Client][id]" value="<?php echo $profile['Client']['id'] ?>"/>
            <input type="submit" value="cambiar" class="button"/>
            <?php
            echo $this->Form->end();
            ?>
        </div>
        <div><a style="color:#727272;">E-mail:  </a> <?php echo $profile['User']['username'] ?><span  id="b-email">modificar</span></div>
        <div  id="c-email" class="formulario-oculto "><?php
            echo $this->Form->create('Client', array('action' => 'edit'));
            ?>
            <span style="float: none; cursor: default; font-size: 11px;">Nuevo Email : </span>
            <input name="data[Client][email]" type="text" size="45"/>
            <input type="hidden" name="data[Client][id]" value="<?php echo $profile['Client']['id'] ?>"/>
            <input type="submit" value="cambiar" class="button"/>
            <?php
            echo $this->Form->end();
            ?>
        </div>
        <div><a style="color:#727272;">Telefono:  </a><?php echo $profile['Client']['area'] ?> - <?php echo $profile['Client']['phone'] ?><?php if ($this->Session->read('rol') != 'video') { ?><span  id="b-telefono" >modificar</span><?php } ?></div>
        <div id="c-telefono" class="formulario-oculto "><?php
            echo $this->Form->create('Client', array('action' => 'edit'));
            ?>
            <span style="float: none; cursor: default; font-size: 11px;">Nueva &Aacute;rea de tel&eacute;fono : </span>
            <input name="data[Client][area]" type="text" size="10"/>
            <span style="float: none; cursor: default; font-size: 11px;">Nuevo numero de tel&eacute;fono : </span>
            <input name="data[Client][phone]" type="text" size="20"/>
            <input type="hidden" name="data[Client][id]" value="<?php echo $profile['Client']['id'] ?>"/>
            <input type="submit" value="cambiar" class="button"/>
            <?php
            echo $this->Form->end();
            ?>
        </div>
        <div><a style="color:#727272;">Contrase&ntilde;a  : </a>  <?php echo $profile['User']['password'] ?> <a style="color: #A3A3A3; font-weight: normal;">(contrase&ntilde;a cifrada)</a> <span   id="b-password">modificar</span></div>
        <div id="c-password" class="formulario-oculto "><?php
            echo $this->Form->create('User', array('action' => 'edit'));
            ?>
            <input type="hidden" name="data[User][id]" value="<?php echo $profile['User']['id'] ?>"/>
            <span style="float: none; cursor: default; font-size: 11px;">Nueva contraseña : </span>
            <input name="data[User][password]" type="password"  size="20"/>
            <span style="float: none; cursor: default; font-size: 11px;">Repetir contraseña : </span>
            <input name="data[User][password]" type="password"  size="20"/>
            <input type="submit" value="cambiar" class="button"/>
            <?php
            echo $this->Form->end();
            ?>
        </div>
        <div id="logo">
            <?php echo $this->Html->image(($profile['Client']['logo'] == '') ? 'private/logo-blank.png' : $profile['Client']['logo'], array('alt' => 'Logo cliente', 'width' => 150, 'height' => 150, 'id' => 'mi-logo')); ?>

            <div>Logo Actual <?php if ($this->Session->read('rol') != 'video') { ?><span id="b-foto">Cambiar logo</span><?php } ?></div>
            <div  id="c-foto" class="formulario-oculto "><?php
            echo $this->Form->create('Client', array('action' => 'edit', 'type' => 'file'));
            ?>
                <input name="data[Client][logo]" type="file"  size="30"/>
                <input type="hidden" name="data[Client][id]" value="<?php echo $profile['Client']['id'] ?>"/>
                <input type="submit" value="cambiar" class="button medium"/>
                <?php
                echo $this->Form->end();
                ?>
            </div>
            <?php if ($this->Session->read('rol') != 'video') {
 ?>
                    <div id="view-logo">
                        <input type="radio" id="mostrar-logo" checked="checked" name="verlogo"/> Mostrar logo
                        <input class="spacing" type="radio" id="ocultar-logo" name="verlogo"/> Ocultar logo
                    </div>
<?php } ?>

            </div>

        </div>
    <?php
                //$roles = array('admin' => 'Administrador General del sitio', 'administrador' => 'Cliente Administrador', 'cliente' => 'Usuario Cliente', 'video' => 'Video Usuario', 'postulante' => 'Postulante');
                    $roles = array('admin' => 'Administrador General del sitio', 'administrador' => 'Cliente Administrador', 'cliente' => 'Usuario Cliente', 'video' => 'Video Usuario', 'postulante' => 'Postulante');

                if ($profile['User']['role'] == 'admin' || $profile['User']['role'] == 'administrador') {
    ?>
                    <div id="users-loaded">
                        <h1 class="private-title"> <span id="logo-usuarios">Usuarios Cargados</span></h1>
        <table <?php if($profile['User']['role']!="admin") {?> class="tablesorter" id="myTable"  <?php }?> style="margin: 20px 0px 30px 0px;width: 97.5%; font-size: 12px;">
                        <thead> 
        <?php if($profile['User']['role']!="admin") {?>
                        <tr id="list-users-header"><th><span>Nombre</span></th><th><span>Referencia</span></th> <th><span>Credito</span></th><td style="width: 20px; background-color: white;"></td><td style="width: 20px; background-color: white;"></td></tr>
                     <?php } else {?>     
                     <tr id="list-users-header"><td><span>Nombre</span></td><td><span>Referencia</span></td> <td><span>Credito</span></td><td style="width: 20px; background-color: white;"></td><td style="width: 20px; background-color: white;"></td></tr>
                     
                     <?php }?>  
                            </thead> <tbody>
                               
                <?php
                    $usuarios = array();
                    if($profile['Client']['User']){
                    foreach ($profile['Client']['User'] as $user) {
                        array_push($usuarios, array(
                            "<span>" .htmlspecialchars($user['owner']) . "</span>",
                            $roles[$user['role']],"<span>" .$user['credit'] . "</span>",
                            $this->Html->link(
                                    $this->Html->image('ver.png', array('alt' => 'ver')),
                                    array('controller' => 'users', 'action' => 'view', $user['id']),
                                    array('escape' => false, 'class' => 'fixedAjaxDOMWindow')),
                            ($user['role'] != 'administrador') ? $this->Html->link(
                                            $this->Html->image('eliminar.png', array('alt' => 'eliminar')),
                                            array('controller' => 'users', 'action' => 'delete', $user['id']),
                                            array('class'=>'del_user','escape' => false), 'Esta seguro que desea eliminar este usuario?') : ''
                        ));
                    }

                    echo $this->Html->tableCells($usuarios);
                    }
                ?>
                </tbody>
            </table>
        </div>
        
    <?php
                   echo $this->requestAction('/users/add', array('return'));
                }
                
                if ($profile['User']['role'] == 'cliente' ) {
                     echo $this->requestAction('/users/add', array('return'));
                     }
                
    ?>
                <!--pre><?php print_r($apl) ?></pre-->

            </div>
            <div id="mi-estado" class="right-private" >
<?php if ($profile['User']['role'] != 'admin') { ?>
                    <div id="estado-cuenta">

                        <h1 id="panel-estado">Estado de su cuenta</h1>
<?php if ($this->Session->read('rol') != 'video') { ?>
                        <div id="cuenta">
                            <ul >
                                <li><a class="ss" href="#preguntas-disponibles">Selecciones Disponibles</a></li>
                                <li><a  class="ss" href="#selecciones-creadas">Selecciones creadas</a></li>
                            </ul>
                            <div id="preguntas-disponibles">
                            
<?php if (($profile['User']['role'] == 'administrador') || ($profile['User']['role'] == 'cliente')) { ?>
                            <div>Usted tiene disponibles <span><?php echo $profile['User']['credit'] ?> video selecciones</span> </div>
                            <div>Video selec. realizadas <span><?php echo $profile['User']['counter']; ?> video selecciones</span> </div>
<?php if ($profile['User']['role'] == 'administrador') { ?>
                                <div>Video selecc. contratadas <span><?php echo $profile['Client']['balance'] ?> video selecciones</span> </div>
                                <div style="text-align: right;margin-top: 50px;">Comprar mas video selecciones<?php echo $this->Html->link('contratar', array('controller' => 'clients', 'action' => 'purchase'), array('class' => 'button medium', 'style' => 'color:#FFFFFF; font-weight: normal; width: 80px !important; text-decoration: none; margin-left: 5px;')) ?></div>
<?php } else { ?>
                                <div class="clear_space_2h"></div>
                <?php }
                        } ?>
                    </div>
                    <div id="selecciones-creadas">
                <?php
                        if (!empty($profile['Selecction'])) {            
                ?>
                    <div id="accordion">
                    
                    <h3><a href="#">En Proceso</a></h3>
                        <div>
                            <div id="secc1"> </div>
                        </div>
                    <h3><a href="#">Guardadas</a></h3>
                        <div>
                            <div id="secc2"> </div>
                         </div>
                    <h3><a href="#">Concluidas</a></h3>
	                   <div>
                            <div id="secc0"> </div>
                        </div>
                    </div>
                <?php
                }
                        if (!empty($profile['Selecction'])) {
                            foreach ($profile['Selecction'] as $seleccion) {
                               
                ?>
                
                
                                <div class="ac_<?php echo $seleccion['status'];?>"><?php echo $this->Html->link($seleccion['name'], array('controller' => 'selecctions', 'action' => 'view', $seleccion['id']), array('style' => 'color: #A3A3A3; display: block; float: left; text-decoration: none; width: 160px;')); ?>
                            
                            <span class="($seleccion['status'])?'active': '' ?>">
                        <?php
                                $estados = array('concluido', 'en proceso', 'guardado');
                                echo $this->Html->link(
                                        $estados[$seleccion['status']],
                                        array(
                                            'controller' => 'selecctions',
                                            'action' => ($seleccion['status'] == 2) ? 'view' : 'activate',
                                            $seleccion['id'],
                                            ($seleccion['status'] == 2) ? null : !$seleccion['status']
                                ));
                        ?>
                            </span><span style="clear: both;"></span>
                            
                        </div>
               
                  
<?php }
                     } else {
 ?>
                            <div><span>No hay selecciones creadas</span> </div>
        <?php } ?>
        
       
                            </div>
                        
<?php } ?>
                </div>
                <div id="seleccion-activa" style="display: block;overflow: hidden;">
                    <h1 id="panel-activo">Selecciones en proceso</h1>
        <?php
                    foreach ($profile['Selecction'] as $seleccion) {
                        //print_r($seleccion['Applicant'] ); 
                        $cont=0;
                        foreach ($seleccion['Applicant'] as $ap) {
                            if($ap['ready']=="0") $cont++;
                            }
                        
                        if ($seleccion['status'] == 1) {
                            
        ?>
                            <div style="margin: 5px 0px;"  ><?php echo $this->Html->link($seleccion['name'], array('controller' => 'selecctions', 'action' => 'view', $seleccion['id']), array('style' => 'color: #A3A3A3;text-decoration: none; margin-bottom: 5px; display: block;float: left; width: 170px;')); ?><span class='pending-messages'> <a><?php echo $cont;//count($seleccion['Message']) ?></a> Selecciones nuevas</span><span style="clear: both;"></span></div>
<?php }
                    } ?>
                </div>
                <div id="seleccion-inactiva">
                    <h1 class="concluidas" id="panel-inactivo">Selecciones concluidas</h1>
                    <div class="box_concluidas">
        <?php
                    foreach ($profile['Selecction'] as $seleccion) {
                        if ($seleccion['status'] == 0) {
        ?>
                            <div style="margin: 5px 0px; height: 32px; border-bottom: 1px solid #E2E3E4"><?php echo $this->Html->link($seleccion['name'], array('controller' => 'selecctions', 'action' => 'view', $seleccion['id']), array('style' => 'color: #A3A3A3;text-decoration: none;')); ?></div>
    <?php }
                    } ?>
                    </div>
                    </div>
<?php
                } else {
?>
                    <div id="seleccion-inactiva">
                        <h1 id="panel-inactivo" style="margin-top: 0px;">Panel de Control</h1>
                        <div class="box-private" style="height: 120px; margin: 10px auto; border-bottom: none;padding-top: 0px; ">
                            <div class="boton">
                <?php
                    echo $this->Html->link(
                            $this->Html->image(
                                    "private/add.png", array("alt" => "Registrar nuevo Cliente")),
                            array('controller' => 'clients', 'action' => 'add'),
                            array('escape' => false)
                    )
                ?>
                    <p>
                        Registrar nuevo Cliente
                    </p>
                </div>
            </div>
            <div class="box-private" style="height: 120px; margin: 10px auto; border-bottom: none;padding-top: 0px; ">
                <div class="boton">
                <?php
                    echo $this->Html->link(
                            $this->Html->image(
                                    "private/seleccion.png", array("alt" => "Gestionar Clientes")),
                            array('controller' => 'clients', 'action' => 'index'),
                            array('escape' => false)
                    )
                ?>
                    <p>
                        Gestionar Clientes
                    </p>
                </div>
            </div>
             <?php //if ($profile['User']['role']!="admin"){ ?>
            <div class="box-private" style="height: 120px; margin: 10px auto; border-bottom: none;padding-top: 0px; ">
                <div class="boton">
                <?php
                    echo $this->Html->link(
                            $this->Html->image(
                                    "private/ver.png", array("alt" => "Ver Seleccion")),
                            array('controller' => 'selecctions', 'action' => 'index'),
                            array('escape' => false)
                    )
                ?>
                    <p>
                        Ver Selecciones
                    </p>
                </div>
            </div>
              <?php // }?>
           
            <div class="box-private" style="height: 120px; margin: 10px auto; border-bottom: none;padding-top: 0px; ">
                <div class="boton">
                <?php
                    echo $this->Html->link(
                            $this->Html->image(
                                    "private/ver.png", array("alt" => "Ver Seleccion")),
                            array('controller' => 'activities', 'action' => 'index'),
                            array('escape' => false)
                    )
                ?>
                    <p>
                        Registro de Actividades
                    </p>
                </div>
            </div> 
          
            

        </div>

<?php } ?>
<?php if ($profile['User']['role']!="admin"){ ?>
<div class="box-private" style="height: 120px; margin: 10px auto; border-bottom: none;padding-top: 0px; ">
                <div class="boton">
                <?php
                    echo $this->Html->link(
                            $this->Html->image(
                                    "private/ver.png", array("alt" => "Ver Seleccion")),
                            array('controller' => 'activities', 'action' => 'read'),
                            array('escape' => false,'class' => 'fixedAjaxDOMWindow2')
                    )
                ?>
                    <p>
                        Registro de Actividades
                    </p>
                </div>
            </div> 
  <?php }?>
</div>
<div class="clear_space_h"></div>

