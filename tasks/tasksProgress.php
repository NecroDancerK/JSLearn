<?php

require_once "../php/helpers.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['taskId'])) {
    $pdo = getPDO();

    $userId = currentUser()["id"];
    $taskId = $_POST['taskId'];

    $stmt1 = $pdo->prepare("SELECT done_tasks FROM tasks_progress WHERE user_id = :user_id");
    $stmt1->bindParam(':user_id', $userId);
    
    $stmt1->execute();
    $row = $stmt1->fetch();

    if ($row) {
      // Распарсим JSON строку в массив PHP
      $data = json_decode($row['done_tasks'], true);

      $data[$taskId] = "done";

      // Преобразуем массив обратно в JSON строку
      $updated_json_data = json_encode($data);

      // SQL запрос для обновления JSON данных
      $update_sql = "UPDATE tasks_progress SET done_tasks = :done_tasks WHERE user_id = :user_id";
      $stmt1 = $pdo->prepare($update_sql);
      $stmt1->bindParam(':done_tasks', $updated_json_data);
      $stmt1->bindParam(':user_id', $userId);
      $stmt1->execute();

      echo "JSON данные успешно обновлены";
    } else {
      // JSON данные для вставки
      $data = [
        $taskId => "done",
      ];
      $json_data = json_encode($data);

      $sql1 = "INSERT INTO tasks_progress (user_id, done_tasks) VALUES (:user_id, :done_tasks);";

      // Подготавливаем выражение
      $stmt1 = $pdo->prepare($sql1);

      // Передаем значения переменных и выполняем запрос
      try {
        $stmt1->execute(
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