<script type="text/javascript"  src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo $this->Html->script('validate/jquery.validate.js');
echo $this->Html->css('jquery/upload/jquery.fileupload-ui.css');
echo $this->Html->script('jquery/jquery.fileupload.js');
echo $this->Html->script('jquery/jquery.fileupload-ui.js');
?>
<style type="text/css"  >
    .button-gray{
    border: 1px solid #E2E3E4;
    background: none !important;
    background: -webkit-gradient(linear, left top, left bottom, from(#FFFFFF), to(#E2E3E4)) !important;
    background-image: -moz-linear-gradient(top, #ffffff, #E2E3E4) !important;
    color:#777777;
    width: 150px !important;
    padding-left: 10px;
    padding-right: 10px;
    font-weight: normal;
    font-size: 14px;
}
</style>
<script type="text/javascript" >
    $(document).ready(function() {
        $("#TestimonialAddForm").validate();
    });
</script>
<h2>Ha concluido su Video Selecci&oacute;n</h2>
<div id="content_done">
    <p>
        Agradecemos su participaci&oacute;n en el proceso de <strong>VideoSelecci&oacute;n</strong>.
    </p>
    <p>
        El cliente evaluara su entrevista y se pondra en contacto con usted porfavor
        revice su correo ya que el cliente le enviara su respuesta por ese medio.
    </p>
    <p>
        Gracias por participar en la <strong>VideoSelecci&oacute;n</strong> si desea puede
        dejar un testimonio de su experiencia en el proceso de video selecci&oacute;n virtual.
    </p>
    <div class="content_form_done">
        <div class="done_center">
            <?php echo $this->Form->create('Testimonial', array('action'=>'add')); ?>
            <?php
            echo "<b>Nombre : </b>" . $postulante['Applicant']['name'];
            echo $this->Html->image('applicants/'.$postulante['Applicant']['photo'], array('alt' => 'Foto del postulante', 'width'=>150, 'height'=>113));
            ?>
            <?php
            echo $this->Form->input('name', array('value' => $postulante['Applicant']['name'], 'type' => 'hidden'));
            echo $this->Form->input('testimonial', array('rows' => 10, 'cols' => 30, 'label'=>'Ingrese su testimonio', 'class' => 'required'));
            echo $this->Form->input('photo', array('value' => $postulante['Applicant']['photo'], 'type' => 'hidden'));
            echo $this->Form->input('email', array('value' => $postulante['Applicant']['email'], 'type' => 'hidden'));
            echo $this->Form->input('address', array('value' => $postulante['Applicant']['address'], 'type' => 'hidden'));
            ?>
            <div class="not_gracias">
                <?php echo $this->Html->link('No, gracias','/');?>
            </div>
            <button>Enviar testimonio</button>
            <?php echo $this->Form->end(); ?>
        </div>
        <div class="done_bottom"></div>
    </div>
</div>

