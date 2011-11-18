<?php 
//$rtmp="rtmp://38.100.206.254/cristovienelared/tvcvlr2";
//echo "texto: ".$rtmp."<br/>";
//$img="http://cristovienelared.org/images/logo_cv.png";
$vid=str_replace("/", "", strrchr($rtmp,'/'));
$url=str_replace($vid, "",$rtmp);
//echo "video: ".$vid."<br/>";
//echo "url: ".$url."<br/>";
?>
<embed
type='application/x-shockwave-flash'
id='single2'
name='single2'
src='http://player.longtailvideo.com/player.swf'
width='480'
height='360'
bgcolor='undefined'
allowscriptaccess='always'
allowfullscreen='true'
wmode='transparent'
flashvars='file=<?php echo$vid?>&image=<?php echo$img?>&autostart=true&streamer=<?php echo$url?>&controlbar=over'
/>