<?php
$e = $this->requestAction("/languages/reader/etiqueta");
$b = $this->requestAction("/languages/reader/botones");
$ba = $this->requestAction("/languages/reader/banner");
?>
<?php $readys=$this->requestAction('/users/planes'); ?>

<script type="text/javascript">
var unitario=<?php  echo $readys[0]['Payment']['costo']?>;
$(function(){
$('#slider').slider({
    animate: true, 
    value: 10,
    min:10, 
    max:200,
    slide: function(event, ui) { 
        $('#costo').html((ui.value*unitario )+ 'usd');
        $('#numero-preguntas').html(ui.value);

    }
});
});

</script>
<div id="content">
    <div class="content-plan-top">
        <div class="content-plan-left">
        <?php echo $ba['ventas'];?>
            <!--h2>Ventajas y Planes</h2>
            <ul>
                <li class="title_ventajas">
                    Selecci&oacute;nWeb le brinda las siguientes ventajas:
                </li>
                <li>
                    <span>Administraci&oacute;n desde el panel de control de múltiples Video Selecciones.</span>
                </li>
                <li>
                    <span>Listas con preguntas para cada video selecci&oacute;n totalmente personalizadas</span>
                </li>
                <li>
                    <span>Ver las video selecciones cuantas veces lo desee.</span>
                </li>
                <li>
                    <span>Compartir las video selecciones con pares o clientes.</span>
                </li>
                <li>
                    <span>Y muchas ventajas mas.</span>
                </li>
            </ul>
            <ul class="medios_pago">
                <li class="title_ventajas">
                    Ponemos a su disposición los siguientes medios de pago:
                </li>
                <li>
                    <span>Pay Pal, Dinero Mail o Consultenos otras opciones a <a href="mailto:ventas@seleccionweb.com" title="">ventas@seleccionweb.com</a></span>
                </li>
            </ul-->
        </div>           
        <div class="content-plan-right">
            <div class="cont-regulador-top">
                <h2><?php echo $e['regulador'];?></h2>
            </div>
            <div class="cont-regulador-center">
                <div class="slider_deslizante">
                    <div id="regulador">
                        <ul>
                            <li class="first">10</li>
                            <li class="last">200</li>
                        </ul>
                        <div id="slider"></div>
                        <div id="preguntas"><span id="numero-preguntas">10</span> <?php echo $e['video_sel'];?></div>
                    </div>
                </div>
                <ul>
                    <li id="costo">
                        <?php  echo $readys[0]['Payment']['costo']*10?>usd
                    </li>
                    <li class="botom_contratar">
                        <?php echo $this->Html->link($b['contratar'],
                             array('controller'=>'clients', 'action'=>'purchase'),
                            array('escape' => false, 'style'=>'color: #FFFFFF; text-decoration: none' )
                            )
                        ?>
                    </li>
                </ul>
            </div>
            <div class="cont-regulador-bottom"></div>
        </div>
    </div>
    <div class="content-plan-bottom">
        <div class="contenedor-planes-top"></div>
        <div class="contenedor-planes-center">
            <div class="title-plan">
                <div class="planA">
                    <h2><?php echo $e['plani'];?></h2>
                </div>
                <div class="contenido_planA">
                    <ul class="descrip_plan">
                        <li class="first">
                            <p><b><?php  echo $readys[1]['Payment']['preguntas']?></b></p>
                        </li>
                        <li class="first">
                            <p><?php echo $e['video_sel'];?></p>
                        </li>
                    </ul>
                    <ul class="precio">
                        <li>
                            <h2><b><?php  echo $readys[1]['Payment']['costo']?></b> usd</h2>
                        </li>
                        <li class="last">
                        <?php echo $this->Html->link($b['contratar'],
                            array('controller'=>'clients', 'action'=>'purchase'),
                            array('escape' => false)
                            )
                        ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="title-plan">
                <div class="planB">
                    <h2><?php echo $e['planb'];?></h2>
                </div>
                <div class="contenido_planA">
                    <ul class="descrip_plan">
                        <li class="first">
                            <p><b><?php  echo $readys[2]['Payment']['preguntas']?></b></p>
                        </li>
                        <li class="first">
                            <p><?php echo $e['video_sel'];?></p>
                        </li>
                    </ul>
                    <ul class="precio">
                        <li>
                            <h2><b><?php  echo $readys[2]['Payment']['costo']?></b> usd</h2>
                        </li>
                        <li class="last">
                        <?php echo $this->Html->link($b['contratar'],
                             array('controller'=>'clients', 'action'=>'purchase'),
                             array('escape' => false)
                            )
                        ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="title-plan">
                <div class="planC">
                    <h2><?php echo $e['planm'];?></h2>
                </div>
                <div class="contenido_planA">
                    <ul class="descrip_plan">
                        <li class="first">
                            <p><b><?php  echo $readys[3]['Payment']['preguntas']?></b></p>
                        </li>
                        <li class="first">
                            <p><?php echo $e['video_sel'];?></p>
                        </li>
                    </ul>
                    <ul class="precio">
                        <li>
                            <h2><b><?php  echo $readys[3]['Payment']['costo']?></b> usd</h2>
                        </li>
                        <li class="last">
                            <?php echo $this->Html->link($b['contratar'],
                                array('controller'=>'clients', 'action'=>'purchase'),
                                array('escape' => false)
                                )
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="title-plan">
                <div class="planD">
                    <h2><?php echo $e['plana'];?></h2>
                </div>
                <div class="contenido_planA">
                    <ul class="descrip_plan">
                        <li class="first">
                            <p><b><?php  echo $readys[4]['Payment']['preguntas']?></b></p>
                        </li>
                        <li class="first">
                            <p><?php echo $e['video_sel'];?></p>
                        </li>
                    </ul>
                    <ul class="precio">
                        <li>
                            <h2><b><?php  echo $readys[4]['Payment']['costo']?></b> usd</h2>
                        </li>
                        <li class="last">
                            <?php echo $this->Html->link($b['contratar'],
                                array('controller'=>'clients', 'action'=>'purchase'),
                                array('escape' => false)
                                )
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div> 
        <div class="contenedor-planes-bottom"></div>
    </div>
</div>      