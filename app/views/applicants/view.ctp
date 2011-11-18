<?php
echo $this->Html->script('jquery/jquery.raty.min.js');
echo $this->Html->script('flowplayer/flowplayer-3.2.6.min.js');
echo $this->Html->script('flowplayer/flowplayer.playlist-3.0.8.min.js');
?>
<style type="text/css" >
    #video {
        height: 360px;
        width: 420px;
    }

    .clips{
        width: 200px;
    }
    .clips a {
        background: url(<?php echo $this->Html->url('/') ?>img/h80.png) repeat scroll 0 0 #FEFEFF;
        border: 1px outset #CCCCCC;
        color: #000000;
        cursor: pointer;
        display: block;
        font-size: 12px;
        height: 20px;
        letter-spacing: -1px;
        padding: 12px 15px;
        text-decoration: none;
    }

    a:active {
        outline: medium none;
    }
    .clips a span {
        color: #666666;
        display: block;
        font-size: 11px;
    }
    .clips a em {
        color: #FF0000;
        font-style: normal;
    }
</style>
<div >
    <h1 class="private-title" style="margin: 0px; margin-bottom: 15px;"> <span id="logo-aplicantes"><?php echo $applicant['Selecction']['name']; ?> - <?php echo $applicant['Applicant']['name'] ?></span> <span style="float: right; margin-right: 10px;"> <?php echo $this->Html->link($this->Html->image('cerrar.png', array('alt' => 'ver', 'style' => 'border:none')), '#', array('escape' => false, 'class' => 'closeDOMWindow')); ?></span> </h1>
    <div>
        <h3>Calificar Postulante</h3>
        <div>
            <span>Personalidad : </span>

            <script type="text/javascript">
                $(function(){
                    $('#personality').raty({
                        starOn:    'startazul.png',
                        starOff:   'startgriz.png',
                        start: <?php echo $applicant['Rating']['personality'] ?>,
                        path: '<?php echo $this->Html->url('/') ?>img/',
                        click: function(score){
                            $.ajax({
                                url: '<?php echo $this->Html->url(array('controller' => 'ratings', 'action' => 'qualify', $applicant['Rating']['id'],'personality')) ?>/'+score,
                                success: function(data) {
                                    $.fn.raty.start(data, '#personality');
                                    $.fn.raty.start(data, '#personality-<?php echo $applicant['Applicant']['id']?>');
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
                        start: <?php echo $applicant['Rating']['knowledge'] ?>,
                        path: '<?php echo $this->Html->url('/') ?>img/',
                        click: function(score){
                            $.ajax({
                                url: '<?php echo $this->Html->url(array('controller' => 'ratings', 'action' => 'qualify', $applicant['Rating']['id'],'knowledge')) ?>/'+score,
                                success: function(data) {
                                    $.fn.raty.start(data, '#knowledge');
                                    $.fn.raty.start(data, '#knowledge-<?php echo $applicant['Applicant']['id']?>');
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
                        start: <?php echo $applicant['Rating']['presentation'] ?>,
                        path: '<?php echo $this->Html->url('/') ?>img/',
                        click: function(score){
                            $.ajax({
                                url: '<?php echo $this->Html->url(array('controller' => 'ratings', 'action' => 'qualify', $applicant['Rating']['id'],'presentation')) ?>/'+score,
                                success: function(data) {
                                    $.fn.raty.start(data, '#presentation');
                                    $.fn.raty.start(data, '#presentation-<?php echo $applicant['Applicant']['id']?>');
                                }
                            });
                        }
                    });
                })

            </script>
            <span id="presentation"></span>
        </div>
    </div>
    <div class="clips" style="float:left">
        <a href="${url}">
		${title}
        </a>

    </div>
    <div id="video" style="float: right">
        <a class="player" id="fms" >
            <?php
            echo $this->Html->image(
                    "applicants/" . $applicant['Applicant']['photo'], array("alt" => "Ver video", 'width' => 420, 'height' => 360), array('escape' => false, 'id' => "button-register")) ?>
        </a>

        <script type="text/javascript" >
            $f("fms", "<?php echo $this->Html->url('/') ?>files/flowplayer-3.2.7.swf", {

                clip: {
                    provider: 'influxis',
                    baseUrl: 'rtmp://lolvp86f.rtmphost.com/sel_web/<?php echo $applicant['Applicant']['selecction_id'] . "_" . $applicant['Applicant']['id'] ?>/'
                },
                playlist: [<?php
            $i = 1;
            foreach ($applicant['Interview'] as $applicant) {
                echo "{ url: 'mp4:pregunta_" . $i . ".mp4', title: 'Pregunta " . $i . "'},";
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

        </script>
    </div>


</div>
<div style="clear: both"></div>
