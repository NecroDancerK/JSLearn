<?php

session_start();

require_once __DIR__ . '/config.php';

function redirect($path)
{
    header("Location: $path");
    die();
}

function setValidationError( $fieldName, $message)
{
    $_SESSION['validation'][$fieldName] = $message;
}

function hasValidationError($fieldName)
{
    return isset($_SESSION['validation'][$fieldName]);
}

function validationErrorAttr($fieldName)
{
    return isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

function validationErrorMessage($fieldName)
{
    $message = $_SESSION['validation'][$fieldName] ?? '';
    unset($_SESSION['validation'][$fieldName]);
    return $message;
}

function setOldValue($key, $value)
{
    $_SESSION['old'][$key] = $value;
}

function old($key)
{
    $value = $_SESSION['old'][$key] ?? '';
    unset($_SESSION['old'][$key]);
    return $value;
}

function uploadFile($file, $prefix = '')
{
    $uploadPath = __DIR__ . '/../uploads';

    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = $prefix . '_' . time() . ".$ext";

    if (!move_uploaded_file($file['tmp_name'], "$uploadPath/$fileName")) {
        die('Ошибка при загрузке файла на сервер');
    }

    return "uploads/$fileName";
}

function setMessage($key, $message)
{
    $_SESSION['message'][$key] = $message;
}

function hasMessage($key)
{
    return isset($_SESSION['message'][$key]);
}

function getMessage($key)
{
    $message = $_SESSION['message'][$key] ?? '';
    unset($_SESSION['message'][$key]);
    return $message;
}

function getPDO()
{
    try {
        return new \PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';charset=utf8;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
    } catch (\PDOException $e) {
        die("Connection error: {$e->getMessage()}");
    }
}

function findUser($email)
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}


function currentUser()
{
    $pdo = getPDO();

    if (!isset($_SESSION['user'])) {
        return false;
    }

    $userId = $_SESSION['user']['id'] ?? null;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function logout()
{
    unset($_SESSION['user']['id']);
    redirect('/');
}

function checkAuth()
{
    if (!isset($_SESSION['user']['id'])) {
        redirect('/');
    }
}

function checkGuest()
{
    if (isset($_SESSION['user']['id'])) {
        redirect('learn/learn1.php');
    }
}