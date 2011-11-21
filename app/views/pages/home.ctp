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
        })
</script>
<?php echo $this->Session->flash(); ?>
<div id="content">
    <div class="content-left">
         <?php echo $ba['eficiencia']?>
        <!--div>
            <h2>E en procesos de Selecci&oacute;n</h2>
            <h3><b>Primer plataforma 2.0</b> para  Selecci&oacute;n o Preselecci&oacute;n de Recursos Humanos mediante el uso de un nuevo concepto</h3>
            <h3><b>La Video selecci&oacute;n.</b></h3>
        </div-->
        <ul>
            <li class="buttom-conozca">
                <?php echo $this->Html->link($b['conozca_mas'], array('controller'=>'pages', 'action'=>'learn_more'), array('escape' => false, 'class' => "more align-right")); ?>
            </li>
            <li class="buttom-planes">
                <?php echo $html->link($b['nuestros_planes'], "/pages/plans") ?>
            </li>
        </ul>
        <ul class="content_buttom_register">
            <li class="buttom-registro">
                <?php echo $this->Html->link($b['registro'], array('controller'=>'clients', 'action'=>'register'), array('escape' => false, 'class' => "more align-right")); ?>
            </li>
        </ul>
    </div>           
    <div class="content-right">
        <div class="video">   
            <?php
                echo $this->Html->link(
                        $this->Html->image(
                                "ver_video.png", array("alt" => "Ver video")),
                        "../files/videos/home.flv",
                        array('escape' => false, 'id' => "video-main", 'style' => "display:inline-block;width:449px;height:251px")
                )
            ?>
                <!-- this will install flowplayer inside previous A- tag. -->
              
            <div id="video_player" style="display: inline-block; background-color: #000; margin-left: 11px; margin-top: 9px;">
                <div id="player" style="background-color: #000;">
                    <object width="449" height="251" id="f4Player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"> 
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
                        <object width="449" height="251" data="<?php echo $this->Html->url('/', true); ?>/files/player.swf" type="application/x-shockwave-flash" id="f4Player">
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