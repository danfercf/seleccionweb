<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-AR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
    <?php echo $title_for_layout; ?>
</title>
<?php
    echo $this->Html->meta('icon');
	echo $this->Html->charset('utf-8');

    echo $this->Html->css('seleccionweb.css');
    echo $this->Html->css('smoothness/jquery-ui-1.8.9.custom.css');
    echo $this->Html->css('ezmark.css');
    echo $this->Html->css('jquery/dd.css');
     
    echo $this->Html->script('jquery/jquery-1.4.4.min.js');
    echo $this->Html->script('jquery/jquery-ui-1.8.9.custom.min.js');
    echo $this->Html->script('jquery/jquery.infieldlabel.min.js');
    echo $this->Html->script('ezmark/jquery.ezmark.min.js');
    echo $this->Html->script('validate/jquery.validate.js');
    echo $this->Html->script('initialize-forms.js');
    echo $this->Html->script('jquery/jquery.dd.js');
    echo $scripts_for_layout;
?>

    <!--[if lte IE 6]>
<?php
    echo $this->Html->css('seleccionweb-ie6');
?>
    <![endif]-->
    <!--[if lte IE 8]>
<?php
    echo $this->Html->css('seleccionweb-ie');
?>
    <![endif]-->
    <script type="text/javascript">
        $(document).ready(function() {
        	$("#commentForm").validate({
                    errorLabelContainer: $("#commentForm fieldset div.error")
                });
         $(".menu_header_lang li a").click(function(){

            var key=$(this).attr("key");
                $.ajax({
                  url: '<?php echo $this->Html->url(array( "controller" => "languages","action" => "get"));?>/'+key,
                  success:function(data){
                       location.reload();
                    }
                });
            return false;
         })
        });
    </script>
</head>
<?php 
$username = $this->Session->read('username');
$password = $this->Session->read('password');

$e = $this->requestAction("/languages/reader/etiqueta");
$b = $this->requestAction("/languages/reader/botones");
$l = $this->requestAction("/languages/reader/layout");
$langs = $this->requestAction("/languages/reader_lang");
//echo("<pre>");
//print_r($e);
//print_r($b);

//echo("</pre>");
?>
<body id="fondo<?php echo isset($wrapper_id)?$wrapper_id:"" ?>">    
    <!-- end wrapper section -->
    <div id="wrapper<?php echo isset($wrapper_id)?$wrapper_id:"" ?>">
        <div id="w_main">
            <div id="main">
                <!-- header section -->
                <div id="header">
                    <ul class="menu_header">
                        <li>
                            <?php echo $html->link($b['como_funciona'], "/pages/howto") ?>
                        </li>
                        <li>
                            <?php echo $html->link($b['planes'], "/pages/plans") ?>
                        </li>
                        <li>
                            <?php echo $html->link($b['registro'], "/clients/register") ?>
                        </li>
                        <li>
                            <?php echo $html->link($b['contacto'], "/pages/contact") ?>
                        </li>
                    </ul>
                    <ul class="menu_header_lang">
                    <?php
                        foreach($langs as $row)	:
                        ?>
                        <li>                       
                <?php echo $this->Html->link($this->Html->image('flags/'.$row['Language']['key'].'.png'),"",array('escape' => false,"key"=>$row['Language']['key']));?>
                        </li>
                        <?php  endforeach; ?>
                    </ul>
                    
                    <div class="content-login">
                        <div class="content-logo">
                            <?php echo $this->Html->link(
                                $this->Html->image(
                                    "logo.png", array("alt" => "Seleccion web")),
                                    "/",
                                    array('escape' => false, 'class'=>"logo-ajuste")
                                )
                            ?>
                        </div>
                        <div class="content-form-login">
                            <?php echo $this->Form->create('User', array('action'=>'login')) ?>
                                <ul class="form-left">
                                    <li>
                                        <label><?php echo $e['usuario']?></label>
                                        <?php echo $this->Form->input('username', array('label'=>'', 'value'=>$this->Session -> read("tmp_user_session"), 'tabindex'=>'1', 'div'=>false))?>
                                    </li>
                                    <li class="text-recordar">
                                        <input type="checkbox" value="Recordarme" class="check" name="remember" tabindex="3"/>
                                        <label><?php echo $e['recordarme']?></label>
                                    </li>
                                </ul>
                                <ul class="form-right">
                                    <li class="pass">
                                        <label><?php echo $e['password']?></label>
                                        <?php echo $this->Form->input('password', array('label'=>'', 'value'=>$this->Session -> read("tmp_pass_session"), 'tabindex'=>'2', 'div'=>false))?>
                                        <?php echo $this->Html->link($e['olvido'],array('controller'=>'users', 'action'=>'forgot_password'), array('style'=>'font-size:11px; color:#FFFFFF; text-decoration: none;'))?>
                                    </li>
                                    <li>
                                        <button tabindex="4"><?php echo $b['login']?></button>
                                    </li>
                                </ul>
                            <?php echo $this->Form->end();?>
                        </div>
                    </div>        
                </div>
                <!-- end header section -->
                
                <!-- content section -->
                <?php echo $this->Session->flash(); ?>
                <?php echo $content_for_layout; ?>  
                <!-- end content section -->  
                
                <!-- footer section -->
                <div id="footer">
                    <div class="redes_sociales">
                        <ul class="link_terminos">
                            <li>
                                <?php echo $this->Html->link($b['terminos'], array('controller'=>'pages', 'action'=>'terms_and_conditions'), array('escape' => false, 'class' => "more align-right", 'title' => 'T&eacute;rminos y condiciones')); ?>
                            </li>
                            <li class="last">
                                <?php echo $this->Html->link($b['politicas'], array('controller'=>'pages', 'action'=>'privacy_policy'), array('escape' => false, 'class' => "more align-right", 'title' => 'Pol&iacute;ticas de privacidad')); ?>
                            </li>
                        </ul>
                        <div>
                            <img src="<?php echo $this->Html->url('/', true); ?>img/icono_phone.png" alt="" />
                            <h2>Seleccionweb</h2> 
                        </div>
                        <ul>
                            <li>
                                <a href="http://www.facebook.com/pages/Selecci%C3%B3nWeb/180908685290201" title="Facebook" target="_blank"><?php echo $html->image("icon_facebook.png", array('alt' => 'facebook')) ?></a>
                            </li>
                            <li>
                                <a href="http://twitter.com/seleccionweb" title="Twitter" target="_blank"><?php echo $html->image("icon_twitter.png", array('alt' => 'twitter')) ?></a>
                            </li>
                            <li>
                                <a href="http://www.linkedin.com/company/selecci-nweb" title="Linkedin" target="_blank"><?php echo $html->image("icon_in.png", array('alt' => 'linkedin')) ?></a>
                            </li>
                            <li>
                                <a href="http://www.youtube.com/user/seleccionweb" title="Youtube" target="_blank"><?php echo $html->image("icon_youtube.png", array('alt' => 'youtube')) ?></a>
                            </li>
                            <li>
                                <a href="#" title="Play" target="_blank"><?php echo $html->image("icon_play.png", array('alt' => 'play')) ?></a>
                            </li>
                            <li class="me_gusta">
                                <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.seleccionweb.com%2F&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:73px; height:24px;" allowTransparency="true"></iframe>
                            </li>
                        </ul>
                    </div>
                    <div class="menu_footer">
                    <?php echo $l['conozca_mas']?>
                    <?php echo $l['beneficios']?>
                    <?php echo $l['como_funciona']?>
                        <!--ul>
                            <li>
                                <h2>Conozca m&aacute;s</h2>
                            </li>
                            <li>
                                <p>Selecci&oacute;nWeb es el resultado del desarrollo de una plataforma 2.0 para la Selecci&oacute;n o Preselecci&oacute;n de Recursos Humanos mediante el uso de un nuevo concepto.</p>
                            </li>
                            <li>
                                <p>Este nuevo concepto desarrollado por Selecci&oacute;nWeb hace m&aacute;s sencilla y r&aacute;pida la contratación de los mejores talentos reduciendo costos y tiempo.</p>
                            </li>
                            <li class="ver_mas_beneficios">
                                <?php echo $this->Html->link('Ver mas &#62;&#62;', array('controller'=>'pages', 'action'=>'learn_more'), array('escape' => false, 'class' => "more align-right")); ?>
                            </li>
                        </ul-->
                        <!--ul>
                            <li>
                                <h2>Beneficios</h2>
                            </li>
                            <li>
                                <p>Logra eficiencia en el proceso Selecci&oacute;n o Preselecci&oacute;n de Recursos Humanos.<p>
                            </li>
                            <li>
                                <p>Ahorra tiempo y reduce costos operativos.</p>
                            </li>
                            <li>
                                <p>Facilita la toma de decisi&oacute;n con sus colegas al momento de la contrataci&oacute;n, logrando eficiencia en el proceso.</p>
                            </li>
                            <li>
                                <p>Sustituye tareas manuales y retos log&iacute;sticos con una f&aacute;cil aplicaci&oacute;n, Selecci&oacute;nWeb una aplicaci&oacute;n pensada para la web.</p>
                            </li>
                            <li class="ver_mas_beneficios">
                                <?php echo $this->Html->link('Ver mas &#62;&#62;', array('controller'=>'pages', 'action'=>'benefits'), array('escape' => false, 'class' => "more align-right")); ?>
                            </li>
                        </ul-->
                        <!--ul class="como_funciona">
                            <li>
                                <h2>Como Funciona</h2>
                            </li>
                            <li>
                                <ul class="content_footer_cliente">
                                    <li>
                                        <h2>Cliente</h2>
                                    </li>
                                    <li>
                                        <p>Le asigna un nombre a la Video Selecci&oacute;n.</p>
                                    </li>
                                    <li>
                                        <p>Arma el cuestionario seleccionando o escribiendo las preguntas y los tiempos en que desea que los candidatos respondan cada pregunta.</p>
                                    </li>
                                    <li>
                                        <p>Envía la invitaci&oacute;n al candidato y listo!!.</p>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        <h2>Candidato</h2>
                                    </li>
                                    <li>
                                        <p>Los candidatos cuando reciben el mail, aceptan a acceder a la video selecci&oacute;n.</p>
                                    </li>
                                    <li>
                                        <p>Por su parte el portal le informa al candidato el puesto para el cual va a participar de la video selecci&oacute;n.</p>
                                    </li>
                                    <li>
                                        <p>Lea atentamente las instrucciones que le va indicando el portal.</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="ver_mas_beneficios">
                                <?php echo $this->Html->link('Ver mas &#62;&#62;', array('controller'=>'pages', 'action'=>'how_work'), array('escape' => false, 'class' => "more align-right")); ?>
                            </li>
                        </ul-->
                    </div>
                    <div class="logo_footer">
                            <?php echo $this->Html->link(
                                $this->Html->image(
                                    "logo_footer.png", array("alt" => "Seleccion web")),
                                    "/",
                                    array('escape' => false, 'class'=>"logo-ajuste")
                                )
                            ?>
                    </div>
                    <?php echo $l['copyright']?>
                    <!--p class="mens_derechos">Copyright © 2010-2011 <b>SelecciónWeb.com</b>. Todos los derechos de propiedad intelectual se encuentran reservados. La marca y sus logos son propiedad de <b>Motion Net SRL</b>.</p-->
                </div>      
                <!-- end footer section -->
            </div>
        </div>
    </div>
  <!-- end wrapper section -->
</body>
</html>