<?php
require_once "../php/helpers.php";
$isAdmin = currentUser()["is_admin"];
if ($isAdmin == 1) { ?>

  <?php
  $pdo = getPDO();

  $pageId = isset ($_GET['task']) ? $_GET['task'] : null;



  if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset ($_POST['taskId'])) {

      $userId = currentUser()["id"];
      $taskId = $_POST['taskId'];

      // Удаление упражнения из базы данных
      $stmt = $pdo->prepare('DELETE FROM tasks WHERE id = ?');
      $stmt->execute([$taskId]);

      $query = "SELECT id FROM `tasks`;";
      $statement = $pdo->query($query);

      $results = $statement->fetchAll(PDO::FETCH_NUM);

      $stmt = $pdo->prepare("SELECT done_tasks FROM tasks_progress WHERE user_id = :user_id");
      $stmt->bindParam(':user_id', $userId);

      $stmt->execute();
      $row = $stmt->fetch();

      // var_dump($row["done_tasks"]);

      checkTasksJSON($taskId);
      // Перенаправление на страницу со списком упражнений
      header("Location: tasks.php?task=" . $results[0][0]);
      exit();
    } else {
      // Если параметр не передан, перенаправляем на главную страницу
      header('Location: index.php');
      exit();
    }

  }
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <?php
  include_once "components/mainHead.php";
  include_once "components/taskScript.php";


  ?>

  <body <?php if (isset ($_COOKIE['isDarkMode']) && $_COOKIE['isDarkMode'] === 'true') { ?> class="dark bg-white dark:bg-gray-900" <?php } ?>>

    <div class="wrapper h-screen  dark:bg-gray-900">
      <?php

      require_once "components/header.php";

      $results = getTasksIdsFromDB();

      // var_dump($results[0]);
      ?>
      <?php require_once "components/headerNav.php"; ?>
      <?php require_once "components/aside.php"; ?>
      <main class="2xl:pt-64 pt-44 pb-10 mx-auto w-3/5 dark:border-gray-950 px-7 dark:bg-gray-900 dark:text-white">

        <h2 class="text-5xl mb-5">Удаление упражнения:</h2>
        <p class="mb-5 text-lg">
          <?php echo $title ?>
        </p>

        <div class="exercise bg-gray-200 dark:bg-gray-700 w-full h-64 rounded relative mb-7 pt-3">
          <pre class="pl-4">
                        <p class="text-lg"><?php echo $task ?></p>
                        </pre>
        </div>
        <form class="flex justify-between items-center" action="taskDelete.php" method="post">
          <p class="2xl:text-2xl xl:text-xl"><span class="font-bold">Вы</span> уверены, что хотите удалить это упражнение?
          </p>
          <input type="text" name="taskId" class="hidden" value="<?php echo $pageId ?>">
          <button class="bg-red-600 p-3 px-5 rounded-full text-white font-bold " type="submit">Удалить упражнение</button>
        </form>


      </main>

    </div>
    <?php include_once 'components/scripts.php' ?>
    <script src="../js/taskDelete.js"></script>
  </body>

  </html>
<?php } else {
  header("Location: ../index.php");
  exit();
}
?>