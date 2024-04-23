<?php
require_once __DIR__ . '/php/helpers.php';

checkGuest();
?>

<!DOCTYPE html>
<html lang="ru" <?php if (isset($_COOKIE['isDarkMode']) && $_COOKIE['isDarkMode'] === 'true') { ?> data-theme="dark" <?php } else { ?> data-theme="light" <?php } ?>>
<?php include_once __DIR__ . '/components/head.php' ?>

<body>

  <form class="card" action="php/actions/login.php" method="post">
    <h2>Вход</h2>

    <?php if (hasMessage('error')): ?>
      <div class="notice error">
        <?php echo getMessage('error') ?>
      </div>
    <?php endif; ?>

    <label for="email">
      Email
      <input type="text" id="email" name="email" placeholder="JSLearn@gmail.com" value="<?php echo old('email') ?>"
        <?php echo validationErrorAttr('email'); ?>>
      <?php if (hasValidationError('email')): ?>
        <small>
          <?php echo validationErrorMessage('email'); ?>
        </small>
      <?php endif; ?>
    </label>

    <label for="password">
      Пароль
      <input type="password" id="password" name="password" placeholder="******">
    </label>

    <button class="btn" type="submit" id="submit">Продолжить</button>
  </form>

  <p>У меня еще нет <a class="acc_link" href="/register.php">аккаунта</a></p>

  <?php include_once __DIR__ . '/components/scripts.php' ?>
</body>

</html>