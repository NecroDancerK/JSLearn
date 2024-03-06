<?php

require_once "../php/helpers.php";

$pdo = getPDO();

$URLArray = explode('/', $_SERVER['REQUEST_URI']);

$currentURL = end($URLArray);

preg_match('/\d+/', $currentURL, $matches);

$pageId = intval($matches[0]);


$query1 = "SELECT tasks.id, tasks.task_number, tasks.task_theme_id, tasks_themes.name FROM `tasks` JOIN tasks_themes ON tasks.task_theme_id = tasks_themes.id ORDER BY `tasks`.`task_theme_id` ASC;";
$statement1 = $pdo->query($query1);

$results1 = $statement1->fetchAll(PDO::FETCH_ASSOC);

$query2 = "SELECT id FROM `tasks`;";
$statement2 = $pdo->query($query2);

$results2 = $statement2->fetchAll(PDO::FETCH_NUM);

$arrayId = [];

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
        echo "<a class=\"block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white\" href=\"tasks{$value["id"]}.php\">Упражнение {$value['task_number']}</a>";
        $prev = $value["name"];
      } ?>

      <a class="block pl-2 py-2 font-semibold bg-red-600 text-white hover:bg-red-700 hover:text-white"
        href="tasksAdding.php">
        ДОБАВЛЕНИЕ УПРАЖНЕНИЙ
      </a>
    </div>

  </div>
</aside>