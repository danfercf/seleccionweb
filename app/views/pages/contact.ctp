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
<div id="content">
            <div class="head_content"> 
              <div class="main">
                <h1 class="title"> Contactanos </h1>
              </div>  
            </div>    
              <div class="content_content">
               <div id="main">
                    <div class="content_up_how">
                    <?php echo $ba['si_desea']?>
                        
                        
                        <div class="contacts">
                          <div class="contacts_left">  
                           <h3 class="subtitle">Contactos Personales</h3> 
                            <ul>
                                <li>luis.ninni@seleccionweb.com</li>
                                <li>micaela.ninni@seleccionweb.com</li>
                            </ul>
                            <h3 class="subtitle">Contactos por Area</h3> 
                            <ul>
                                <li>info@seleccionweb.com</li>
                                <li>ventas@seleccionweb.com</li>
                                <li>soporte@seleccionweb.com</li>
                                <li>clientes@seleccionweb.com</li>
                                <li>candidatos@seleccionweb.com</li>
                            </ul>
                            <h3 class="subtitle">Redes Sociales</h3> 
                            <ul>
                                <li class="social"><?php echo $html->image("skype.png", array('alt' => 'skype')) ?></li>
                                <li class="social"><?php echo $html->image("face.png", array('alt' => 'facebook')) ?></li>
                                <li class="social"><?php echo $html->image("twitter.png", array('alt' => 'twitter')) ?></li>
                                <li class="social"><?php echo $html->image("linkedin.png", array('alt' => 'linkedin')) ?></li>
                            </ul>
                        </div>
                        
                        <div class="form">
                            <h3 class="subtitle">Contactanos Ahora</h3>
                            <form action="#">
                                <p>Nombre</p><input type="text" />
                                <p>Empresa</p><input type="text" />
                                <p>Email</p><input type="text" />
                                <p>Mensaje</p><textarea cols="30" rows="10"></textarea>
                                <p><input type="submit" class="submit" value=" "/></p>
                            </form>
                        </div>
                      </div>  
                    </div>
               </div>  
            </div>
</div>