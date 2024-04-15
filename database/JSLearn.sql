-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 08 2024 г., 18:29
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `JSLearn`
--

-- --------------------------------------------------------

--
-- Структура таблицы `learn_progress`
--

CREATE TABLE `learn_progress` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `studied_topics` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `learn_progress`
--

INSERT INTO `learn_progress` (`id`, `user_id`, `studied_topics`) VALUES
(1, 10, '{\"1\": \"learned\", \"2\": \"learned\"}'),
(2, 3, '{\"1\": \"learned\", \"2\": \"learned\"}');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int NOT NULL,
  `task_number` int NOT NULL,
  `task_theme_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `task` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `task_number`, `task_theme_id`, `title`, `task`) VALUES
(3, 3, 1, 'Отобразите сумму !5 + 10!, используя две переменные: !x! и !y!.', 'let !x! = !5!;\r\nlet y = 10;\r\ndocument.getElementById(\"demo\").innerHTML = !x! !+! y;'),
(5, 5, 1, 'В одной строке объявите три переменные со следующими именами и значениями:        \r\n\r\n!firstName = \"John\"!\r\n!lastName = \"Doe\"!\r\n!age = 35! ', 'let !firstName! = \"John\"!,! lastName = !\"Doe\",! !age! = !35!;'),
(7, 1, 3, 'Используйте комментарии, чтобы описать правильный тип данных следующих переменных:', 'let length = 16;          // !Number!\r\nlet lastName = \"Johnson\"; // !String!\r\nconst x = {\r\n  firstName: \"John\",\r\n  lastName: \"Doe\"\r\n};                        // !Object!'),
(8, 2, 2, 'Разделите !10! на !2! и выведите результат в alert:', 'alert(10 !/! 2);'),
(9, 3, 2, 'Выведите в alert !остаток от деления! 15 на 9.', 'alert(15 !%! 9); '),
(10, 4, 2, 'Используйте правильный !оператор присваивания!, который приведет к тому, что x будет равно 15 (так же, как x = x + y).', '!x! = 10;\r\ny !=! 5;\r\nx !+=! y;'),
(11, 5, 2, 'Используйте правильный !оператор присваивания!, который приведет к тому, что x будет равно 50 (так же, как x = x * y).', 'x = 10;\r\ny = 5;\r\nx !*=! y;'),
(12, 1, 4, 'Выполните функцию с именем !myFunction.!', 'function myFunction() {\r\n  alert(\"Hello World!\");\r\n}\r\n!myFunction()!;'),
(13, 2, 4, 'Создайте функцию под названием «myFunction».', '!function! !myFunction()! !{!\r\nalert(\"Hello World!\");\r\n!}!\r\n'),
(14, 3, 4, 'Заставьте функцию возвращать «Привет».', 'function myFunction() {\r\n!return! \"!Привет!\";\r\n}\r\ndocument.getElementById(\"demo\").innerHTML = myFunction();'),
(15, 4, 4, 'Сделайте так, чтобы функция отображала «Привет» во внутреннем HTML-коде элемента с идентификатором «demo».', 'function myFunction() {\r\n  document.!getElementById!(\"demo\").!innerHTML! = \"Привет\";\r\n}'),
(16, 1, 14, 'Элемент <button> должен что-то делать, когда кто-то нажимает на него. Попробуйте это исправить!', '<button !onclick!=\"alert(\'Hello\')\">Click me.</button>'),
(18, 5, 4, 'Выведите в консоль !\"Привет, мир!\"!', '!console.log!(\"Привет, мир!\");'),
(19, 1, 2, 'Умножьте !10! на !5! и выведите результат в alert:', 'alert(10 !*! 5);'),
(20, 2, 1, 'Создайте переменную с именем !x!, присвойте ей значение !77!.', 'let !x! = !77!'),
(21, 1, 1, 'Создайте переменную с именем !carName!, присвойте ей значение !BMW!.', 'let !carName! = \"!BMW!\".'),
(22, 4, 1, 'Создайте переменную с именем !z!, присвойте ей !x + y! и выведите результат в !alert!.', 'let x = 5;\r\nlet y = 10;\r\n!let! !z! = x + y;\r\n!alert!(z);');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks_progress`
--

CREATE TABLE `tasks_progress` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `done_tasks` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tasks_progress`
--

INSERT INTO `tasks_progress` (`id`, `user_id`, `done_tasks`) VALUES
(1, 10, '{\"3\": \"done\", \"7\": \"done\", \"8\": \"done\", \"9\": \"done\", \"10\": \"done\", \"11\": \"done\", \"12\": \"done\", \"14\": \"done\", \"15\": \"done\", \"16\": \"done\", \"19\": \"done\", \"20\": \"done\", \"21\": \"done\", \"22\": \"done\"}'),
(2, 4, '{\"20\": \"done\"}'),
(3, 5, '[]'),
(4, 3, '{\"3\": \"done\", \"12\": \"done\", \"19\": \"done\", \"20\": \"done\", \"21\": \"done\", \"22\": \"done\"}'),
(5, 2, '{\"8\": \"done\", \"19\": \"done\", \"21\": \"done\", \"22\": \"done\"}');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks_themes`
--

CREATE TABLE `tasks_themes` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tasks_themes`
--

INSERT INTO `tasks_themes` (`id`, `name`) VALUES
(1, 'Переменные в JavaScript'),
(2, 'Операторы в JavaScript'),
(3, 'Типы данных в JavaScript'),
(4, 'Функции в JavaScript '),
(13, 'Объекты в JavaScript'),
(14, 'События в Javascript');

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

CREATE TABLE `tests` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `test_theme_id` int NOT NULL,
  `questions` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tests`
--

INSERT INTO `tests` (`id`, `title`, `test_theme_id`, `questions`) VALUES
(1, 'Испытание знаний JavaScript: Функциональный лабиринт', 2, '{\"1\": {\"1\": \"Конструкция для создания объектов\", \"2\": \"Фрагмент кода, который выполняет определенную задачу и может быть вызван по необходимости\", \"3\": \"Переменная, содержащая набор инструкций\", \"4\": \"Специальный тип данных для хранения чисел\", \"question\": \"Что такое функция в JavaScript?\", \"rigthAnswer\": \"2\"}}');

-- --------------------------------------------------------

--
-- Структура таблицы `tests_progress`
--

CREATE TABLE `tests_progress` (
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `tests_themes`
--

CREATE TABLE `tests_themes` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tests_themes`
--

INSERT INTO `tests_themes` (`id`, `name`) VALUES
(1, 'Переменные в JavaScript'),
(2, 'Функции в JavaScript');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `password`, `is_admin`) VALUES
(1, 'Кожахметов Никита', 'nikitakozahmetov@gmail.com', 'uploads/avatar_1708440158.jpg', '$2y$10$2b6VY3zqlSL9EGIaWYvVVOBIoZQN0YcREAiGE.NhG/8YBTpLnFU4O', 0),
(2, '123', '123@gmail.com', 'uploads/avatar_1708440616.jpg', '$2y$10$opBOoL7AzQPoYa3H5o9reunPK3HCz1IQkZf6Xm9pq3dW8kehogDR.', 0),
(3, '1234', '1234@gmail.com', 'uploads/avatar_1709110180.jpg', '$2y$10$cqI7AkNf1VDNoHdPCBR5ye.MHaSAzS9Jcymhm.HwZWSGQZOj29d0u', 0),
(4, 'Некит', 'nekit@gmail.com', 'uploads/avatar_1709193440.jpg', '$2y$10$j2n48U7lztni.ZzvBf4gxuTVSo1xXvikxI0hleNgY4lockqGHm6dq', 0),
(5, 'Никита Кожахметов', 'JSLearn@gmail.com', 'uploads/avatar_1709292355.jpg', '$2y$10$hmsFnYlqTHwZLM0enBR7ne3tGitMBIV.qIETvuAG0iFrSucOhw.Fq', 1),
(10, 'IDDQD', 'IDDQD@gmail.com', 'uploads/avatar_1709791890.jpg', '$2y$10$td5VGS3m9tzwwaQUTNPYV.brMAiYOe77hYbRCJygeBz6NkOLEH0dG', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `learn_progress`
--
ALTER TABLE `learn_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_task_themes` (`task_theme_id`);

--
-- Индексы таблицы `tasks_progress`
--
ALTER TABLE `tasks_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `tasks_themes`
--
ALTER TABLE `tasks_themes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tests_themes`
--
ALTER TABLE `tests_themes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `learn_progress`
--
ALTER TABLE `learn_progress`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `tasks_progress`
--
ALTER TABLE `tasks_progress`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tasks_themes`
--
ALTER TABLE `tasks_themes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tests_themes`
--
ALTER TABLE `tests_themes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `learn_progress`
--
ALTER TABLE `learn_progress`
  ADD CONSTRAINT `learn_progress_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_task_themes` FOREIGN KEY (`task_theme_id`) REFERENCES `tasks_themes` (`id`);

--
-- Ограничения внешнего ключа таблицы `tasks_progress`
--
ALTER TABLE `tasks_progress`
  ADD CONSTRAINT `tasks_progress_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
