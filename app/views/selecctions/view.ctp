<?php
echo $this->Html->css('tablas-seleccionweb.css');
echo $this->Html->css('forms.css');
$this->set('empresa', $this->Session->read('user'));
$this->set('tab', 'seleccion');
$this->set('mensages', isset($more['Message']) ? count($more['Message']) : 0);
?>
<style type="text/css" >
    table {
    border-collapse: collapse;
    color: #717171;
    font-family: Arial;
    margin: 0;
    width: 100%;
}
h3{
    margin: 0px !important;
}
#progress-bar {
    background: url(<?php echo $this->Html->url('/') ?>img/percentage-bg.png) no-repeat left center;
    width: 316px;
    height: 39px;
    margin: 0 auto;
    border-bottom: none;
    color: #456C8D;
    font-weight: bold;

    margin-left: 0px;
    padding-top: 0px;
}
#progress-level {
    background: url(<?php echo $this->Html->url('/') ?>img/progress.png) no-repeat left center;
    width: 0%; /* SET THIS TO GET THE DESIRE LEVEL */
    height: 39px;
    border-bottom: none;
    color: #456C8D;
    font-weight: bold;

    margin-left: 0px;
    padding-top: 0px;

}
</style>
<?php

echo $this->Html->script('jquery/jquery.DOMWindow.js');
?>
<script type="text/javascript">
    $(function(){
        $('.fixedAjaxDOMWindow').openDOMWindow({
            height:480,
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


<h1 class="private-title" style="margin: 0px;">
    <span id="logo-aplicantes">Selecci&oacute;n</span> <span style="float: right; margin-right: 10px;">
        <?php echo $this->Html->link($this->Html->image('cerrar.png', array('alt' => 'ver', 'style' => 'border:none')), '#', array('escape' => false, 'class' => 'closeDOMWindow')); ?></span>
</h1>
<?php if($selecction['Selecction']['status']==2){?>
<div id="tb-acciones">
    <?php
    echo $this->Html->link('editar', array('action' => 'edit', $selecction['Selecction']['id']), array('class' => 'button large'));
    echo $this->Html->link('eliminar', array('action' => 'delete', $selecction['Selecction']['id']), array('class' => 'button large'), sprintf('Esta seguro qeu desea eliminar esta seleccion "%" ?', $selecction['Selecction']['name']));
    ?>
</div>
<?php }?>

<div class="datos" style="margin-bottom: 20px;">
    <div style="color: #3C648B; float: left; width: 600px;">
        <div><a style="color:#727272;">Realizado por : </a> <?php echo $selecction['User']['owner'] ?></div>
        <div><a style="color:#727272;">Titulo : </a> <?php echo $selecction['Selecction']['name'] ?></div>
        <div><a style="color:#727272;">Referencia : </a> <?php echo $selecction['Selecction']['reference'] ?></div>
        <div><a style="color:#727272;">Inicio : </a> <?php echo $selecction['Selecction']['start'] ?>  <a style="color:#727272;">Caduca : </a>  <?php echo $selecction['Selecction']['end'] ?></div>
        <div><a style="color:#727272;">Estado la selecci&oacute;n : </a>  <?php
            $estados = array('La seleccion ha concluido', 'La seleccion esta activa', 'La NO ha sido enviada aun');
            echo $estados[$selecction['Selecction']['status']] ?></div>
    </div>
    <div style="float: right; width: 300px; border: none;">
        <?php
        if($selecction['Selecction']['status']!=2){
        ?>
        <div><a style="color:#727272;">Postulantes invitados: </a> <?php echo $selecction['Selecction']['sent'] ?> postulantes</div>
        <div><a style="color:#727272;">Postulantes que respondieron: </a> <?php echo $selecction['Selecction']['answered'] ?> postulantes</div>
        
        <div id="progress-bar" >
            <div id="progress-level" style="width: <?php echo ($selecction['Selecction']['answered'] * 100) / $selecction['Selecction']['sent']; ?>%"></div>
        </div>
        <div><a style="color:#727272;">Hubo un <?php echo ($selecction['Selecction']['answered'] * 100) / $selecction['Selecction']['sent']; ?>% de respuesta a la video seleccion</a></div>
        <?php }else{?>
        
        <div class="box-private" style="height: 120px; margin: 46px auto 10px; border-bottom: medium none; padding-top: 0px; width: 211px;">
            <div class="boton " style="height: 120px;">
                <?php echo $this->Html->link(
                    $this->Html->image(
                        "private/enviar.png", array("alt" => "Enviar Seleccion")),
                        array('controller'=>'selecctions', 'action'=>'send', $selecction['Selecction']['id']),
                        array('escape' => false, 'class'=>(count($selecction['Question'])?'':'disable'))
                    )
                ?>
                <p>
                    Enviar Selecci&oacute;n
                </p>
            </div>
        </div>
        <?php }?>
    </div>
    
    <div style="clear: both;"></div>
</div>
<div class="clear_space"></div>
<div class="related">
    <h3 class="private-title">Preguntas que se hicieron en esta video selecci&oacute;n </h3>
    <table cellpadding = "0" cellspacing = "0">
        <tr>
            <td>Pregunta</td>
            <td style="width: 40px;">Duraci&oacute;n</td>
            <td class="actions"></td>
        </tr>
        <?php
        if (!empty($selecction['Question'])) {
            foreach ($selecction['Question'] as $question) {
        ?>
        <tr>
            <td><?php echo $question['question']; ?></td>
            <td><?php echo $question['duration']; ?> seg.</td>
            <td class="actions">
                <?php //echo $this->Html->link($this->Html->image('ver.png', array('alt'=>'ver', 'style'=>'border:none')), array('controller' => 'questions', 'action' => 'view', $question['id']), array('escape'=>false)); ?>
                <?php //echo $this->Html->link($this->Html->image('pen.png', array('alt'=>'modificar', 'style'=>'border:none')), array('controller' => 'questions', 'action' => 'edit', $question['id']), array('escape'=>false)); ?>
                <?php echo $this->Html->link($this->Html->image('eliminar.png', array('alt'=>'eliminar', 'style'=>'border:none')), array('controller' => 'questions', 'action' => 'delete', $question['id']), array('escape'=>false), sprintf('Esta seguro que desea ekiminar esta pregunta  %s?', $question['id'])); ?>
            </td>
        </tr>
        <?php }
        }else {?>
        <tr>
            <td  colspan="3" style="color:#CC0000">No hay preguntas</td>
            
        </tr>
        <?php }?>
    </table>
</div>
<div class="related">
    <h3 class="private-title">Postulantes que realizaron la video selecci&oacute;n</h3>

    <table cellpadding = "0" cellspacing = "0">
        <tr>

            <td>Nombres y Apellidos</td>
            <td>Direcci&oacute;n</td>
            <td>Email</td>
            <td>Tel&eacute;fono</td>
            <td class="actions"></td>
        </tr>
        <?php if (!empty($selecction['Applicant'])) {
            foreach ($selecction['Applicant'] as $applicant){
        ?>
        <tr>
            <td><?php echo $applicant['name']; ?></td>
            <td><?php echo $applicant['address']; ?></td>
            <td><?php echo $applicant['email']; ?></td>
            <td><?php echo $applicant['phone']; ?></td>
            <td class="actions">
                <?php echo $this->Html->link($this->Html->image('ver.png', array('alt'=>'ver', 'style'=>'border:none')), array('controller' => 'applicants', 'action' => 'view', $applicant['id']), array('escape'=>false, 'class'=>'fixedAjaxDOMWindow')); ?>
                <?php //echo $this->Html->link($this->Html->image('pen.png', array('alt'=>'modificar', 'style'=>'border:none')), array('controller' => '$applicants', 'action' => 'edit', $applicant['id']), array('escape'=>false)); ?>
                <?php //echo $this->Html->link($this->Html->image('eliminar.png', array('alt'=>'eliminar', 'style'=>'border:none')), array('controller' => '$applicants', 'action' => 'delete', $applicant['id']), array('escape'=>false), sprintf('Esta seguro que desea eliminar esta entrvista # %s?', $applicant['id'])); ?>
            </td>
        </tr>
        <?php }
        }else {?>
        <tr>
            <td  colspan="6" style="color:#CC0000">No hay postulantes </td>

        </tr>
        <?php }?>
    </table>
</div>
