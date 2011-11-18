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
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
            echo $this->Html->meta('icon');

            echo $this->Html->css('private-seleccionweb.css');

            echo $this->Html->css('tablas-seleccionweb.css');

            echo $this->Html->css('smoothness/jquery-ui-1.8.9.custom.css');
            echo $this->Html->css('ezmark.css');
            echo $this->Html->css('jquery/dd.css');

            echo $this->Html->script('jquery/jquery-1.4.4.min.js');
            echo $this->Html->script('jquery/jquery-ui-1.8.9.custom.min.js');
            echo $this->Html->script('jquery/jquery.infieldlabel.min.js');
            echo $this->Html->script('ezmark/jquery.ezmark.min.js');
            echo $this->Html->script('jquery/jquery.dd.js');
           // echo $this->Html->script('jquery/jquery.uitablefilter.js');
            echo $this->Html->script('jquery/jquery.liveFilter.js');
            
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
        </head>
        <body>

       <div id="container">
            <div id="content">
                <div id="main-content">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $content_for_layout; ?>
                    </div>
                </div>
</div>
 
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>