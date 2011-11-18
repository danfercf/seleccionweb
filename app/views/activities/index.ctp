<?php
echo $this->Html->css('tablas-seleccionweb.css');

$this->set('tab', 'profile');
echo $this->Html->script('jquery/jquery.DOMWindow.js');
?>
<script type="text/javascript">
    $(function(){
        $('#from').datepicker({maxDate: new Date(),dateFormat: "yy-mm-dd"});
        $('#to').datepicker({maxDate: new Date(),dateFormat: "yy-mm-dd",});
        $('.fixedAjaxDOMWindow').openDOMWindow({
            height:350,
            width:400,
            eventType:'click',
            loader:1,
            loaderImagePath:'<?php echo $this->Html->url('/') ?>img/ajax-loader.gif',
            loaderHeight:16,
            loaderWidth:17,
            windowSource:'ajax',
            windowHTTPType:'post'
        });
    });

</script>

<div class="activities index">
    <h1 class="private-title" style="margin: 0px;">Registro de actividades <span style="float: right;"><?php echo $this->Html->link($this->Html->image('print_32.png', array('style'=>'margin-top: -7px; margin-right: 6px;')), array('action' => 'export'), array('escape'=>false)); ?></span> </h1>
    <div id="acciones" style="padding: 10px 0px 0">
        <?php
        echo $this->Form->create('Activity', array('action' => 'index'));

        echo $this->Form->input('user', array('div' => false, 'label' => ' <span style="margin-left: 20px;">Usuario : <span>'));

        echo $this->Form->input('from', array('div' => false, 'label' => ' Desde : ', 'id' => 'from'));
        echo $this->Form->input('to', array('div' => false, 'label' => ' Hasta : ', 'id' => 'to'));
        ?>
        <input type="submit" class="button submit" value="buscar registros" id="b-enviar">
        <?php echo $this->Form->end(); ?>
    </div>
    <table cellpadding="0" cellspacing="0" style="margin: 0px; width: 100%;">

        <tr>

            <th style="width: 250px">Usuario</th>
            <th style="width: 150px;">Fecha</th>
            <th>Descripci&oacute;n</th>
            <th class="actions"></th>
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

                        <td><?php echo $activity['Activity']['user']; ?>&nbsp;</td>
                        <td><?php echo $activity['Activity']['created']; ?>&nbsp;</td>
                        <td><?php echo $activity['Activity']['description']; ?>&nbsp;</td>
                        <td class="actions">
<?php echo $this->Html->link($this->Html->image('ver.png', array('alt' => 'ver', 'style' => 'border:none')), array('controller' => 'activities', 'action' => 'view', $activity['Activity']['id']), array('escape' => false, 'class' => 'fixedAjaxDOMWindow')); ?>

                </td>
            </tr>
<?php }
        }else{
            ?>
            <tr><td colspan="4"> No hay registros</td> </tr>
            <?php }?>
            </table>


            <div class="paging">
        <?php echo $this->Paginator->prev('<< anteriores', array(), null, array('class' => 'disabled')); ?>
                            	 | 	<?php echo $this->Paginator->numbers(); ?>
                |
<?php echo $this->Paginator->next('siguiente >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>
