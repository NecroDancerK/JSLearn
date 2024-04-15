<?php
session_start();

require_once __DIR__ . '/php/helpers.php';

checkAuth();

$user = currentUser();

$pdo = getPDO();

$userId = $user["id"];

$stmt = $pdo->prepare("SELECT done_tasks FROM tasks_progress WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $userId);

$stmt->execute();
$row = $stmt->fetch();

$data = json_decode($row['done_tasks'], true);

$arrayJSON = array_keys($data);

$arrayTasks = [];

$stmt = $pdo->prepare("SELECT COUNT(*) as tasksCount FROM tasks");
$stmt->execute();
$tasksCount = $stmt->fetch(PDO::FETCH_ASSOC);


$learnFileCount = $_SESSION['learnFileCount']; // Получение переменной из сессии
$countLearn = $_SESSION['countLearn'];

?>

<!DOCTYPE html>
<html lang="ru" data-theme="light">
<?php include_once __DIR__ . '/components/head.php' ?>

<body>

  <div class="card home profile">
    <a href="" id="goBack" style="position: absolute; top: 40px; right: 40px; color: inherit;">
      <i class="fa-solid fa-x fa-2xl"></i>
    </a>
    <img class="avatar" src="<?php echo $user['avatar'] ?>" alt="<?php echo $user['name'] ?>">
    <h1 style="margin: 0px;">Привет,
      <?php echo $user['name'] ?>!
    </h1>
    <label for="tasks">Изучено тем:
      <?= count($countLearn) ?> из
      <?= $learnFileCount ?>
    </label>

    <progress id="tasks" value="<?= count($countLearn) ?>" max="<?= $learnFileCount ?>"></progress>
    <label for="tasks">Прогресс заданий: Выполнено
      <?= count($data) ?> из
      <?= $tasksCount["tasksCount"] ?>
    </label>

    <progress id="tasks" value="<?= count($data) ?>" max="<?= $tasksCount["tasksCount"] ?>"></progress>
    
    <a class="link" role="button" href="profileTestsResult.php">Посмотреть результаты тестов</a>

    <form action="php/actions/logout.php" method="post">
      <button class="" role="button">Выйти из аккаунта</button>
    </form>
  </div>

  <?php include_once __DIR__ . '/components/scripts.php' ?>
  <script src="https://kit.fontawesome.com/89e7650dfb.js" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>

</html>