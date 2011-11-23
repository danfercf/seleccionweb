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
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
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
    /*echo $this->Html->css('ezmark.css');*/
    echo $this->Html->css('jquery/dd.css');
    
    /*Nuevos estilos*/
    echo $this->Html->css('reset.css');
    echo $this->Html->css('main.css');
    /*echo $this->Html->css('nuevos/jquery-ui.css');
    echo $this->Html->css('nuevos/ui.theme.css');*/
    
    
    echo $this->Html->script('jquery/jquery-1.4.4.min.js');
    echo $this->Html->script('jquery/jquery-ui-1.8.9.custom.min.js');
    echo $this->Html->script('jquery/jquery.infieldlabel.min.js');
    /*echo $this->Html->script('ezmark/jquery.ezmark.min.js');*/
    echo $this->Html->script('validate/jquery.validate.js');
    /*echo $this->Html->script('initialize-forms.js');*/
    echo $this->Html->script('jquery/jquery.dd.js');
    echo $scripts_for_layout;
    
    /*Nuevos scripts*/
    /*echo $this->Html->script('menu.js');*/
    echo $this->Html->script('jquery/jquery.bxSlider.min.js');
    
    $ln = $this->requestAction("/languages/leer");
    
    
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
                       
             var html=$("#language li").find(".<?php echo $ln?>").html();
             
             $("#language li").find(".<?php echo $ln?>").parent().remove();
             $("#language li a.titulo").css({'background' : 'url("<?php echo $this->Html->url('/') ?>img/flags/<?php echo $ln?>.png") no-repeat scroll 5px center transparent','cursor':'none'}).html(html);
             
             
              $("#language li a.titulo").mouseover(function(){
                $("#language .menu_header_lang").slideToggle("fast");
                return false;
              })
              
              $("#language").mouseout(function(){
                /*$("#language .menu_header_lang").slideUp("fast");
                return false;*/
              })
              
              /*$(document).click(function(){
                ("#language").slideUp("fast");
                $return false;
              })*/
             
            $("#language li a").click(function(){

                var key=$(this).attr("key");
    
                
                    $.ajax({
                      url: '<?php echo $this->Html->url(array( "controller" => "languages","action" => "get"));?>/'+key,
                      success:function(data){
                           location.reload();
                        }
                    });
                return false;
            });
         
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
                        <li class="more_left"></li>
                        <li class="left">
                        <?php echo $html->link("Acceder", "/users/login") ?>
                        </li>
                        <li class="center">
                        <?php echo $html->link("Registrar", "/pages/register") ?>
                        </li>
                        <li class="right">
                                      <ul id="language">
                                        
                                         <li><a class="titulo"></a>                                            
                                        		<ul class="menu_header_lang">                                                 
                                        		<?php
                                                    foreach($langs as $row)	:
                                                ?>
                                                <li>                       
                                                <a class="<?php echo $row['Language']['key'];?>"  key="<?php echo $row['Language']['key'];?>"><?php if($row['Language']['key']=="es"){echo "Espanol";}if($row['Language']['key']=="en"){echo "Ingles";}if($row['Language']['key']=="pt"){echo "Potugues";}?></a>
                                                </li>
                                                <?php  endforeach; ?>
                                                    
                                        		</ul> 
                                        </li>
                                      </ul>
                         </li>
                         <li class="more_right"></li>       
                     </ul>
               </div>
                <div class="down">
                    <div class="logo">
                    <?php echo $this->Html->link(
                                $this->Html->image(
                                    "logo.png", array("alt" => "Seleccion web")),
                                    "/",
                                    array('escape' => false, 'class'=>"logo")
                                )
                    ?>
                    </div>
                    
                        <ul class="menu">                        
                        <!-- <li><a href="#">HOME</a></li>-->                        
                            <li>
                            <?php echo $html->link("HOME", "/") ?>
                            </li>                                                        
                            <!-- <li><a href="#">COMO FUNCIONA</a></li>-->
                            <li>
                            <?php echo $html->link($b['conozca_mas'], "/pages/how_work") ?>
                            <?php //echo $this->Html->link($b['conozca_mas'], array('controller'=>'pages', 'action'=>'learn_more'), array('escape' => false, 'class' => "more align-right")); ?>
                            </li>
                                                        
                            <!--<li><a href="#">PLANES</a></li>-->
                            
                            <li>
                            <!--Sin traduccion-->
                            <?php echo $html->link("PLANES", "/pages/plans") ?>
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
                <div class="bar"><?php echo $html->image("sepa.png", array('alt' => '')) ?></div>
                
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
                <div class="logo">
                        <?php echo $this->Html->link(
                                        $this->Html->image(
                                            "logo.png", array("alt" => "Seleccion web")),
                                            "/",
                                            array('escape' => false, 'class'=>"logo")
                                        )
                        ?>
                </div><p>&copy; 2011 Todos los derechos reservados</p>
                </div>
                <div class="menu_footer">
                    <ul>
                        <li><div class="row">
                        <?php echo $html->image("row.png") ?><?php echo $html->link("HOME", "/") ?>
                        </div></li>
                        <li><div class="row">
                        <?php echo $html->image("row.png") ?><?php echo $html->link($b['conozca_mas'], "/pages/how_work") ?>
                        </div></li>
                        <li><div class="row">
                        <?php echo $html->image("row.png") ?><?php echo $html->link($b['nuestros_planes'], "/pages/plans") ?>
                        </div></li>
                        <li><div class="row">
                        <a href="#" ><?php echo $html->image("row.png") ?>Blog</a>
                        </div></li>
                        <li><div class="row">
                        <a href="#" ><?php echo $html->image("row.png") ?>Terminos y Condiciones</a>
                        <?php /*echo $html->image("row.png") */?><?/*php echo $html->link($b['terminos'], "/pages/terms_and_conditions") */?>
                        </div></li>
                        <li><div class="row">
                        <a href="#" ><?php echo $html->image("row.png") ?>Politicas de privacidad</a>
                        <?php /*echo $html->image("row.png") */?><?/*php echo $html->link($b['politicas'], "/pages/privacy_policy") */?>
                        </div></li>
                        <li><div class="row">
                        <?php echo $html->image("row.png") ?><?php echo $html->link($b['contacto'], "/pages/contact") ?>
                        </div></li>
                    </ul>
                </div>
                <div class="right">
                    <div class="newsletter"><form action="#"><p>Newsletter</p>
                    <input type="text" class="input"/><input type="submit" value="SUBSCRIBIR AL NEWSLETTER" class="submit"/></form></div>
                    <div class="social_networdks">
                        <p>Mantenete actualizado</p>
                        <ul>
                            <li>
                            <a href="http://www.facebook.com/pages/Selecci%C3%B3nWeb/180908685290201" title="Facebook" target="_blank"><?php echo $html->image("f.png", array('alt' => 'facebook')) ?></a>
                            </li>
                            <li>
                            <a href="http://twitter.com/seleccionweb" title="Twitter" target="_blank"><?php echo $html->image("t.png", array('alt' => 'twitter')) ?></a>
                            </li>
                            <li>
                            <a href="http://www.linkedin.com/company/selecci-nweb" title="Linkedin" target="_blank"><?php echo $html->image("in.png", array('alt' => 'linkedin')) ?></a>
                            </li>
                            <li>
                            <a href="http://www.youtube.com/user/seleccionweb" title="Youtube" target="_blank"><?php echo $html->image("youtube.png", array('alt' => 'youtube')) ?></a>
                            </li>
                            <li>
                            <a href="#" ><?php echo $html->image("v.png", array('alt' => '')) ?></a>
                            </li>
                            <li>
                            <a href="#" ><?php echo $html->image("b.png", array('alt' => '')) ?></a>
                            </li>
                            <li>
                            <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.seleccionweb.com%2F&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:73px; height:24px;" allowTransparency="true"></iframe>
                            </li>
                            <li>
                            <a href="#" ><?php echo $html->image("follow.png", array('alt' => '')) ?></a>
                            </li>
                            <li>
                            <a href="#" ><?php echo $html->image("seleccionweb.png", array('alt' => '')) ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>