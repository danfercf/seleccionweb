<?php
    $this->set('empresa', $this->Session->read('user'));
    $this->set('tab', 'home');
    $this->set('mensages', isset($more['Message']) ? count($more['Message']) : 0);
?>
<div class="left">
    <div class="left box-private">
        <div class="boton">
            <?php echo $this->Html->link(
                $this->Html->image(
                    "private/add.png", array("alt" => "Crear Seleccion")),
                    array('controller'=>'selecctions', 'action'=>'add'),
                    array('escape' => false)
                )
            ?>
            <p>
                Crear Seleccion
            </p>
        </div>
        <p class="text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ullamcorper
            feugiat dolor dapibus cursus. Ut a lacus velit, pharetra ullamcorper massa.
            Praesent porta vehicula nibh, in convallis enim condimentum in
        </p>
    </div>
    <div class="right box-private">
        <div class="boton">
            <?php echo $this->Html->link(
                $this->Html->image(
                    "private/ver.png", array("alt" => "Ver Seleccion")),
                    array('controller'=>'selecctions', 'action'=>'index'),
                    array('escape' => false)
                )
            ?>
            <p>
                Revisar Seleccion
            </p>
        </div>
        <p class="text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ullamcorper
            feugiat dolor dapibus cursus. Ut a lacus velit, pharetra ullamcorper massa.
            Praesent porta vehicula nibh, in convallis enim condimentum in vehicula nibh
        </p>
    </div>
</div>
<div class="right">
    <div class="left box-private">
        <div class="boton">
            <?php echo $this->Html->link(
                $this->Html->image(
                    "private/enviar.png", array("alt" => "Enviar Seleccion")),
                    array('controller'=>'selecctions', 'action'=>'send'),
                    array('escape' => false)
                )
            ?>
            <p>
                Enviar Seleccion
            </p>
        </div>
        <p class="text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ullamcorper
            feugiat dolor dapibus cursus. Ut a lacus velit, pharetra ullamcorper massa.
            Praesent porta vehicula nibh.
        </p>
    </div>
    <div class="right box-private">
        <div class="boton">
            <?php echo $this->Html->link(
                $this->Html->image(
                    "private/seleccion.png", array("alt" => "Nueva Seleccion")),
                    array('controller'=>'selecctions', 'action'=>'add'),
                    array('escape' => false)
                )
            ?>
            <p>
                Realizar Nueva  Seleccion
            </p>
        </div>
        <p class="text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ullamcorper
            feugiat dolor dapibus cursus. Ut a lacus velit, pharetra ullamcorper massa.
            Praesent porta vehicula nibh, in convallis enim condimentum in vehicula nibh,
            
        </p>
    </div>
</div>
