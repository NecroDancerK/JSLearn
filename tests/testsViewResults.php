<!DOCTYPE html>
<html lang="en">

<?php
include_once __DIR__ . '../components/mainHead.php';

require_once "../php/helpers.php";

$pdo = getPDO();
$userId = currentUser()["id"];


try {

  // SQL запрос
  $sql1 = "SELECT id, title, questions FROM tests";

  // Подготовка и выполнение запроса
  $stmt1 = $pdo->prepare($sql1);
  $stmt1->execute();

  // Получение результатов запроса
  $tests = $stmt1->fetchAll(PDO::FETCH_ASSOC);

  // SQL запрос для второй таблицы
  $sql2 = "SELECT done_tests FROM tests_progress WHERE user_id = $userId";

  // Подготовка и выполнение второго запроса
  $stmt2 = $pdo->prepare($sql2);
  $stmt2->execute();

  // Получение результатов второго запроса
  $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);


  $testsResults = ((array) json_decode($results2[0]['done_tests']));

  // Вывод результатов
  foreach ($tests as $row1) {
    // $tests[$row1['id']] = $row1['title'];
    // var_dump(count( (array) json_decode($row1['questions'])));
  }


} catch (PDOException $e) {
  // В случае ошибки выводим сообщение об ошибке
  echo "Ошибка: " . $e->getMessage();
}


?>


<body <?php if (isset($_COOKIE['isDarkMode']) && $_COOKIE['isDarkMode'] === 'true') { ?>
    class="dark bg-white dark:bg-gray-900" <?php } ?>>

  <div class="wrapper h-screen dark:bg-gray-900">
    <?php

    require_once "components/header.php";
    require_once "../php/helpers.php";

    $results = getTasksIdsFromDB();
    ?>
    <?php require_once "components/headerNav.php" ?>
    <?php require_once "components/aside.php"; ?>
    <main class="pt-44 pb-10 mx-auto w-3/5 dark:border-gray-950 px-7 dark:bg-gray-900 dark:text-white">
      <h2 class="text-5xl mb-10">Результаты тестов:</h2>
      <?php
      foreach ($tests as $key => $question) {
        if (isset($testsResults[$question['id']])) { ?>
          <div class="flex justify-between mb-4">
            <p class="text-2xl"><?= $question['title'] ?></p>
            <p class="text-xl">
              <?= $testsResults[$question['id']] ?>
              из
              <?= count((array) json_decode($question['questions'])) ?>
            </p>
          </div>
        <?php }
      } ?>
    </main>
    <footer></footer>
  </div>
  <script src="https://kit.fontawesome.com/89e7650dfb.js" crossorigin="anonymous"></script>
  <script src="../js/script.js"></script>
  <script src="../js/progressBar.js"></script>
  <script src="../js/tests.js"></script>
  <script src="../js/testsResult.js"></script>
</body>

</html>