<!DOCTYPE html>
<html lang="en">

<?php
include_once __DIR__ . '../components/mainHead.php';

require_once "../php/helpers.php";

$results = getTasksIdsFromDB();
?>


<body <?php if (isset ($_COOKIE['isDarkMode']) && $_COOKIE['isDarkMode'] === 'true') { ?> class="dark" <?php } ?>>

  <div class="wrapper h-screen dark:bg-gray-900">
    <?php

    require_once "components/header.php";


    ?>
    <?php require_once "components/headerNav.php" ?>
    <?php require_once "components/aside.php"; ?>
    <main class="2xl:pt-64 pt-44 pb-10 mx-auto w-3/5 dark:border-gray-950 px-7 dark:bg-gray-900 dark:text-white">
      <h2 class="text-5xl mb-6">Тест: </h2>
      <h3 class="text-2xl mb-5">Вопрос 1 из 25</h3>
      <p class="text-xl mb-10">Внутри какого HTML-элемента мы помещаем JavaScript?</p>

      <div class="mb-10 space-y-5">
        <div>
          <input class="hidden peer" type="radio" id="script" name="drone" value="script" checked />
          <label class="peer-checked: bg-gray-400 text-black rounded-md p-2" for="script">&lt;script&gt;</label>
        </div>

        <div>
          <input class="hidden peer" type="radio" id="scripting" name="drone" value="scripting" />
          <label class="peer-checked: bg-gray-400 text-black rounded-md p-2" for="scripting">&lt;scripting&gt;</label>
        </div>

        <div>
          <input class="hidden peer" type="radio" id="javascript" name="drone" value="javascript" />
          <label class="peer-checked: bg-gray-400 text-black rounded-md p-2" for="javascript">&lt;javascript&gt;</label>
        </div>

        <div>
          <input class="hidden peer" type="radio" id="js" name="drone" value="js" />
          <label class="peer-checked: bg-gray-400 text-black rounded-md p-2" for="js">&lt;js&gt;</label>
        </div>
      </div>
      <a class="bg-red-600 p-3 rounded text-white" href="learn2.php" id="btn-next">Cледующий</a>
    </main>
    <footer></footer>
  </div>
  <?php include_once 'components/scripts.php' ?>
</body>

</html>