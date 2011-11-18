<?php
echo $this->Html->css('tablas-seleccionweb.css');
echo $this->Html->script('tinymce/tiny_mce.js');
$this->set('mensages', isset($more['Message']) ? count($more['Message']) : 0);
$this->set('empresa', $this->Session->read('user'));
$this->set('tab', 'mensaje');
?>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/base/jquery-ui.css" id="theme">

<script type="text/javascript"  src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
<?php
echo $this->Html->css('jquery/upload/jquery.fileupload-ui.css');
echo $this->Html->script('jquery/jquery.fileupload.js');
echo $this->Html->script('jquery/jquery.fileupload-ui.js');
?>

<script type="text/javascript">
    tinyMCE.init({
        mode: 'textareas',
        theme : "advanced",
        plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",        
        theme_advanced_resizing : false

    });
    var correos = [];
    $(function(){
        $('#seleccion_id').msDropDown().data("dd");
        $('#lista-postulantes input[type="checkbox"]').click(function(){

            $('#applicants').val($('#applicants').val()+$(this).val()+",");
        });
        $('#seleccion-actual').change(function(){

            $('#subject').val("Invitacion para participar en proceso de seleccion de "+$(this).val());
            var idsel = this.options[this.selectedIndex].id;
            $('#selecction_id').val(idsel);
        });
    });
</script>

<style type="text/css" >
    #form-send{
        width: 600px;
        margin-right: 15px;
    }
    #form-send fieldset{
        padding: 0px;
        border: none;
        margin: 0px;
        width: 600px;
    }
    #form-send fieldset p input{
        float: right;
        margin-right: 10px;
        margin-left: 5px;
        width: 80%;
        background-color: #F3F3F1;
        border: 1px #EBEBEB solid;
        border-top-width: 2px;
        color: #91918F;
    }

    .file_upload {
    background: none repeat scroll 0 0 #E2E3E4;
    border: 1px solid #3C719F;
}
#foto-logo{
    border: 3px #E2E3E4 solid;
}
#tinymce{
    margin: 0px;
}
.static-text{
    background-color: #F3F3F1;
    padding: 10px;
}
.editable{
    border: 1px #EBEBEB ridge;
    padding: 5px;
}
.mceContentBody {
    margin: 0px !important;
}
</style>
<div  class="left-private">
    <h1 class="private-title"> <div style="display: inline" id="logo-mensage">Enviar Mensaje a Postulantes</div></h1>
    <?php 
		echo $this->Form->create('Selecction', array('action' => 'send', 'id' => 'form-send'));
		echo $this->Form->input('id');
		echo $this->Form->input('user_id', array('type'=>'hidden'));
		echo $this->Form->input('status', array('type'=>'hidden'));
		echo $this->Form->input('start', array('type'=>'hidden'));
		echo $this->Form->input('end', array('type'=>'hidden'));
		echo $this->Form->input('sent', array('type'=>'hidden'));
		echo $this->Form->input('answered', array('type'=>'hidden'));
		foreach ($this->data['Question'] as $pregunta) {
			echo $this->Form->input('Question.id', array('value'=>$pregunta['id'], 'name'=>'data[Question][Question][]'));
		}
		?>
    <fieldset>
        <?php //echo $this->Form->input('id', array('type' => 'hidden', 'id' => 'selecction_id')); ?>
        <p style="font-weight: bold; text-align: right">
            <?php echo $this->Form->input('name', array('div' => false, 'label' => 'Asunto')); ?>

        </p>
        <p style="font-weight: bold; text-align: right">
            <label for="applicants">Postulantes</label>
            <input type="text" name="applicants" value="" id="applicants" />
        </p>


        <div>
            <label for="message" style="font-weight: bold;">Mensage</label>
        </div>
        <div>
            <textarea style="width: 600px; height: 330px;"name="data[Message][message]" id="message" >
            <div class="mceNonEditable static-text">
                <p>Texto Legal.<br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer bibendum dictum erat sed porttitor. Fusce turpis ante, auctor ac volutpat faucibus, porttitor a nisl. Praesent arcu sem, viverra sit amet porta sagittis, sollicitudin eu purus. Aenean hendrerit lacus quam. Suspendisse porta faucibus mi quis imperdiet. Morbi lorem risus, fringilla quis euismod commodo, pretium id tellus. Morbi non felis libero.</p>
            </div>
            <div class="editable" style="border: 1px ridge #E2E3E4;padding: 10px; background: #FFFFFF">
                ESPACIO PARA ESCRIBIR MENSAJE PERSONALIZADO.
            </div>
            <div class="mceNonEditable static-text">
                <p>Link para acceder a la entrevista:<br>
                <a style="color:#73A8CB !important; font-weight: bold; font-size: 10.3px;" href="www.seleccionweb.com/selecctions/interview/<?php echo $this->data['Selecction']['id'].'/'.md5($this->data['Selecction']['name']);?>">www.seleccionweb.com/selecctions/interview/<?php echo $this->data['Selecction']['id'].'/'.md5($this->data['Selecction']['name']);?></a></p>
            </div>
            </textarea>
        </div>       
    </fieldset>
    <div id="submit-comment" style="margin-top: 10px;">
            <input  type="submit" value="Enviar mensage" class="button large button-gray" />
        </div>
    <?php echo $this->Form->end(); ?>
        </div>
        <div class="right-private">
            <div>
                <h1 id="panel-destinatarios">Aquien se le envia la seleccion</h1>
                <div  style="margin: 25px 0px;">
                <?php
                    echo $this->Form->input('Selecction.id', array('options'=>$selecctions, 'label'=>'Elegir una seleccion', 'id'=>'seleccion_id'));
                ?>
           
                </div>
        <div>
            <h3 style="border-top: 1px solid #E2E3E4; padding-top: 5px;">Listado de usuarios</h3>
            <p  style="text-align: justify">
                Marque los usuarios a quienes quiere que le llege la invitacion para participar de la <strong>Video Seleccion</strong>
            </p>
            <div id="lista-postulantes">
                <?php
                if (!empty($applicants)) {
                    
                    echo $this->Form->input('Applicant.id', array('options'=>$applicants, 'label'=>false, 'multiple'=>'checkbox'));
                } else {
                ?>
                    <p>No hay postulantes</p>
                <?php
                }
                ?>
            </div>

        </div>
    </div>

    <div id="logo-cliente">
        <h2 id="panel-add-logo">Agregar Logo</h2>
        <p  style="text-align: justify">
            Agrege un logo al mensage que sera enviado, esto sera enviado junto con el mensage para que el postulante pueda saber de que empresa se trata.<br>
            Si no incluye el logo el mensage sera enviado de forma anonima, no se mensionara el nombre de la empresa qeu esta haciendo la video seleccion.
        </p>

        <form style="float: left; width: 90px;"id="file_upload" action="<?php echo $this->Html->url("/clients/subir_logo") ?>" method="POST" enctype="multipart/form-data">
            <input name="data[Client][logo]" type="file" name="file" multiple>
            <button>Subir</button>
            <div>Elegir imagen</div>
        </form>
        <table id="files" style="float: right; width: 150px; margin: 0;">
            <tr id="foto-logo-row"> <td style="border: none;" colspan="2"><?php echo $this->Html->image('private/logo-blank.png', array('id' => 'foto-logo', 'alt' => 'Logo empresa', 'width'=>150, 'height'=>150)) ?></td><td style="border:none"></td> </tr>
        </table>
        
        <script type="text/javascript">
            /*global $ */
            $(function () {
                $('#file_upload').fileUploadUI({
                    uploadTable: $('#files'),
                    downloadTable: $('#files'),
                    buildUploadRow: function (files, index) {
                        return $('<tr style="width:150px;" >' +
                            '<td colspan="1" class="file_upload_progress" style="border:none"><div><\/div><\/td>' +
                            '<td class="file_upload_cancel" style="border:none" >' +
                            '<button class="ui-state-default ui-corner-all" title="Cancel">' +
                            '<span class="ui-icon ui-icon-cancel">x<\/span>' +
                            '<\/button><\/td><\/tr>');
                    },
                    buildDownloadRow: function (file) {
                        $('#foto-logo-row').remove();
                        $('#logo-client').val('clients/'+file.name);
                        return $('<tr id="foto-logo-row"><td colspan="2" style="border: none;"><img height="150" width=150" id="foto-logo" src="<?php echo $this->Html->url('/') ?>img/clients/' + file.name + '" alt="nuevo logo" ><\/td><\/tr>');
                    }
                });
            });
        </script>


    </div>

</div>
<div class="clear_space_h"></div>

