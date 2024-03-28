<!DOCTYPE html>
<html lang="en">

<?php
include_once __DIR__ . '../components/mainHead.php';

require_once "../php/helpers.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $testName = $_POST["testName"];
  $testTheme = $_POST["testTheme"];
  $newTheme = $_POST["newTheme"];

  echo $newTheme;

  if (!empty ($title) && !empty ($task) && !empty ($taskNumber) && !empty ($taskTheme)) {
    $pdo = getPDO();


  }
}
$results = getTasksIdsFromDB();
?>


<body <?php if (isset ($_COOKIE['isDarkMode']) && $_COOKIE['isDarkMode'] === 'true') { ?> class="dark" <?php } ?>>

  <div class="wrapper h-auto dark:bg-gray-900">
    <?php

    require_once "components/header.php";

    ?>
    <?php require_once "components/headerNav.php" ?>
    <?php require_once "components/aside.php"; ?>
    <main class="2xl:pt-40 pt-44 pb-10 mx-auto w-3/5 dark:border-gray-950 px-7 dark:bg-gray-900 dark:text-white">
      <h2 class="text-5xl mb-6">Создание теста:</h2>

      <form class="flex flex-col gap-4 bg-gray-200 dark:bg-gray-700 p-7 text-xl rounded" method="post"
        action="testsAdding.php">
        <label class="flex flex-col text-center text-3xl">
          Название теста:
          <input class="border border-red-600 mt-4 dark:bg-gray-800 rounded" type="text" name="testName">
        </label>
        <label class="flex flex-col text-center text-3xl">
          Тема теста:
          <select class="border border-red-600 mt-4 mb-10 dark:bg-gray-800  bg-white rounded" name="testTheme" id="testTheme">
            <option value="">Выберите тему</option>
            <?php

            foreach ($result as $array) {
              echo "<option value=\"{$array['id']}\">{$array['name']}</option>";
            }
            ?>
            <option value="newTheme" id="newTheme">Добавить тему:</option>
          </select>
        </label>
        <label id="newThemeInput" class="hidden flex-col text-center text-3xl ">
          Название темы:
          <div class="mt-4 flex gap-3">
            <input class="border border-red-600 dark:bg-gray-800 w-full rounded" type="text" name="newTheme">
          </div>
        </label>
        <div id="questionsContainer" class="flex flex-col gap-12">
          <div class="question1 flex flex-col gap-10 mb-6">
            <label class="flex flex-col text-center text-3xl">
              Вопрос №1:
              <div class="mt-4 flex gap-3">
                <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question1">
              </div>
            </label>
            <div class="answer-options flex flex-col gap-2">
              <label class="flex flex-col text-center text-3xl option">
                Вариант ответа №1:
                <div class="mt-4 flex gap-3 mb-3">
                  <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question1Answer1">
                </div>
              </label>
              <label class="flex flex-col text-center text-3xl option">
                Вариант ответа №2:
                <div class="mt-4 flex gap-3 mb-3">
                  <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question1Answer2">
                </div>
              </label>
              <label class="flex flex-col text-center text-3xl option">
                Вариант ответа №3:
                <div class="mt-4 flex gap-3 mb-3">
                  <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question1Answer3">
                </div>
              </label>
              <label class="flex flex-col text-center text-3xl option">
                Вариант ответа №4:
                <div class="mt-4 flex gap-3 mb-3">
                  <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question1Answer4">
                </div>
              </label>
            </div>
            <label class="flex flex-col text-center text-3xl">
              Правильный ответ:
              <select class="border border-red-600 mt-4 dark:bg-gray-800  bg-white rounded" name="question1rightAnswer">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </label>
          </div>
        </div>
        <button class="bg-red-600 text-white p-3 text-xl rounded-full my-2 mb-8" type="button"
          id="addQuestionBtn">Добавить
          вопрос</button>
        <button class="bg-red-800 text-white p-3 text-xl rounded-full" type="submit">Создать тест</button>
      </form>

    </main>
    <footer></footer>
  </div>
  <?php include_once 'components/scripts.php' ?>
</body>

</html>