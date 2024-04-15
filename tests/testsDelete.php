<?php

require_once "../php/helpers.php";

$isAdmin = currentUser()["is_admin"];

$results = getTasksIdsFromDB();

$test = [];

$testId = isset($_GET['test']) ? $_GET['test'] : null;

$pdo = getPDO();

try {

  // Подготавливаем запрос с параметром
  $stmt = $pdo->prepare("SELECT * FROM tests WHERE id = :testId");
  // Привязываем параметр к значению
  $stmt->bindParam(':testId', $testId, PDO::PARAM_INT);

  // Выполняем запрос
  $stmt->execute();

  // Устанавливаем режим выборки результата в ассоциативный массив
  $stmt->setFetchMode(PDO::FETCH_ASSOC);


  while ($row = $stmt->fetch()) {
    $test = $row;
  }

  $test['questions'] = json_decode($test['questions'], true);

  // Выводим данные
  // echo '<pre>';
  // print_r($test);
  // echo '</pre>';

} catch (PDOException $e) {
  echo "Ошибка: " . $e->getMessage();
}

if ($isAdmin == 1) {
  if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['testId'])) {
      $testId = $_POST['testId'];

      // Удаление теста из базы данных
      $stmt = $pdo->prepare('DELETE FROM tests WHERE id = ?');
      $stmt->execute([$testId]);

      checkTestsJSON($testId);
      header("Location: tests.php");
      exit();
    } else {
      header("Location: tests.php");
      exit();
    }
  }


  $result = getThemesFromDB('tests_themes');
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <?php
  include_once __DIR__ . '../components/mainHead.php';
  ?>


  <body <?php if (isset($_COOKIE['isDarkMode']) && $_COOKIE['isDarkMode'] === 'true') { ?>
      class="dark bg-white dark:bg-gray-900" <?php } ?>>

    <div class="wrapper h-auto dark:bg-gray-900">
      <?php

      require_once "components/header.php";

      ?>
      <?php require_once "components/headerNav.php" ?>
      <?php require_once "components/aside.php"; ?>
      <main class="2xl:pt-40 pt-44 pb-10 mx-auto w-3/5 dark:border-gray-950 px-7 dark:bg-gray-900 dark:text-white">

        <h2 class="text-5xl mb-6">Удаление теста:</h2>
        <form class="flex justify-between items-center mb-6" action="testsDelete.php" method="post">
          <p class="2xl:text-2xl xl:text-xl"><span class="font-bold">Вы</span> уверены, что хотите удалить этот тест?
          </p>
          <input type="text" name="testId" class="hidden" value="<?= $testId ?>">
          <button class="bg-red-600 p-3 px-5 rounded-full text-white font-bold " type="submit">Удалить тест</button>
        </form>

        <form class="flex flex-col gap-4 bg-gray-200 dark:bg-gray-700 p-7 text-xl rounded" method="post"
          action="testsAdding.php">
          <label class="flex flex-col text-center text-3xl">
            Название теста:
            <input class="border border-red-600 mt-4 dark:bg-gray-800 rounded" type="text" name="testName"
              value="<?= $test['title'] ?>" readonly>
          </label>
          <label class="flex flex-col text-center text-3xl">
            Тема теста:
            <select class="border border-red-600 mt-4 mb-5 dark:bg-gray-800  bg-white rounded" name="testTheme"
              id="testTheme" readonly disabled>
              <option value="">Выберите тему</option>
              <?php
              foreach ($result as $array) { ?>
                <?php if ($test['test_theme_id'] == $array["id"]) { ?>
                  <option value=<?= $array['id'] ?> selected><?= $array['name'] ?></option>
                <?php } else { ?>
                  <option value=<?= $array['id'] ?>><?= $array['name'] ?></option>
                <?php }
              } ?>

              <option value="newTheme" id="newTheme">Добавить тему:</option>
            </select>
          </label>
          <label id="newThemeLabel" class="hidden flex-col text-center text-3xl">
            Название темы:
            <div class="mb-4 flex gap-3">
              <input class="border border-red-600 dark:bg-gray-800 w-full rounded" type="text" name="newTheme"
                id="newThemeInput">
            </div>
          </label>
          <input type="text" class="hidden" id="numberOfQuestions" name="numberOfQuestions">
          <div id="questionsContainer" class="flex flex-col gap-12">
            <?php foreach ($test['questions'] as $key => $testItem) { ?>
              <div class="question1 flex flex-col gap-10 mb-6">
                <label class="flex flex-col text-center text-3xl">
                  Вопрос №
                  <?= $key ?>:
                  <div class="mt-4 flex gap-3">
                    <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question<?= $key ?>"
                      value="<?= $testItem['question'] ?>" readonly>
                  </div>
                </label>
                <div class="answer-options flex flex-col gap-2">
                  <label class="flex flex-col text-center text-3xl option">
                    Вариант ответа №1:
                    <div class="mt-4 flex gap-3 mb-3">
                      <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question<?= $key ?>Answer1"
                        value="<?= $testItem['1'] ?>" readonly>
                    </div>
                  </label>
                  <label class="flex flex-col text-center text-3xl option">
                    Вариант ответа №2:
                    <div class="mt-4 flex gap-3 mb-3">
                      <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question<?= $key ?>Answer2"
                        value="<?= $testItem['2'] ?>" readonly>
                    </div>
                  </label>
                  <label class="flex flex-col text-center text-3xl option">
                    Вариант ответа №3:
                    <div class="mt-4 flex gap-3 mb-3">
                      <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question<?= $key ?>Answer3"
                        value="<?= $testItem['3'] ?>" readonly>
                    </div>
                  </label>
                  <label class="flex flex-col text-center text-3xl option">
                    Вариант ответа №4:
                    <div class="mt-4 flex gap-3 mb-3">
                      <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question<?= $key ?>Answer4"
                        value="<?= $testItem['4'] ?>" readonly>
                    </div>
                  </label>
                </div>
                <label class="flex flex-col text-center text-3xl">
                  Правильный ответ:
                  <select class="border border-red-600 mt-4 dark:bg-gray-800  bg-white rounded"
                    name="question<?= $key ?>rightAnswer" readonly disabled>
                    <option value="1" <?= $testItem['rigthAnswer'] == 1 ? "selected" : "" ?>>1</option>
                    <option value="2" <?= $testItem['rigthAnswer'] == 2 ? "selected" : "" ?>>2</option>
                    <option value="3" <?= $testItem['rigthAnswer'] == 3 ? "selected" : "" ?>>3</option>
                    <option value="4" <?= $testItem['rigthAnswer'] == 4 ? "selected" : "" ?>>4</option>
                  </select>
                </label>
              </div>
            <?php } ?>
          </div>

        </form>

      </main>
      <footer></footer>
    </div>
    <?php include_once 'components/scripts.php' ?>

  </body>

  </html>
<?php } else {
  header("Location: ../index.php");
  exit();
}
?>