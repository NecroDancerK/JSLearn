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
      <h2 class="text-5xl mb-10">Ваш результат</h2>
      <h3 class="text-4xl mb-7" id="result"></h3>
      <p class="text-4xl mb-10 font-bold" id="result-percent"></p>
      <a class="bg-red-600 p-3 rounded text-white font-bold"
        href="tests.php?test=<?= $testId ?>&question=1" id="button-next"
        >Попробовать снова</a>
    </main>
    <footer></footer>
  </div>
  <script src="https://kit.fontawesome.com/89e7650dfb.js" crossorigin="anonymous"></script>
  <script src="../js/script.js"></script>
  <script src="../js/tests.js"></script>
  <script src="../js/testsResult.js"></script>
</body>

</html>