<?php
if ($respuesta == 'ok') {
    if ($favorito) {
?>
        <div class="ui-draggable" style="position: relative;"><p id="<?php echo $pregunta['Question']['id'] ?>"><?php echo $pregunta['Question']['question'] ?></p><span class="del_fav" id_fav="<?php echo $pregunta['Question']['id'] ?>'"></span></div>
<?php
    } else {
?>
        <tr id="lista-preguntas-<?php echo $pregunta['Question']['id']; ?>">
    <?php echo $this->Form->input('Question.id', array('value' => $pregunta['Question']['id'], 'name' => 'data[Question][Question][]')) ?>
        <td id="question-text-<?php echo $pregunta['Question']['id']; ?>"><?php echo $pregunta['Question']['question']; ?></td>
        <td>
            <img style="display: none;" id="loading-<?php echo $pregunta['Question']['id']; ?>" src="<?php echo $this->Html->url('/')?>img/small-loading.gif" alt="loading">
        </td>
        <td>
            <select class="sele" id="tiempo-pregunta-<?php echo $pregunta['Question']['id']; ?>" title="<?php echo $pregunta['Question']['id']; ?>">
                <option value="30">30 seg</option>
                <option value="45">45 seg</option>
                <option value="60">60 seg</option>
            </select>
            
            <script type="text/javascript">
                $(function(){
                    $('#tiempo-pregunta-<?php echo $pregunta['Question']['id']; ?>').change(function(){
                        $('#tiempo-pregunta-<?php echo $pregunta['Question']['id']; ?>').toggle();
                        $('#loading-<?php echo $pregunta['Question']['id']; ?>').toggle();
                        $.post("<?php echo $this->Html->url('/') ?>questions/duration/<?php echo $pregunta['Question']['id']; ?>/"+$(this).val(), function(response){
                            if(response=='ok'){
                                $('#loading-<?php echo $pregunta['Question']['id']; ?>').toggle();
                                $('#tiempo-pregunta-<?php echo $pregunta['Question']['id']; ?>').toggle();
                            }else{
                                alert('Huvo un error al cambier la duracion intentelo de nuevo porfavor');
                            }

                        });
                    });
                });
            </script>
        </td>
        <td >
        <?php
        echo $this->Html->link(
                $this->Html->image(
                        "private/favorito.png",
                        array("alt" => "Favorito", 'class' => 'favorito')
                ),
                "javascript: favorito(" . $pregunta['Question']['id'] . ")",
                array('escape' => false, 'class' => 'favorito', 'id' => 'favorito-'. $pregunta['Question']['id'])
        );
        ?>
    </td>
    <td>
        <?php
        echo $this->Html->link(
                $this->Html->image(
                        "private/eliminar.png",
                        array("alt" => "Eliminar")
                ),
                "javascript: del(" . $pregunta['Question']['id'] . ')',
                array('escape' => false, 'class' => 'eliminar')
        );
        ?>
    </td>
</tr>
<script type="text/javascript" >
    $(function(){
        $(".favorito").qtip({
            content: 'Favorito',
            style: {
                width: 100,
                height: 18,
                padding: 0,
                background: '#4077A8',
                color: 'white',
                textAlign: 'center',
                border: {
                    width: 2,
                    radius: 5,
                    color: '#4077A8'
                }
            }

        });
        $(".eliminar").qtip({
            content: 'Eliminar',
            style: {
                width: 100,
                height: 18,
                padding: 0,
                background: '#4077A8',
                color: 'white',
                textAlign: 'center',
                border: {
                    width: 2,
                    radius: 5,
                    color: '#4077A8'
                }
            }

        });
        $('select').msDropDown().data("dd");
    });
</script>
<?php
    }
} else {
?>
    error
<?php } ?>