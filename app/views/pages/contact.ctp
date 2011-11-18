<?php
$e = $this->requestAction("/languages/reader/etiqueta");
$b = $this->requestAction("/languages/reader/botones");
$ba = $this->requestAction("/languages/reader/banner");
$f = $this->requestAction("/languages/reader/form");
?>
<script type="text/javascript" >
$(document).ready(function() {
	$("#contact-form").validate();
});
</script>
<div id="main-contact">
    <div id="box-contact-left">
    <?php echo $ba['contacto'];?>
        <!--h2>Contacto</h2>
        <p>Si desea recibir informaci&oacute;n sobre nuestro servicio, comun&iacute;quese con nosotros completando el formulario o por los siguientes medios:</p>
        <ul>
            <li><h4>Contactos Personales</h4></li>
            <li><a href="mailto:luis.ninni@seleccionweb.com">luis.ninni@seleccionweb.com</a></li>
            <li><a href="mailto:micaela.ninni@seleccionweb.com">micaela.ninni@seleccionweb.com</a></li>
        </ul>
        <ul>
            <li><h4>Contactos por Areas</h4></li>
            
            <li><a href="mailto:info@seleccionweb.com">info@seleccionweb.com</a></li>
            <li><a href="mailto:ventas@seleccionweb.com">ventas@seleccionweb.com</a></li>
            <li><a href="mailto:soporte@seleccionweb.com">soporte@seleccionweb.com</a></li>
            <li><a href="mailto:clientes@seleccionweb.com">clientes@seleccionweb.com</a></li>
            <li><a href="mailto:candidatos@seleccionweb.com">candidatos@seleccionweb.com</a></li>
        </ul>
        <h4>Redes sociales</h4>
        <ul class="red_social">                               
             <li class="skype">
                <a title="Skipe" href="#">Seleccionweb</a>
             </li>
             <li class="fb">
                <a title="facebook" href="http://www.facebook.com/pages/Selecci%C3%B3nWeb/180908685290201" target="_blank">Facebook</a>
             </li>
             <li class="tw">
                <a title="twitter" href="http://twitter.com/seleccionweb" target="_blank">Twitter</a>
             </li>
             <li class="in">
                <a title="LinkedIn" href="http://www.linkedin.com/company/selecci-nweb" target="_blank">LinkedIn</a>
             </li>
        </ul-->
    </div>
    <div id="box-contact-right">
        <?php
            echo $this->Form->create('Message', array('action'=>'contact', 'id'=>'contact-form'))
        ?>
        <div class="cont-contact-top">
            <h2><?php echo $e['contactanos'];?></h2>
        </div>
        <ul class="cont-contact-center">
            <li>
                <label><?php echo $f['nombre'];?></label>
                <input type="text" name="name" value="" id="name-contact" class="required"/>                                         
            </li>
            <li>
                <label><?php echo $f['empresa'];?></label>
                <input type="text" name="corporate" value="" id="empresa-contact" class="required" />                                         
            </li>
            <li>
                <label><?php echo $f['email'];?></label>
                <input type="text" name="email" value="" id="email-contact" class="required email"/>                                           
            </li>
            <li>
                <label><?php echo $f['mensaje'];?></label>
                <textarea cols="30" rows="5" name="comment" id="comment-contact" class="required"></textarea>                                                                                         
            </li>
            <li class="form-contact-buttom">
               <button><?php echo $b['enviar'];?></button>
            </li>
        </ul>
        <div class="cont-contact-bottom"></div>  
        <?php echo $this->Form->end();?>
    </div>
</div>