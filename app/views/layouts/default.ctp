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
<!--NUEVO-->
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css" media="all" />
<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />
<!--FIN NUEVO-->
<title>
    <?php echo $title_for_layout; ?>
</title>
<?php
    echo $this->Html->meta('icon');
	echo $this->Html->charset('utf-8');

    /*echo $this->Html->css('seleccionweb.css');*/
    echo $this->Html->css('smoothness/jquery-ui-1.8.9.custom.css');
    echo $this->Html->css('ezmark.css');
    echo $this->Html->css('jquery/dd.css');
    
    /*Nuevos estilos*/
    echo $this->Html->css('reset.css');
    echo $this->Html->css('main.css');
    /*echo $this->Html->css('nuevos/jquery-ui.css');
    echo $this->Html->css('nuevos/ui.theme.css');*/
    
    
    echo $this->Html->script('jquery/jquery-1.4.4.min.js');
    echo $this->Html->script('jquery/jquery-ui-1.8.9.custom.min.js');
    echo $this->Html->script('jquery/jquery.infieldlabel.min.js');
    echo $this->Html->script('ezmark/jquery.ezmark.min.js');
    echo $this->Html->script('validate/jquery.validate.js');
    echo $this->Html->script('initialize-forms.js');
    echo $this->Html->script('jquery/jquery.dd.js');
    echo $scripts_for_layout;
    
    /*Nuevos scripts*/
    echo $this->Html->script('menu.js');
    echo $this->Html->script('jquery/jquery.bxSlider.min.js');
    
    
    
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
<body>
    <div id="wrapper">
        <div id="header">
           <div id="main">
           
               <div id="head">
                   <div class="menu_top">
                     <ul>
                        <li class="left"><a href="#">Acceder</a></li>
                        <li class="center"><a href="registrate.html">Registrar</a></li>
                        <li class="right"><a href="#">Espanol</a></li>
                     </ul>
               </div>
                <div class="down">
                    <div class="logo"></div>
                    
                        <ul class="menu">                        
                        <!-- <li><a href="#">HOME</a></li>-->                        
                            <li>
                            <a href="#">HOME</a>
                            </li>                                                        
                            <!-- <li><a href="#">COMO FUNCIONA</a></li>-->
                            <li>
                            <?php echo $this->Html->link($b['conozca_mas'], array('controller'=>'pages', 'action'=>'learn_more'), array('escape' => false, 'class' => "more align-right")); ?>
                            </li>
                                                        
                            <!--<li><a href="#">PLANES</a></li>-->
                            
                            <li>
                            <?php echo $html->link($b['nuestros_planes'], "/pages/plans") ?>
                            </li>
                            
                            <!--<li><a href="#">BLOG</a></li>-->
                            
                            <!-- <li><a href="#">BLOG</a></li>-->                            
                            <li><a href="#">BLOG</a></li>
                            
                            
                            <!--<li><a href="#">CONTACTO</a></li>-->
                            
                            <li>
                            <?php echo $html->link($b['contacto'], "/pages/contact") ?>
                            </li>
                            
                        </ul>
                </div>
                <div class="bar"> <img src="images/sepa.png" /> </div>
                
             </div>   
                 
                
              </div>
            </div>
              <!--End header-->
               
                <!-- content section -->
                <?php echo $this->Session->flash(); ?>
                <?php echo $content_for_layout; ?>  
                <!-- end content section -->  
                         
        
              
        <div id="footer">
            <div class="sep nullSep"></div>
            <div class="main">
                <div class="left">     
                <div class="logo"></div><p>&copy; 2011 Todos los derechos reservados</p>
                </div>
                <div class="menu_footer">
                    <ul>
                        <li><div class="row"><a href="index.html" ><img src="images/row.png"/><p>Home</p></a></div></li>
                        <li><div class="row"><a href="comofunciona.html" ><img src="images/row.png"/><p>Como funciona</p></a></div></li>
                        <li><div class="row"><a href="planes.html" ><img src="images/row.png"/><p>Planes</p></a></div></li>
                        <li><div class="row"><a href="#" ><img src="images/row.png"/><p>Blog</p></a></div></li>
                        <li><div class="row"><a href="#" ><img src="images/row.png"/><p>Términos y Condiciones</p></a></div></li>
                        <li><div class="row"><a href="#" ><img src="images/row.png"/><p>Políticas de privacidad</p></a></div></li>
                        <li><div class="row"><a href="contactanos.html" ><img src="images/row.png"/><p>Contacto</p></a></div></li>
                    </ul>
                </div>
                <div class="right">
                    <div class="newsletter"><form action="#"><p>Newsletter</p>
                    <input type="text" class="input"/><input type="submit" value="SUBSCRIBIR AL NEWSLETTER" class="submit"/></form></div>
                    <div class="social_networdks">
                        <p>Mantenete actualizado</p>
                        <ul>
                            <li><a href="#" ><img src="images/f.png"/></a></li>
                            <li><a href="#" ><img src="images/t.png"/></a></li>
                            <li><a href="#" ><img src="images/in.png"/></a></li>
                            <li><a href="#" ><img src="images/youtube.png"/></a></li>
                            <li><a href="#" ><img src="images/v.png"/></a></li>
                            <li><a href="#" ><img src="images/b.png"/></a></li>
                            <li><a href="#" ><img src="images/megusta.png"/></a></li>
                            <li><a href="#" ><img src="images/follow.png"/></a></li>
                            <li><a href="#" ><img src="images/seleccionweb.png"/></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>