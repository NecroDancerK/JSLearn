-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3305
-- Время создания: Мар 07 2024 г., 13:45
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
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id` int NOT NULL,
  `questions_id` int NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `score` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `test_id` int NOT NULL,
  `question` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `results`
--

CREATE TABLE `results` (
  `id` int NOT NULL,
  `test_id` int NOT NULL,
  `score_min` int NOT NULL,
  `score_max` int NOT NULL,
  `result` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
(1, 1, 1, 'Создайте переменную с именем !carName!, присвойте ей значение !Volvo!. ', 'let !carName! = \"!Volvo!\"'),
(2, 2, 1, 'Создайте переменную с именем !x!, присвойте ей значение !50!. ', 'let !x! = \"!50!\"'),
(3, 3, 1, 'Отобразите сумму !5 + 10!, используя две переменные: !x! и !y!.', 'let !x! = !5!;\nlet y = 10;\ndocument.getElementById(\"demo\").innerHTML = !x! !+! y;'),
(4, 4, 1, 'Создайте переменную с именем !z!, присвойте ей !x + y! и отобразите результат в окне alert.', 'let x = 5;\nlet y = 10;\n!let! !z! = x + y;\n!alert!(z);'),
(5, 5, 1, 'В одной строке объявите три переменные со следующими именами и значениями:        \n\n!firstName = \"John\"!\n!lastName = \"Doe\"!\n!age = 35! ', 'let !firstName! = \"John\"!,! lastName = !\"Doe\",! !age! = !35!;'),
(6, 1, 2, 'Умножьте !10! на !5! и выведите результат в alert:', 'alert(10 !*! 5);'),
(7, 1, 3, 'Используйте комментарии, чтобы описать правильный тип данных следующих переменных:', 'let length = 16;          // !Number!\nlet lastName = \"Johnson\"; // !String!\nconst x = {\n  firstName: \"John\",\n  lastName: \"Doe\"\n};                        // !Object!'),
(8, 2, 2, 'Разделите !10! на !2! и выведите результат в alert:', 'alert(10 !/! 2);'),
(9, 3, 2, 'Выведите в alert !остаток от деления! 15 на 9.', 'alert(15 !%! 9); '),
(10, 4, 2, 'Используйте правильный !оператор присваивания!, который приведет к тому, что x будет равно 15 (так же, как x = x + y).', 'x = 10;\r\ny = 5;\r\nx !+=! y;'),
(11, 5, 2, 'Используйте правильный !оператор присваивания!, который приведет к тому, что x будет равно 50 (так же, как x = x * y).', 'x = 10;\r\ny = 5;\r\nx !*=! y;'),
(12, 1, 4, 'Выполните функцию с именем !myFunction.!', 'function myFunction() {\r\n  alert(\"Hello World!\");\r\n}\r\n!myFunction()!;'),
(13, 2, 4, 'Создайте функцию под названием «myFunction».', '!function! !myFunction()! !{!\r\nalert(\"Hello World!\");\r\n!}!\r\n'),
(14, 3, 4, 'Заставьте функцию возвращать «Привет».', 'function myFunction() {\r\n!return! \"!Привет!\";\r\n}\r\ndocument.getElementById(\"demo\").innerHTML = myFunction();'),
(15, 4, 4, 'Сделайте так, чтобы функция отображала «Привет» во внутреннем HTML-коде элемента с идентификатором «demo».', 'function myFunction() {\r\n  document.!getElementById!(\"demo\").!innerHTML! = \"Привет\";\r\n}'),
(16, 1, 14, 'Элемент <button> должен что-то делать, когда кто-то нажимает на него. Попробуйте это исправить!', '<button !onclick!=\"alert(\'Hello\')\">Click me.</button>'),
(18, 5, 4, 'Выведите в консоль !\"Привет, мир!\"!', '!console.log!(\"Привет, мир!\");');

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
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tests`
--

INSERT INTO `tests` (`id`, `title`) VALUES
(1, 'test 1'),
(2, 'test 2');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
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
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_task_themes` (`task_theme_id`);

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
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `results`
--
ALTER TABLE `results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `tasks_themes`
--
ALTER TABLE `tasks_themes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_task_themes` FOREIGN KEY (`task_theme_id`) REFERENCES `tasks_themes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
