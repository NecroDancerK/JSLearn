<?php

session_start();

require_once "../php/helpers.php";

$testId = isset($_POST['test']) ? $_POST['test'] : null;
$questionNum = isset($_POST['question']) ? $_POST['question'] : null;


$pdo = getPDO();

try {

  // Подготавливаем запрос с параметром
  $stmt1 = $pdo->prepare("SELECT questions FROM tests WHERE id = :testId");
  // Привязываем параметр к значению
  $stmt1->bindParam(':testId', $testId, PDO::PARAM_INT);

  // Выполняем запрос
  $stmt1->execute();

  // Устанавливаем режим выборки результата в ассоциативный массив
  $stmt1->setFetchMode(PDO::FETCH_ASSOC);

  $test = [];

  while ($row = $stmt1->fetch()) {
    // Извлекаем JSON из ячейки и преобразуем его в ассоциативный массив
    $test = json_decode($row['questions'], true);
  }

  $dataArray = [$test[$questionNum]['rigthAnswer'], count($test)];

  $jsonData = json_encode($dataArray);
  // Выводим данные
  echo $jsonData;

} catch (PDOException $e) {
  echo "Ошибка: " . $e->getMessage();
}