<?php
session_start();

require_once __DIR__ . '/php/helpers.php';

checkAuth();

$user = currentUser();

$pdo = getPDO();

$userId = $user["id"];

$stmt1 = $pdo->prepare("SELECT done_tasks FROM tasks_progress WHERE user_id = :user_id");
$stmt1->bindParam(':user_id', $userId);

$stmt1->execute();
$row = $stmt1->fetch();

$data = json_decode($row['done_tasks'], true);

$stmt2 = $pdo->prepare("SELECT done_tests FROM tests_progress WHERE user_id = :user_id");
$stmt2->bindParam(':user_id', $userId);

$stmt2->execute();
$row2 = $stmt2->fetch();

$data2 = json_decode($row2['done_tests'], true);

$arrayJSON = array_keys($data);

$arrayTasks = [];

$stmt1 = $pdo->prepare("SELECT COUNT(*) as tasksCount FROM tasks");
$stmt1->execute();
$tasksCount = $stmt1->fetch(PDO::FETCH_ASSOC);

$stmt2 = $pdo->prepare("SELECT COUNT(*) as testsCount FROM tests");
$stmt2->execute();
$testsCount = $stmt2->fetch(PDO::FETCH_ASSOC);

$learnFileCount = $_SESSION['learnFileCount']; // Получение переменной из сессии
$countLearn = $_SESSION['countLearn'];

?>

<!DOCTYPE html>
<html lang="ru" <?php if (isset($_COOKIE['isDarkMode']) && $_COOKIE['isDarkMode'] === 'true') { ?> data-theme="dark" <?php } else { ?> data-theme="light" <?php } ?>>
<?php include_once __DIR__ . '/components/head.php' ?>
<link rel="stylesheet" href="css/media.css">

<body>

  <div class="card home profile">
    <a href="learn/learn1.php" style="position: absolute; top: 40px; right: 40px; color: inherit;">
      <i class="fa-solid fa-x fa-2xl"></i>
    </a>
    <img class="avatar" src="<?php echo $user['avatar'] ?>" alt="<?php echo $user['name'] ?>">
    <h1 style="margin: 0px;" class="hello">Привет,
      <?php echo $user['name'] ?>!
    </h1>
    <label for="learn">Изучено тем:
      <?= count($countLearn) ?> из
      <?= $learnFileCount ?>
    </label>

    <progress class="progress" id="learn" value="<?= count($countLearn) ?>" max="<?= $learnFileCount ?>"></progress>
    <label for="tasks">Выполнено заданий:
      <?= count($data) ?> из
      <?= $tasksCount["tasksCount"] ?>
    </label>

    <progress class="progress" id="tasks" value="<?= count($data) ?>" max="<?= $tasksCount["tasksCount"] ?>"></progress>

    <label for="tasks">Пройдено тестов:
      <?= count($data2) ?> из
      <?= $testsCount["testsCount"] ?>
    </label>

    <progress class="progress" id="tasks" value="<?= count($data2) ?>" max="<?= $testsCount["testsCount"] ?>"></progress>

    <form action="php/actions/logout.php" method="post">
      <button class=" btn" role="button">Выйти из аккаунта</button>
    </form>
  </div>

  <script src="https://kit.fontawesome.com/89e7650dfb.js" crossorigin="anonymous"></script>
  <script src="js/profile.js"></script>
  <script src="js/script.js"></script>
</body>

</html>