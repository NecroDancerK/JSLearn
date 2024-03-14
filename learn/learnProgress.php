<?php

require_once "../php/helpers.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['learnId'])) {
    $pdo = getPDO();

    $userId = currentUser()["id"];
    $learnId = $_POST['learnId'];

    $stmt = $pdo->prepare("SELECT studied_topics FROM learn_progress WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $userId);

    $stmt->execute();
    $row = $stmt->fetch();

    if ($row) {
      // Распарсим JSON строку в массив PHP
      $data = json_decode($row['studied_topics'], true);

      $data[$learnId] = "learned";

      // Преобразуем массив обратно в JSON строку
      $updated_json_data = json_encode($data);

      // SQL запрос для обновления JSON данных
      $update_sql = "UPDATE learn_progress SET studied_topics = :studied_topics WHERE user_id = :user_id";
      $stmt = $pdo->prepare($update_sql);
      $stmt->bindParam(':studied_topics', $updated_json_data);
      $stmt->bindParam(':user_id', $userId);
      $stmt->execute();

      echo "JSON данные успешно обновлены";
    } else {
      // JSON данные для вставки
      $data = [
        $learnId => "learned",
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