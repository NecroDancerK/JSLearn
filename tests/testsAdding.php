<?php

require_once "../php/helpers.php";

$isAdmin = currentUser()["is_admin"];

$results = getTasksIdsFromDB();

if ($isAdmin == 1) { ?>
  <?php

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['testName']) && !empty($_POST['testTheme']) && !empty($_POST['numberOfQuestions'])) {
      $pdo = getPDO();

      $testName = trim($_POST['testName']);
      $testTheme = trim($_POST['testTheme']);
      $numberOfQuestions = $_POST['numberOfQuestions'];
      $newTheme = trim($_POST["newTheme"]);

      $questions = [];


      for ($i = 0; $i < $numberOfQuestions; $i++) {
        $questions[$i + 1]['question'] = trim($_POST['question' . $i + 1]);
        for ($j = 1; $j <= 4; $j++) {
          $questions[$i + 1][$j] = trim($_POST['question' . $i + 1 . 'Answer' . $j]);
        }
        $questions[$i + 1]["rigthAnswer"] = trim($_POST['question' . $i + 1 . "rightAnswer"]);
      }

      if (!empty($newTheme)) {

        // Проверяем, существует ли уже такая тема в базе данных
        $stmt1 = $pdo->prepare("SELECT * FROM tests_themes WHERE name = :newTheme");
        $stmt1->execute(array(':newTheme' => $newTheme));
        $existingTheme = $stmt1->fetch(PDO::FETCH_ASSOC);

        // Если тема уже существует, выводим сообщение об ошибке
        if ($existingTheme) {
          echo "Ошибка: Тема \"$newTheme\" уже существует.";
        } else {
          // Вставляем новую тему в базу данных
          $stmt1 = $pdo->prepare("INSERT INTO tests_themes (name) VALUES (:newTheme)");
          $stmt1->execute(array(':newTheme' => $newTheme));
        }

        $stmt1 = $pdo->prepare("SELECT id FROM tests_themes WHERE name = :newTheme");
        $stmt1->execute(array(':newTheme' => $newTheme));
        $testThemeArray = $stmt1->fetch(PDO::FETCH_ASSOC);
        $testTheme = $testThemeArray["id"];

        $sql1 = "INSERT INTO tests (title, test_theme_id, questions) VALUES (:title, :test_theme_id, :questions);";

        // Подготавливаем выражение
        $stmt1 = $pdo->prepare($sql1);

        // Передаем значения переменных и выполняем запрос
        try {
          $stmt1->execute(
            array(
              ':title' => $testName,
              ':test_theme_id' => $testTheme,
              ':questions' => json_encode($questions),
            )
          );
        } catch (PDOException $e) {
          die("Ошибка при добавлении данных: " . $e->getMessage());
        }
      } else {

        $sql1 = "INSERT INTO tests (title, test_theme_id, questions) VALUES (:title, :test_theme_id, :questions);";

        // Подготавливаем выражение
        $stmt1 = $pdo->prepare($sql1);

        // Передаем значения переменных и выполняем запрос
        try {
          $stmt1->execute(
            array(
              ':title' => $testName,
              ':test_theme_id' => $testTheme,
              ':questions' => json_encode($questions),
            )
          );
        } catch (PDOException $e) {
          die("Ошибка при добавлении данных: " . $e->getMessage());
        }
      }
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
        <h2 class="text-5xl mb-6">Создание теста:</h2>

        <form class="flex flex-col gap-4 bg-gray-200 dark:bg-gray-700 p-7 text-xl rounded" method="post"
          action="testsAdding.php">
          <label class="flex flex-col text-center text-3xl">
            Название теста:
            <input class="border border-red-600 mt-4 dark:bg-gray-800 rounded" type="text" name="testName" required>
          </label>
          <label class="flex flex-col text-center text-3xl">
            Тема теста:
            <select class="border border-red-600 mt-4 mb-5 dark:bg-gray-800  bg-white rounded" name="testTheme"
              id="testTheme" required>
              <option value="">Выберите тему</option>
              <?php
              foreach ($result as $array) { ?>
                <option value=<?= $array['id'] ?>><?= $array['name'] ?></option>
              <?php } ?>
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
          <input type="text" class="hidden" id="numberOfQuestions" name="numberOfQuestions" value="1">
          <div id="questionsContainer" class="flex flex-col gap-12">
            <div class="question flex flex-col gap-10 mb-6 ">
              <label class="flex flex-col text-center text-3xl">
                Вопрос №1:
                <div class="mt-4 flex gap-3">
                  <input class="border border-red-600 dark:bg-gray-800 w-full rounded question-input" name="question1"
                    required>
                </div>
              </label>
              <div class="answer-options flex flex-col gap-2">
                <label class="flex flex-col text-center text-3xl option">
                  Вариант ответа №1:
                  <div class="mt-4 flex gap-3 mb-3">
                    <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question1Answer1" required>
                  </div>
                </label>
                <label class="flex flex-col text-center text-3xl option">
                  Вариант ответа №2:
                  <div class="mt-4 flex gap-3 mb-3">
                    <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question1Answer2" required>
                  </div>
                </label>
                <label class="flex flex-col text-center text-3xl option">
                  Вариант ответа №3:
                  <div class="mt-4 flex gap-3 mb-3">
                    <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question1Answer3" required>
                  </div>
                </label>
                <label class="flex flex-col text-center text-3xl option">
                  Вариант ответа №4:
                  <div class="mt-4 flex gap-3 mb-3">
                    <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question1Answer4" required>
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
          <button class="bg-red-600 text-white p-3 text-xl rounded-full" type="button" id="addQuestionBtn">Добавить
            вопрос</button>
          <button class="bg-red-600 text-white p-3 text-xl rounded-full mt-2" type="button" onclick="removeQuestion()"
            id="deleteBtn">Удалить вопрос</button>

          <button class="bg-red-800 text-white p-3 text-xl rounded-full my-2 mt-8" type="submit">Создать тест</button>
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