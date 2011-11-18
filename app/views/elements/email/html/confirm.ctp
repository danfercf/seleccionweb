 <div style="text-align: center; font-size: 20; font-weight: bold; padding: 12px; background-color: #C6D9F1; border-bottom: 1px solid;">
 <b>Confirme su registro en</b> <a style="color: #0070D7; text-decoration: none" href="http://www.seleccionweb.com">SeleccionWeb</a>
 </div>
 
 <div style="padding: 12px;"> 
 <span style="font-weight: bold;">Estimado Cliente: <span style="color:#548DD4"><?php echo $client['owner']?></span></span><br/>
    <p>
        Para comenzar a operar con SeleccionWeb.com  confirme su registro presionando <a style="color: #548DD4" href="http://www.seleccionweb.com/clients/confirm/<?php echo $client_id?>/<?php echo $password;?>/<?php echo md5($client['owner'])?>">AQUI</a>
    </p>
    <p>
        Confirmar Registro verificar&aacute; que su e-mail est&aacute; funcionando en forma correcta.
    </p>
    <p>
        Si el botón no funciona o tiene problemas en la confirmación de su registro haga click o
        copie la dirección ó URL que aparece al final de este mail y pégala en tu explorador o browser.
        <br /><br />
        <a style="color: #0070D7; text-decoration: none; font-size: 14px; font-weight: bold;" href="http://www.seleccionweb.com/clients/confirm/<?php echo $client_id?>/<?php echo $password;?>/<?php echo md5($client['owner'])?>">http://www.seleccionweb.com/clients/confirm/<?php echo $client_id?>/<?php echo $password;?>/<?php echo md5($client['owner'])?></a>
    </p>
   
    
    <div>Le recordamos que para ingresar al sitio debe utilizar su Usuario y Contrase&ntilde;a.
        <p style=""><b>Usuario: <span style="color: #0070D7;font-size: 15px; font-weight: bold;"><?php echo  $client['username']?></span></b></p>
        <p style=""><b>Contraseña: <span style="color: #0070D7;font-size: 15px; font-weight: bold;"><?php echo $password;?></span></b></p>
    </div>
    <p>Para consultas escribanos a: <a style="color: #365F91; font-weight: bold; text-decoration: none" href="mailto:soporte@seleccionweb.com">soporte@seleccionweb.com</a></p>
    </div> 
    


