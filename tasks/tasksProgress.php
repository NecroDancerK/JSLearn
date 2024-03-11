<?php
if (isset($_POST['taskId'])) {
  $taskId = $_POST['taskId'];
  echo $taskId;
} else {
  // Обработка случая, когда параметр taskId не был передан
  echo "Parameter 'taskId' is not provided.";
}
?>