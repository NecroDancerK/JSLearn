<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '/components/mainHead.php' ?>


<body>

  <?php

  require_once "components/header.php";

  require_once "php/helpers.php";

  $pdo = getPDO();

  $query = "SELECT id FROM `tasks`;";
  $statement = $pdo->query($query);

  $results = $statement->fetchAll(PDO::FETCH_NUM);
  ?>

  <div class="flex justify-between text-center w-full fixed left-0 top-[66px]">
    <a href="learn/learn1.php"
      class="bg-gray-800 w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Учебник</a>
    <a href="tasks/tasks.php?task=<?php
      if (!empty($results)) {
        echo $results[0][0];
      }
      ?>"
      class="bg-gray-800 w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Упражнения</a>
    <a href="tests.php" class=" w-1/4 bg-red-600 p-2 uppercase text-lg text-white font-semibold">Тесты</a>
    <a href="playground.php"
      class="bg-gray-800 w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Playground</a>
  </div>
  <main class="pt-32">
    <div class="siderbar fixed top-0 left-0 h-full mt-[110px] bg-gray-100 w-64 flex flex-col">
      <div class="scrollbox overflow-auto">
        <div class="scrollbox-inner">
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
          <p>JS Tutorial</p>
        </div>
      </div>
      <p>JS Tutorial</p>
    </div>

  </main>
  <footer></footer>
</body>

</html>