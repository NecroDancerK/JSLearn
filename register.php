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

    <label for="name">
        Имя
        <input
            type="text"
            id="name"
            name="name"
            placeholder="Иванов Иван"
            value="<?php echo old('name') ?>"
            <?php echo validationErrorAttr('name'); ?>
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
            >
        </label>
    </div>

    <fieldset>
        <label for="terms">
            <input
            class="checkbox"
                type="checkbox"
                id="terms"
                name="terms"
            >
            Я принимаю все условия пользования
        </label>
    </fieldset>

    <button
        class="btn"
        type="submit"
        id="submit"
        disabled
    >Продолжить</button>
</form>

<p>У меня уже есть <a class="acc_link" href="/">аккаунт</a></p>

<?php include_once __DIR__ . '/components/scripts.php' ?>
</body>
</html>