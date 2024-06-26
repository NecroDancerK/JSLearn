<?php

session_start();

require_once "../php/helpers.php";

// $testId = isset($_POST['test']) ? $_POST['test'] : null;
// $testResult = isset($_POST['result']) ? $_POST['result'] : null; 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['testId'])) {
    $pdo = getPDO();

    $userId = currentUser()["id"];
    $testId = $_POST['testId'];
    $testResult = $_POST['result'];

    $stmt1 = $pdo->prepare("SELECT done_tests FROM tests_progress WHERE user_id = :user_id");
    $stmt1->bindParam(':user_id', $userId);

    $stmt1->execute();
    $row = $stmt1->fetch();

    if ($row) {
      // Распарсим JSON строку в массив PHP
      $data = json_decode($row['done_tests'], true);

      if ($testResult > $data[$testId]) {
        $data[$testId] = $testResult;

        // Преобразуем массив обратно в JSON строку
        $updated_json_data = json_encode($data);

        // SQL запрос для обновления JSON данных
        $update_sql = "UPDATE tests_progress SET done_tests = :done_tests WHERE user_id = :user_id";
        $stmt1 = $pdo->prepare($update_sql);
        $stmt1->bindParam(':done_tests', $updated_json_data);
        $stmt1->bindParam(':user_id', $userId);
        $stmt1->execute();

        // echo "JSON данные успешно обновлены";
      }

    } else {
      // JSON данные для вставки
      $data = [
        $testId => $testResult,
      ];
      $json_data = json_encode($data);

      $sql1 = "INSERT INTO tests_progress (user_id, done_tests) VALUES (:user_id, :done_tests);";

      // Подготавливаем выражение
      $stmt1 = $pdo->prepare($sql1);

      // Передаем значения переменных и выполняем запрос
      try {
        $stmt1->execute(
          array(
            ':user_id' => $userId,
            ':done_tests' => $json_data,
          )
        );
      } catch (PDOException $e) {
        die("Ошибка при добавлении данных: " . $e->getMessage());
      }
    }

  } else {
    // Обработка случая, когда параметр testId не был передан
    echo "Parameter 'testId' is not provided.";
  }
}