<?php
    $this->set('empresa', $this->Session->read('user'));

    $this->set('mensages', isset($more['Message']) ? count($more['Message']) : 0);
$this->set('tab', 'purchase');
?>
<script type="text/javascript">
    $(function(){
        $('#ClientCount').val('1');
        $('#slider').slider({
            value: <?php echo $costo[0]['costo'];?>,
            min: 0,
			max: 20,

            slide: function(event, ui) {
               // var precio = parseInt($('#precio').text());
               
                $('#costo').html((ui.value*1)+' '+'usd');
                $('#numero-preguntas').html(ui.value);
                
                $('#ClientCount').val(ui.value);
                $('#cantidad').val(ui.value);
                $('#total-parcial').html((ui.value*1)+' '+'usd');
                $('#total-general').html((ui.value*1)+' '+'usd');
            }
        });
        $('input[type="radio"]').ezMark();
    });
</script>
<!--pre>
<?php 
//print_r($co);
?>
</pre-->
<div id="content-plans">
    <div id="box-plans">
        <h2>Planes: </h2>
        <div style="width: 350px; margin: auto;">
        <div class="box-plan" style="display: inline-block; margin-right: 50px;">
         <?php echo $this->Form->create('User')?>
         <input type="hidden" value="1" name="plan"/>
            <h1 class="title blue">Plan Inicial</h1>
            <ul>
                
                <li><?php echo $this->Form->input('p', array('label'=>false, 'style'=>'width:20px','value'=>$costo[1]['preguntas'],'div'=>false))?> Video selecciones</li>
                <li><?php echo $this->Form->input('c', array('label'=>false, 'style'=>'width:20px','value'=>$costo[1]['cantidad'],'div'=>false))?> Candidatos</li>
                <li><?php echo $this->Form->input('m', array('label'=>false, 'style'=>'width:20px','value'=>$costo[1]['tiempo'],'div'=>false))?> meses de servicio</li>
            </ul>
            <h1 class="cash"><?php echo $this->Form->input('t', array('label'=>false, 'style'=>'width:50px; font-size:22px', 'value'=>$costo[1]['costo'],'div'=>false))?> usd</h1>
            <div class="text-center blue">
                <input type='submit' style="color: #111111;" value="Aceptar"  name='submit'  alt='Aceptar'/>
            </div>
        <?php echo $this->Form->end();?>
        </div>
            <div class="box-plan" style="display: inline-block;" >
            <?php echo $this->Form->create('User')?>
            <input type="hidden" value="2" name="plan"/>
                <h1 class="title green">Plan Basico</h1>
                <ul>
                <li><?php echo $this->Form->input('p', array('label'=>false, 'style'=>'width:20px','value'=>$costo[2]['preguntas'],'div'=>false))?> Video selecciones</li>
                <li><?php echo $this->Form->input('c', array('label'=>false, 'style'=>'width:20px','value'=>$costo[2]['cantidad'],'div'=>false))?> Candidatos</li>
                <li><?php echo $this->Form->input('m', array('label'=>false, 'style'=>'width:20px','value'=>$costo[2]['tiempo'],'div'=>false))?> meses de servicio</li>
                </ul>
                <h1 class="cash"><?php echo $this->Form->input('t', array('label'=>false, 'style'=>'width:50px; font-size:22px', 'value'=>$costo[2]['costo'],'div'=>false))?> usd</h1>
                <div class="text-center green">
                    <input type='submit' style="color: #111111;" name='submit'  value="Aceptar" alt='Aceptar'/>
                </div>
                 <?php echo $this->Form->end();?>
            </div>
            <br>
            <br>
            <div class="box-plan" style="display: inline-block; margin-right: 50px;">
            <?php echo $this->Form->create('User')?>
            <input type="hidden" value="3" name="plan"/>
                <h1 class="title orange">Plan Medio</h1>
                <ul>
                  <li><?php echo $this->Form->input('p', array('label'=>false, 'style'=>'width:20px','value'=>$costo[3]['preguntas'],'div'=>false))?> Video selecciones</li>
                <li><?php echo $this->Form->input('c', array('label'=>false, 'style'=>'width:20px','value'=>$costo[3]['cantidad'],'div'=>false))?> Candidatos</li>
                <li><?php echo $this->Form->input('m', array('label'=>false, 'style'=>'width:20px','value'=>$costo[3]['tiempo'],'div'=>false))?> meses de servicio</li>
                </ul>
                <h1 class="cash"><?php echo $this->Form->input('t', array('label'=>false, 'style'=>'width:50px; font-size:22px', 'value'=>$costo[3]['costo'],'div'=>false))?> usd</h1>
                <div class="text-center orange">
                    <input type='submit' style="color: #111111;" name='submit'  value="Aceptar" alt='Aceptar'/>
                </div>
                 <?php echo $this->Form->end();?>
            </div>
            <div class="box-plan" style="display: inline-block;">
            <?php echo $this->Form->create('User')?>
            <input type="hidden" value="4" name="plan"/>
                <h1 class="title cian">Plan Alto</h1>
                <ul>
                 <li><?php echo $this->Form->input('p', array('label'=>false, 'style'=>'width:20px','value'=>$costo[4]['preguntas'],'div'=>false))?> Video selecciones</li>
                <li><?php echo $this->Form->input('c', array('label'=>false, 'style'=>'width:20px','value'=>$costo[4]['cantidad'],'div'=>false))?> Candidatos</li>
                <li><?php echo $this->Form->input('m', array('label'=>false, 'style'=>'width:20px','value'=>$costo[4]['tiempo'],'div'=>false))?> meses de servicio</li>
                </ul>
                <h1 class="cash"><?php echo $this->Form->input('t', array('label'=>false, 'style'=>'width:50px; font-size:22px', 'value'=>$costo[4]['costo'],'div'=>false))?> usd</h1>
                <div class="text-center cian">
                   <input type='submit' style="color: #111111;" name='submit'  value="Aceptar" alt='Aceptar'/>
                </div>
                 <?php echo $this->Form->end();?>
            </div>
        </div>
    </div>

</div>
<div id="regulador-precio">
    <div  id="form-regulador" class="form-seleccionweb" style="height: 200px;">
        <fieldset style="padding: 0; margin: 0; border: 0px;">
            <legend style="width: 316px;">Regulador de precios</legend>
            <div class="down"></div>
            <div id="regulador" style="padding: 0 28px;">
                <ul>
                    <li style="float: left; margin-right: 120px;">0</li>
                    <li>10</li>
                    <li style="float: right;">20</li>
                </ul>
                <div id="slider"></div>
                <div id="preguntas" style="font-size: 16px;">Costo por una Selecci&oacute;n : <span id="numero-preguntas"><?php echo $costo[0]['costo'];?></span> usd</div>
            </div>
            <!--div id="moneda">
                <h4>Valor en: </h4>
                <input type="radio" name="moneda" id="dolares" checked="checked"><label for="dolares"> Dolares</label><br/>
                <input type="radio" name="moneda" id="argentinos"><label for="argentinos"> Pesos Argentrinos</label><br/>
                <input type="radio" name="moneda" id="uruguayos" ><label for="uruguayos"> Pesos Uruguayos</label><br/>
                <input type="radio" name="moneda" id="reales"><label for="reales"> Reales</label><br/>
            </div -->

        </fieldset>
        
    </div>
    <br>

<div id="mensage-plan-contratado">
        <h1 class="private-title" style="margin: 0">Detalle de su compra</h1>
        <?php echo $this->Form->create('User')?>
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
                    <td style="text-align: right"><span id="precio"><?php echo $this->Form->input('amount', array('label'=>false, 'style'=>'width:40px;text-align: right', 'value'=>$costo[0]['costo'], 'id'=>'cantidad','div'=>false))?></span> usd</td>
                    <td>1</td>  <!-- regulador de precios -->
                    <td id="total-parcial"> <?php echo $costo[0]['costo'];?>.00 usd</td>
                </tr>
            </tbody>

        </table>
         <input type='submit' class="button submit" style=" float: right;" name='submit'  value="Guardar" alt='Aceptar'/>
        <?php echo $this->Form->end();?>
    </div>
</div>

