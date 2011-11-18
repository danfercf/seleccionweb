<?php
    $this->set('empresa', $this->Session->read('user'));

    $this->set('mensages', isset($more['Message']) ? count($more['Message']) : 0);
$this->set('tab', 'purchase');
?>
<script type="text/javascript">
    $(function(){
        $('#ClientCount').val('10');
        $('#slider').slider({
           
            animate: true, 
            value: 10,
            min:10, 
            max:200,
            slide: function(event, ui) {
                var precio = parseInt($('#precio').text());
                $('#costo').html((ui.value*precio)+' '+'usd');
                $('#numero-preguntas').html(ui.value);
                
                $('#ClientCount').val(ui.value);
                $('#cantidad').val(ui.value);
                $('#total-parcial').html((ui.value*precio)+' '+'usd');
                $('#total-general').html((ui.value*precio)+' '+'usd');
            }
        });
        $('input[type="radio"]').ezMark();
    });
</script>

<div id="content">
    <div class="content-plan-top">
        <div class="content-plan-left">
            <h2>Ventajas y Planes</h2>
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
            </ul>
        </div>           
        <div class="content-plan-right">
            <div class="cont-regulador-top">
                <h2>Regulador de precio</h2>
            </div>
            <div class="cont-regulador-center">
                <div class="slider_deslizante">
                    <div id="regulador">
                        <ul>
                            <li class="first">10</li>
                            <li class="last">200</li>
                        </ul>
                        <div id="slider"></div>
                        <div id="preguntas"><span id="numero-preguntas">10</span> Video Selecciones</div>
                    </div>
                </div>
                <ul>
                    <li id="costo">
                        10 usd
                    </li>
                </ul>
            </div>
            <div class="cont-regulador-bottom"></div>
            
            <div id="mensage-plan-contratado">
                <h1 class="private-title" style="margin: 0">Detalle de su compra</h1>
                <?php echo $this->Form->create('Client')?>
                <?php
                    echo $this->Form->hidden('count');
                    ?>
        
                <table style="margin: 0px; width: 100%; font-size: 12px;margin-bottom: 14px;">
                    <thead>
                        <tr>
                        <th style="width:30px">Item</th>
                        <th>Desripcion</th>
                        <th style="width:40px">P. Uni </th>
                        <th style="width:40px">Cantidad</th>
                        <th style="width:60px">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Video Seleccion</td>
                            <td> <span id="precio"><?php echo $costo[0]['costo'];?></span> usd</td>  <!-- regulador de precios -->
                            <td style="text-align: right"><?php echo $this->Form->input('amount', array('label'=>false, 'style'=>'width:40px;text-align: right', 'value'=>10, 'id'=>'cantidad', 'readonly'=>'readonly'))?></td>
                            <td id="total-parcial"><?php echo $costo[0]['costo']*10;?>.00 usd</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">Total </td>
                            <td id="total-general"> <?php echo $costo[0]['costo']*10;?>.00 usd</td>
                        </tr>
                    </tfoot>
        
                </table>
                <input type='image' style="float: right;"name='submit' src='https://www.paypal.com/es_ES/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal'/>
                <?php echo $this->Form->end();?>
        
            </div>
        </div>
    </div>
    <div class="content-plan-bottom">
        <div class="contenedor-planes-top"></div>
        <div class="contenedor-planes-center">
            <div class="title-plan">
                <div class="planA">
                    <h2>Plan inicial</h2>
                </div>
                <div class="contenido_planA">
                    <ul class="descrip_plan">
                        <li class="first">
                            <p><b><?php echo $costo[1]['preguntas'];?></b></p>
                        </li>
                        <li class="first">
                            <p>Video Selecciones</p>
                        </li>
                    </ul>
                    <ul class="precio">
                        <li>
                            <h2><b><?php echo $costo[1]['costo'];?></b> usd</h2>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="title-plan">
                <div class="planB">
                    <h2>Plan b&aacute;sico</h2>
                </div>
                <div class="contenido_planA">
                    <ul class="descrip_plan">
                        <li class="first">
                            <p><b><?php echo $costo[2]['preguntas'];?></b></p>
                        </li>
                        <li class="first">
                            <p>Video Selecciones</p>
                        </li>
                    </ul>
                    <ul class="precio">
                        <li>
                            <h2><b><?php echo $costo[2]['costo'];?></b> usd</h2>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="title-plan">
                <div class="planC">
                    <h2>Plan medio</h2>
                </div>
                <div class="contenido_planA">
                    <ul class="descrip_plan">
                        <li class="first">
                            <p><b><?php echo $costo[3]['preguntas'];?></b></p>
                        </li>
                        <li class="first">
                            <p>Video Selecciones</p>
                        </li>
                    </ul>
                    <ul class="precio">
                        <li>
                            <h2><b><?php echo $costo[3]['costo'];?></b> usd</h2>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="title-plan">
                <div class="planD">
                    <h2>Plan alto</h2>
                </div>
                <div class="contenido_planA">
                    <ul class="descrip_plan">
                        <li class="first">
                            <p><b><?php echo $costo[4]['preguntas'];?></b></p>
                        </li>
                        <li class="first">
                            <p>Video Selecciones</p>
                        </li>
                    </ul>
                    <ul class="precio">
                        <li>
                            <h2><b><?php echo $costo[4]['costo'];?></b> usd</h2>
                        </li>
                    </ul>
                </div>
            </div>
        </div> 
        <div class="contenedor-planes-bottom"></div>
    </div>
</div>