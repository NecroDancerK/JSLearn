<?php
require_once __DIR__ . '/php/helpers.php';

checkAuth();

$user = currentUser();
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
        <h1>Привет,
            <?php echo $user['name'] ?>!
        </h1>
        <form action="php/actions/logout.php" method="post">
            <button class="" role="button">Выйти из аккаунта</button>
        </form>
    </div>

    <?php include_once __DIR__ . '/components/scripts.php' ?>
    <script src="https://kit.fontawesome.com/89e7650dfb.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>