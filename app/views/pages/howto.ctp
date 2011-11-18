<?php
$e = $this->requestAction("/languages/reader/etiqueta");
$b = $this->requestAction("/languages/reader/botones");
$ba = $this->requestAction("/languages/reader/banner");
?>
<script type="text/javascript" >
    $(function(){
        $('#video_player').hide();
        $('#video_player2').hide();
        $('#video-cliente').click(function(){ 
            $(this).hide();
             $('#video_player').show();
            return false;
        })
        $('#video-candidatos').click(function(){ 
            $(this).hide();
             $('#video_player2').show();
            return false;
        })
        })
    $(document).ready(function(){
     //código a ejecutar cuando el DOM está listo para recibir instrucciones.
      $("#question1").click(function(evento){
      //aquí el código que se debe ejecutar al hacer clic
      $(".answer1").toggle("slow");
      
      return false;
      });
      
      $("#question2").click(function(evento){
      //aquí el código que se debe ejecutar al hacer clic
      $(".answer2").toggle("slow");
      return false;
      });
      
      $("#question3").click(function(evento){
      //aquí el código que se debe ejecutar al hacer clic
      $(".answer3").toggle("slow");
      return false;
      });
      
      $("#question4").click(function(evento){
      //aquí el código que se debe ejecutar al hacer clic
      $(".answer4").toggle("slow");
      return false;
      });
      
      $("#question5").click(function(evento){
      //aquí el código que se debe ejecutar al hacer clic
      $(".answer5").toggle("slow");
      return false;
      });
    }); 
    
</script>
<?php echo $this->Session->flash(); ?>
<div id="content-funciona">
    <div class="content-funciona-top">
        <h2><?php echo $e['como_fun'];?></h2>    
    </div>           
    <div class="content-funciona-center">
        <div class="video_consultas_clientes">
            <div class="banner_video">
                <h2><?php echo $e['cliente'];?></h2>
            </div>
            <div class="content_video">
                <?php
                echo $this->Html->link(
                        $this->Html->image(
                                "video-client.png", array("alt" => "Ver video")),
                        "../files/videos/clientes.flv",
                        array('escape' => false, 'id' => "video-cliente", 'style' => "display:inline-block;width:437px;height:245px")
                )
                ?>
                <!-- this will install flowplayer inside previous A- tag. -->
                <div id="video_player" style=" display: inline-block; background-color: #000;">      
                    <div id="player">
                		<object width="437" height="245" id="f4Player1" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"> 
                		<param name="movie" value="<?php echo $this->Html->url('/', true); ?>/files/player.swf" /> 
                		<param name="quality" value="high" /> 
                		<param name="menu" value="false" /> 
                		<param name="allowFullScreen" value="true" /> 
                		<param name="scale" value="noscale" /> 
                		<param name="allowScriptAccess" value="always" />
                
                		<param name="swLiveConnect" value="true" />
                		<param name="flashVars" value="skin=<?php echo $this->Html->url('/', true); ?>/files/skins/mySkin.swf
                			&thumbnail=<?php echo $this->Html->url('/', true); ?>/img/video-client.png
                			&video=<?php echo $this->Html->url('/', true); ?>/files/videos/clientes.flv
                            
                			"/>
                		<!-- [if !IE] -->
                		<object width="437" height="245" data="<?php echo $this->Html->url('/', true); ?>/files/player.swf" type="application/x-shockwave-flash" id="f4Player1">
                		<param name="quality" value="high" /> 
                		<param name="menu" value="false" /> 
                		<param name="allowFullScreen" value="true" /> 
                		<param name="scale" value="noscale" />
                		<param name="allowScriptAccess" value="always" />
                		<param name="swLiveConnect" value="true" />
                
                		<param name="flashVars" value="skin=<?php echo $this->Html->url('/', true); ?>/files/skins/mySkin.swf
                			&thumbnail=<?php echo $this->Html->url('/', true); ?>/img/video-client.png
                			&video=<?php echo $this->Html->url('/', true); ?>/files/videos/clientes.flv
                            &autoplay=1
                			"/>
                		</object> 
                		 <!-- [endif] --> 
                		</object>
                	</div> 
                </div> 
            </div>
            <div class="bottom_video"></div>
            <div class="buttom_consultas">
                <a href="mailto:clientes@seleccionweb.com" title=""><?php echo $b['consultas'];?></a>
            </div>
        </div>
        <div class="video_consultas_candidatos">
            <div class="banner_video">
                <h2><?php echo $e['candidato'];?></h2>
            </div>
            <div class="content_video">
                <?php
                echo $this->Html->link(
                        $this->Html->image(
                                "video-candidates.png", array("alt" => "Ver video")),
                        "../files/videos/candidatos.flv",
                        array('escape' => false, 'id' => "video-candidatos", 'style' => "display:inline-block;width:437px;height:245px")
                )
                ?>
                <!-- this will install flowplayer inside previous A- tag. -->
                <div id="video_player2" style="display: inline-block; background-color: #000;">      
                    <div id="player">
                		<object width="437" height="245" id="f4Player2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"> 
                		<param name="movie" value="<?php echo $this->Html->url('/', true); ?>/files/player.swf" /> 
                		<param name="quality" value="high" /> 
                		<param name="menu" value="false" /> 
                		<param name="allowFullScreen" value="true" /> 
                		<param name="scale" value="noscale" /> 
                		<param name="allowScriptAccess" value="always" />
                
                		<param name="swLiveConnect" value="true" />
                		<param name="flashVars" value="skin=<?php echo $this->Html->url('/', true); ?>/files/skins/mySkin.swf
                			&thumbnail=<?php echo $this->Html->url('/', true); ?>/img/video-candidates.png
                			&video=<?php echo $this->Html->url('/', true); ?>/files/videos/candidatos.flv
                            
                			"/>
                		<!-- [if !IE] -->
                		<object width="437" height="245" data="<?php echo $this->Html->url('/', true); ?>/files/player.swf" type="application/x-shockwave-flash" id="f4Player2">
                		<param name="quality" value="high" /> 
                		<param name="menu" value="false" /> 
                		<param name="allowFullScreen" value="true" /> 
                		<param name="scale" value="noscale" />
                		<param name="allowScriptAccess" value="always" />
                		<param name="swLiveConnect" value="true" />
                
                		<param name="flashVars" value="skin=<?php echo $this->Html->url('/', true); ?>/files/skins/mySkin.swf
                			&thumbnail=<?php echo $this->Html->url('/', true); ?>/img/video-candidates.png
                			&video=<?php echo $this->Html->url('/', true); ?>/files/videos/candidatos.flv
                            &autoplay=1
                			"/>
                		</object> 
                		 <!-- [endif] --> 
                		</object>
                	</div> 
                </div> 
            </div>
            <div class="bottom_video"></div>
            <div class="buttom_consultas">
                <a href="mailto:candidatos@seleccionweb.com" title=""><?php echo $b['consultas'];?></a>
            </div>
        </div>
    </div>
    <div class="content-funciona-bottom">
    <?php echo $ba['preguntas_frec'];?>
        <!--ul class="preguntas_frecuentes">
            <li class="title_preguntas">
                <h2>Preguntas Frecuentes</h2>
            </li>
            <li>
                <a href="#" title="" id="question1">Qu&eacute; es Selecci&oacute;nWeb.com?</a>
                <div class="answer answer1" style="display: none;" id="answer1">
                    <img src="<?php echo $this->Html->url('/', true); ?>/img/add.png" alt="" />
                    <p>
                        <strong>Selecci&oacute;nWeb</strong> es el desarrollo de una plataforma en la Web para que los Clientes que se registren o 
                        se encuentren registrados, puedan realizar <strong>Video Selecci&oacute;n</strong> de personal.
                    </p>
                </div>
            </li>
            <li>
                <a href="#" title="" id="question2">Para qu&eacute; tipo de empresa es &uacute;til el servicio de Selecci&oacute;nWeb?</a>
                <div class="answer answer2" style="display: none;">
                    <img src="<?php echo $this->Html->url('/', true); ?>/img/add.png" alt="" />
                    <p>
                        El servicio que brinda <strong>Selecci&oacute;nWeb</strong> es &uacute;til para todo el que requiera realizar una preselecci&oacute;n o 
                        selecci&oacute;n de personal <strong>sin importar la dimensi&oacute;n de la empresa ni la finalidad con la que se est&eacute; buscando 
                        al talento</strong>. Esto se debe a que el Cliente es quien formula las preguntas y por ello <strong>adaptarla a sus necesidades</strong>. 
                        Por otro lado, las preguntas se pueden realizar de forma <strong>an&oacute;nima</strong> preservando la identidad de la empresa hasta que el 
                        Cliente lo crea conveniente, <strong>el logotipo y datos del cliente</strong> se pueden mostrar si desea lo contrario.<br /><br />
                        Es una <strong>herramienta ideal</strong> para conocer a los candidatos en <strong>forma directa</strong> antes de una <strong>entrevista presencial</strong>.<br /><br />
                        <strong>Selecci&oacute;nWeb</strong> tambi&eacute;n es utilizado para <strong>evaluar</strong> los conocimientos reales del <strong>idioma de los candidatos</strong>, ya que nuestros <strong>Clientes</strong> 
                        pueden formular todas o algunas de las preguntas en el idioma que deseen.
                    </p>
                </div>
            </li>
            <li>
                <a href="#" title="" id="question3">C&oacute;mo funciona Selecci&oacute;nWeb?</a>
                <div class="answer answer3" style="display: none;">
                    <img src="<?php echo $this->Html->url('/', true); ?>/img/add.png" alt="" />
                    <p>
                        Para realizar una <strong>Video Selecci&oacute;n</strong>, el Cliente solamente deber&aacute; contar con la <strong>direcci&oacute;n de correo electr&oacute;nico</strong> del o de los <strong>Candidatos</strong> para invitarlos a participar de la <strong>Video Selecci&oacute;n</strong>.<br /><br />
                        El <strong>Cliente</strong>, confecciona dentro de la plataforma una lista de preguntas para que sus <strong>Candidatos</strong> respondan.<br /><br />
                        Crear una <strong>Video Selecci&oacute;n</strong> les demanda a nuestros <strong>Clientes</strong> menos de <strong>cinco minutos</strong>.<br /><br />
                        Por su parte los <strong>Candidatos</strong> deber&aacute;n responder las preguntas grab&aacute;ndolas en el portal de <strong>Selecci&oacute;nWeb</strong>.
                    </p>
                </div>
            </li> 
            <li>
                <a href="#" title="" id="question4">Se puede obtener Curriculum Vitae / Hojas de Vida de los postulantes en la p&aacute;gina de Selecci&oacute;nWeb?</a>
                <div class="answer answer4" style="display: none;">
                    <img src="<?php echo $this->Html->url('/', true); ?>/img/add.png" alt="" />
                    <p>
                        La plataforma <strong>Selecci&oacute;nWeb</strong> fue desarrollada &uacute;nicamente para realizar <strong>Video Selecci&oacute;n</strong>.<br /><br />
                        Para obtener <strong>Candidatos</strong> y sus respectivos Curriculum Vitae u Hojas de Vida, el <strong>Cliente</strong>, 
                        deber&aacute; utilizar los medios habituales (portales, publicaciones, consultoras, referencias, etc.).
                    </p>
                </div>
            </li>
            <li>
                <a href="#" title="" id="question5">Necesito alg&uacute;n tipo de tecnolog&iacute;a avanzada para usar esta herramienta?</a>
                <div class="answer answer5" style="display: none;">
                    <img src="<?php echo $this->Html->url('/', true); ?>/img/add.png" alt="" />
                    <p>
                        No, cuando debas realizar alguna entrevista por medio del portal <strong>Selecci&oacute;nWeb</strong>, solo deber&aacute;s contar con un <strong>computador</strong> con <strong>C&aacute;mara Web</strong>, un <strong>Micr&oacute;fono</strong> y <strong>conexi&oacute;n a Internet</strong>.
                        Pueden responder a las preguntas del <strong>Video Cuestionario</strong> desde <strong>cualquier computador</strong>, en su casa, Cyber, etc.
                    </p>
                </div>
            </li>
            <li class="ver_mas_preguntas">
                <?php echo $this->Html->link($b['ver_mas'], array('controller'=>'pages', 'action'=>'faqs'), array('escape' => false, 'class' => "more align-right")); ?>
            </li>     
        </ul-->
        <?php
            echo $this->requestAction('/testimonials', array('return'));
        ?>
    </div>
</div>      