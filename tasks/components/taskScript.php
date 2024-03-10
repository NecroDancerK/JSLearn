<?php
require_once "../php/helpers.php";

function escape_tags($string)
{
  $string = str_replace("<", "&lt;", $string);
  $string = str_replace(">", "&gt;", $string);
  return $string;
}


$pdo = getPDO();

$pageId = $_GET['task'];


$query = "SELECT title, task FROM tasks WHERE id = $pageId";
$statement1 = $pdo->query($query);

$results1 = $statement1->fetchAll(PDO::FETCH_ASSOC);

$title = $results1[0]["title"];
$task = $results1[0]["task"];

$RegExp = '/!(.*?)!/';

$RegExpResTask = [];
$RegExpResTitle = [];

preg_match_all($RegExp, $task, $RegExpResTask);
preg_match_all($RegExp, $title, $RegExpResTitle);

$title = escape_tags($title);
$task = escape_tags($task);


$task = preg_replace($RegExp, "<input type=\"text\" class=\"inputTask\">", $task);


for ($i = 0; $i < count($RegExpResTitle[0]); $i++) {
  $title = str_replace($RegExpResTitle[0][$i], "<span class=\"font-bold\">" . $RegExpResTitle[1][$i] . "</span>", $title);
}

$answersStr = implode(" ", $RegExpResTask[1]);

echo "<span class=\"hidden\" id=\"answersStr\">$answersStr</span>";

