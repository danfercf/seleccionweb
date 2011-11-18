 <div style="text-align: center; font-size: 20; font-weight: bold; padding: 12px; background-color: #17365D; border-bottom: 1px solid;">
<span style="color: #ffffff; font-size: 24px; text-align: center;"><span style="">Bienvenido</span> a SeleccionWeb</span>
 </div>
 
 <div style="padding: 12px;"> 
    <p>
     <span style="font-weight: bold;">Estimado <span style="color:#548DD4">Candidato</span></span>
    </p> 

     <p>
Queremos darle la bienvenida a  <span style="color:#548DD4; font-weight: bold;">SeleccionWeb</span>
</p>

<p>
Nuestro cliente lo ha seleccionado para participar en el proceso de <span style="color:#548DD4; font-weight: bold;">Pre-selección</span> por medio de nuestro portal <span style="color:#548DD4; font-weight: bold;">SeleccionWeb.</span><br/><br/>
<span style="color:#548DD4; font-weight: bold;">SeleccionWeb</span> es una plataforma para <span style="color:#548DD4; font-weight: bold;">selección</span> o <span style="color:#548DD4; font-weight: bold;">preselección</span> de Recursos humanos en Internet que utiliza una lista de preguntas armadas por nuestro cliente para que usted responda frente a su cámara web con <span style="color:#548DD4; font-weight: bold;">Audio y Video</span><br/><br/>
El puesto para el cual usted va a responder a la <span style="color:#548DD4; font-weight: bold;">Video Selección</span> es:
<br/><br/>
</p>

    <p style=" text-align: center; border-top: #020202 1px solid; border-bottom: 1px solid #020202; font-size: 24px; color: #548DD4; font-weight: bold">
        <?php echo $nombre_seleccion ?>
    </p>

    <div style=" border-bottom: 1px solid; padding: 12px 0;" >

    <?php if($imagen){?>
    <center>
        <img src="http://www.seleccionweb.com/img/<?php echo $imagen;?>" width="140" height="140" /><br /><br />
    </center>
    Contacto:<br /><br />
    <span style="color: #0A427A; font-weight: bold;">Nombre: </span><span><?php echo $cliente;?></span><br />
    <span style="color: #0A427A; font-weight: bold;">Email: </span><span><?php echo $ecliente;?></span><br />
    <span style="color: #0A427A; font-weight: bold;">Titular de la cuenta: </span><span><?php echo $user;?></span><br /><br />
    
   <?php }?>
   
     <?php if($message) echo $message ;?>
      
      </div>
      <br/>
    <p>
Realizar esta <span style="color:#548DD4; font-weight: bold;">Video Selección</span> por <span style="color:#548DD4; font-weight: bold;">SeleccionWeb.com</span> es muy simple, lo invitamos a ver el siguiente Video: <a style="color: #548DD4; font-size: 16px;"  href="http://www.seleccionweb.com/pages/howto">VER VIDEO</a>
<br/><br/>
Antes de empezar es necesario que se asegure el correcto funcionamiento de su <span style="color:#548DD4; font-weight: bold;">Conexión a Internet, Cámara Web y Micrófono.</span><br/><br/>
Usted dispone de <span style="color:#548DD4; font-weight: bold;">8 días</span> a partir de hoy para realizar la Video Entrevista.<br/><br/>
Para acceder a la Video Selección, presione el siguiente enlace:
    </p>
    
    <p style="text-align: center;">
     <a style="color: #548DD4; font-size: 16px;  font-weight: bold;"  href="<?php echo $url;?>">Realizar la Video Selección Presione AQUI!!</a>
    </p>

    <p>Para consultas escribanos a: <a href="mailto:candidatos@seleccionweb.com">candidatos@seleccionweb.com</a></p>

  </div>  


