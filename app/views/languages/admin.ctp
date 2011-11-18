<?php echo $html->css('languages'); ?>
<?php echo $html->script('js.froy'); ?>
<script>
$(document).ready(function() {
    $(".link_active_lang").click(function(){
        var id=$(this).attr("idd");
        
        if($(this).hasClass("active"))
        {
            status=0;
            $(this).html("Habilitar");
        }else
        {
            status=1;
            $(this).html("Deshabilitar");
        }
        
         $.ajax({
                url: "<?php echo $this->Html->url(array('controller' => 'languages', 'action' => 'active')) ?>/"+id+'/'+status
            });
        $(this).toggleClass("active");

        
    }) 
})
</script>
<table class="tabla-lang">
<?php 
 $celdas = array();
 foreach ($languages as $language) {
    if($language['Language']['active']==0)
    $active="<a class='link_active_lang' idd='".$language['Language']['id']."'>Habilitar</a>";
    else
    $active="<a class='link_active_lang active' idd='".$language['Language']['id']."'>Deshabilitar</a>";
    array_push($celdas, array($this->Html->image('flags/'.$language['Language']['key'].'.png', array('class' => 'img-flag')), $language['Language']['text'],$active));
}


echo $this->Html->tableHeaders(array('Flag','Nombre','Acciones'));
echo $this->Html->tableCells($celdas,   
 array('class' => 'darker'));
?>
</table>	











