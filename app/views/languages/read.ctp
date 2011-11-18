<textarea id="HtmlArea_<?php echo $texto["Language"]["id"]?>_<?php echo $tipo?>" class="txtDefaultHtmlArea" cols="108" rows="24">
<?php
echo utf8_encode($array_texto[$tipo]);
?>
</textarea>
<a class="save_language" idd="<?php echo $texto["Language"]["id"]?>" tipo="<?php echo $tipo?>">Guardar</a>
<?php

?>