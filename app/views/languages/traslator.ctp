

<div id="tabs">
	<ul>
<?php
	foreach($languages as $language):
?>
		<li><a href="read/<?php echo $edit['Language']['id'] ?>/<?php echo $language['Language']['key']?>"><?php echo $this->Html->image('flags/'.$language['Language']['key'].'.png')?><?php echo utf8_encode($language['Language']['text']);?></a></li>
<?php endforeach; ?>
	</ul>
</div>

<?php
//print_r($edit['Language'] );
?>
