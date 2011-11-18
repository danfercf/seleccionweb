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
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php //echo $this->Html->charset(); ?>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
        <title>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
            echo $this->Html->meta('icon');

            echo $this->Html->css('private-seleccionweb.css');
            
            echo $this->Html->css('tablas-seleccionweb.css');
            echo $this->Html->css('css-sortable.css');
             
            echo $this->Html->css('smoothness/jquery-ui-1.8.9.custom.css');
            echo $this->Html->css('ezmark.css');
            echo $this->Html->css('jquery.safari-checkbox.css');
            echo $this->Html->css('jquery/dd.css');

            echo $this->Html->script('jquery/jquery-1.4.4.min.js');
            echo $this->Html->script('jquery/jquery-ui-1.8.9.custom.min.js');
            echo $this->Html->script('jquery/jquery.infieldlabel.min.js');
            echo $this->Html->script('ezmark/jquery.ezmark.min.js');
            echo $this->Html->script('jquery/jquery.dd.js');
            
            echo $this->Html->script('jquery/jquery.uitablefilter.js');
            echo $this->Html->script('jquery/jquery.liveFilter.js');
             echo $this->Html->script('jquery/jquery.tablesorter.min.js');
              echo $this->Html->script('jquery/jquery.printElement.js');
             
             echo $this->Html->script('jquery.checkbox.min.js');
             
                echo $this->Html->css('jHtmlArea.css');
                echo $this->Html->script('jHtmlArea-0.7.0.js');
                
                echo $this->Html->css('jquery.jgrowl.css');
                echo $this->Html->script('jquery.jgrowl.js');
             
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
<style>
#msg_new{
    border: 1px solid #AAAAAA;
    display: block;
    padding: 4px 8px;
    position: absolute;
    right: 10px;
    top: 40px;
    width: 271px;
    z-index: 9999;
}
#msg_new ul{
margin: 0;
padding: 0;
}
#msg_new ul li{
    background: url(<?php echo $this->Html->url('/');?>img/video2.png) no-repeat scroll 2px 3px #D6DFFF;
    font-family: fantasy;
    font-size: 11px;
    line-height: 15px;
    list-style: none outside none;
    margin-top: 4px;
    padding: 1px 36px;
}
#msg_new span{
    font-weight: bold;
}
#msg_new a{
color: #2A4F6F;
}
#msg_new a:hover{
color: #1F3A51;
font-weight: bold;
}
</style>
<script type="text/javascript">
    $(function(){
        $("#msg_new").hide();
        $("#content").mouseover(function(){
            $('#msg_new').hide('slow');
           
        })
        $(".welcome").mouseover(function(){
           $('#msg_new').show('slow');
        })

        
        })
        </script>
        </head>
        <body>
            <div id="container">
            <!--pre>
                    <?php
                    $readys=$this->requestAction('/interviews/readys');
                    print_r($readys);
                    ?>
            </pre-->
                <div id="header">
                    <div class="ajuste-contenido" style="position: relative;">
                        <div id="login">
                            <div class="left welcome">
                                <p><strong> Hola <?php echo $this->Session->read('owner')?> <br /> <span id="pending-messages-id" class="pending-messages" style="float: left; margin-left: -20px;"> <a><?php echo count($this->requestAction('/interviews/readys')) ?></a></span></strong>
                                <span class="msg_sin_leer"><?php if ($this->Session->read('rol') == 'admin')  echo "Hay"; else echo "Tiene";?> <?php echo count($this->requestAction('/interviews/readys')) ?> selecciones sin ver</span></p>

                            </div>
                            <div id="logout" class="right" >
                            <?php echo $this->Html->link('logout', array('controller'=>'users', 'action'=> 'logout'), array('class' => 'logout')) ?>
                        </div>
                        
                    </div>
                    <?php
                    $readys=$this->requestAction('/interviews/readys');
                    if(count($readys)>0){
                    ?>
                    <div id="msg_new" style="display: none;">
                    <ul>
                    <?php
                    $readys=$this->requestAction('/interviews/readys');
                    foreach ($readys as $read) {
                        echo "<li>";
                        echo "<span>Selecci&oacute;n:</span> ".$read['Selecction']['name']."<br/><span>Usuario:</span> ";
                        echo $this->Html->link($read['Applicant']['name'],array('controller' => 'interviews', 'action' => 'index',$read['Applicant']['name']));
                        echo "</li>";
                        }
                    ?>
                    </ul>
                    </div>
                    <?php
                    }
                    
                    ?>
                </div>
                <div class="clear_space_h"></div>
                <div class="ajuste-contenido">
                    <?php echo $html->image('private/logo.png', array('alt' => 'Seleccion web')); ?>
                        </div>
                        <div class="clear_space_h"></div>
                        <div id="menu-private">
                            <ul>
                                <?php 
                                //echo $this->Session->read('rol');
                                //if ($this->Session->read('rol') == 'admin') {?><!--li class="<?php echo ($tab=='home')? 'active':''?>"><?php ?><?php echo $html->link("Home", "/users/home") ?></li --><?php //}?>
                                
                                
                                <li class="<?php echo ($tab=='profile')? 'active':''?>"><?php echo $html->link("Mi cuenta", "/users/profile") ?></li>
                                 <?php if ($this->Session->read('rol') != 'video' && $this->Session->read('rol') != 'admin') { ?><li class="<?php echo ($tab=='seleccion')? 'active':''?>"><?php echo $html->link("Crear Seleccion", "/selecctions/add") ?></li><?php }?>
                               <?php if (($this->Session->read('rol') == 'xxvideo') && ($this->Session->read('rol') != 'admin')) { ?><li class="<?php echo ($tab=='mensaje')? 'active':''?>"><?php echo $html->link("Mensaje Nuevo", "/selecctions/send") ?></li><?php }?>
                              <li class="<?php echo ($tab=='entrevistas')? 'active':''?>"><?php echo $html->link("Ver Seleccion", "/interviews") ?></li>
                      
                              <!--  <li class="<?php echo ($tab=='aplicantes')? 'active':''?>"><?php echo $html->link("Postulantes", "/applicants") ?></li> -->
                                <?php if ($this->Session->read('rol') == 'administrador') { ?> <li class="last <?php echo ($tab=='purchase')? 'active':''?>"><?php echo $html->link("Planes", "/clients/purchase") ?></li><?php }?>
                                
                                 <?php  if($this->Session->read('rol') == 'admin') {?><li class="<?php echo ($tab=='purchase')? 'active':''?>"><?php ?><?php echo $html->link("Planes", "/users/purchase") ?></li><?php }?>
                                 <?php  if($this->Session->read('rol') == 'admin') {?><li class="<?php echo ($tab=='config')? 'active':''?>"><?php ?><?php echo $html->link("Idiomas", "/languages/") ?></li><?php }?>
                                      </ul>

                        </div>
                    </div>
                    <div id="content">
                <?php echo $this->Session->flash(); ?>
                <?php echo $content_for_layout; ?>
                        </div>
                    </div>
                    <div id="footer">

                    </div>
                    <div class="clear_space_h"></div>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>