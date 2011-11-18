<?php
    $this->set('empresa', $this->Session->read('user'));

    $this->set('mensages', isset($more['Message']) ? count($more['Message']) : 0);
$this->set('tab', 'purchase');
?>
<script type="text/javascript">
    $(function(){
        $('#ClientCount').val('10');
        $('#slider').slider({
           
            value: 10,
            slide: function(event, ui) {
                var precio = parseInt($('#precio').text());
                $('#costo').html((ui.value*precio)+'$us');
                $('#numero-preguntas').html(ui.value);
                
                $('#ClientCount').val(ui.value);
                $('#cantidad').val(ui.value);
                $('#total-parcial').html((ui.value*precio)+'$us');
                $('#total-general').html((ui.value*precio)+'$us');
            }
        });
        $('input[type="radio"]').ezMark();
    });
</script>

<div id="content-plans">
    <div id="box-plans">
        <h2>Planes Sugeridos</h2>
        <div style="text-align: justify;">
            <p>Nuestros planes incluyen las siguientes ventajas para usted.</p>
            <p>Un mínimo de cinco preguntas por video entrevista de selecci&oacute;n.
            <strong>Selecci&oacute;nWeb</strong> le da la posibilidad de crear de m&uacute;ltiples
            video selecciones con preguntas totalmente personalizadas y poder
            administrar distintos procesos de selecci&oacute;n en un mismo panel de control.</p>
            Usted podr&acute; ver y revisar la video selecci&oacute;n cuantas veces lo desee.
            <p>Desde su panel de control puede f&acute;cilmente compartir con sus colegas
            las video selecciones y tambi&eacute;n poder comentar y evaluar a cada candidato.</p>
            <p>Desde su panel de control tambi&eacute;n podr&aacute; realizar segundas entrevistas
            a los candidatos cuyo desempe&ntilde;o en la primer video selecci&oacute;n ha sido
            el requerido para el puesto.</p>
            <p>Para mayor informaci&oacute;n contactenos a <a href="mailto:ventas@seleccionweb.com">ventas@seleccionweb.com</a></p>
        </div>
        <div style="width: 350px; margin: auto;">
        <div class="box-plan" style="display: inline-block; margin-right: 50px;">
            <h1 class="title blue">Plan A</h1>
            <ul>
                <li><?php echo $costo[1]['preguntas'];?> Preguntas</li>
                <li><?php echo $costo[1]['cantidad'];?> Candidatos</li>
                <li><?php echo $costo[1]['tiempo'];?> meses de servicio</li>
            </ul>
            <h1 class="cash">u$s <?php echo $costo[1]['costo'];?></h1>
            <div class="text-center blue">
                <a href="#" style="color: #FFFFFF; text-decoration: none">Contratar</a>

            </div>
        </div>
            <div class="box-plan" style="display: inline-block;" >
                <h1 class="title green">Plan B</h1>
                <ul>
                <li><?php echo $costo[2]['preguntas'];?> Preguntas</li>
                <li><?php echo $costo[2]['cantidad'];?> Candidatos</li>
                <li><?php echo $costo[2]['tiempo'];?> meses de servicio</li>
                </ul>
                <h1 class="cash">u$s <?php echo $costo[2]['costo'];?></h1>
                <div class="text-center green">
                    <a href="#"  style="color: #FFFFFF; text-decoration: none">Contratar</a>
                </div>
            </div>
            <br>
            <br>
            <div class="box-plan" style="display: inline-block; margin-right: 50px;">
                <h1 class="title orange">Plan C</h1>
                <ul>
                <li><?php echo $costo[3]['preguntas'];?> Preguntas</li>
                <li><?php echo $costo[3]['cantidad'];?> Candidatos</li>
                <li><?php echo $costo[3]['tiempo'];?> meses de servicio</li>
                </ul>
                <h1 class="cash">u$s <?php echo $costo[3]['costo'];?></h1>
                <div class="text-center orange">
                    <a href="#" style="color: #FFFFFF; text-decoration: none">Contratar</a>
                </div>
            </div>
            <div class="box-plan" style="display: inline-block;">
                <h1 class="title cian">Plan D</h1>
                <ul>
                <li><?php echo $costo[4]['preguntas'];?> Preguntas</li>
                <li><?php echo $costo[4]['cantidad'];?> Candidatos</li>
                <li><?php echo $costo[4]['tiempo'];?> meses de servicio</li>
                </ul>
                <h1 class="cash">u$s <?php echo $costo[4]['costo'];?></h1>
                <div class="text-center cian">
                    <a href="#" style="color: #FFFFFF; text-decoration: none">Contratar</a>
                </div>
            </div>
        </div>
        
    </div>
    

    

</div>
<div id="regulador-precio">
    <div  id="form-regulador" class="form-seleccionweb">
        <fieldset style="padding: 0; margin: 0; border: 0px;">
            <legend style="width: 324px;">Regulador de precios</legend>
            <div class="down"></div>
            <div id="regulador">
                <ul>
                    <li style="margin-right: 130px">0</li>
                    <li style="margin-right: 100px">50</li>
                    <li>100</li>
                </ul>
                <div id="slider"></div>
                <div id="preguntas">Numero de Video Selecciones : <span id="numero-preguntas">10</span></div>
            </div>
            <!--div id="moneda">
                <h4>Valor en: </h4>
                <input type="radio" name="moneda" id="dolares" checked="checked"><label for="dolares"> Dolares</label><br/>
                <input type="radio" name="moneda" id="argentinos"><label for="argentinos"> Pesos Argentrinos</label><br/>
                <input type="radio" name="moneda" id="uruguayos" ><label for="uruguayos"> Pesos Uruguayos</label><br/>
                <input type="radio" name="moneda" id="reales"><label for="reales"> Reales</label><br/>
            </div -->
            <div id="costo">
                10 $us
            </div>
            <div class="clear_space_h"></div>

            <div class="clear_space_h"></div>
        </fieldset>
        
    </div>
    <br>
<div id="mensage-plan-contratado">
        <h1 class="private-title" style="margin: 0">Detalle de su compra</h1>
        <?php echo $this->Form->create('Client')?>
        <?php
            echo $this->Form->hidden('count');
            ?>

        <table style="margin: 0px; width: 100%; font-size: 12px;margin-bottom: 30px;">
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
                    <td> <span id="precio"><?php echo $costo[0]['costo'];?></span> $us</td>  <!-- regulador de precios -->
                    <td style="text-align: right"><?php echo $this->Form->input('amount', array('label'=>false, 'style'=>'width:40px;text-align: right', 'value'=>10, 'id'=>'cantidad'))?></td>
                    <td id="total-parcial"><?php echo $costo[0]['costo']*10;?>.00 $us</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Total </td>
                    <td id="total-general"> <?php echo $costo[0]['costo']*10;?>.00 $us</td>
                </tr>
            </tfoot>

        </table>
        <input type='image' style="float: right;"name='submit' src='https://www.paypal.com/es_ES/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal'/>
        <?php echo $this->Form->end();?>

    </div>
</div>

