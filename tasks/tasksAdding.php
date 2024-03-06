<?php

require_once "../php/helpers.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $taskNumber = $_POST["taskNumber"];
  $title = $_POST["title"];
  $task = $_POST["task"];
  $taskTheme = $_POST["taskTheme"];
  $newTheme = $_POST["newTheme"];

  echo $newTheme;



  if (!empty($title) && !empty($task) && !empty($taskNumber) && !empty($taskTheme)) {
    $pdo = getPDO();

    if (!empty($newTheme)) {

      // Проверяем, существует ли уже такая тема в базе данных
      $stmt = $pdo->prepare("SELECT * FROM tasks_themes WHERE name = :newTheme");
      $stmt->execute(array(':newTheme' => $newTheme));
      $existingTheme = $stmt->fetch(PDO::FETCH_ASSOC);

      // Если тема уже существует, выводим сообщение об ошибке
      if ($existingTheme) {
        echo "Ошибка: Тема \"$newTheme\" уже существует.";
      } else {
        // Вставляем новую тему в базу данных
        $stmt = $pdo->prepare("INSERT INTO tasks_themes (name) VALUES (:newTheme)");
        $stmt->execute(array(':newTheme' => $newTheme));
      }

      $stmt = $pdo->prepare("SELECT id FROM tasks_themes WHERE name = :newTheme");
      $stmt->execute(array(':newTheme' => $newTheme));
      $taskThemeArray = $stmt->fetch(PDO::FETCH_ASSOC);
      $taskTheme = $taskThemeArray["id"];

      $sql = "INSERT INTO tasks (task_number, task_theme_id, title, task) VALUES (:task_number, :task_theme_id, :title, :task);";

      // Подготавливаем выражение
      $stmt = $pdo->prepare($sql);

      // Передаем значения переменных и выполняем запрос
      try {
        $stmt->execute(
          array(
            ':task_number' => $taskNumber,
            ':task_theme_id' => $taskTheme,
            ':title' => $title,
            ':task' => $task,
          )
        );
      } catch (PDOException $e) {
        die("Ошибка при добавлении данных: " . $e->getMessage());
      }
    } else {
      $sql = "INSERT INTO tasks (task_number, task_theme_id, title, task) VALUES (:task_number, :task_theme_id, :title, :task);";

      // Подготавливаем выражение
      $stmt = $pdo->prepare($sql);

      // Передаем значения переменных и выполняем запрос
      try {
        $stmt->execute(
          array(
            ':task_number' => $taskNumber,
            ':task_theme_id' => $taskTheme,
            ':title' => $title,
            ':task' => $task,
          )
        );
      } catch (PDOException $e) {
        die("Ошибка при добавлении данных: " . $e->getMessage());
      }
    }
  }
}

$pdo = getPDO();

$stmt = $pdo->prepare("SELECT * FROM `tasks_themes`");

$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once "tasksChecking.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php
include_once "components/mainHead.php";
?>

<body>
  <?php

  require_once "components/header.php";

  ?>
  <div class="flex justify-between text-center w-full fixed left-0 top-[66px]">
    <a href="../learn/learn1.php"
      class="bg-gray-800 w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Учебник</a>
    <a href="tasks1.php" class=" w-1/4 bg-red-600 p-2 uppercase text-lg text-white font-semibold">Упражнения</a>
    <a href="../tests.php"
      class="bg-gray-800 w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Тесты</a>
    <a href="../playground.php"
      class="bg-gray-800 w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Playground</a>
  </div>
  <?php require_once "components/aside.php"; ?>
  <main class="pt-64 pb-10 mx-auto w-3/5" id="click">
    <form class="flex flex-col" action="tasksAdding.php" method="post">
      <label>
        Номер задания
        <input class="bg-red-600" type="number" name="taskNumber" min="1">
      </label>
      <label>
        Тема задания
        <select name="taskTheme" id="taskTheme">
          <option value="">Выберите тему</option>
          <?php
          foreach ($result as $array) {
            echo "<option value=\"{$array['id']}\">{$array['name']}</option>";
          }
          ?>
          <option value="newTheme" id="newTheme">Добавить тему</option>
        </select>
      </label>
      <label id="newThemeInput" class="hidden">
        Название темы
        <input type="text" name="newTheme">
      </label>
      <label>
        Описание задания
        <textarea class="bg-red-600" name="title"></textarea>
      </label>
      <label>
        Задание
        <textarea class="bg-red-600" name="task"></textarea>
      </label>

      <button class="bg-red-600" type="submit">Добавить задание</button>
    </form>

    <script src="../js/taskAdding.js"></script>
  </main>
  <!-- <footer></footer> -->

  <?php include_once "components/scripts.php" ?>

</body>

</html>