<!DOCTYPE html>
<html lang="en">

<?php
include_once __DIR__ . '../components/mainHead.php';
// include_once "testsScript.php";
session_start();

require_once "../php/helpers.php";

$testId = isset($_GET['test']) ? $_GET['test'] : null;
$questionNum = isset($_GET['question']) ? $_GET['question'] : null;

$userAnswers = $_SESSION['userAnswers'];

$pdo = getPDO();

try {

  // Подготавливаем запрос с параметром
  $stmt1 = $pdo->prepare("SELECT questions FROM tests WHERE id = :testId");
  // Привязываем параметр к значению
  $stmt1->bindParam(':testId', $testId, PDO::PARAM_INT);

  // Выполняем запрос
  $stmt1->execute();

  // Устанавливаем режим выборки результата в ассоциативный массив
  $stmt1->setFetchMode(PDO::FETCH_ASSOC);


  while ($row = $stmt1->fetch()) {
    // Извлекаем JSON из ячейки и преобразуем его в ассоциативный массив
    $test = json_decode($row['questions'], true);
  }

  // Выводим данные
  // echo '<pre>';
  // print_r($userAnswers);
  // echo '</pre>';

} catch (PDOException $e) {
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
    <main class="2xl:pt-48 pt-44 pb-10 mx-auto w-3/5 dark:border-gray-950 px-7 dark:bg-gray-900 dark:text-white">
      <h2 class="text-5xl mb-7">Работа над ошибками</h2>
      <h2 class="text-3xl mb-3">Ваш результат:</h2>
      <h3 class="text-2xl mb-3" id="result"></h3>
      <p class="text-2xl mb-10 font-bold" id="result-percent"></p>
      <?php
      foreach ($test as $key => $question) { ?>
        <p class="text-2xl font-bold mb-3">
          Вопрос <?= $key ?>:
        </p>
        <p class="text-xl 2xl:mb-10 xl:mb-5">
          <?= $question['question'] ?>
        </p>
        <form class="2xl:mb-10 xl:mb-5 space-y-1 answers" action="tests.php" method="post">
          <?php if ($userAnswers[$key - 1] == $question['rigthAnswer'] && $question['rigthAnswer'] == 1) { ?>
            <label
              class="block relative  bg-green-200 dark:bg-green-700 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
              for="<?= $question[1] ?>">
              <?= $question[1] ?>
              <input class="hidden peer" type="radio" id="<?= $question[1] ?>" name="answer" value="1" />
            </label>
          <?php } elseif ($question['rigthAnswer'] == 1) { ?>
            <label
              class="block relative bg-gray-400 dark:bg-gray-800 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
              for="<?= $question[1] ?>">
              <?= $question[1] ?>
              <input class="hidden peer" type="radio" id="<?= $question[1] ?>" name="answer" value="1" />
            </label>
          <?php } elseif ($userAnswers[$key - 1] == 1) { ?>
            <label
              class="block relative bg-red-200 dark:bg-red-700 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
              for="<?= $question[1] ?>">
              <?= $question[1] ?>
              <input class="hidden peer" type="radio" id="<?= $question[1] ?>" name="answer" value="1" />
            </label>
          <?php } else { ?>
            <label
              class="block relative bg-gray-200 dark:bg-gray-700 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
              for="<?= $question[1] ?>">
              <?= $question[1] ?>
              <input class="hidden peer" type="radio" id="<?= $question[1] ?>" name="answer" value="1" />
            </label>
          <?php } ?>

          <?php if ($userAnswers[$key - 1] == $question['rigthAnswer'] && $question['rigthAnswer'] == 2) { ?>
            <label
              class="block relative  bg-green-200 dark:bg-green-700 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
              for="<?= $question[2] ?>">
              <?= $question[2] ?>
              <input class="hidden peer" type="radio" id="<?= $question[2] ?>" name="answer" value="1" />
            </label>
          <?php } elseif ($question['rigthAnswer'] == 2) { ?>
            <label
              class="block relative bg-gray-400 dark:bg-gray-800 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
              for="<?= $question[2] ?>">
              <?= $question[2] ?>
              <input class="hidden peer" type="radio" id="<?= $question[2] ?>" name="answer" value="1" />
            </label>
          <?php } elseif ($userAnswers[$key - 1] == 2) { ?>
            <label
              class="block relative bg-red-200 dark:bg-red-700 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
              for="<?= $question[2] ?>">
              <?= $question[2] ?>
              <input class="hidden peer" type="radio" id="<?= $question[2] ?>" name="answer" value="1" />
            </label>
          <?php } else { ?>
            <label
              class="block relative bg-gray-200 dark:bg-gray-700 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
              for="<?= $question[2] ?>">
              <?= $question[2] ?>
              <input class="hidden peer" type="radio" id="<?= $question[2] ?>" name="answer" value="1" />
            </label>
          <?php } ?>

          <?php if ($userAnswers[$key - 1] == $question['rigthAnswer'] && $question['rigthAnswer'] == 3) { ?>
            <label
              class="block relative  bg-green-200 dark:bg-green-700 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
              for="<?= $question[3] ?>">
              <?= $question[3] ?>
              <input class="hidden peer" type="radio" id="<?= $question[3] ?>" name="answer" value="1" />
            </label>
          <?php } elseif ($question['rigthAnswer'] == 3) { ?>
            <label
              class="block relative bg-gray-400 dark:bg-gray-800 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
              for="<?= $question[3] ?>">
              <?= $question[3] ?>
              <input class="hidden peer" type="radio" id="<?= $question[3] ?>" name="answer" value="1" />
            </label>
          <?php } elseif ($userAnswers[$key - 1] == 3) { ?>
            <label
              class="block relative bg-red-200 dark:bg-red-700 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
              for="<?= $question[3] ?>">
              <?= $question[3] ?>
              <input class="hidden peer" type="radio" id="<?= $question[3] ?>" name="answer" value="1" />
            </label>
          <?php } else { ?>
            <label
              class="block relative bg-gray-200 dark:bg-gray-700 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
              for="<?= $question[3] ?>">
              <?= $question[3] ?>
              <input class="hidden peer" type="radio" id="<?= $question[3] ?>" name="answer" value="1" />
            </label>
          <?php } ?>

          <?php if ($userAnswers[$key - 1] == $question['rigthAnswer'] && $question['rigthAnswer'] == 4) { ?>
            <label
              class="block relative  bg-green-200 dark:bg-green-700 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
              for="<?= $question[4] ?>">
              <?= $question[4] ?>
              <input class="hidden peer" type="radio" id="<?= $question[4] ?>" name="answer" value="1" />
            </label>
          <?php } elseif ($question['rigthAnswer'] == 4) { ?>
            <label
              class="block relative bg-gray-400 dark:bg-gray-800 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
              for="<?= $question[4] ?>">
              <?= $question[4] ?>
              <input class="hidden peer" type="radio" id="<?= $question[4] ?>" name="answer" value="1" />
            </label>
          <?php } elseif ($userAnswers[$key - 1] == 4) { ?>
            <label
              class="block relative bg-red-200 dark:bg-red-700 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
              for="<?= $question[4] ?>">
              <?= $question[4] ?>
              <input class="hidden peer" type="radio" id="<?= $question[4] ?>" name="answer" value="1" />
            </label>
          <?php } else { ?>
            <label
              class="block relative bg-gray-200 dark:bg-gray-700 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
              for="<?= $question[4] ?>">
              <?= $question[4] ?>
              <input class="hidden peer" type="radio" id="<?= $question[4] ?>" name="answer" value="1" />
            </label>
          <?php } ?>

        </form>
      <?php }
      ?>


    </main>
    <footer></footer>
  </div>
  <script src="https://kit.fontawesome.com/89e7650dfb.js" crossorigin="anonymous"></script>
  <script src="../js/script.js"></script>
  <script src="../js/tests.js"></script>
  <script src="../js/testsResult.js"></script>
  <script src="../js/testsShowRightAnswers.js"></script>
  <script src="../js/progressBar.js"></script>
</body>

</html>