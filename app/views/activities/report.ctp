<?php
echo $this->Html->css('tablas-seleccionweb.css');
?>


<div class="activities index" style="width: 700px;">
    <img alt="Logo Seleccion Web" src="http://localhost:82<?php echo $this->Html->url('/')?>img/private/logo.png" >
    <h1 class="private-title" style="margin: 0px;">Reporte de actividades   </h1>
    <div> <?php echo date("l, n M Y");?></div>
    <table cellpadding="0" cellspacing="0" style="margin: 0px; width: 700px;"  width="700px">

        <tr>

            <th style="width: 150px; border-bottom: 1px solid lightgrey;">Usuario</th>
            <th style="width: 150px; border-bottom: 1px solid lightgrey;">Fecha</th>
            <th style="width: 300px; border-bottom: 1px solid lightgrey;white-space:normal;">Descripci&oacute;n</th>
        </tr>
        <?php
        if(!empty ($activities)){
                $i = 0;
                foreach ($activities as $activity) {
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
        ?>
                    <tr<?php echo $class; ?>>

                        <td style="width: 150px; border-bottom: 1px solid lightgrey;"><?php echo $activity['Activity']['user']; ?></td>
                        <td style="width: 150px; border-bottom: 1px solid lightgrey;"><?php echo $activity['Activity']['created']; ?></td>
                        <td style="width: 150px; border-bottom: 1px solid lightgrey;"><p><?php echo $activity['Activity']['description']; ?></p></td>
                        
            </tr>
<?php }
        }else{
            ?>
            <tr><td style="width: 150px; border-bottom: 1px solid lightgrey;" colspan="4"> No hay registros</td> </tr>
            <?php }?>
            </table>


            
</div>
