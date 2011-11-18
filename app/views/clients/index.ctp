<?php
echo $this->Html->script('jquery/jquery.DOMWindow.js');
$roles = array('administrador' => 'Cliente Administrador', 'cliente' => 'Usuario Cliente', 'video' => 'Video Usuario', 'postulante' => 'Postulante');
?>

<?php
    $this->set('empresa', $this->Session->read('user'));
    $this->set('tab', 'home');
    $this->set('mensages', isset($more['Message']) ? count($more['Message']) : 0);
?>
<style type="text/css">
    .detalle{
        display: none;
    }
    .cliente-actual span{

        color: #cd0a0a !important;
    }
    
</style>



<script type="text/javascript">
    $(function(){
        $("#tr_m").hide();
        
         $('#live_filter_wrapper').liveFilter('table');
          $(".filter").keyup(function() {
             $(".detalle").hide();
              $("thead").show();
             
              
            })
        $("tr").click(function() {
             $(this).prev('tr').show();
              $('.tr_m').show();
            })
         
         
        $('.fixedAjaxDOMWindow').openDOMWindow({
            height:450,
            width:630,
            eventType:'click',
            loader:1,
            loaderImagePath:'<?php echo $this->Html->url('/')?>img/ajax-loader.gif',
            loaderHeight:16,
            loaderWidth:17,
            windowSource:'ajax',
            windowHTTPType:'post'
        });
    });
    
</script>
<div id="users-loaded" <?php if($mode == 'full'){ ?>class="left-private" style="margin-top: 0px; padding-top: 0px;" <?php }?>>
    <h1 class="private-title"> <span id="logo-usuarios">Clientes Cargados</span><form style="display: block; float: right;margin-right: 12px;" id="filter-form">Cliente: <input  class="filter" name="livefilter" type="text" value="" maxlength="30" size="20" type="text"></form></h1>
    <div id="live_filter_wrapper"> 
    <table style="margin-left: 0px;width: 97.5%">
    <thead>
     <tr id="list-users-header"><td><span>Nombre</span></td><td><span>Referencia</span></td> <td></td></tr>
    </thead>
    
        <tbody>
           
            <?php
            $usuarios = array();
            $list_u = array();
            if (!empty($clients)) {
                foreach ($clients as $user) {
            ?>
            <tr>
                <td id="cliente-<?php echo $user['Client']['id']; ?>"><span><?php if(isset($user['Client']['last_name'])){ echo $user['Client']['name'].' '.$user['Client']['last_name'];}else{ echo $user['Client']['name'];} ?></span></td>
                <td></td>
                <td style="width: 60px;">
                    <span>
                        <?php //echo $user['credit']?>
                    </span>
                    <span>
                        <?php echo $this->Html->link($this->Html->image('ver.png', array('alt'=>'modificar', 'style'=>'border:none')), array('controller' => 'clients', 'action' => 'view', $user['Client']['id']), array('escape'=>false, 'class' => 'fixedAjaxDOMWindow')) ?>
                    </span>
                    <span class="edit">
                        <?php echo $this->Html->link($this->Html->image('pen.png', array('alt'=>'modificar', 'style'=>'border:none')), array('controller' => 'clients', 'action' => 'editar', $user['Client']['id']), array('escape'=>false)); ?>
                    </span>
                    <span>
                        <?php echo $this->Html->link($this->Html->image('eliminar.png', array('alt'=>'modificar', 'style'=>'border:none')), array('controller' => 'clients', 'action' => 'delete', $user['Client']['id']), array('escape'=>false)) ?>
                    </span>
                </td>
            </tr>
            <tr id="detalle-cliente-<?php echo $user['Client']['id']; ?>" class="detalle">
                <td colspan="3" style="padding: 0px;">
                    <table class="tb_det" style="border-left: 1px solid; border-right: 1px solid; margin-bottom: 2px; background: #F8F8F8;"><?php
                        $cuentas = array();
                        if (!empty($user['User'])) {
                            foreach ($user['User'] as $cuenta) {
                                if ($cuenta['active']==1) $estado= "Activo";
                                else $estado= "No Activo";
                               // array_push($cuentas, array("<span>" . $cuenta['username'] . "</span>", "<span> (" . $estado . ")</span>" ,"<span> Credito (" . $cuenta['credit'] . ")</span>",$roles[$cuenta['role']], (($cuenta['role'] != 'administrador')) ? '<span class="delete"><a href="delete/' . $cuenta['id'] . '">eliminar</a></span>' : ''));
                                 array_push($cuentas, array("<span>" . $cuenta['username'] . "</span>", "<span> (" . $estado . ")</span>" ,"<span> Credito (" . $cuenta['credit'] . ")</span>",$roles[$cuenta['role']], (($cuenta['role'] != 'administrador')) ? '<span></span>' : ''));
                            }
                        } else {
                            array_push($cuentas, array('Este cliente no tiene cuentas registradas'));
                        }
                        echo $this->Html->tableCells($cuentas,array('class' => 'tr_m'),array('class' => 'tr_m'));
                        ?>
                    </table>
                </td>
            </tr>
        <script type="text/javascript" >
            $(function(){
                $('#cliente-<?php echo $user['Client']['id']; ?>').click(function(){
                    $('#cliente-<?php echo $user['Client']['id']; ?>').toggleClass('cliente-actual');
                   
                    $('#detalle-cliente-<?php echo $user['Client']['id']; ?>').toggle("slow");
                    
                });
            });
        </script>
        <?php
                    }
                } else {
        ?>
                    <tr><td colspan="3">No hay usuarios registrados</td> </tr>
        <?php } ?>
        
                </tbody>
            </table>
            </div>
            <div class="paging">
        <?php echo $this->Paginator->prev('<< ', array(), null, array('class' => 'disabled')); ?>
                                	 |<?php echo $this->Paginator->numbers(); ?> |
        <?php echo $this->Paginator->next(' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>
<?php if($mode == 'full'){ ?>
<div id="mi-estado" class="right-private">                
    <div id="seleccion-inactiva">
        <h1 id="panel-inactivo" style="margin-top: 0;">Panel de Control</h1>
        <div class="box-private" style="height: 120px; margin: 10px auto; border-bottom: none;padding-top: 0px; ">
            <div class="boton">
                <?php echo $this->Html->link(
                    $this->Html->image(
                        "private/add.png", array("alt" => "Crear Seleccion")),
                        array('controller'=>'clients', 'action'=>'add'),
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
                <?php echo $this->Html->link(
                    $this->Html->image(
                        "private/seleccion.png", array("alt" => "Crear Seleccion")),
                        array('controller'=>'clients', 'action'=>'index'),
                        array('escape' => false)
                    )
                ?>
                <p>
                    Gestionar Clientes
                </p>
            </div>
        </div>
          <?php if ($rol!="admin"){ ?>
        <div class="box-private" style="height: 120px; margin: 10px auto; border-bottom: none;padding-top: 0px; ">
            <div class="boton">
                <?php echo $this->Html->link(
                    $this->Html->image(
                        "private/ver.png", array("alt" => "Crear Seleccion")),
                        array('controller'=>'selecctions', 'action'=>'index'),
                        array('escape' => false)
                    )
                ?>
                <p>
                    Ver Selecciones
                </p>
            </div>
        </div>
          <?php }?>
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
</div>
<div class="clear_space_h"></div>
<?php } ?>