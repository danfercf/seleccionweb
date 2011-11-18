<?php
$e = $this->requestAction("/languages/reader/etiqueta");
$b = $this->requestAction("/languages/reader/botones");
$ba = $this->requestAction("/languages/reader/banner");
$f = $this->requestAction("/languages/reader/form");
?>
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
            dateFormat: "dd/mm/yy",
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
           
        });
        $("#register-form").submit(function() {
            if (!$("#ok-terminos").attr('checked')) {
                $('#error-terminos').fadeIn('slow');
                return false;      
            }else{
                $('#error-terminos').fadeOut('slow');
            }
        });
        
        
        $("#register-form").submit(function() {
            controlar_area($('#area-client').val());
            controlar_numero($('#area-client').val());
            controlar_dia($('#day-client').val());
            controlar_mes($('#month-client').val());
            controlar_anio($('#year-client').val());
        
            function controlar_area(val){
            if(val == ''){
                $('#error-area').fadeIn('slow');
                return false;
            }else{
                $('#error-area').fadeOut('slow');
                }
            }
            
            function controlar_numero(val){
            if(val == ''){
                $('#error-numero').fadeIn('slow');
                return false;
            }else{
                $('#error-numero').fadeOut('slow');
                }
            }
            
            function controlar_dia(val){
            if(val == ''){
                $('#error-dia').fadeIn('slow');
                return false;
            }else{
            if(!(val > 0 && val < 32)){
                $('#error-dia').fadeOut('slow');
                $('#error-dia-limit').fadeIn('slow');
                return false;
            }else{
                $('#error-dia-limit').fadeOut('slow');
                } 
               }
            }
            
            function controlar_mes(val){
            if(val == ''){
                $('#error-mes').fadeIn('slow');
                return false;
            }else{
                $('#error-mes').fadeOut('slow');
                }
            }
            
            function controlar_anio(val){
            if(val == ''){
                $('#error-anio').fadeIn('slow');
                return false;
            }else{
                $('#error-anio').fadeOut('slow');
                }
            }
            
        });
       
        $('#type').change(function(){
            empresa($(this).attr('checked'));
           
        });
        empresa($('#type').attr('checked'));
        function empresa(val){
            if(val){
                $('#nombre_contact').text('<?php echo $f['nombree'];?>');
                $('.apellido_cliente').fadeOut('slow');
                $('#surname-client').removeClass("required");
                $('.nomb_contacto').fadeIn('slow');
                $('#contact-name').addClass('required');
                $('.nac_oc').fadeOut('slow');
                $('#cuit_empresa').fadeIn('slow');
                $('#razon-client').addClass("required");
            }else{
                $('#nombre_contact').text('<?php echo $f['nombre'];?>');
                $('#contact-name').removeClass('required');
                $('.nomb_contacto').fadeOut('slow');
                $('.apellido_cliente').fadeIn('slow');
                $('#surname-client').addClass("required");
                $('.nac_oc').fadeIn('slow');
                $('#cuit_empresa').fadeOut('slow');
                $('#razon-client').removeClass("required");
            }
        }
    });
</script>
<div id="content-funciona">
    <div class="form_registro">
        <h2><?php echo $e['registrate'];?></h2>
        <?php echo $this->Session->flash(); ?>
        <div class="content_registro">
        <?php echo $ba['registrarse'];?>
            <!--p>Registrarse en el portal es muy simple y gratuito.</p>
            <p>Para mayor informaci&oacute;n escribanos a <a href="mailto:info@seleccionweb.com">info@seleccionweb.com</a></p-->
            <?php
            echo $this->Form->create('Client', array('action' => 'register', 'id' => 'register-form'))
            ?>
                <ul class="content_form_top">
                    <li class="opcion_empresa">
                        <div class="form_left">
                            <input type="checkbox" value="Recordarme" class="check" id="type" name="data[Client][type]"/>
                            <label><?php echo $b['es_un_registro'];?></label>
                        </div>
                        <div class="form_right">
                        </div>
                    </li>
                    <li>
                        <div class="form_left">
                            <label id="nombre_contact"><?php echo $f['nombre'];?></label>
                            <?php echo $this->Form->input('name', array('id' => 'name-client', 'label' => false, 'class' => 'required', 'div' => false)) ?>
                        </div>
                        <div class="form_right apellido_cliente">
                            <label><?php echo $f['apellido'];?></label>
                            <?php echo $this->Form->input('surname', array('id' => 'surname-client', 'label' => false, 'class' => 'required', 'div' => false)) ?>
                        </div>
                        <div class="form_right nomb_contacto" style="display: none;">
                            <label><?php echo $f['nombrec'];?></label>
                            <?php echo $this->Form->input('contact_name', array('id' => 'contact-name', 'label' => false, 'class' => 'required', 'div' => false)) ?>
                        </div>
                    </li>
                    <li>
                        <div class="form_left">
                            <label><?php echo $f['direccion'];?></label>
                            <?php echo $this->Form->input('address', array('id' => 'address-client', 'label' => false, 'class' => 'required', 'div' => false)) ?>
                        </div>
                        <div class="form_right">
                            <label><?php echo $f['telefono'];?></label>
                            <ul class="input_telefono">
                                <li class="area_telefono">
                                    <?php echo $this->Form->input('area', array('id' => 'area-client', 'label' => false, 'class' => '', 'div' => false)) ?>
                                    <span>Area</span>
                                </li>
                                <li class="numero_telefono">
                                    <?php echo $this->Form->input('phone', array('id' => 'phone-client', 'label' => false, 'class' => '', 'div' => false)) ?>
                                    <span>Numero</span>
                                </li>
                            </ul>
                            <label id="error-area" for="area-client" style="display: none; font-size: 12px;" class="error">El campo Area es obligatorio</label>
                            <label id="error-numero" for="phone-client" style="display: none; font-size: 12px;" class="error">El campo Numero es obligatorio</label>
                        </div>
                    </li>
                    <li>
                        <div class="form_left email_bottom">
                            <label><?php echo $f['email'];?></label>
                            <?php echo $this->Form->input('email', array('id' => 'email-client', 'label' => false, 'class' => 'required email', 'div' => false)) ?>
                        </div>
                        <div class="form_right nac_oc">
                            <label><?php echo $f['fecha'];?></label>
                            <ul class="input_fecha">
                                <li class="dia_mes">
                                    <?php echo $this->Form->input('day', array('id' => 'day-client', 'maxlength' => '2', 'label' => false, 'class' => '', 'div' => false)) ?>
                                    <span>DD</span>
                                </li>
                                <li class="dia_mes">
                                    <?php echo $this->Form->input('month', array('id' => 'month-client', 'maxlength' => '2', 'label' => false, 'class' => '', 'div' => false)) ?>
                                    <span>MM</span>
                                </li>
                                <li class="anio_fecha">
                                    <?php echo $this->Form->input('year', array('id' => 'year-client', 'maxlength' => '4', 'label' => false, 'class' => '', 'div' => false)) ?>
                                    <span>AAAA</span>
                                </li>
                            </ul>
                            <label id="error-dia" for="day-client" style="display: none; font-size: 12px;" class="error">El campo Dia es obligatorio</label>
                            <label id="error-dia-limit" for="day-client" style="display: none; font-size: 12px;" class="error-message">Ingresar un dia valido</label>
                            <label id="error-mes" for="month-client" style="display: none; font-size: 12px;" class="error">El campo Mes es obligatorio</label>
                            <label id="error-anio" for="year-client" style="display: none; font-size: 12px;" class="error">El campo A&ntilde;o es obligatorio</label>
                        </div>
                        <div id="cuit_empresa" class="form_right" style="display: none">
                            <label><?php echo $f['cuit'];?></label>
                            <?php echo $this->Form->input('corporate', array('id' => 'razon-client', 'label' => false, 'class' => 'required', 'div' => false)) ?>
                            <span>La clave CUIT solo para empresas Argentinas</span>
                        </div>
                    </li>
                    <li>
                        <div class="form_left">
                            <label><?php echo $f['password'];?></label>
                            <?php echo $this->Form->password('password', array('id' => 'password-client', 'label' => false, 'class' => 'required', 'div' => false)) ?>
                        </div>
                        <div class="form_right">
                            <label><?php echo $f['rep_password'];?></label>
                            <?php echo $this->Form->password('repeat-password', array('id' => 'repeat-password-client', 'label' => false, 'class' => 'required', 'div' => false)) ?>
                            <?php echo (isset($error_password) and $error_password != '') ? '<label class="error">' . $error_password . '</label>' : '<div clas="clear_space"></div>'; ?>
                        </div>
                    </li>
                </ul>
                <ul class="content_form_bottom">
                    <li class="form_bottom_left">
                        <input type="checkbox" value="aceptar_terminos" class="check" id="ok-terminos"/>
                        <label><?php echo $b['he_leido'];?></label>
                        <!--label>He leido y acepto los <?php echo $this->Html->link('Terminos y condiciones', array('controller' => 'clients', 'action' => 'view_term' ), array('class' => 'fixedAjaxDOMWindow')); ?> </label-->
                        <label id="error-terminos" for="ok-terminos" style="display: none; font-size: 12px;" class="error">Nececita aceptar los terminos y condiciones</label>
                    </li>
                    <li class="form_bottom_right">
                        <button><?php echo $b['registrarse'];?></button>
                    </li>
                </ul>
           <?php echo $this->Form->end(); ?>
        </div>
        <div class="content_bottom_registro"></div>
    </div>
</div>  