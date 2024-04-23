<?php 

require_once __DIR__ . '../../php/helpers.php';

$user = currentUser();

$pdo = getPDO();

$userId = $user["id"];

$stmt1 = $pdo->prepare("SELECT done_tests FROM tests_progress WHERE user_id = :user_id");
$stmt1->bindParam(':user_id', $userId);

$stmt1->execute();
$row = $stmt1->fetch();

$data = json_decode($row['done_tests'], true);

$arrayJSON = array_keys($data);

$arrayTests = [];

$stmt1 = $pdo->prepare("SELECT COUNT(*) as testsCount FROM tests");
$stmt1->execute();
$testsCount = $stmt1->fetch(PDO::FETCH_ASSOC);


echo count($arrayJSON)/$testsCount["testsCount"];