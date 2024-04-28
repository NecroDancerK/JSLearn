<?php
require_once __DIR__ . '/php/helpers.php';
checkGuest();
?>

<!DOCTYPE html>
<html lang="ru" <?php if (isset($_COOKIE['isDarkMode']) && $_COOKIE['isDarkMode'] === 'true') { ?> data-theme="dark"
  <?php } else { ?> data-theme="light" <?php } ?>>
<?php include_once __DIR__ . '/components/head.php'?>
<link rel="stylesheet" href="css/media.css">
<body>

<form class="card" action="php/actions/register.php" method="post" enctype="multipart/form-data">
    <h2 class="register">Регистрация</h2>
    <a href="learn/learn1.php" style="position: absolute; top: 40px; right: 40px; color: inherit;">
      <i class="fa-solid fa-x fa-2xl"></i>
    </a>
    <label for="name">
        Имя
        <input
            type="text"
            id="name"
            name="name"
            placeholder="Иванов Иван"
            value="<?php echo old('name') ?>"
            <?php echo validationErrorAttr('name'); ?>
            required

        >
        <?php if(hasValidationError('name')): ?>
            <small><?php echo validationErrorMessage('name'); ?></small>
        <?php endif; ?>
    </label>

    <label for="email">
        E-mail
        <input
            type="text"
            id="email"
            name="email"
            placeholder="JSLearn@gmail.com"
            value="<?php echo old('email') ?>"
            <?php echo validationErrorAttr('email'); ?>
            required
        >
        <?php if(hasValidationError('email')): ?>
            <small><?php echo validationErrorMessage('email'); ?></small>
        <?php endif; ?>
    </label>

    <label for="avatar">Изображение профиля
        <input
            type="file"
            id="avatar"
            name="avatar"
            <?php echo validationErrorAttr('avatar'); ?>
            required
        >
        <?php if(hasValidationError('avatar')): ?>
            <small><?php echo validationErrorMessage('avatar'); ?></small>
        <?php endif; ?>
    </label>

    <div class="grid">
        <label for="password">
            Пароль
            <input
                type="password"
                id="password"
                name="password"
                placeholder="******"
                <?php echo validationErrorAttr('password'); ?>
                required
            >
            <?php if(hasValidationError('password')): ?>
                <small><?php echo validationErrorMessage('password'); ?></small>
            <?php endif; ?>
        </label>

        <label for="password_confirmation">
            Подтверждение
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="******"
                required
            >
        </label>
    </div>

    <!-- <fieldset>
        <label for="terms">
            <input
            class="checkbox"
                type="checkbox"
                id="terms"
                name="terms"
            >
            Я принимаю все условия пользования
        </label>
    </fieldset> -->

    <div class="g-recaptcha " id="terms" data-sitekey="6LesNZgpAAAAAA3loJ672V8u7woiwZ1nOV6F2vCM" data-callback="disableSubmit"></div>

    <button
        class="btn"
        type="submit"
        id="submit"
        disabled
    >Продолжить</button>
</form>

<p>У меня уже есть <a class="acc_link" href="login.php">аккаунт</a></p>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
const submit = document.getElementById('submit');

    function onSubmit(token) {
        let form = document.querySelector('form.card');
        let recaptchaResponse = document.getElementById('g-recaptcha-response');
        recaptchaResponse.value = token;
        form.submit();
    }

    function disableSubmit() {
        submit.disabled = false;
    }
</script>

  <script src="https://kit.fontawesome.com/89e7650dfb.js" crossorigin="anonymous"></script>
<?php include_once __DIR__ . '/components/scripts.php' ?>
</body>
</html>