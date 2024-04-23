<?php

require_once "../php/helpers.php";

$pdo = getPDO();

$pageId = $_GET['task'];

$query1 = "SELECT tasks.id, tasks.task_number, tasks.task_theme_id, tasks_themes.name FROM `tasks` JOIN tasks_themes ON tasks.task_theme_id = tasks_themes.id ORDER BY `tasks`.`task_theme_id`, `tasks`.`task_number` ASC;";
$statement1 = $pdo->query($query1);

$results1 = $statement1->fetchAll(PDO::FETCH_ASSOC);

$results2 = getTasksIdsFromDB();


$arrayId = [];

$isAdmin = currentUser()["is_admin"];

$userId = currentUser()["id"];

$stmt1 = $pdo->prepare("SELECT done_tasks FROM tasks_progress WHERE user_id = :user_id");
$stmt1->bindParam(':user_id', $userId);

$stmt1->execute();
$row = $stmt1->fetch();

$data = json_decode($row['done_tasks'], true);


foreach ($results2 as $testItem) {
  foreach ($testItem as $key) {
    array_push($arrayId, $key);
  }
}

$index = array_search($pageId, $arrayId);

?>

<aside
  class="siderbar fixed top-0 left-0 h-full mt-[110px] bg-gray-100 dark:bg-slate-800 dark:text-white 2xl:w-[330px] w-[260px] flex flex-col">
  <div class="scrollbox overflow-auto">
    <div class="scrollbox-inner pb-[110px] tasksAside" id="sidebar-content">

      <?php
      $prev = null;
      echo "<span class=\"hidden\" id=\"arrayId\">" . array_key_exists($index + 1, $arrayId) . "</span>";

      foreach ($results1 as $testItem) {
        if ($testItem["name"] !== $prev) {
          echo "<h3 class=\"text-xl font-bold mb-2 pl-2 mt-4\">{$testItem["name"]}</h3>";
        }


        echo "<a class=\"group aside-link flex pl-6 py-2 relative gap-1 font-semibold hover:bg-neutral-500 hover:text-white\" href=\"tasks.php?task={$testItem["id"]}\">";
        foreach ($data as $key => $doneTask) {
          if ($testItem["id"] == $key) {
            echo "<i class=\"fa-solid fa-check absolute left-1 top-1/2 -mt-2\"></i>";
          }
        }
        echo "Упражнение {$testItem['task_number']}"; ?>
        <?php if ($isAdmin == 1) { ?>
          <form action="tasksEdit.php" method="get">
            <input class="hidden" type="text" name="task" value="<?php echo $testItem["id"] ?>">
            <button
              class="opacity-0 group-hover:opacity-100 transition-all duration-200 bg-gray-800 absolute z-10 right-10 top-1/2 -mt-3 hover:bg-black  text-white px-1"
              type="submit"><i class="fa-solid fa-pen"></i></button>
          </form>
          <form action="taskDelete.php" method="get">
            <input class="hidden" type="text" name="task" value="<?php echo $testItem["id"] ?>">
            <button
              class="opacity-0 group-hover:opacity-100 transition-all duration-200 bg-gray-800 absolute z-10 right-2 top-1/2 -mt-3 hover:bg-black text-white px-[5px]"
              type="submit"><i class="fa-solid fa-trash"></i></button>
          </form>
        <?php } ?>
        </a>
        <?php $prev = $testItem["name"];
      } ?>
      <?php if ($isAdmin == 1) { ?>
        <a class="block pl-2 py-2 font-semibold bg-red-600 text-white hover:bg-red-700 hover:text-white"
          href="tasksAdding.php">
          ДОБАВЛЕНИЕ УПРАЖНЕНИЙ
        </a>
      <?php } ?>
    </div>

  </div>
</aside>