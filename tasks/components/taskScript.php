<?php
require_once "../php/helpers.php";

function escape_tags($string)
{
  $string = str_replace("<", "&lt;", $string);
  $string = str_replace(">", "&gt;", $string);
  return $string;
}


$pdo = getPDO();

$userId = currentUser()["id"];
$pageId = isset($_GET['task']) ? $_GET['task'] : null;

if ($pageId !== null && is_numeric($pageId)) {
  $query = "SELECT title, task FROM tasks WHERE id = ?";
  $statement1 = $pdo->prepare($query);
  $statement1->execute([$pageId]);

  $results1 = $statement1->fetchAll(PDO::FETCH_ASSOC);

  if (count($results1) > 0) {
    $title = $results1[0]["title"];
    $task = $results1[0]["task"];

    $RegExp = '/!(.*?)!/';

    $RegExpResTask = [];
    $RegExpResTitle = [];

    preg_match_all($RegExp, $task, $RegExpResTask);
    preg_match_all($RegExp, $title, $RegExpResTitle);

    $title = escape_tags($title);
    $task = escape_tags($task);

    $task = preg_replace($RegExp, "<input type=\"text\" class=\"inputTask dark:bg-gray-800\">", $task);

    for ($i = 0; $i < count($RegExpResTitle[0]); $i++) {
      $title = str_replace($RegExpResTitle[0][$i], "<span class=\"font-bold\">" . $RegExpResTitle[1][$i] . "</span>", $title);
    }

    $answersStr = implode(" ", $RegExpResTask[1]);

    echo "<span class=\"hidden\" id=\"answersStr\">$answersStr</span>";
  }
}

$stmt = $pdo->prepare("SELECT done_tasks FROM progress WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $userId);

$stmt->execute();
$row = $stmt->fetch();

if (!$row) {
  $data = [];
  $json_data = json_encode($data);

  $sql = "INSERT INTO progress (user_id, done_tasks) VALUES (:user_id, :done_tasks);";

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
