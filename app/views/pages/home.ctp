<?php
//echo $this->Html->script('flowplayer/flowplayer-3.2.6.min.js');
$b = $this->requestAction("/languages/reader/botones");
$ba = $this->requestAction("/languages/reader/banner");
?>

<script type="text/javascript" >
    $(function(){
        $('#video_player').hide();
        $('#video-main').click(function(){ 
            $(this).hide();
             $('#video_player').show();
            return false;
        })
        });
        $(function()
                {
                    $('#slider1').bxSlider({
                    infiniteLoop:true,
                    displaySlideQty:3
                  });
        });
</script>
<style type="text/css">
        /*SLIDER*/
        .bx-wrapper{
            margin: auto;
            width: 500px !important;
        }
        .bx-wrapper .bx-window{
            margin: 0 50px;
            width: 400px !important;
        }
</style>
<?php echo $this->Session->flash(); ?>
<div class="head_home">
        <div class="content_head">
                        <div class="text">
                            <h1>La mejor forma para seleccionar personal</h1>
                            <p>Una plataforma fácil y rápida diseñada para que empresas, consultoras 
                                o profesionales que necesiten reducir tiempos y costos, en la selección
                                de personal, un nuevo concepto, Video Entrevistas de preselección.</p>
                            <div class="btn">EMPEZA AHORA</div>
                            <p class="btn_p">o conoce como funciona</p>    
                        </div>
                        <div class="video">
                                <?php
                                    echo $this->Html->link(
                                            $this->Html->image(
                                                    "ver_video.png", array("alt" => "Ver video")),
                                            "../files/videos/home.flv",
                                            array('escape' => false, 'id' => "video-main", 'style' => "display:inline-block;width:452px;height:298px")
                                    )
                                ?>
                                    <!-- this will install flowplayer inside previous A- tag. -->
                                  
                                <div id="video_player" style="display: inline-block; background-color: #000;">
                                    <div id="player" style="background-color: #000;">
                                        <object width="452" height="298" id="f4Player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"> 
                                            <param name="movie" value="<?php echo $this->Html->url('/', true); ?>/files/player.swf" /> 
                                            <param name="quality" value="high" /> 
                                            <param name="menu" value="false" /> 
                                            <param name="allowFullScreen" value="true" /> 
                                            <param name="scale" value="noscale" /> 
                                            <param name="allowScriptAccess" value="always" />
                                            
                                            <param name="swLiveConnect" value="true" />
                                            <param name="flashVars" value="skin=<?php echo $this->Html->url('/', true); ?>/files/skins/mySkin.swf
                                            	&thumbnail=<?php echo $this->Html->url('/', true); ?>/img/ver_video.png
                                            	&video=<?php echo $this->Html->url('/', true); ?>/files/videos/home.flv
                                                
                                            	"/>
                                        <!-- [if !IE] -->
                                            <object width="452" height="298" data="<?php echo $this->Html->url('/', true); ?>/files/player.swf" type="application/x-shockwave-flash" id="f4Player">
                                                <param name="quality" value="high" /> 
                                                <param name="menu" value="false" /> 
                                                <param name="allowFullScreen" value="true" /> 
                                                <param name="scale" value="noscale" />
                                                <param name="allowScriptAccess" value="always" />
                                                <param name="swLiveConnect" value="true" />
                                                
                                                <param name="flashVars" value="skin=<?php echo $this->Html->url('/', true); ?>/files/skins/mySkin.swf
                                                	&thumbnail=<?php echo $this->Html->url('/', true); ?>/img/ver_video.png
                                                	&video=<?php echo $this->Html->url('/', true); ?>/files/videos/home.flv
                                                    &autoplay=1
                                                	"/>
                                            </object> 
                                         <!-- [endif] --> 
                                        </object>
                                    </div>      
                                </div> 
                        </div>
        </div>
</div>
<div id="content">
            <div class="head_content"> 
              <div class="main">
                <h2>Prueba Gratis SeleccionWEb por 30 dias</h2>
                                
                <div class="btn_1">
                        <?php echo $html->link("Registrate hoy para tu version de prueba", "/pages/register") ?>
                </div>
              </div>  
            </div>    
              <div class="content_content">
               <div id="main">  
                <div class="content_left">
                    <div class="content_left_text">
                        <h3>Principales Caracteristicas</h3>
                        <ul>
                            <li><?php echo $html->image("people.png", array('alt' => '')) ?><div class="text_info"><h4><a href="#">Analize los perfiles</a></h4><p>Vea las características de los candidatos y sus habilidades de comunicación, analice las respuestas a sus preguntas las cuales revelaran cualidades
                                                                                                                importantes que un curriculum vitae no le dirá.</p></div></li>
                             <li><?php echo $html->image("think.png", array('alt' => '')) ?><div class="text_info"><h4><a href="#">Interaccion con los candidatos</a></h4><p>Escriba y envíe a todos los candidatos todas las preguntas que desee conocer de ellos para que  le respondan grabándose frente a su cámara web antes de realizar la entrevista cara a cara.</p></div></li>
                             <li><?php echo $html->image("file.png", array('alt' => '')) ?><div class="text_info"><h4><a href="#">Guardar Selecciones</a></h4><p>Supera los conflictos de agenda, SeleccionWeb le permite realizar múltiples selecciones sin tener en cuenta las zonas horarias o geográficas.</p></div></li>
                             <li><?php echo $html->image("clock.png", array('alt' => '')) ?><div class="text_info"><h4><a href="#">Tiempos y Costos</a></h4><p>Ahorre tiempo y reduzca costos operativos en los procesos de selección o preselección de personal.</p></div></li>
                        </ul>
                    </div>
                    <div id="sidebar">
                        <p>Empresas que ya utilizan SeleccionWeb</p>
                        <div class="content_sidebar">
                        <!--NUEVO-->
                            
                            <ul id="slider1">
                                    <li><a href="#"><?php echo $html->image("file1.png", array('alt' => 'file1')) ?></a></li>
                                    <li><a href="#"><?php echo $html->image("file2.png", array('alt' => 'file2')) ?></a></li>
                                    <li><a href="#"><?php echo $html->image("file3.png", array('alt' => 'file3')) ?></a></li>
                                    <li><a href="#"><?php echo $html->image("file4.png", array('alt' => 'file4')) ?></a></li>
                                    <li><a href="#"><?php echo $html->image("file5.png", array('alt' => 'file5')) ?></a></li>
                            </ul>
                            
                        </div>
                    </div>
                </div> 
                <div class="content_right">
                    <div class="content_right_up">
                       <div class="main">
                            <h4>Pronto la version mobile</h4>
                            <?php echo $html->image("phones.png", array('alt' => 'fono')) ?>
                            <p>Proximamente podras acceder a la plataforma desde tu smartphone.</p>
                       </div> 
                    </div>
                    <div class="content_right_down">
                       <div class="main">
                        <h4>Ultimas novedades</h4>
                        <ul>
                            <li><img src="images/photo.png" /><div class="right_text"><p class="title">Testimonios de Jovenes Profesionales</p><p class="date">14/11/2011</p><p class="parraph">Una excelente recepción por parte de los candidatos que han sido Video Seleccionados ha tenido SeleccionWeb.</p></div></li>
                            <li><img src="images/photo.png" /><div class="right_text"><p class="title">Entrevista: 25 preguntas típicas</p><p class="date">14/11/2011</p><p class="parraph">uien haya elegido ser empleado sabe que tendrá que pasar en algún momento alguna de esas arduas entrevistas de trabajo.</p></div></li>
                            <li><img src="images/photo.png" /><div class="right_text"><p class="title">Ptincidunt tellus onec tempus</p><p class="date">14/11/2011</p><p class="parraph">nteresante e ilustrativa nota del New York Times, que reprodujo el diario La Nacion sobre este nuevo sistema que están.....</p></div></li>
                        </ul>
                       </div> 
                    </div>
                </div>
               </div>  
            </div>
        </div>