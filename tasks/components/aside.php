<?php

require_once "../php/helpers.php";

$pdo = getPDO();

// $URLArray = explode('/', $_SERVER['REQUEST_URI']);

// $currentURL = end($URLArray);

// preg_match('/\d+/', $currentURL, $matches);

// $pageId = intval($matches[0]);

$pageId = $_GET['task'];


$query1 = "SELECT tasks.id, tasks.task_number, tasks.task_theme_id, tasks_themes.name FROM `tasks` JOIN tasks_themes ON tasks.task_theme_id = tasks_themes.id ORDER BY `tasks`.`task_theme_id` ASC;";
$statement1 = $pdo->query($query1);

$results1 = $statement1->fetchAll(PDO::FETCH_ASSOC);

$query2 = "SELECT id FROM `tasks`;";
$statement2 = $pdo->query($query2);

$results2 = $statement2->fetchAll(PDO::FETCH_NUM);


$arrayId = [];

$isAdmin = currentUser()["is_admin"];


foreach ($results2 as $value) {
  foreach ($value as $key) {
    array_push($arrayId, $key);
  }
}



$index = array_search($pageId, $arrayId);


?>

<aside class="siderbar fixed top-0 left-0 h-full mt-[110px] bg-gray-100 2xl:w-[330px] w-[260px] flex flex-col">
  <div class="scrollbox overflow-auto">
    <div class="scrollbox-inner pb-[110px] tasksAside" id="sidebar-content">

      <?php
      $prev = null;


      echo "<span class=\"hidden\" id=\"arrayId\">" . array_key_exists($index + 1, $arrayId) . "</span>";

      foreach ($results1 as $value) {
        if ($value["name"] !== $prev) {
          echo "<h3 class=\"text-xl font-bold mb-2 pl-2 mt-4\">{$value["name"]}</h3>";
        }
        echo "<a class=\"group flex pl-2 py-2 relative  font-semibold hover:bg-neutral-500 hover:text-white\" href=\"tasks.php?task={$value["id"]}\">Упражнение {$value['task_number']}" ?>
        <?php if ($isAdmin == 1) { ?>
          <form action="taskChange.php" method="get"><button
              class="opacity-0 group-hover:opacity-100 transition-all duration-200 bg-gray-800 absolute z-10 right-10 hover:bg-black  text-white px-1"
              type="submit"><i class="fa-solid fa-pen"></i></button></form>
          <form action="taskDelete.php" method="get"><button
              class="opacity-0 group-hover:opacity-100 transition-all duration-200 bg-gray-800 absolute z-10 right-2 hover:bg-black text-white px-[5px]"
              type="submit"><i class="fa-solid fa-trash"></i></button></form>
        <?php } ?>
        </a>
        <?php $prev = $value["name"];
      } ?>
<!--       <a class="group flex pl-2 py-2 relative font-semibold hover:bg-neutral-500 hover:text-white"
        href="tasksAdding.php">
        Упражнение
        <?php if ($isAdmin == 1) { ?>
          <form action="taskChange.php" method="get"><button
              class="opacity-0 group-hover:opacity-100 transition-all duration-200 bg-red-600 absolute z-10 right-10 hover:bg-red-700 text-white px-1"
              type="submit"><i class="fa-solid fa-pen"></i></button></form>
          <form action="taskDelete.php" method="get"><button
              class="opacity-0 group-hover:opacity-100 transition-all duration-200 bg-red-600 absolute z-10 right-2 hover:bg-red-700 text-white px-[5px]"
              type="submit"><i class="fa-solid fa-trash"></i></button></form>
        <?php } ?>
      </a> -->
      <?php if ($isAdmin == 1) { ?>
        <a class="block pl-2 py-2 font-semibold bg-red-600 text-white hover:bg-red-700 hover:text-white"
          href="tasksAdding.php">
          ДОБАВЛЕНИЕ УПРАЖНЕНИЙ
        </a>
      <?php } ?>
    </div>

  </div>
</aside>