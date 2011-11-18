<?php
$this->set('mensages', isset($more['Message']) ? count($more['Message']) : 0);
?>
<script type="text/javascript">
    $(function(){


        $('#customselector').msDropDown().data("dd");
    });

</script>
<style type="text/css" >
    h4 {
        margin: 0px;
    }
    #list-applicants{
        width: 930px;
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
    #containercustomselector{
        float: right;
}
</style>

<?php
echo $this->Html->css('tablas-seleccionweb.css');

$this->set('empresa', $this->Session->read('user'));
$this->set('tab', 'aplicantes');
?>
<div>
    <h1 class="private-title" style="margin-right: 0px;"> <span id="logo-aplicantes">Postulantes</span></h1>
    <?php echo $this->Form->create('Selecction', array('action'=>'send'))?>
    <table id="list-applicants" style="font-size: 12px;">
        <thead>
            <tr>
                <th style="width: 25px">Check</th>
                <th style="width: 100px">Foto</th>
                <th style="width: 200px">Datos Personales</th>
                <th>Descripcion</th>
            </tr>
        </thead>
<?php

$postulantes = array();
foreach ($applicants as $applicant) {
    array_push(
            $postulantes,
            array(
                '<input type="checkbox" name="data[Applicant][id][]" value="'.$applicant['Applicant']['email'].'"/>',
                '<div class="sombra">' . $this->Html->image("applicants/".$applicant['Applicant']['photo'], array('alt' => 'Foto personal', "class" => 'thumbail', 'width'=>74, 'height'=>64)) . "</div>",
                "<h4>" . $applicant['Applicant']['name']. "</h4>" . $applicant['Applicant']['email'] . "<br />" . $applicant['Applicant']['phone'],
                $applicant['Applicant']['description']
            )
    );
}
if(count($postulantes)){
echo $this->Html->tableCells($postulantes, array('class' => 'row-b'));
}else{
    echo '<tr><td colspan="4" class="row-b">No hay postulantes</td></tr>';
}
?>

    </table>
    <div class="paginador">

<?php echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); ?>
        <?php echo $this->Paginator->numbers(); ?>
        <?php echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled')); ?>



    </div>
    <div class="clear_space_h"></div>
    <?php if(count($postulantes)){?>
    <div id="acciones" style="padding:10px 0 0 0;">
        <strong style="margin-left: 10px;">Enviar E-Mail a Postulantes seleccionados</strong>
        <div class="referencia" >
            <label for="field">Referencia : </label>
            <select name="data[Selecction][id]"  id="customselector">
                <?php foreach ($selecciones as $val => $referencia) { ?>
                <option value="<?php echo $val?>"  id="<?php echo $val?>" title=""><?php echo $referencia?></option>
                <?php }?>
            </select>
        </div>
        <input id="b-enviar" type="submit" value="Enviar" class="button submit">
    </div>
    <?php }?>
    <?php echo $this->Form->end();?>
</div>