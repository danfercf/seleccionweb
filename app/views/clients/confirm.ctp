<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/base/jquery-ui.css" id="theme">

<script type="text/javascript"  src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
<?php
echo $this->Html->css('jquery/upload/jquery.fileupload-ui.css');
echo $this->Html->script('jquery/jquery.fileupload.js');
echo $this->Html->script('jquery/jquery.fileupload-ui.js');
?>
<style type="text/css" >
    #main-confirm{
        color: #565758;
        margin: auto;
        overflow: hidden;
        padding-bottom: 25px;
    }
    #main-confirm a{
        color: #306088;
        text-decoration: none;
    }
    #confirm-form{
        margin: 10px 10px 10px 50px;
        width: 600px;
    }
    fieldset {
        margin: 0px;
        padding: 10px;
        width: 94%;
    }
    form fieldset div.input {
        display: block;
        clear: both;
        margin: 10px;
        text-align: right;
    }
    form fieldset div.input input{
        width: 380px;
        float: right;
        margin-right: 10px;
    }
    form fieldset div.input label {
        font-size: 100%;
        margin-right: 10px;
        display: inline-block;
        float: right;
        margin-bottom: 5px;

    }
    legend{
        border: 1px #CCCCCC ridge;
        padding: 2px 5px;
        margin-left:  20px;
    }
    .button{
        float: right;
        margin-right: 12px;
        width: 250px !important;
    }
    .file_upload {
        border: 1px #3C719F solid;
        background: #E2E3E4 ;
    }

    #confirm-form div fieldset, #logo-cliente fieldset{
        border: 1px #CCCCCC ridge !important;
        margin-bottom: 15px;
    }
    #registro-personal{
        font-size: 12px;
        text-align: right;
    }
    #logo-cliente{
        float: right;
        margin: 10px 78px 0 0;
        width: 200px;
    }

    div.required span{
        color: red;
        margin-right: 5px;
    }
</style>
<script type="text/javascript" >
    $(document).ready(function() {
         $('select').msDropDown().data("dd");
        $("#confirm-form").validate();
        $("#confirm-form").submit(function() {
            var pass = $("#contrasenia").val();
            var passc= $("#password_confirm").val();
            if ( pass != passc) {
                $('#error-password').fadeIn('slow');
                return false;
            }
        });
    });
</script>

<div id="main-confirm" >

    <h2>Complete su registro!</h2>
    <p>
        Por favor revice sus datos y haga los cambios que considere necesarios<br /><br />
        Si teine algun problema porfavor escribanos a <a href="mailto:info@seleccionweb.com">info@seleccionweb.com</a>
    </p>
    <div class="content_val_datos">
        <div style="float: left">
            <?php
            echo $this->Form->create('Client', array('action' => 'confirm', 'id' => 'confirm-form'))
            ?>
    
            <div id="registro-personal">
                <fieldset>
                    <legend>Informacion Personal</legend>
                    <?php
                    //echo $mode;
                   // echo $this->Form->input('type', array());
                    echo $this->Form->input('id');
                    if ($this->data['Client']['type']) {
                        echo $this->Form->input('name', array('label' => false, 'before' => 'Nombre de la empresa : <span>* </span> ', 'class' => 'required'));
                        echo $this->Form->input('cuit', array('label' => false, 'before' => 'Cuit (Solo argentina) : <span>* </span> ', 'class' => 'required', 'div' => array('id' => 'cuit')));
                        echo $this->Form->input('rubro_empresa', array('label' => false, 'before' => 'Rubro de la empresa : ', 'div' => array('id' => 'rubro')));
                    }else{
                        echo $this->Form->input('name', array('label' => false, 'before' => 'Nombre del Titular : <span>* </span> ', 'class' => 'required'));
                        echo $this->Form->input('last_name', array('label' => false, 'before' => 'Apellido del Titular : <span>* </span> ', 'class' => 'required'));  
                    }
                    echo $this->Form->input('address', array('label' => false, 'before' => 'Direccion : <span>* </span> ', 'class' => 'required'));
                    echo $this->Form->input('cod_postal', array('label' => false, 'before' => 'Codigo postal : <span>* </span> ', 'class' => 'required'));
                    
                    //echo $this->Form->input('country', array('label' => false, 'before' => 'Pais : <span>* </span> ', 'class' => 'required'));
                    ?>
                   <div class="input select">
                        Pais :
                        <span>* </span>
                         <select name="data[Client][country]" id="ClientCountry" class="required" tabindex="7" style="font-size: 12px; height: 23px;margin-right: 10px; width: 384px;">
                            <option value="AF">Afganist&aacute;n</option>
                            <option value="AL">Albania</option>
                            <option value="DE">Alemania</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguila</option>
                            <option value="AQ">Ant&aacute;rtida</option>
                            <option value="AG">Antigua y Barbuda</option>
                            <option value="AN">Antillas holandesas</option>
                            <option value="SA">Arabia Saud&iacute;</option>
                            <option value="DZ">Argelia</option>
                            <option value="AR" selected="yes">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="PS">Autoridad Palestina</option>
                            <option value="AZ">Azerbaiy&aacute;n</option>
                            <option value="BH">Bahrein</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BE">B&eacute;lgica</option>
                            <option value="BZ">Belice</option>
                            <option value="BJ">Ben&iacute;n</option>
                            <option value="BM">Bermudas</option>
                            <option value="BT">Bhut&aacute;n</option>
                            <option value="BY">Bielorrusia</option>
                            <option value="MM">Birmania</option>
                            <option value="BO">Bolivia</option>
                            <option value="BA">Bosnia y Herzegovina</option>
                            <option value="BW">Botsuana</option>
                            <option value="BR">Brasil</option>
                            <option value="BN">Brun&eacute;i</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="CV">Cabo Verde</option>
                            <option value="KH">Camboya</option>
                            <option value="CM">Camer&uacute;n</option>
                            <option value="CA">Canad&aacute;</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CY">Chipre</option>
                            <option value="VA">Ciudad estado del Vaticano (Santa Sede)</option>
                            <option value="CO" >Colombia</option>
                            <option value="KM">Comores</option>
                            <option value="CG">Congo</option>
                            <option value="CD">Congo (RDC)</option>
                            <option value="KR">Corea</option>
                            <option value="KP">Corea del Norte</option>
                            <option value="CI">Costa del Marf&iacute;l</option>
                            <option value="CR">Costa Rica</option>
                            <option value="HR">Croacia (Hrvatska)</option>
                            <option value="CU">Cuba</option>
                            <option value="DK">Dinamarca</option>
                            <option value="DJ">Djibouri</option>
                            <option value="DM">Dominica</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egipto</option>
                            <option value="SV">El Salvador</option>
                            <option value="AE">Emiratos &aacute;rabes Unidos</option>
                            <option value="ER">Eritrea</option>
                            <option value="SK">Eslovaquia</option>
                            <option value="SI">Eslovenia</option>
                            <option value="ES">Espa&ntilde;a</option>
                            <option value="US">Estados Unidos</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Etiop&iacute;a</option>
                            <option value="MK">Ex-Rep&uacute;blica Yugoslava de Macedonia</option>
                            <option value="PH">Filipinas</option>
                            <option value="FI">Finlandia</option>
                            <option value="FR">Francia</option>
                            <option value="GA">Gab&oacute;n</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GD">Granada</option>
                            <option value="GR">Grecia</option>
                            <option value="GL">Groenlandia</option>
                            <option value="GP">Guadalupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GY">Guayana</option>
                            <option value="GF">Guayana Francesa</option>
                            <option value="GG">Guernsey</option>
                            <option value="GN">Guinea</option>
                            <option value="GQ">Guinea Ecuatorial</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="HT">Hait&iacute;</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong, RAE</option>
                            <option value="HU">Hungr&iacute;a</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IQ">Irak</option>
                            <option value="IR">Ir&aacute;n</option>
                            <option value="IE">Irlanda</option>
                            <option value="BV">Isla Bouvet</option>
                            <option value="CX">Isla Christmas</option>
                            <option value="IM">Isla de Man</option>
                            <option value="NF">Isla Norfolk</option>
                            <option value="IS">Islandia</option>
                            <option value="KY">Islas Caim&aacute;n</option>
                            <option value="CC">Islas Cocos</option>
                            <option value="CK">Islas Cook</option>
                            <option value="FO">Islas Feroe</option>
                            <option value="FJ">Islas Fiji</option>
                            <option value="GS">Islas Georgias del Sur y Sandwich del Sur</option>
                            <option value="HM">Islas Heard y McDonald</option>
                            <option value="FK">Islas Malvinas (Falkland Islands)</option>
                            <option value="MP">Islas Marianas del Norte</option>
                            <option value="MH">Islas Marshall</option>
                            <option value="UM">Islas perif&eacute;ricas menores de los Estados Unidos</option>
                            <option value="PN">Islas Pitcairn</option>
                            <option value="SB">Islas Salom&oacute;n</option>
                            <option value="TC">Islas Turks y Caicos</option>
                            <option value="VG">Islas V&iacute;rgenes Brit&aacute;nicas</option>
                            <option value="VI">Islas V&iacute;rgenes, EE.UU.</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italia</option>
                            <option value="JM">Jamaica</option>
                            <option value="SJ">Jan Mayen</option>
                            <option value="JP">Jap&oacute;n</option>
                            <option value="JE">Jersey</option>
                            <option value="JO">Jordania</option>
                            <option value="KZ">Kazajst&aacute;n</option>
                            <option value="KE">Kenia</option>
                            <option value="KG">Kirguizist&aacute;n</option>
                            <option value="KI">Kiribati</option>
                            <option value="KW">Kuwait</option>
                            <option value="LA">Laos</option>
                            <option value="BS">Las Bahamas</option>
                            <option value="LS">Lesoto</option>
                            <option value="LV">Letonia</option>
                            <option value="LB">L&iacute;bano</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libia</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lituania</option>
                            <option value="LU">Luxemburgo</option>
                            <option value="MO">Macao, RAE</option>
                            <option value="MG">Madagascar</option>
                            <option value="MY">Malaisia</option>
                            <option value="MW">Malawi</option>
                            <option value="MV">Maldivas</option>
                            <option value="ML">Mal&iacute;</option>
                            <option value="MT">Malta</option>
                            <option value="MA">Marruecos</option>
                            <option value="MQ">Martinica</option>
                            <option value="MU">Mauricio</option>
                            <option value="MR">Mauritania</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">M&eacute;xico</option>
                            <option value="FM">Micronesia</option>
                            <option value="MD">Moldavia</option>
                            <option value="MC">M&oacute;naco</option>
                            <option value="MN">Mongolia</option>
                            <option value="ME">Montenegro</option>
                            <option value="MS">Montserrat</option>
                            <option value="MZ">Mozambique</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">N&iacute;ger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NO">Noruega</option>
                            <option value="NC">Nueva Caledonia</option>
                            <option value="NZ">Nueva Zelanda</option>
                            <option value="OM">Om&aacute;n</option>
                            <option value="NL">Pa&iacute;ses Bajos</option>
                            <option value="PK">Pakist&aacute;n</option>
                            <option value="PW">Palaos</option>
                            <option value="PA">Panam&aacute;</option>
                            <option value="PG">Pap&uacute;a-Nueva Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Per&uacute;</option>
                            <option value="PF">Polinesia Francesa</option>
                            <option value="PL">Polonia</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="UK">Reino Unido</option>
                            <option value="CF">Rep&uacute;blica Centroafricana</option>
                            <option value="CZ">Rep&uacute;blica Checa</option>
                            <option value="ZA">Rep&uacute;blica de Sud&aacute;frica</option>
                            <option value="DO">Rep&uacute;blica Dominicana</option>
                            <option value="RE">Reuni&oacute;n</option>
                            <option value="RW">Ruanda</option>
                            <option value="RO">Ruman&iacute;a</option>
                            <option value="RU">Rusia</option>
                            <option value="KN">Saint Kitts y Nevis</option>
                            <option value="WS">Samoa</option>
                            <option value="AS">Samoa Americana</option>
                            <option value="BL">San Bartolom&eacute;</option>
                            <option value="SM">San Marino</option>
                            <option value="MF">San Mart&iacute;n</option>
                            <option value="PM">San Pedro y Miquel&oacute;n</option>
                            <option value="VC">San Vicente y las Granadinas</option>
                            <option value="SH">Santa Elena</option>
                            <option value="LC">Santa Luc&iacute;a</option>
                            <option value="ST">Santo Tom&eacute; y Pr&iacute;ncipe</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leona</option>
                            <option value="SG">Singapur</option>
                            <option value="SY">Siria</option>
                            <option value="SO">Somalia</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SZ">Suazilandia</option>
                            <option value="SD">Sud&aacute;n</option>
                            <option value="SE">Suecia</option>
                            <option value="CH">Suiza</option>
                            <option value="SR">Surinam</option>
                            <option value="TH">Tailandia</option>
                            <option value="TW">Taiw&aacute;n</option>
                            <option value="TZ">Tanzania</option>
                            <option value="TJ">Tayikist&aacute;n</option>
                            <option value="IO">Territorio Brit&aacute;nico del Oc&eacute;ano &iacute;ndico</option>
                            <option value="TF">Tierras Australes y Ant&aacute;rticas Francesas</option>
                            <option value="TL">Timor-Leste</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad y Tobago</option>
                            <option value="TN">T&uacute;nez</option>
                            <option value="TM">Turkmenist&aacute;n</option>
                            <option value="TR">Turqu&iacute;a</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UA">Ucrania</option>
                            <option value="UG">Uganda</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekist&aacute;n</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VE">Venezuela</option>
                            <option value="VN">Vietnam</option>
                            <option value="WF">Wallis y Futuna</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabue</option>
                        </select>
                    </div>        
                    <?php
                    echo $this->Form->input('state', array('label' => false, 'before' => 'Provincia o Departamento : '));
                    echo $this->Form->input('city', array('label' => false, 'before' => 'Ciudad : '));
                    echo $this->Form->input('area', array('label' => false, 'before' => 'Area de Telefono : <span>* </span> ', 'class' => 'required'));
                    echo $this->Form->input('phone', array('label' => false, 'before' => 'Numero de Telefono : <span>* </span> ', 'class' => 'required'));
                    echo $this->Form->input('email', array('label' => false, 'before' => 'Correo electronico : <span>* </span> ', 'class' => 'required email'));
                    if ($this->data['Client']['type']) {
                        echo $this->Form->input('contact_name', array('label' => false, 'before' => 'Nombre del contacto : <span>* </span> ', 'class' => 'required', 'div' => array('id' => 'contact')));
                        echo $this->Form->input('email_contact', array('label' => false, 'before' => 'Correo del contacto :', 'div' => array('id' => 'email_contact')));
                    }
                    echo $this->Form->input('logo', array('type' => 'hidden', 'id' => 'logo-client'));
                    ?>
                </fieldset>
                <fieldset>
                    <legend>Datos de la cuenta</legend>
                    <?php
                    echo $this->Form->input('User.0.id');
                    echo $this->Form->input('User.0.active', array('type' => 'hidden', 'value' => true));
                    echo $this->Form->input('User.0.client_id', array('type' => 'hidden', 'value' => $this->data['Client']['id']));
                    echo $this->Form->input('User.0.username', array('label' => false, 'before' => 'Nombre de usuario : <span>* </span> ', 'class' => 'required', 'readonly' => true));
                    echo $this->Form->input('User.0.password', array('value'=>$mode,'label' => false, 'before' => 'Contraseña : <span>* </span> ', 'class' => 'required', 'id' => 'contrasenia'));
                    echo $this->Form->input('User.0.password_confirm', array('after'=>'<label id="error-password"  style="display: none; font-size: 12px;" class="error">Las contraseñas no son iguales</label>','type' => 'password', 'label' => false, 'before' => 'Repetir contraseña : <span>* </span> ', 'class' => 'required', 'id' => 'password_confirm'));
                    ?>
                    
                </fieldset>
            </div>
            <button class="act_cuenta">Actualizar y activar mi cuenta</button>
    
    
            <?php echo $this->Form->end(); ?>
        </div>
        <div id="logo-cliente">
            <fieldset>
                <legend>Logo</legend>

                <table id="files">
                    <tr id="foto-logo-row"> <td><?php echo $this->Html->image('private/logo-blank.png', array('id' => 'foto-logo', 'alt' => 'Logo empresa')) ?></td></tr>
                </table>
                <form id="file_upload" action="<?php echo $this->Html->url("/clients/subir_logo") ?>" method="POST" enctype="multipart/form-data">
                    <input name="data[Client][logo]" type="file" name="file" multiple>
                    <button>Subir</button>
                    <div>Examinar</div>
                </form>
                <script type="text/javascript">
                    /*global $ */
                    $(function () {
                        $('#file_upload').fileUploadUI({
                            uploadTable: $('#files'),
                            downloadTable: $('#files'),
                            buildUploadRow: function (files, index) {
                                return $('<tr>' +
                                    '<td colspan="2" class="file_upload_progress"><div><\/div><\/td>' +
                                    '<td class="file_upload_cancel">' +
                                    '<button class="ui-state-default ui-corner-all" title="Cancel">' +
                                    '<span class="ui-icon ui-icon-cancel">Cancel<\/span>' +
                                    '<\/button><\/td><\/tr>');
                            },
                            buildDownloadRow: function (file) {
                                $('#foto-logo-row').remove();
                                $('#logo-client').val('clients/'+file.name);
                                        return $('<tr id="foto-logo-row"><td colspan="2"><img height="200" width="200" id="foto-logo" src="<?php echo $this->Html->url('/') ?>img/clients/' + file.name + '" alt="nuevo logo" ><\/td><\/tr>');
                            }
                        });
                    });
                </script>
            </fieldset>
        </div>
    </div>     
    <div class="clear_space"></div>
</div>



