<?php 

require_once __DIR__ . '../../php/helpers.php';

$user = currentUser();

$pdo = getPDO();

$userId = $user["id"];

$stmt1 = $pdo->prepare("SELECT done_tasks FROM tasks_progress WHERE user_id = :user_id");
$stmt1->bindParam(':user_id', $userId);

$stmt1->execute();
$row = $stmt1->fetch();

$data = json_decode($row['done_tasks'], true);

$arrayJSON = array_keys($data);

$arrayTasks = [];

$stmt1 = $pdo->prepare("SELECT COUNT(*) as tasksCount FROM tasks");
$stmt1->execute();
$tasksCount = $stmt1->fetch(PDO::FETCH_ASSOC);


echo count($arrayJSON)/$tasksCount["tasksCount"];