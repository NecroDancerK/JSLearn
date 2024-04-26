<?php
session_start();
require_once "../php/helpers.php";

// Проверяем, был ли отправлен POST-запрос
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Получаем данные из POST-запроса
  $userAnswers = isset($_POST['answers']) ? $_POST['answers'] : null;

  $_SESSION['userAnswers'] = json_decode($userAnswers);

} else {
  // Если был получен не POST-запрос, возвращаем ошибку
  http_response_code(405); // Метод не разрешен
  echo json_encode(['status' => 'error', 'message' => 'Метод не разрешен']);
}
?>