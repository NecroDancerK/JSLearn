<?php
session_start();

require_once "../php/helpers.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['learnId'])) {
    $pdo = getPDO();

    $userId = currentUser()["id"];
    $taskId = $_POST['learnId'];

    $stmt = $pdo->prepare("SELECT studied_topics FROM learn_progress WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $userId);

    $stmt->execute();
    $row = $stmt->fetch();

    if ($row) {
      // Распарсим JSON строку в массив PHP
      $data = json_decode($row['studied_topics'], true);

      $data[$taskId] = "learned";

      // Преобразуем массив обратно в JSON строку
      $updated_json_data = json_encode($data);

      // SQL запрос для обновления JSON данных
      $update_sql = "UPDATE learn_progress SET studied_topics = :studied_topics WHERE user_id = :user_id";
      $stmt = $pdo->prepare($update_sql);
      $stmt->bindParam(':studied_topics', $updated_json_data);
      $stmt->bindParam(':user_id', $userId);
      $stmt->execute();

    } else {
      // JSON данные для вставки
      $data = [
        $taskId => "learned",
      ];
      $json_data = json_encode($data);

      $sql = "INSERT INTO learn_progress (user_id, studied_topics) VALUES (:user_id, :studied_topics);";

      // Подготавливаем выражение
      $stmt = $pdo->prepare($sql);

      // Передаем значения переменных и выполняем запрос
      try {
        $stmt->execute(
          array(
            ':user_id' => $userId,
            ':studied_topics' => $json_data,
          )
        );
      } catch (PDOException $e) {
        die("Ошибка при добавлении данных: " . $e->getMessage());
      }
    }
  }
}

$user = currentUser();

$pdo = getPDO();

$userId = $user["id"];

$stmt = $pdo->prepare("SELECT studied_topics FROM learn_progress WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $userId);

$stmt->execute();
$row = $stmt->fetch();

$data = json_decode($row['studied_topics'], true);

$arrayJSON = array_keys($data);

// var_dump($arrayJSON);

// Указываем директорию, в которой будем искать файлы
$directory = __DIR__;

// Получаем список файлов в директории
$files = scandir($directory);

// Инициализируем счетчик
$learnFileCount = 0;

// Проходим по каждому файлу
foreach ($files as $file) {
  // Проверяем, является ли файл обычным файлом и содержит ли слово "learn" в названии
  // и содержит ли число в названии
  if (is_file($directory . '/' . $file) && strpos($file, 'learn') !== false && preg_match('/\d+/', $file)) {
    $learnFileCount++;
  }
}

$_SESSION['learnFileCount'] = $learnFileCount;
$_SESSION['countLearn'] = $arrayJSON;

echo count($arrayJSON) / $learnFileCount;