<?php
 echo "<?xml version='1.0' encoding='iso-8859-1'?" . ">";
  echo "<entrevista>";

  foreach ($selecction['Question'] as $question) {
  echo "<pregunta preg='" . $question['question'] . "' tiempo='".$question['duration']."'/>";
  }

  echo "</entrevista>";
?>

