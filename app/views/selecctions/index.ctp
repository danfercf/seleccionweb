<?php
$this->set('mensages', isset($more['Message']) ? count($more['Message']) : 0);
?>
<style type="text/css" >
    h4 {
        margin: 0px;
    }
    #list-applicants{
        width: 915px;
        margin: 0px;
    }
    .sombra {
        float:left;
        background-color: #A7A7A7;
        margin: 10px 0 0 5px;
    }

    .sombra img {
        display: block;
        position: relative;
        background-color: #fff;
        margin: -2px 2px 2px -2px;
    }

    .thumbail{
        border: 1px #FFFFFF solid;
    }
    .current{
        background: #223A57;
        width: 15px;
        color: #FFFFFF;
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
        background-image: url(img/private/button-submit.png) !important;
        height: 24px !important;
        margin-right: 10px;
        width: 150px !important;
    }
    .iconselect {
        background: url(img/select-bg.png) no-repeat;
        height: 25px;
        width: 200px;
        font: 13px Arial, Helvetica, sans-serif;
        padding-left: 15px;
        padding-top: 4px;
    }
    .selectitems {
        width:190px;
        height:25px;
        border-bottom: dashed 1px #ddd;
        padding-left:10px;
        padding-top:2px;
    }
    .selectitems span {
        margin-left: 5px;
    }
    .iconselectholder {
        width: 200px;
        overflow: auto;
        display:none;
        position:absolute;
        background-color:#FFF5EC;
    }
    .hoverclass{
        background-color:#FFFFFF;
        curson:hand;
        cursor: pointer;
    }
    .selectedclass{
        background-color:#FFFF99;
    }
    #containercustomselector{
        float: right;
    }
    table {
        margin: 0px !important;
        width: 97.7% !important;
}
</style>

<?php
echo $this->Html->css('tablas-seleccionweb.css');
$this->set('empresa', $this->Session->read('user'));
$this->set('tab', 'seleccion');
?>
<div class="left-private" <?php  if($rol!="admin") { echo "style='width: 100%;'"; }  ?>>
    <h1 class="private-title" > <span id="logo-usuarios"></span>Selecciones</h1>
    <table>
        <?php
        echo $this->Html->tableHeaders(
                array('Creado por','Titulo', 'referencia', 'Caduca', 'Preguntas', 'Entrevistas', '')
        );

        $datos = array();
        foreach ($selecctions as $seleccion) {
            array_push(
                    $datos,
                    array(
                        '<span>'.$seleccion['User']['owner'].'</span>',
                        '<span>'.$seleccion['Selecction']['name'].'</span>',
                        '<span>'.$seleccion['Selecction']['reference'].'</span>',
                        date('d-m-Y'),
                        count($seleccion['Question']),
                        $seleccion['Selecction']['sent'].'/'.$seleccion['Selecction']['answered'],
                        $this->Html->link($this->Html->image('ver.png', array('alt'=>'ver', 'style'=>'border:none')), array('controller' => 'selecctions', 'action' => 'view', $seleccion['Selecction']['id']), array('escape'=>false)).
                        $this->Html->link($this->Html->image('eliminar.png', array('alt'=>'eliminar', 'style'=>'border:none')), array('controller' => 'selecctions', 'action' => 'delete', $seleccion['Selecction']['id']), array('escape'=>false), sprintf('Esta seguro que desea eliminar esta video seleccion "%"?', $seleccion['Selecction']['name']))
                    )
            );
        }
        echo $this->Html->tableCells($datos, array('class' => 'row-b')
        );
        ?>

    </table>
    <div class="paginador">
        <?php echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); ?>
        <?php echo $this->Paginator->numbers(); ?>
        <?php echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled')); ?>

    </div>
    <div class="clear_space_h"></div>
</div>
<?php  if($rol=="admin") {   ?>
<div class="right-private">
        <div id="seleccion-inactiva">
            <h1 id="panel-inactivo" style="margin-top: 0px;">Panel de Control</h1>
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
                        array('controller' => 'selecctions', 'action' => 'index'),
                        array('escape' => false)
                )
                ?>
                <p>
                    Ver Selecciones
                </p>
            </div>
        </div>
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
<?php  }  ?>