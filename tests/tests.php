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

      <div class="mb-10 space-y-1">
        <label class="block relative has-[:checked]:bg-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 bg-gray-200 dark:bg-gray-700 text-xl p-4 pl-10 select-none" for="script">
          &lt;script&gt;
          <input class="hidden peer" type="radio" id="script" name="drone" value="script" checked />
          <span
            class="block w-5 h-5 absolute left-3 top-[23px] rounded-full bg-white peer-checked:border-[6px] peer-checked:border-red-600"></span>
        </label>

        <label class="block relative has-[:checked]:bg-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 bg-gray-200 dark:bg-gray-700 text-xl p-4 pl-10 select-none" for="scripting">
          &lt;scripting&gt;
          <input class="hidden peer" type="radio" id="scripting" name="drone" value="scripting" />
          <span
            class="block w-5 h-5 absolute left-3 top-[23px] rounded-full bg-white peer-checked:border-[6px] peer-checked:border-red-600"></span>
        </label>

        <label class="block relative has-[:checked]:bg-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 bg-gray-200 dark:bg-gray-700 text-xl p-4 pl-10 select-none" for="javascript">
          &lt;javascript&gt;
          <input class="hidden peer" type="radio" id="javascript" name="drone" value="javascript" />
          <span
            class="block w-5 h-5 absolute left-3 top-[23px] rounded-full bg-white peer-checked:border-[6px] peer-checked:border-red-600"></span>
        </label>

        <label class="block relative has-[:checked]:bg-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 bg-gray-200 dark:bg-gray-700 text-xl p-4 pl-10 select-none" for="js">
          &lt;js&gt;
          <input class="hidden peer" type="radio" id="js" name="drone" value="js" />
          <span
            class="block w-5 h-5 absolute left-3 top-[23px] rounded-full bg-white peer-checked:border-[6px] peer-checked:border-red-600"></span>
        </label>
      </div>
      <a class="bg-red-600 p-3 rounded text-white font-bold" href="#" id="btn-next">Cледующий</a>
    </main>
    <footer></footer>
  </div>
  <?php include_once 'components/scripts.php' ?>
</body>

</html>