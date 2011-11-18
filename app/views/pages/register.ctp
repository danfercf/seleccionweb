<?php
echo $this->Html->script('regulador-precio.js');
echo $this->Html->script('jquery/jquery.DOMWindow.js');
echo $this->Html->css('tablas-seleccionweb.css');
echo $this->Html->css('forms.css');
?>

<script type="text/javascript" >
    $(document).ready(function() {
       $.datepicker.setDefaults( $.datepicker.regional[ "es" ] );
        //$( "#birth-client" ).datepicker( $.datepicker.regional[ "es" ] );
      $( "#birth-client" ).datepicker( {
            changeMonth: true,
			changeYear: true,
            yearRange: '1950:2000',
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
            monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic']
		} );
        
       // $('select').msDropDown().data("dd");
      //$('#mes-client').val('Mes:');
      //  alert($('#mes-client').html());
        
        $('.fixedAjaxDOMWindow').openDOMWindow({
            height:450,
            width:720,
            eventType:'click',
            loader:1,
            loaderImagePath:'<?php echo $this->Html->url('/') ?>img/ajax-loader.gif',
            loaderHeight:16,
            loaderWidth:17,
            windowSource:'ajax',
            windowHTTPType:'post'
        });
        
        $("#register-form").validate();
        $("#register-form").submit(function() {
            if (!$("#ok-terminos").attr('checked')) {
                $('#error-terminos').fadeIn('slow');
                return false;
            }
        });
        $('#type').change(function(){
            empresa($(this).attr('checked'));
           
        });
        empresa($('#type').attr('checked'));
        function empresa(val){
            if(val){
                $('.nac_oc').fadeOut('slow');
                $('#nombre-empresa').fadeIn('slow');
                $('#razon-client').addClass("required");
            }else{
                $('.nac_oc').fadeIn('slow');
                $('#nombre-empresa').fadeOut('slow');
                $('#razon-client').removeClass("required");
            }
        }
    });
</script>
<div id="content-funciona">
    <div class="form_registro">
        <h2>Registrate Gratis!</h2>
        <div class="content_registro">
            <p>Registrarse en el portal es muy simple y gratuito.</p>
            <p>Para mayor informaci&oacute;n escribanos a <a href="#" title="">info@seleccionweb.com</a></p>
            <form name="" action="" method="">
                <ul class="content_form_top">
                    <li>
                        <div class="form_left">
                            <label>Nombre</label>
                            <input name="nombre" id="nombre" />
                            <span>Integer sit amet tellus arcu</span>
                        </div>
                        <div class="form_right">
                            <label>Apellido</label>
                            <input name="apellido" id="apellido" />
                            <span>Integer sit amet tellus arcu</span>
                        </div>
                    </li>
                    <li>
                        <div class="form_left">
                            <label>Direcci&oacute;n</label>
                            <input name="direccion" id="direccion" />
                            <span>Integer sit amet tellus arcu</span>
                        </div>
                        <div class="form_right">
                            <label>Tel&eacute;fono</label>
                            <ul class="input_telefono">
                                <li class="area_telefono">
                                    <input name="area" id="area" />
                                    <span>Area</span>
                                </li>
                                <li class="numero_telefono">
                                    <input name="numero" id="numero" />
                                    <span>Numero</span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="form_left">
                            <label>Email</label>
                            <input name="email" id="email" />
                            <span>Integer sit amet tellus arcu</span>
                        </div>
                        <div class="form_right">
                            <label>Fecha de nacimiento</label>
                            <ul class="input_fecha">
                                <li class="dia_mes">
                                    <input name="dia" id="dia" />
                                    <span>DD</span>
                                </li>
                                <li class="dia_mes">
                                    <input name="mes" id="mes" />
                                    <span>MM</span>
                                </li>
                                <li class="anio_fecha">
                                    <input name="anio" id="anio" />
                                    <span>AAAA</span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="form_left">
                            <label>Password</label>
                            <input name="password" id="password" />
                            <span>Integer sit amet tellus arcu</span>
                        </div>
                        <div class="form_right">
                            <label>Repetir password</label>
                            <input name="repetir_pass" id="repetir_pass" />
                            <span>Integer sit amet tellus arcu</span>
                        </div>
                    </li>
                </ul>
                <ul class="content_form_bottom">
                    <li class="form_bottom_left">
                        <input type="checkbox" value="aceptar_terminos" class="check"/>
                        <label>He leido y acepto los <a href="#" title="">terminos y condiciones</a></label>
                    </li>
                    <li class="form_bottom_right">
                        <button>Registrarse</button>
                    </li>
                </ul>
            </form>
        </div>
        <div class="content_bottom_registro"></div>
    </div>
</div>