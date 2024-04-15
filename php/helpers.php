<?php

session_start();

require_once __DIR__ . '/config.php';

function redirect($path)
{
  header("Location: $path");
  die();
}

function setValidationError($fieldName, $message)
{
  $_SESSION['validation'][$fieldName] = $message;
}

function hasValidationError($fieldName)
{
  return isset($_SESSION['validation'][$fieldName]);
}

function validationErrorAttr($fieldName)
{
  return isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

function validationErrorMessage($fieldName)
{
  $message = $_SESSION['validation'][$fieldName] ?? '';
  unset($_SESSION['validation'][$fieldName]);
  return $message;
}

function setOldValue($key, $value)
{
  $_SESSION['old'][$key] = $value;
}

function old($key)
{
  $value = $_SESSION['old'][$key] ?? '';
  unset($_SESSION['old'][$key]);
  return $value;
}

function uploadFile($file, $prefix = '')
{
  $uploadPath = __DIR__ . '/../uploads';

  if (!is_dir($uploadPath)) {
    mkdir($uploadPath, 0777, true);
  }

  $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
  $fileName = $prefix . '_' . time() . ".$ext";

  if (!move_uploaded_file($file['tmp_name'], "$uploadPath/$fileName")) {
    die('Ошибка при загрузке файла на сервер');
  }

  return "uploads/$fileName";
}

function setMessage($key, $message)
{
  $_SESSION['message'][$key] = $message;
}

function hasMessage($key)
{
  return isset($_SESSION['message'][$key]);
}

function getMessage($key)
{
  $message = $_SESSION['message'][$key] ?? '';
  unset($_SESSION['message'][$key]);
  return $message;
}

function getPDO()
{
  try {
    return new \PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';charset=utf8;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
  } catch (\PDOException $e) {
    die("Connection error: {$e->getMessage()}");
  }
}

function findUser($email)
{
  $pdo = getPDO();

  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $stmt->execute(['email' => $email]);
  return $stmt->fetch(\PDO::FETCH_ASSOC);
}


function currentUser()
{
  $pdo = getPDO();

  if (!isset($_SESSION['user'])) {
    return false;
  }

  $userId = $_SESSION['user']['id'] ?? null;

  $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
  $stmt->execute(['id' => $userId]);
  return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function logout()
{
  unset($_SESSION['user']['id']);
  redirect('/');
}

function checkAuth()
{
  if (!isset($_SESSION['user']['id'])) {
    redirect('/');
  }
}

function checkGuest()
{
  if (isset($_SESSION['user']['id'])) {
    redirect('learn/learn1.php');
  }
}

function setJSONProgressForUsersTasks()
{
  $pdo = getPDO();
  $userId = currentUser()["id"];

  $stmt = $pdo->prepare("SELECT done_tasks FROM tasks_progress WHERE user_id = :user_id");
  $stmt->bindParam(':user_id', $userId);

  $stmt->execute();
  $row = $stmt->fetch();

  if (!$row) {
    $data = [];
    $json_data = json_encode($data);

    $sql = "INSERT INTO tasks_progress (user_id, done_tasks) VALUES (:user_id, :done_tasks);";

    // Подготавливаем выражение
    $statement = $pdo->prepare($sql);

    // Передаем значения переменных и выполняем запрос
    try {
      $statement->execute(
        array(
          ':user_id' => $userId,
          ':done_tasks' => $json_data,
        )
      );
    } catch (PDOException $e) {
      die("Ошибка при добавлении данных: " . $e->getMessage());
    }
  }

}

function setJSONProgressForUsersTests()
{
  $pdo = getPDO();
  $userId = currentUser()["id"];

  $stmt = $pdo->prepare("SELECT done_tests FROM tests_progress WHERE user_id = :user_id");
  $stmt->bindParam(':user_id', $userId);

  $stmt->execute();
  $row = $stmt->fetch();

  if (!$row) {
    $data = [];
    $json_data = json_encode($data);

    $sql = "INSERT INTO tests_progress (user_id, done_tests) VALUES (:user_id, :done_tests);";

    // Подготавливаем выражение
    $statement = $pdo->prepare($sql);

    // Передаем значения переменных и выполняем запрос
    try {
      $statement->execute(
        array(
          ':user_id' => $userId,
          ':done_tests' => $json_data,
        )
      );
    } catch (PDOException $e) {
      die("Ошибка при добавлении данных: " . $e->getMessage());
    }
  }

}

function checkTasksJSON($taskId)
{
  $pdo = getPDO();

  $stmt = $pdo->prepare("SELECT user_id, done_tasks FROM tasks_progress");
  $stmt->execute();
  $row = $stmt->fetchAll();

  foreach ($row as $value) {

    $data = json_decode($value['done_tasks'], true);

    $userId = $value['user_id'];

    unset($data[$taskId]);

    $checkedJSON = json_encode($data);

    $update_JSON = "UPDATE tasks_progress SET done_tasks = :done_tasks WHERE user_id = :user_id";
    $stmt = $pdo->prepare($update_JSON);
    $stmt->bindParam(':done_tasks', $checkedJSON);
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();
  }
}

function checkTestsJSON($testId)
{
  $pdo = getPDO();

  $stmt = $pdo->prepare("SELECT user_id, done_tests FROM tests_progress");
  $stmt->execute();
  $row = $stmt->fetchAll();

  foreach ($row as $value) {

    $data = json_decode($value['done_tests'], true);

    $userId = $value['user_id'];

    unset($data[$testId]);

    $checkedJSON = json_encode($data);

    $update_JSON = "UPDATE tests_progress SET done_tests = :done_tests WHERE user_id = :user_id";
    $stmt = $pdo->prepare($update_JSON);
    $stmt->bindParam(':done_tests', $checkedJSON);
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();
  }
}

function getTasksIdsFromDB()
{
  $pdo = getPDO();

  $query = "SELECT id FROM `tasks` ORDER BY `tasks`.`task_theme_id`, `tasks`.`task_number` ASC;";
  $statement = $pdo->query($query);

  $results = $statement->fetchAll(PDO::FETCH_NUM);

  return $results;
}

function getTestsIdsFromDB()
{
  $pdo = getPDO();

  $query = "SELECT id FROM `tests` ORDER BY `tests`.`test_theme_id` ASC;";
  $statement = $pdo->query($query);

  $results = $statement->fetchAll(PDO::FETCH_NUM);

  return $results;
}

function getThemesFromDB($tableName)
{
  $pdo = getPDO();

  $stmt = $pdo->prepare("SELECT * FROM `$tableName`");

  $stmt->execute();

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}