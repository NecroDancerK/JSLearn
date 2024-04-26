<!DOCTYPE html>
<html lang="en">

<?php
include_once __DIR__ . '../components/mainHead.php';
include_once "testsScript.php";

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
    <main class="2xl:pt-64 pt-44 pb-10 mx-auto w-3/5 dark:border-gray-950 px-7 dark:bg-gray-900 dark:text-white">
      <?php if (!$pageId) { ?>
        <h2 class="text-5xl mb-10">Выберите тест для прохождения</h2>
        <h3 class="text-2xl mb-5">Это инструкция для прохождения теста. Каждый вопрос имеет четыре варианта ответа, из
          которых только один является правильным. За правильный ответ начисляется один балл. Общее количество баллов
          отображает количество правильно отвеченных вопросов. Для получения результатов вам необходимо завершить весь
          тест, не закрывая браузер или вкладку с тестом.</h3>
      <?php } else { ?>
        <h2 class="text-5xl 2xl:mb-6 xl:mb-3">Тест: </h2>
        <h3 class="text-2xl 2xl:mb-5 xl:mb-3">Вопрос
          <span id="questionNum"><?= $questionNum ?></span> из
          <?= count($test) ?>
        </h3>
        <p class="text-xl 2xl:mb-10 xl:mb-5">
          <?= $test[$questionNum]['question'] ?>
        </p>

        <form class="2xl:mb-10 xl:mb-5 space-y-1" action="tests.php" method="post">
          <label
            class="block relative hover:bg-gray-300 dark:hover:bg-gray-600 bg-gray-200 dark:bg-gray-700 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
            for="<?= $test[$questionNum][1] ?>">
            <?= $test[$questionNum][1] ?>
            <input class="hidden peer" type="radio" id="<?= $test[$questionNum][1] ?>" name="answer" value="1" />
            <span
              class="block w-5 h-5 absolute left-3 top-1/2 -mt-[10px] rounded-full bg-white peer-checked:border-[6px] peer-checked:border-red-600"></span>
          </label>

          <label
            class="block relative hover:bg-gray-300 dark:hover:bg-gray-600 bg-gray-200 dark:bg-gray-700 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
            for="<?= $test[$questionNum][2] ?>">
            <?= $test[$questionNum][2] ?>
            <input class="hidden peer" type="radio" id="<?= $test[$questionNum][2] ?>" name="answer" value="2" />
            <span
              class="block w-5 h-5 absolute left-3 top-1/2 -mt-[10px] rounded-full bg-white peer-checked:border-[6px] peer-checked:border-red-600"></span>
          </label>

          <label
            class="block relative hover:bg-gray-300 dark:hover:bg-gray-600 bg-gray-200 dark:bg-gray-700 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
            for="<?= $test[$questionNum][3] ?>">
            <?= $test[$questionNum][3] ?>
            <input class="hidden peer" type="radio" id="<?= $test[$questionNum][3] ?>" name="answer" value="3" />
            <span
              class="block w-5 h-5 absolute left-3 top-1/2 -mt-[10px] rounded-full bg-white peer-checked:border-[6px] peer-checked:border-red-600"></span>
          </label>

          <label
            class="block relative hover:bg-gray-300 dark:hover:bg-gray-600 bg-gray-200 dark:bg-gray-700 2xl:text-xl xl:text-lg 2xl:p-4 xl:p-3 2xl:pl-10 xl:pl-12 select-none"
            for="<?= $test[$questionNum][4] ?>">
            <?= $test[$questionNum][4] ?>
            <input class="hidden peer" type="radio" id="<?= $test[$questionNum][4] ?>" name="answer" value="4" />
            <span
              class="block w-5 h-5 absolute left-3 top-1/2 -mt-[10px] rounded-full bg-white peer-checked:border-[6px] peer-checked:border-red-600"></span>
          </label>
        </form>

        <?php if ($questionNum == count($test)) { ?>
          <a class="bg-red-600 p-3 rounded text-white font-bold" href="testsResult.php?test=<?= $testId ?>" id="button-next"
            onclick="checkAnswer()">Завершить тест</a>

        <?php } else { ?>

          <a class="bg-red-600 p-3 rounded text-white font-bold"
            href="tests.php?test=<?= $testId ?>&question=<?= $questionNum + 1 ?>" id="button-next"
            onclick="checkAnswer()">Cледующий</a>

        <?php } ?>
      <?php } ?>
    </main>
    <footer></footer>
  </div>
  <script src="https://kit.fontawesome.com/89e7650dfb.js" crossorigin="anonymous"></script>
  <script src="../js/script.js"></script>
  <script src="../js/progressBar.js"></script>
  <script src="../js/tests.js"></script>

</body>

</html>