<?php

session_start();

require_once "../php/helpers.php";

$testId = isset($_GET['test']) ? $_GET['test'] : null;
$questionNum = isset($_GET['question']) ? $_GET['question'] : null;


$pdo = getPDO();

try {

  // Подготавливаем запрос с параметром
  $stmt = $pdo->prepare("SELECT questions FROM tests WHERE id = :testId");
  // Привязываем параметр к значению
  $stmt->bindParam(':testId', $testId, PDO::PARAM_INT);

  // Выполняем запрос
  $stmt->execute();

  // Устанавливаем режим выборки результата в ассоциативный массив
  $stmt->setFetchMode(PDO::FETCH_ASSOC);


  while ($row = $stmt->fetch()) {
    // Извлекаем JSON из ячейки и преобразуем его в ассоциативный массив
    $test = json_decode($row['questions'], true);
  }

  // Выводим данные
  // echo '<pre>';
  // print_r($test);
  // echo '</pre>';

} catch (PDOException $e) {
  echo "Ошибка: " . $e->getMessage();
}

