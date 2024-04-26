<?php

require_once "../php/helpers.php";

$pdo = getPDO();

$pageId = isset($_GET['test']) ? $_GET['test'] : null;

$query1 = "SELECT tests.id, tests.title, tests.test_theme_id, tests_themes.name FROM `tests` JOIN tests_themes ON tests.test_theme_id = tests_themes.id ORDER BY `tests`.`test_theme_id`, `tests`.`title` ASC;";
$statement1 = $pdo->query($query1);

$results1 = $statement1->fetchAll(PDO::FETCH_ASSOC);

$results2 = getTestsIdsFromDB();

$arrayId = [];

$isAdmin = currentUser()["is_admin"];

$userId = currentUser()["id"];

$stmt = $pdo->prepare("SELECT done_tests FROM tests_progress WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $userId);

$stmt->execute();
$row = $stmt->fetch();

$data = json_decode($row['done_tests'], true);


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

        if ($testItem["name"] !== $prev) { ?>
          <h3 class="text-xl font-bold mb-2 pl-2 mt-4"><?= $testItem["name"] ?></h3>
        <?php }


        echo "<a onclick=\"startNewTest()\" class=\"group aside-link flex pl-6 py-2 relative gap-1 font-semibold hover:bg-neutral-500 hover:text-white\" href=\"tests.php?test={$testItem["id"]}&question=1\">";
        foreach ($data as $key => $doneTask) {
          if ($testItem["id"] == $key) { ?> 
            <i class="fa-solid fa-check absolute left-1 top-1/2 -mt-2"></i>
          <?php }
        }
        echo "{$testItem['title']}"; ?>
        <?php if ($isAdmin == 1) { ?>
          <form action="testsEdit.php" method="get">
            <input class="hidden" type="text" name="test" value="<?= $testItem["id"] ?>">
            <button
              class="opacity-0 group-hover:opacity-100 transition-all duration-200 bg-gray-800 absolute z-10 right-10 top-1/2 -mt-3 hover:bg-black  text-white px-1"
              type="submit"><i class="fa-solid fa-pen"></i></button>
          </form>
          <form action="testsDelete.php" method="get">
            <input class="hidden" type="text" name="test" value="<?= $testItem["id"] ?>">
            <button
              class="opacity-0 group-hover:opacity-100 transition-all duration-200 bg-gray-800 absolute z-10 right-2 top-1/2 -mt-3 hover:bg-black text-white px-[5px]"
              type="submit" rel="modal:open">
              <i class="fa-solid fa-trash"></i>
            </button>
          </form>
        <?php } ?>
        </a>
        <?php $prev = $testItem["name"];
      } ?>
      <a class="block pl-2 py-2 font-semibold bg-red-500 text-white hover:bg-red-700 hover:text-white"
        href="testsViewResults.php">
        Посмотреть результаты тестов
      </a>
      <?php if ($isAdmin == 1) { ?>
        <a class="block pl-2 py-2 font-semibold bg-red-600 text-white hover:bg-red-700 hover:text-white"
          href="testsAdding.php">
          СОЗДАНИЕ ТЕСТА
        </a>
      <?php } ?>
    </div>

  </div>
</aside>