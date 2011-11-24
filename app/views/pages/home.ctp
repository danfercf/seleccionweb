<?php
//echo $this->Html->script('flowplayer/flowplayer-3.2.6.min.js');
$b = $this->requestAction("/languages/reader/botones");
$ba = $this->requestAction("/languages/reader/banner");
$l = $this->requestAction("/languages/reader/layout");
$e = $this->requestAction("/languages/reader/etiqueta");
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
                            <?php echo $l['la_mejor'];?>
                            <div>
                            <?php echo $this->Html->link($b['empezar'], array('controller'=>'pages', 'action'=>'register'), array('escape' => false, 'class' => "btn")); ?>
                            </div>
                            <?php echo $e['o_conoce'];?>    
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
                <?php echo $ba['prueba_gratis'];?>
                                
                <div class="btn_1">
                        <?php echo $html->link($e['registrate'], "/pages/register") ?>
                </div>
              </div>  
            </div>    
              <div class="content_content">
               <div id="main">  
                <div class="content_left">
                    <?php echo $l['principales_caracteristicas'];?>
                    <!--FIN content_left_text-->
                    <div id="sidebar">
                        <p><?php echo $ba['empresas'];?></p>
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
                    <?php echo $l['pronto_mobile'];?>
                    <!--FIN content_right_up-->
                    <div class="content_right_down">
                       <?php echo $l['ultimas_novedades'];?>
                       <!--FIN main-->
                    </div>
                </div>
               </div>  
            </div>
        </div>