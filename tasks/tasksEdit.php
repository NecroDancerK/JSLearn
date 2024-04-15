<?php
require_once "../php/helpers.php";
$isAdmin = currentUser()["is_admin"];
if ($isAdmin == 1) { ?>
  <?php

  require_once "../php/helpers.php";

  $pdo = getPDO();

  $pageId = isset($_GET['task']) ? $_GET['task'] : null;

  if ($pageId !== null && is_numeric($pageId)) {
    $query = "SELECT task_number, task_theme_id, title, task FROM tasks WHERE id = ?";
    $statement1 = $pdo->prepare($query);
    $statement1->execute([$pageId]);

    $results1 = $statement1->fetchAll(PDO::FETCH_ASSOC);

    if (count($results1) > 0) {
      $title = $results1[0]["title"];
      $task = $results1[0]["task"];
      $task_number = $results1[0]["task_number"];
      $task_theme_id = $results1[0]["task_theme_id"];
    }
  }

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $taskNumber = $_POST["taskNumber"];
    $title = $_POST["title"];
    $task = $_POST["task"];
    $taskTheme = $_POST["taskTheme"];
    $newTheme = $_POST["newTheme"];
    $taskId = $_POST["taskId"];

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

        $sql = "UPDATE tasks SET task_number = :task_number, task_theme_id = :task_theme_id, title = :title, task = :task WHERE id = :taskId;";

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
              ':taskId' => $taskId,
            )
          );
        } catch (PDOException $e) {
          die("Ошибка при изменении задания: " . $e->getMessage());
        }

        checkTasksJSON($taskId);

        header("Location: tasksEdit.php?task=$taskId");
      } else {
        $sql = "UPDATE tasks SET task_number = :task_number, task_theme_id = :task_theme_id, title = :title, task = :task WHERE id = :taskId;";

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
              ':taskId' => $taskId,
            )
          );
        } catch (PDOException $e) {
          die("Ошибка при изменении задания: " . $e->getMessage());
        }

        checkTasksJSON($taskId);

        header("Location: tasksEdit.php?task=$taskId");
      }
    }
  }

  $result = getThemesFromDB('tasks_themes');

  ?>

  <!DOCTYPE html>
  <html lang="en">

  <?php
  include_once "components/mainHead.php";
  ?>

  <body <?php if (isset($_COOKIE['isDarkMode']) && $_COOKIE['isDarkMode'] === 'true') { ?>
      class="dark bg-white dark:bg-gray-900" <?php } ?>>

    <div class="wrapper 2xl:h-screen xl:h-auto dark:bg-gray-900">
      <?php
      require_once "components/header.php";
      ?>
      <?php require_once "components/headerNav.php"; ?>
      <?php require_once "components/aside.php"; ?>
      <main class="pt-40 pb-10 mx-auto w-3/5 dark:border-gray-950 px-7 dark:bg-gray-900 dark:text-white">
        <h2 class="text-5xl mb-5">Изменение упражнения:</h2>
        <form class="flex flex-col gap-2 bg-gray-200 dark:bg-gray-700 p-7 text-xl rounded" action="tasksEdit.php"
          method="post">
          <label>
            Номер задания (Пойдет в название упражнения):
            <input class="border border-red-600 dark:bg-gray-800 rounded" type="number" name="taskNumber" min="1"
              value="<?php echo $task_number ?>" required>
          </label>
          <label>
            Тема задания:
            <select class="border border-red-600 dark:bg-gray-800 bg-white rounded" name="taskTheme" id="taskTheme" required>
              <option value="">Выберите тему</option>
              <?php
              foreach ($result as $array) {
                if ($task_theme_id == $array["id"]) {
                  echo "<option value=\"{$array['id']}\" selected>{$array['name']}</option>";
                } else {
                  echo "<option value=\"{$array['id']}\">{$array['name']}</option>";
                }
              }
              ?>
              <option value="newTheme" id="newTheme">Добавить тему:</option>
            </select>
          </label>
          <label id="newThemeInput" class="hidden ">
            Название темы:
            <input class="border border-red-600 dark:bg-gray-800 bg-white rounded" type="text" name="newTheme">
          </label>
          <label class="flex flex-col">
            Описание задания (Оберните в восклицательные знаки слова, которые вы хотите выделить в описании задания жирным
            текстом.
            Пример: Создайте переменную с именем !carName!, присвойте ей значение !Volvo!. Получится: <div>
              Создайте
              переменную с именем <span class="font-bold ">carName</span>, присвойте ей значение <span
                class="font-bold ">Volvo</span>.):
            </div>
            <textarea class="border border-red-600 dark:bg-gray-800 mt-4 resize-none h-28 rounded"
              name="title" required><?php echo $title ?></textarea>
          </label>
          <label class="mb-7 flex flex-col">
            Задание (Оберните в восклицательные знаки слова, которые вы хотите сделать пропусками. Пример: let !carName! =
            <div>
              "!Volvo!". Получится: let <input type="text" class="inputTask border border-black dark:bg-gray-800"
                style="width: 70px; height: 21px;" maxlength="7" disabled>
              = "<input type="text" class="inputTask border border-black dark:bg-gray-800"
                style="width: 50px; height: 21px;" maxlength="5" disabled>".):
            </div>
            <input class="hidden" type="text" name="taskId" value="<?php echo $pageId ?>">
            <textarea class="border border-red-600 dark:bg-gray-800 mt-4 resize-none h-28 rounded"
              name="task" required><?php echo $task ?></textarea>
          </label>

          <button class="bg-red-600 text-white p-3 text-xl rounded-full" type="submit">Изменить упражнение</button>
        </form>

        <script src="../js/taskAdding.js"></script>
      </main>
      <!-- <footer></footer> -->
    </div>
    <?php include_once "components/scripts.php" ?>

  </body>

  </html>
<?php } else {
  header("Location: ../index.php");
  exit();
}
?>