<?php
require_once __DIR__ . '/php/helpers.php';

checkAuth();

$user = currentUser();

$pdo = getPDO();

$userId = $user["id"];

$stmt = $pdo->prepare("SELECT done_tasks FROM progress WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $userId);

$stmt->execute();
$row = $stmt->fetch();

$data = json_decode($row['done_tasks'], true);

$arrayJSON = array_keys($data);

$arrayTasks = [];

$stmt = $pdo->prepare("SELECT COUNT(*) as tasksCount FROM tasks");
// $stmt = $pdo->prepare("SELECT id FROM `tasks` ORDER BY id ASC");
$stmt->execute();
$tasksCount = $stmt->fetch(PDO::FETCH_ASSOC);
// $tasksCount = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($tasksCount);

// foreach ($tasksCount as $value) {
//   foreach ($value as $key) {
//     array_push($arrayTasks, $key);
//   }
// }

// $intersect = array_intersect($arrayTasks, $arrayJSON);

// $diff = array_diff($arrayJSON, $intersect);

// foreach ($diff as $value) {
//     $key = array_search($value, $arrayJSON); // Находим ключ значения
//     unset($arrayJSON[$key]); // Удаляем значение по ключу
// }

// print_r($arrayJSON);


// var_dump($intersect);
?>

<!DOCTYPE html>
<html lang="ru" data-theme="light">
<?php include_once __DIR__ . '/components/head.php' ?>

<body>

  <div class="card home profile">
    <a href="" onclick="goBack()" style="position: absolute; top: 40px; right: 40px; color: inherit;">
      <i class="fa-solid fa-x fa-2xl "></i>
    </a>
    <img class="avatar" src="<?php echo $user['avatar'] ?>" alt="<?php echo $user['name'] ?>">
    <h1 style="margin: 0px;">Привет,
      <?php echo $user['name'] ?>!
    </h1>
    <label for="tasks">Прогресс заданий: Выполнено <?= count($data) ?> из <?= $tasksCount["tasksCount"] ?></label>

        <progress id="tasks" value="<?= count($data) ?>"
            max="<?= $tasksCount["tasksCount"] ?>"></progress>
    <form action="php/actions/logout.php" method="post">
      <button class="" role="button">Выйти из аккаунта</button>
    </form>
  </div>

  <?php include_once __DIR__ . '/components/scripts.php' ?>
  <script src="https://kit.fontawesome.com/89e7650dfb.js" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>

</html>