<?php
echo $this->Html->script('regulador-precio.js');
echo $this->Html->script('jquery/jquery.DOMWindow.js');
/*echo $this->Html->css('tablas-seleccionweb.css');
echo $this->Html->css('forms.css');*/
echo $this->Html->css('registrate.css');
echo $this->Html->css('core.css');
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

<div id="content">
            <div class="head_content"> 
              <div class="main">
                <h1 class="title_reg"> &iexcl; Registrate Gratis ! </h1>
              </div>  
            </div>    
              <div class="content_content">
               <div id="main">
                    <div class="content_up_how">
                        <p id="LineaP1" style="text-align: center; font-size: 26px; font-weight: bold;">  Registrarse en el portal es muy simple y gratuito. </p>
                        <p id="LineaP2" style="text-align: center; font-size: 16px;font-weight: bold;"> Para mayor informaci&oacute;n escribanos a <span>info@seleccionweb.com</span></p>
                                              
                                                                      
                        <div class="contacts">
                            <div class="top">
                        
                                    <div id="EligOp">
                                         <h3 class="subTitle">  Elige tu opci&oacute;n de registro </h3>    
                                    </div>
                            </div>                                                                          
                                    <div id="RadiosOp">
                                            <input class="rTipoPersona1" type="radio"  name="rTipoPersona" value="Particular"  checked="true"  />
                                            
                                            <label class="L_Persona_Empresa">Soy un seleccionador particular</label>                                            
                                            
                                            <input class="rTipoPersona2" type="radio"  name="rTipoPersona"    value="Empresa" />
                                            
                                            <label class="L_Persona_Empresa">  Soy una empresa   </label>
                                            
                                        
                                    </div>  
                               
                                <div class="botton">
                                
                                       <div class="Divs_Izq">                                     
                                             <label class="L1_Nom"> Nombre </label>
                                             <input class="entradaDatos" name="nombre" type="text" />
                                        </div>
                                        
                                        
                                        <div class="Divs_Der">
                                              <label class="L2_Ap"> Apellido </label>
                                              <input class="entradaDatosDer"  name="apellido" type="text" />
                                        </div>
                                        
                                        
                                        <div class="Divs_Izq">
                                              <label class="L3_Dir"> Direccion </label>
                                              <input class="entradaDatos" name="direccion" type="text" />
                                        </div>      
                                        
                                        <div class="Divs_Der">
                                              <label class="L4_Tel"> Tel&eacute;fono </label>                                    
                                              <input class="entradaArea"  type="text"  name="areaTel"/>                                      
                                            
                                              <input class="entradaNumero"  type="text" name="numeroTel"/>
                                               <label class="L4_area"> Area </label>
                                               <label class="L4_Numero"> N&uacute;mero </label>                                     
                                              
                                        </div>   
                                        
                                        <div class="Divs_Izq">
                                              <label class="L5_Email"> Email </label>
                                              <input class="entradaDatos"  type="text"  name="email" />
                                        </div>   
                                         
                                         
                                        <div class="Divs_Der">
                                        
                                              <label class="L5_Fecha"> Fecha </label>                                     
                                              <input class="entradaArea"  type="text"  name="DD"/>
                                              <input class="entradaArea mes"  type="text" name="MM" />
                                              <input class="entradaArea anio"  type="text" name="AAAA" />
                                              <br />
                                               <label class="L5_DD"> DD </label>
                                               <label class="L4_area L5_MM"> MM </label>                                     
                                               <label class="L4_area L5_DD L5_MM"> AAAA </label>
                                              
                                        </div>
                                        
                                        <div class="Divs_Izq">                                     
                                             <label class="L6_Pass"> Contrase&ntilde;a </label><br/>
                                             <input class="entradaDatos"  type="text" name="pass" />
                                        </div>
                                
                                        <div class="Divs_Der">
                                              <label class="L7_RepetirPass"> Repetir Contrase&ntilde;a </label><br />
                                              <input class="entradaDatosDer"   type="text" name="repPass" />
                                        </div>
                                        
                                        <div class="Divs_Izq">                                
                                             
                                             <input id="checkBox" type="checkbox"  name="cbkAcepto" />                                     
                                             <label id="L7_checkBox1"> He leido y acepto los 
                                             <a href="#" id="L7_checkBox2">T&eacute;rminos y condiciones</a>  
                                             </label>
                                        </div>
                                           
                                        <div class="Divs_Der">                                      
                                 
                                            <input class="btnRegistrate" type="su" name="btnRegistrate" value=""  />
                                        
                                        </div>
                                                                                                                                                           
                                </div><!--<div class="botton">-->
                                
                                
                                <!--  
                                                                                                                
                                <hr class="linea" />
                                
                                
                                
                                 <div class="Divs_Der">                                      
                                 
                                      <input class="btnRegistrate" type="button" name="btnRegistrate" value=""  />
                                        
                                </div>
                                   
                                          
                             -->                             
                        <!--
                          <div class="contacts_left">  
                           <h3 class="subtitle">Contactos Personales</h3> 
                            <ul>
                                <li>luis.ninni@seleccionweb.com</li>
                                <li>micaela.ninni@seleccionweb.com</li>
                            </ul>
                            <h3 class="subtitle">Contactos por Area</h3> 
                            <ul>
                                <li>info@seleccionweb.com</li>
                                <li>ventas@seleccionweb.com</li>
                                <li>soporte@seleccionweb.com</li>
                                <li>clientes@seleccionweb.com</li>
                                <li>candidatos@seleccionweb.com</li>
                            </ul>
                            <h3 class="subtitle">Redes Sociales</h3> 
                            <ul>
                                <li class="social"><img src="images/skype.png" /></li>
                                <li class="social"><img src="images/face.png" /></li>
                                <li class="social"><img src="images/twitter.png" /></li>
                                <li class="social"><img src="images/linkedin.png" /></li>
                            </ul>
                        </div>
                        
                        <div class="form">
                            <h3 class="subtitle">Contactanos Ahora</h3>
                            <form action="#">
                                <p>Nombre</p><input type="text" />
                                <p>Empresa</p><input type="text" />
                                <p>Email</p><input type="text" />
                                <p>Mensaje</p><textarea cols="30" rows="10"></textarea>
                                <p><input type="submit" class="submit" value=" "/></p>
                            </form>
                        </div>
                        -->
                        
                      </div>  <!--  <div class="contacts"> -->
                    </div>
               </div>  
            </div>
</div>