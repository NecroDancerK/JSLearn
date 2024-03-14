<?php
require_once "../php/helpers.php";

$pdo = getPDO();
$userId = currentUser()["id"];

$stmt = $pdo->prepare("SELECT studied_topics FROM learn_progress WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $userId);

$stmt->execute();
$row = $stmt->fetch();

if (!$row) {
  $data = [];
  $json_data = json_encode($data);

  $sql = "INSERT INTO learn_progress (user_id, studied_topics) VALUES (:user_id, :studied_topics);";

  // Подготавливаем выражение
  $statement = $pdo->prepare($sql);

  // Передаем значения переменных и выполняем запрос
  try {
    $statement->execute(
      array(
        ':user_id' => $userId,
        ':studied_topics' => $json_data,
      )
    );
  } catch (PDOException $e) {
    die("Ошибка при добавлении данных: " . $e->getMessage());
  }
}