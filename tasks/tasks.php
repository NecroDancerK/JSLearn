<!DOCTYPE html>
<html lang="en">

<?php
include_once "components/mainHead.php";
include_once "components/taskScript.php";


?>

<body <?php if (isset($_COOKIE['isDarkMode']) && $_COOKIE['isDarkMode'] === 'true') { ?> class="dark" <?php } ?>>

  <div class="wrapper h-screen dark:bg-gray-900">
    <?php

    require_once "components/header.php";
    require_once "../php/helpers.php";

    $pdo = getPDO();

    $query = "SELECT id FROM `tasks` ORDER BY `tasks`.`task_theme_id`, `tasks`.`task_number` ASC;";
    $statement = $pdo->query($query);

    $results = $statement->fetchAll(PDO::FETCH_NUM);
    ?>
    <div class="flex justify-between text-center w-full fixed left-0 top-[66px]">
      <a href="../learn/learn1.php"
        class="bg-gray-800 dark:bg-gray-700 dark:hover:bg-black w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Учебник</a>
      <a href="tasks.php?task=<?php
      if (!empty($results)) {
        echo $results[0][0];
      }
      ?>" class=" w-1/4 bg-red-600 p-2 uppercase text-lg text-white font-semibold" >Упражнения</a>
      <a href="../tests.php"
        class="bg-gray-800 dark:bg-gray-700 dark:hover:bg-black w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Тесты</a>
      <a href="../playground.php"
        class="bg-gray-800 dark:bg-gray-700 dark:hover:bg-black w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Playground</a>
    </div>
    <?php require_once "components/aside.php"; ?>
    <main class="2xl:pt-64 pt-44 pb-10 mx-auto w-3/5 dark:border-gray-950 px-7 dark:bg-gray-900 dark:text-white">

      <?php if (empty($title) && empty($task)) { ?>
        <h2 class="text-5xl mb-5">Здесь ещё нет заданий</h2>
      <?php } else { ?>
        <h2 class="text-5xl mb-5">Упражнение: </h2>
        <p class="mb-5 text-lg">
          <?php echo $title ?>
        </p>
        <div class="exercise bg-gray-200 dark:bg-gray-700 w-full h-64 rounded relative mb-7 pt-3">
          <pre class="pl-4">
            <p class="text-lg"><?php echo $task ?></p>
          </pre>

          <button
            class="bg-neutral-800 hover:bg-black p-3 px-5 rounded-full text-white font-bold absolute right-5 bottom-5"
            onclick="showAnswer()" id="showButton">Показать ответ</button>
        </div>
        <div id="resultIncorrect" class="hidden bg-red-200 w-full h-48 rounded relative mb-7 p-12 cursor-pointer"
          onclick="checkAnswer()">
          <h2 class="text-3xl text-red-800 mb-3">Неправильно</h2>
          <p class=" text-red-800">Нажмите <span class="underline">здесь</span>, что попробовать снова</p>
        </div>
        <?php if (array_key_exists($index + 1, $arrayId)) { ?>
          <a id="resultCorrect" class="hidden bg-green-200 w-full h-48 rounded relative mb-7 p-12 nextButton" <?php echo "href=\"tasks.php?task={$arrayId[$index + 1]}\""; ?>>
            <h2 class="text-3xl text-green-800 mb-3">Правильно!</h2>
            <p class="text-green-800">Следующий ></p>
          </a>
        <?php } else { ?>
          <a id="resultEnd" class="hidden bg-green-200 w-full h-48 rounded relative mb-7 p-12 nextButton"
            href="tasks.php?task=<?= $results[0][0]; ?>">
            <h2 class="text-3xl text-green-800 mb-3">Вы прошли все задания! Молодец!</h2>
            <p class="text-green-800">Нажмите <span class="underline">здесь</span>, чтобы выйти</p>
          </a>
          <a class="bg-red-600 p-3 px-5 rounded-full text-white font-bold hidden  nextButton"
            href="tasks.php?task=<?= $results[0][0]; ?>" id="nextButton">На главную</a>
        <?php } ?>
        <button class="bg-red-600 p-3 px-5 rounded-full text-white font-bold" onclick="checkAnswer()"
          id="checkButton">Подтвердить
          ответ</button>
        <a class="bg-red-600 p-3 px-5 rounded-full text-white font-bold hidden nextButton" <?php echo "href=\"tasks.php?task={$arrayId[$index + 1]}\""; ?> id="nextButton">Следующий</a>
      <?php } ?>
    </main>
    <!-- <footer></footer> -->
  </div>
  <?php include_once 'components/scripts.php' ?>

</body>

</html>