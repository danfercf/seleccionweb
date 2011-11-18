<?php
/* echo "<?xml version='1.0' encoding='iso-8859-1'?" . ">";
  echo "<entrevista>";

  foreach ($questions as $question) {
  echo "<pregunta preg='" . $question['Question']['question'] . "' />";
  }

  echo "</entrevista>"; */
?>
<h1 class="private-title">
    <span id="panel-paso2">Crear Preguntas</span>
</h1>
<p>
    El orden de las preguntas aparecera tal como se muestra en este listado.
    si desea cambiar el orden solo tiene que arrastar las pregunas y ordenarlas como quierea que aparezcan.
</p>
<table id="lista-preguntas" class="listado_sortable">
    <thead>
        <tr>
            <th style="width: 425px;"> Pregunta</th>
            <th>Tiempo</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
<?php
if (count($questions)) {
    $i = 0;
    foreach ($questions as $pregunta) {
        $class = null;
        if ($i++ % 2 == 0) {
            $class = ' class="row-b"';
        }
?>
        <tr id="lista-preguntas-<?php echo $pregunta['Question']['id']; ?>" <?php echo $class; ?> style="width: 425px !important;">
            <?php echo $this->Form->input('Question.'.($i-1).'.id', array('type'=>'hidden','value'=>$pregunta['Question']['id']))?>
            <td><?php echo $pregunta['Question']['question']; ?></td>
            <td><?php echo $pregunta['Question']['duration']; ?> seg.</td>
            <td >
<?php
        echo $this->Html->link(
                $this->Html->image(
                        "private/favorito.png",
                        array("alt" => "Favorito")
                ),
                "/questions/favorite/" . $pregunta['Question']['id'],
                array('escape' => false)
        );
?>
            </td>
            <td>
<?php
        echo $this->Html->link(
                $this->Html->image(
                        "private/eliminar.png",
                        array("alt" => "Favorito")
                ),
                'javascript:del('.$pregunta['Question']['id'].');',
                array('escape' => false)
        );
?>
            </td>
        </tr>
<?php
    }
} else {
 ?>
        <tr class="row-b">
            <td colspan='99' >No hay preguntas para esta seleccion</td>
        </tr>
        <?php } ?>
    </tbody>
</table>