<!--pre>
<?php
	print_r($client);
    print_r($user);
?>
</pre-->
 <div style="text-align: center; font-size: 20; font-weight: bold; padding: 12px; background-color: #C6D9F1; border-bottom: 1px solid;">
<span style="color: #0070D7; font-size: 24px; text-align: center;"><span style="color: #000;">Registro de datos en</span> SeleccionWeb</span>
 </div>
 

        <p  style="padding: 12px;">
        <span style="font-weight: bold;">Estimado Cliente: <span style="color:#548DD4"><?php  echo $client['owner'];?></span></span><br/>
       
    </p>
    
<p style="padding: 12px;">Archive este Mail, ya que contiene todos los datos del registro como Cliente de <span style="color:#548DD4">SeleccionWeb.</span></p>
<div style="border-top: 1px solid #000000; ">
<table width="100%"  border="0">
    <tr >
        <td  style="font-size: 12px; padding: 2px 10px; text-align: left; border-right: 1px solid #000000; border-bottom: 1px solid #000000; width: 35%; color: #000">Usuario:</td>
        <td style="font-size: 15px; padding:  2px 10px;  font-weight: bold; text-align: left; border-bottom: 1px solid #000000; color: #0070CD"><?php echo  $client['username']?></td>
    </tr>
    <tr >
        <td  style="font-size: 12px; padding:  2px 10px; text-align: left; border-right: 1px solid #000000; border-bottom: 1px solid #000000; width: 35%; color: #000">Contraseña:</td>
        <td style="font-size: 15px; padding:  2px 10px; font-weight: bold;  text-align: left; border-bottom: 1px solid #000000; color: #0070CD"><?php echo  $password?></td>
    </tr>
    <tr >
        <td  style="font-size: 12px; padding: 2px 10px; text-align: left; border-right: 1px solid #000000; border-bottom: 1px solid #000000; width: 35%; color: #000">Empresa u Organizaci&oacute;n:</td>
        <td style="font-size: 15px; padding:  2px 10px;  font-weight: bold; text-align: left; border-bottom: 1px solid #000000; color: #0070CD"><?php echo  $user['name']?></td>
    </tr>
    <tr >
        <td  style="font-size: 12px; padding:  2px 10px; text-align: left; border-right: 1px solid #000000; border-bottom: 1px solid #000000; width: 35%; color: #000">CUIT:</td>
        <td style="font-size: 15px; padding:  2px 10px; font-weight: bold;  text-align: left; border-bottom: 1px solid #000000; color: #0070CD"><?php echo  $user['cuit']?></td>
    </tr>
    <tr >
        <td  style="font-size: 12px; padding:  2px 10px; text-align: left; border-right: 1px solid #000000; border-bottom: 1px solid #000000; width: 35%; color: #000">Pa&iacute;s:</td>
        <td style="font-size: 15px; padding:  2px 10px; font-weight: bold;  text-align: left; border-bottom: 1px solid #000000; color: #0070CD"><?php echo  $user['country']?></td>
    </tr>
    <tr >
        <td  style="font-size: 12px; padding:  2px 10px; text-align: left; border-right: 1px solid #000000; border-bottom: 1px solid #000000; width: 35%; color: #000">Domicilio:</td>
        <td style="font-size: 15px; padding:  2px 10px; font-weight: bold;  text-align: left; border-bottom: 1px solid #000000; color: #0070CD"><?php echo  $user['address']?></td>
    </tr>
    <tr >
        <td  style="font-size: 12px; padding:  2px 10px; text-align: left; border-right: 1px solid #000000; border-bottom: 1px solid #000000; width: 35%; color: #000">Teléfono del contacto:</td>
        <td style="font-size: 15px; padding:  2px 10px; font-weight: bold;  text-align: left; border-bottom: 1px solid #000000; color: #0070CD"><?php echo  $user['phone']?></td>
    </tr>
    <tr >
        <td  style="font-size: 12px; padding:  2px 10px; text-align: left; border-right: 1px solid #000000; border-bottom: 1px solid #000000; width: 35%; color: #000">Mail del contacto:</td>
        <td style="font-size: 15px; padding:  2px 10px; font-weight: bold;  text-align: left; border-bottom: 1px solid #000000; color: #0070CD"><?php echo  $user['email']?></td>
    </tr>
</table>
</div>
<div  style="padding: 12px;">
       <h2 style="background: lightgray; font-weight: bold; font-size: 18px; ">Planes y ventajas de SeleccionWeb.com</h2>
    <p style="color: #000000; font-size: 14px;text-align: center; font-weight: bold;"><span>Para acceder a ver los planes presione</span> <a style="color: #548DD4;font-size: 16px;"  href="http://tengapaginaweb.com/selweb/clients/purchase">AQUI!</a></p>
</div>


