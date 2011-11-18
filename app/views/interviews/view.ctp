<?php
echo $this->Html->script('jquery/jquery.raty.min.js');
//echo $this->Html->script('flowplayer/flowplayer-3.2.6.min.js');
//echo $this->Html->script('flowplayer/flowplayer.playlist-3.0.8.min.js');
?>
<style type="text/css" >
    #video {
    height: 360px;
    padding-right: 2px;
    width: 480px;
      background: none repeat scroll 0 0 #000000;
    }

    .clips{
        width: 220px;
    }
    .clips a {
        background: url(<?php echo $this->Html->url('/') ?>img/h80.png) repeat scroll 0 0 #FEFEFF;

    border: 1px outset #CCCCCC;
    color: #2D5476;
    cursor: pointer;
    display: block;
    font-size: 26px;
    font-weight: bold;
    height: 20px;
    letter-spacing: -1px;
    padding: 12px 7px;
    position: relative;
    text-decoration: none;
    }

    a:active {
        outline: medium none;
    }
    .clips a span {
        color: #666666;
    display: block;
    font-family: Verdana;
    font-size: 11px;
    line-height: 13px;
    }
    .clips a em {
        color: #FF0000;
        font-style: normal;
    }
    
    .descrip{
    border-left: 1px dashed;
    font-weight: normal;
    height: 40px;
    left: 42px;
    padding: 0 4px;
    position: absolute;
    text-align: justify;
    top: 1px;
    width: 164px;
    }
    .titulo{
    display: block;
    font-size: 13px;
    font-weight: bold;
    margin: 8px 0;
    }
</style>
<script type="text/javascript">
$(function(){
    var img = $("#fms > img").attr('src');
   
    
     $(".player_rtmp").click(function(){
        var url=$(this).attr('href');
        $.ajax({
        type:'post',
        data:'img='+img+'&rtmp='+url,
        url: '<?php echo $this->Html->url(array('controller' => 'interviews', 'action' => 'player')) ?>/',
        success: function(data) {
            //alert(data);
            $("#video").html(data);
            }
        });
        
        return false;
     })       
            
})
</script>
<div >
    <h1 class="private-title" style="margin: 0px; margin-bottom: 15px;"> <span id="logo-aplicantes"><?php echo $interview['Selecction']['name']; ?> - <?php echo $interview['Applicant']['name'] ?></span> <span style="float: right; margin-right: 10px;"> <?php echo $this->Html->link($this->Html->image('cerrar.png', array('alt' => 'ver', 'style' => 'border:none')), '#', array('escape' => false, 'class' => 'closeDOMWindow')); ?></span> </h1>
    <div>
        <h3>Calificar Postulante</h3>
        <div>
            <span>Personalidad : </span>

            <script type="text/javascript">
                $(function(){
                    $('#personality').raty({
                        starOn:    'startazul.png',
                        starOff:   'startgriz.png',
                        start: <?php echo $interview['Rating']['personality'] ?>,
                        path: '<?php echo $this->Html->url('/') ?>img/',
                        click: function(score){
                            $.ajax({
                                url: '<?php echo $this->Html->url(array('controller' => 'ratings', 'action' => 'qualify', $interview['Rating']['id'],'personality')) ?>/'+score,
                                success: function(data) {
                                    $.fn.raty.start(data, '#personality');
                                    $.fn.raty.start(data, '#personality-<?php echo $interview['Applicant']['id']?>');
                                }
                            });
                        }
                    });
                })

            </script>
            <span id="personality"></span>

            <span>Conocimiento : </span>
            <script type="text/javascript">
                $(function(){
                    $('#knowledge').raty({
                        starOn:    'startazul.png',
                        starOff:   'startgriz.png',
                        start: <?php echo $interview['Rating']['knowledge'] ?>,
                        path: '<?php echo $this->Html->url('/') ?>img/',
                        click: function(score){
                            $.ajax({
                                url: '<?php echo $this->Html->url(array('controller' => 'ratings', 'action' => 'qualify', $interview['Rating']['id'],'knowledge')) ?>/'+score,
                                success: function(data) {
                                    $.fn.raty.start(data, '#knowledge');
                                    $.fn.raty.start(data, '#knowledge-<?php echo $interview['Applicant']['id']?>');
                                }
                            });
                        }
                    });
                })

            </script>
            <span id="knowledge"></span>
            <span>Presentacion : </span>
             
            <script type="text/javascript">
                $(function(){
                    $('#presentation').raty({
                        starOn:    'startazul.png',
                        starOff:   'startgriz.png',
                        start: <?php echo $interview['Rating']['presentation'] ?>,
                        path: '<?php echo $this->Html->url('/') ?>img/',
                        click: function(score){
                            $.ajax({
                                url: '<?php echo $this->Html->url(array('controller' => 'ratings', 'action' => 'qualify', $interview['Rating']['id'],'presentation')) ?>/'+score,
                                success: function(data) {
                                    $.fn.raty.start(data, '#presentation');
                                    $.fn.raty.start(data, '#presentation-<?php echo $interview['Applicant']['id']?>');
                                }
                            });
                        }
                    });
                })

            </script>
            <span id="presentation"></span>
        </div>
        
         <div class="titulo"></h3>Preguntas:</h3></div>
    </div>
   
    
    <div class="clips" style="float:left">
    
    <?php
            $i = 1;
            foreach ($interview['Interview'] as $entrevista) {
                if(isset ($question[$i-1]['question'])) {$q=$question[$i-1]['question'];
                $t= $i . ".";
                $u= $entrevista['url_interview'];
                
                echo '<a class="player_rtmp" href="'.$u.'" >';
        		echo $t; 
                echo '<span class="descrip">'.$q.'</span></a>';
}
                $i++;
}
            ?>

    </div>
    <div id="video" style="float: right">
        <a class="player" id="fms" >
            <?php
            echo $this->Html->image(
                    "applicants/" . $interview['Applicant']['photo'], array("alt" => "Ver video", 'width' => 480, 'height' => 360), array('escape' => false, 'id' => "button-register")) ?>
        </a>
        
<!--
        <script type="text/javascript" >
            $f("fms", "<?php echo $this->Html->url('/') ?>files/flowplayer-3.2.7.swf", {

                clip: {
                    provider: 'influxis',
                    baseUrl: 'rtmp://lolvp86f.rtmphost.com/sel_web/<?php echo $interview['Applicant']['selecction_id'] . "_" . $interview['Applicant']['id'] ?>/'
                },
                playlist: [<?php
            $i = 1;
            foreach ($interview['Interview'] as $entrevista) {
                echo "{ album: '".$question[$i-1]['question']."',url: 'mp4:pregunta_" . $i . ".mp4', title: '" . $i . ".'},";
                $i++;
            }
            ?> ],
                        plugins: {

                            influxis: {
                                url: 'flowplayer.rtmp-3.2.3.swf',
                                netConnectionUrl: 'rtmp://lolvp86f.rtmphost.com/sel_web/'
                            },controls: {
                                playlist: true
                            }
                        }
                    });
                    $f("fms").playlist("div.clips:first", {loop:true});

        </script>-->
    </div>


</div>

<!--pre><?php print_r($interview)?></pre-->
<div style="clear: both"></div>
