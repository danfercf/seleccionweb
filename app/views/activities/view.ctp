<div id="mis-datos">
    <h1 class="private-title" style="margin: 0px;"> <span>Datalle de la actividad</span> <span style="float: right; margin-right: 10px;"> <?php echo $this->Html->link($this->Html->image('cerrar.png', array('alt'=>'ver', 'style'=>'border:none')), '#', array('escape'=>false, 'class'=>'closeDOMWindow')); ?></span> </h1>
    <div class="left" style="width: 400px;">
        <div style="margin-top: 5px;"><a style="color:#727272; font-weight: bold;">Usuario: </a> <?php echo $activity['Activity']['user'] ?></div>
        <div style="margin-top: 5px;"><a style="color:#727272; font-weight: bold;">Fecha:  </a> <?php echo $activity['Activity']['created']; ?></div>
        <div style="margin-top: 5px;"><a style="color:#727272; font-weight: bold; ">Descripcion del registro:  </a> <p  style="border: 1px lightgray double; padding: 10px;"> <?php echo $activity['Activity']['description'] ?></p></div>
    </div>
</div>