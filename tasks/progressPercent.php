<?php 

require_once __DIR__ . '../../php/helpers.php';

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


echo count($arrayJSON)/$tasksCount["tasksCount"];