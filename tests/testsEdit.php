<?php

require_once "../php/helpers.php";

$isAdmin = currentUser()["is_admin"];

$results = getTasksIdsFromDB();

$test = [];

$testId = isset($_GET['test']) ? $_GET['test'] : null;

$pdo = getPDO();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (!empty($_POST['testName']) && !empty($_POST['testTheme']) && !empty($_POST['numberOfQuestions'])) {
    $pdo = getPDO();

    $testName = $_POST['testName'];
    $testTheme = $_POST['testTheme'];
    $numberOfQuestions = $_POST['numberOfQuestions'];
    $newTheme = $_POST["newTheme"];

    $questions = [];


    for ($i = 0; $i < $numberOfQuestions; $i++) {
      $questions[$i + 1]['question'] = $_POST['question' . $i + 1];
      for ($j = 1; $j <= 4; $j++) {
        $questions[$i + 1][$j] = $_POST['question' . $i + 1 . 'Answer' . $j];
      }
      $questions[$i + 1]["rigthAnswer"] = $_POST['question' . $i + 1 . "rightAnswer"];
    }

    if (!empty($newTheme)) {

      // Проверяем, существует ли уже такая тема в базе данных
      $stmt = $pdo->prepare("SELECT * FROM tests_themes WHERE name = :newTheme");
      $stmt->execute(array(':newTheme' => $newTheme));
      $existingTheme = $stmt->fetch(PDO::FETCH_ASSOC);

      // Если тема уже существует, выводим сообщение об ошибке
      if ($existingTheme) {
        echo "Ошибка: Тема \"$newTheme\" уже существует.";
      } else {
        // Вставляем новую тему в базу данных
        $stmt = $pdo->prepare("INSERT INTO tests_themes (name) VALUES (:newTheme)");
        $stmt->execute(array(':newTheme' => $newTheme));
      }

      $stmt = $pdo->prepare("SELECT id FROM tests_themes WHERE name = :newTheme");
      $stmt->execute(array(':newTheme' => $newTheme));
      $testThemeArray = $stmt->fetch(PDO::FETCH_ASSOC);
      $testTheme = $testThemeArray["id"];

      $sql = "UPDATE tests SET title = :title, test_theme_id = :test_theme_id, questions = :questions WHERE id = :testId;";

      // Подготавливаем выражение
      $stmt = $pdo->prepare($sql);

      // Передаем значения переменных и выполняем запрос
      try {
        $stmt->execute(
          array(
            ':title' => $testName,
            ':test_theme_id' => $testTheme,
            ':questions' => json_encode($questions),
            ':testId' => $testId,
          )
        );
      } catch (PDOException $e) {
        die("Ошибка при добавлении данных: " . $e->getMessage());
      }

      checkTestsJSON($testId);

      header("Location: testsEdit.php?test=$testId");
    } else {

      $sql = "UPDATE tests SET title = :title, test_theme_id = :test_theme_id, questions = :questions WHERE id = :testId;";

      // Подготавливаем выражение
      $stmt = $pdo->prepare($sql);

      // Передаем значения переменных и выполняем запрос
      try {
        $stmt->execute(
          array(
            ':title' => $testName,
            ':test_theme_id' => $testTheme,
            ':questions' => json_encode($questions),
            ':testId' => $testId,
          )
        );
      } catch (PDOException $e) {
        die("Ошибка при добавлении данных: " . $e->getMessage());
      }

      checkTestsJSON($testId);

      header("Location: testsEdit.php?test=$testId");
    }
  }
}

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

if ($isAdmin == 1) { ?>
  <?php



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

        <h2 class="text-5xl mb-6">Изменение теста:</h2>


        <form class="flex flex-col gap-4 bg-gray-200 dark:bg-gray-700 p-7 text-xl rounded" method="post"
          action="testsEdit.php?test=<?= $testId ?>">
          <label class="flex flex-col text-center text-3xl">
            Название теста:
            <input class="border border-red-600 mt-4 dark:bg-gray-800 rounded" type="text" name="testName" required
              value="<?= $test['title'] ?>">
          </label>
          <label class="flex flex-col text-center text-3xl">
            Тема теста:
            <select class="border border-red-600 mt-4 mb-5 dark:bg-gray-800  bg-white rounded" name="testTheme"
              id="testTheme" required>
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
          <input type="text" class="hidden" id="numberOfQuestions" name="numberOfQuestions"
            value="<?= count($test['questions']) ?>">
          <div id="questionsContainer" class="flex flex-col gap-12">
            <?php foreach ($test['questions'] as $key => $testItem) { ?>
              <div class="question flex flex-col gap-10 mb-6">
                <label class="flex flex-col text-center text-3xl ">
                  Вопрос №
                  <?= $key ?>:
                  <div class="mt-4 flex gap-3">
                    <input class="border border-red-600 dark:bg-gray-800 w-full rounded question-input"
                      name="question<?= $key ?>" value="<?= $testItem['question'] ?>" required>
                  </div>
                </label>
                <div class="answer-options flex flex-col gap-2">
                  <label class="flex flex-col text-center text-3xl option">
                    Вариант ответа №1:
                    <div class="mt-4 flex gap-3 mb-3">
                      <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question<?= $key ?>Answer1"
                        value="<?= $testItem['1'] ?>" required>
                    </div>
                  </label>
                  <label class="flex flex-col text-center text-3xl option">
                    Вариант ответа №2:
                    <div class="mt-4 flex gap-3 mb-3">
                      <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question<?= $key ?>Answer2"
                        value="<?= $testItem['2'] ?>" required>
                    </div>
                  </label>
                  <label class="flex flex-col text-center text-3xl option">
                    Вариант ответа №3:
                    <div class="mt-4 flex gap-3 mb-3">
                      <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question<?= $key ?>Answer3"
                        value="<?= $testItem['3'] ?>" required>
                    </div>
                  </label>
                  <label class="flex flex-col text-center text-3xl option">
                    Вариант ответа №4:
                    <div class="mt-4 flex gap-3 mb-3">
                      <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question<?= $key ?>Answer4"
                        value="<?= $testItem['4'] ?>" required>
                    </div>
                  </label>
                </div>
                <label class="flex flex-col text-center text-3xl">
                  Правильный ответ:
                  <select class="border border-red-600 mt-4 dark:bg-gray-800  bg-white rounded"
                    name="question<?= $key ?>rightAnswer">
                    <option value="1" <?= $testItem['rigthAnswer'] == 1 ? "selected" : "" ?>>1</option>
                    <option value="2" <?= $testItem['rigthAnswer'] == 2 ? "selected" : "" ?>>2</option>
                    <option value="3" <?= $testItem['rigthAnswer'] == 3 ? "selected" : "" ?>>3</option>
                    <option value="4" <?= $testItem['rigthAnswer'] == 4 ? "selected" : "" ?>>4</option>
                  </select>
                </label>
              </div>
            <?php } ?>

          </div>
          <button class="bg-red-600 text-white p-3 text-xl rounded-full" type="button" id="addQuestionBtn">Добавить
            вопрос</button>
          <button class="bg-red-600 text-white p-3 text-xl rounded-full mt-2" type="button" onclick="removeQuestion()"
            id="deleteBtn">Удалить
            вопрос</button>

          <button class="bg-red-800 text-white p-3 text-xl rounded-full my-2 mt-8" type="submit">Сохранить
            изменения</button>
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