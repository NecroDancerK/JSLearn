<!DOCTYPE html>
<html lang="en">

<?php
include_once "components/mainHead.php";
include_once "components/taskScript.php";


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
  <main class="pt-64 pb-10 mx-auto w-3/5" onclick="changeSizeOfInputs()" id="click">
    <h2 class="text-5xl mb-5">Упражнение:</h2>
    <p class="mb-5 text-lg">
      <?php echo $title ?>
    </p>
    <div class="exercise bg-gray-200 w-full h-64 rounded relative mb-7 pt-3">
      <pre class="pl-4">
        <p class="text-lg"><?php echo $task ?></p>
      </pre>

      <button class="bg-neutral-800 hover:bg-black p-3 px-5 rounded-full text-white font-bold absolute right-5 bottom-5"
        onclick="showAnswer()" id="showButton">Показать ответ</button>
    </div>
    <div id="resultIncorrect" class="hidden bg-red-200 w-full h-48 rounded relative mb-7 p-12 cursor-pointer"
      onclick="checkAnswer()">
      <h2 class="text-3xl text-red-800 mb-3">Неправильно</h2>
      <p class=" text-red-800">Нажмите <span class="underline">здесь</span>, что попробовать снова</p>
    </div>
    <?php if (array_key_exists($index + 1, $arrayId)) { ?>
      <a id="resultCorrect" class="hidden bg-green-200 w-full h-48 rounded relative mb-7 p-12 nextButton" <?php echo "href=\"tasks{$arrayId[$index + 1]}.php\""; ?>>
        <h2 class="text-3xl text-green-800 mb-3">Правильно!</h2>
        <p class="text-green-800">Следующий ></p>
      </a>
    <?php } else { ?>
      <a id="resultEnd" class="hidden bg-green-200 w-full h-48 rounded relative mb-7 p-12 nextButton"
        href="../learn/learn1.php">
        <h2 class="text-3xl text-green-800 mb-3">Вы прошли все задания! Молодец!</h2>
        <p class="text-green-800">Нажмите <span class="underline">здесь</span>, чтобы выйти</p>
      </a>
      <a class="bg-red-600 p-3 px-5 rounded-full text-white font-bold hidden  nextButton" href="../learn/learn1.php"
        id="nextButton">На главную</a>
    <?php } ?>
    <button class="bg-red-600 p-3 px-5 rounded-full text-white font-bold" onclick="checkAnswer()"
      id="checkButton">Подтвердить
      ответ</button>
    <a class="bg-red-600 p-3 px-5 rounded-full text-white font-bold hidden nextButton" <?php echo "href=\"tasks{$arrayId[$index + 1]}.php\""; ?> id="nextButton">Следующий</a>
  </main>
  <!-- <footer></footer> -->

  <?php include_once 'components/scripts.php' ?>

</body>

</html>