<?php

require_once "../php/helpers.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['taskId'])) {
    $pdo = getPDO();

    $userId = currentUser()["id"];
    $learnId = $_POST['taskId'];

    $stmt = $pdo->prepare("SELECT done_tasks FROM tasks_progress WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $userId);
    
    $stmt->execute();
    $row = $stmt->fetch();

    if ($row) {
      // Распарсим JSON строку в массив PHP
      $data = json_decode($row['done_tasks'], true);

      $data[$learnId] = "done";

      // Преобразуем массив обратно в JSON строку
      $updated_json_data = json_encode($data);

      // SQL запрос для обновления JSON данных
      $update_sql = "UPDATE tasks_progress SET done_tasks = :done_tasks WHERE user_id = :user_id";
      $stmt = $pdo->prepare($update_sql);
      $stmt->bindParam(':done_tasks', $updated_json_data);
      $stmt->bindParam(':user_id', $userId);
      $stmt->execute();

      echo "JSON данные успешно обновлены";
    } else {
      // JSON данные для вставки
      $data = [
        $learnId => "done",
      ];
      $json_data = json_encode($data);

      $sql = "INSERT INTO tasks_progress (user_id, done_tasks) VALUES (:user_id, :done_tasks);";

      // Подготавливаем выражение
      $stmt = $pdo->prepare($sql);

      // Передаем значения переменных и выполняем запрос
      try {
        $stmt->execute(
          array(
            ':user_id' => $userId,
            ':done_tasks' => $json_data,
          )
        );
      } catch (PDOException $e) {
        die("Ошибка при добавлении данных: " . $e->getMessage());
      }
    }

  } else {
    // Обработка случая, когда параметр taskId не был передан
    echo "Parameter 'taskId' is not provided.";
  }
}