<?php 

require_once __DIR__ . '../../php/helpers.php';

$user = currentUser();

$pdo = getPDO();

$userId = $user["id"];

$stmt = $pdo->prepare("SELECT studied_topics FROM learn_progress WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $userId);

$stmt->execute();
$row = $stmt->fetch();

$data = json_decode($row['studied_topics'], true);

$arrayJSON = array_keys($data);

// var_dump($arrayJSON);

// Указываем директорию, в которой будем искать файлы
$directory = __DIR__;

// Получаем список файлов в директории
$files = scandir($directory);

// Инициализируем счетчик
$learnFileCount = 0;

// Проходим по каждому файлу
foreach ($files as $file) {
    // Проверяем, является ли файл обычным файлом и содержит ли слово "learn" в названии
    // и содержит ли число в названии
    if (is_file($directory . '/' . $file) && strpos($file, 'learn') !== false && preg_match('/\d+/', $file)) {
        $learnFileCount++;
    }
}


echo count($arrayJSON)/$learnFileCount; 