
<?php
echo $this->Html->script('validate/jquery.validate.js');
$this->set('empresa', $this->Session->read('user'));
$this->set('tab', 'home');
echo $this->Html->script('jquery/jquery.DOMWindow.js');
?>
<script type="text/javascript" >
    $(document).ready(function() {
        $("#register-form").validate();
        changeform($('#tipo_cliente').val());
         $('select').msDropDown().data("dd");
        $('#tipo_cliente').change(function(){
            changeform($(this).val());
        });
        function changeform(form){
            if(form == 0){
                $('#l-nombre').text('Nombre');
                $('#apellido').fadeIn('slow');
                $('#ClientLastName').addClass('required');
                $('#cuit').fadeOut('slow');
                $('#ClientCuit').removeClass('required');
                $('#rubro').fadeOut('slow');
                $('#ClientRubroEmpresa').removeClass('required');
                $('#contact').fadeOut('slow');
                $('#ClientContactName').removeClass('required');
                $('#email-c').fadeOut('slow');
                $('#ClientEmailContact').removeClass('required');
            }else{
                $('#l-nombre').text('Nombre de la empresa');
                $('#apellido').fadeOut('slow');
                $('#ClientLastName').removeClass('required');
                $('#cuit').fadeIn('slow');
                $('#ClientCuit').addClass('required');
                $('#rubro').fadeIn('slow');
                $('#ClientRubroEmpresa').addClass('required');
                $('#contact').fadeIn('slow');
                $('#ClientContactName').addClass('required');
                $('#email-c').fadeIn('slow');
                $('#ClientEmailContact').addClass('required');
            }
        }
    });
</script>
<script type="text/javascript">
    $(function(){
        $('.fixedAjaxDOMWindow').openDOMWindow({
            height:328,
            width:650,
            eventType:'click',
            loader:1,
            loaderImagePath:'<?php echo $this->Html->url('/')?>img/ajax-loader.gif',
            loaderHeight:16,
            loaderWidth:17,
            windowSource:'ajax',
            windowHTTPType:'post'
        });
        
        $('.fixedAjaxDOMWindow2').openDOMWindow({
            height:466,
            width:650,
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
<style type="text/css" >
    fieldset {
        margin: 0px;
        padding: 10px;
        width: 94%;
    }
    form fieldset div.input {

        display: block;
    }
    form fieldset div.input input{
        float: right;
        margin-right: 95px;
        width: 300px;
    }
    form fieldset div.input label {
        font-size: 100%;
        margin-right: 10px;
    }
    legend{
        border: 1px #CCCCCC ridge;
        padding: 2px 5px;
    }

</style>
<div id="main-register" class="left-private">
    <h1 class="private-title"> <span id="logo-add">Registrar un nuevo cliente</span> </h1>
    <?php
    echo $this->Form->create('Client', array('action' => 'editar', 'id' => 'register-form'))
    ?>
    <fieldset>
        <div id="registro-personal">
            <fieldset>
                <legend>Informacion Personal</legend>
                <?php
                echo $this->Form->input('id');
                echo $this->Form->input('type', array('label' => 'Tipo de cliente', 'options' => array('Personal', 'Empresa'), 'id' => 'tipo_cliente', 'default' => 'Empresa', 'style'=>'width: 305px; margin-right: 95px;'));
                echo $this->Form->input('name', array('label' => array('id' => 'l-nombre', 'text' => 'Nombre'), 'class' => 'required'));
                echo $this->Form->input('last_name', array('label' => 'Apellidos', 'class' => 'required', 'div' => array('id' => 'apellido')));
                echo $this->Form->input('cuit', array('label' => 'Cuit (Solo para argentina)', 'class' => 'required', 'div' => array('id' => 'cuit')));
                echo $this->Form->input('rubro_empresa', array('label' => 'Rubro de la empresa', 'class' => 'required', 'div' => array('id' => 'rubro')));
                echo $this->Form->input('address', array('label' => 'Direcci&oacute;n', 'class' => 'required'));
                echo $this->Form->input('cod_postal', array('label' => 'C&oacute;digo postal', 'class' => 'required'));
                echo $this->Form->input('country', array('label' => 'Pa&iacute;s', 'class' => 'required'));
                echo $this->Form->input('state', array('label' => 'Provincia o Departamento', 'class' => 'required'));
                echo $this->Form->input('city', array('label' => 'Ciudad', 'class' => 'required'));
                echo $this->Form->input('area', array('label' => '&Aacute;rea de tel&eacute;fono', 'class' => 'required'));
                echo $this->Form->input('phone', array('label' => 'N&uacute;mero de tel&eacute;fono', 'class' => 'required'));
                echo $this->Form->input('email', array('label' => 'Correo electr&oacute;nico', 'class' => 'required email'));
                echo $this->Form->input('contact_name', array('label' => 'Nombre del contacto', 'class' => 'required', 'div' => array('id' => 'contact')));
                echo $this->Form->input('email_contact', array('label' => 'Correo del contacto', 'class' => 'required email', 'div' => array('id' => 'email-c')));
                ?>

            </fieldset>

        </div>
        <?php
        $roles = array('admin'=>'Administrador General del sitio','administrador'=>'Cliente Administrador','cliente' =>'Usuario Cliente', 'video'=>'Video Usuario','postulante' =>'Postulante');

        
    ?>
    <div id="users-loaded">
        <h1 class="private-title"> <span id="logo-usuarios">Usuarios Pertenecientes al cliente</span></h1>
        <table style="margin: 20px 0px 30px 0px;width: 97.5%; font-size: 12px;">
            <tbody>
                <tr id="list-users-header"><td><span>Nombre</span></td><td><span>Referencia</span></td> <td style="width: 20px"></td><td style="width: 20px"></td><td style="width: 20px"></td></tr>
                <?php
                $usuarios=array();
                foreach ($this->data['User'] as $user) {
                    array_push($usuarios, array(
                        "<span>" . $user['owner'] . "</span>",
                        $roles[$user['role']],
                        $this->Html->link(
                                $this->Html->image('ver.png', array('alt'=>'ver')),
                                array('controller'=>'users', 'action'=>'view', $user['id']),
                                array('escape'=>false, 'class'=>'fixedAjaxDOMWindow2')),
                        $this->Html->link(
                                $this->Html->image('pen.png', array('alt'=>'editar')),
                                array('controller'=>'users', 'action'=>'edit', $user['id']),
                                array('escape'=>false, 'class'=>'fixedAjaxDOMWindow')),
                        $this->Html->link(
                                $this->Html->image('eliminar.png', array('alt'=>'eliminar')),
                                array('controller'=>'users', 'action'=>'delete', $user['id']),
                                array('escape'=>false))
                        ));
                }

                echo $this->Html->tableCells($usuarios);
                ?>
            </tbody>
        </table>
    </div>


        <input type="submit" value="enviar" class="button medium large">
    </fieldset>

    <?php echo $this->Form->end(); ?>

            </div>

            <div id="mi-estado" class="right-private">
                <div id="seleccion-inactiva">
                    <h1 id="panel-inactivo" style="margin-top: 0px;">Tareas Adminsitrativas</h1>
                    <div class="box-private" style="height: 120px; margin: 10px auto; border-bottom: none;padding-top: 0px; ">
                        <div class="boton">
                <?php
                echo $this->Html->link(
                        $this->Html->image(
                                "private/add.png", array("alt" => "Crear Seleccion")),
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
                                "private/seleccion.png", array("alt" => "Crear Seleccion")),
                        array('controller' => 'clients', 'action' => 'index'),
                        array('escape' => false)
                )
                ?>
                <p>
                    Gestionar Clientes
                </p>
            </div>
        </div>
        <div class="box-private" style="height: 120px; margin: 10px auto; border-bottom: none;padding-top: 0px; ">
            <div class="boton">
                <?php
                echo $this->Html->link(
                        $this->Html->image(
                                "private/ver.png", array("alt" => "Crear Seleccion")),
                        array('controller' => 'selections', 'action' => 'lista'),
                        array('escape' => false)
                )
                ?>
                <p>
                    Ver Selecciones
                </p>
            </div>
        </div>
    </div>
</div>