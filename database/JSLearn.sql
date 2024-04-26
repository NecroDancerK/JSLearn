-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 26 2024 г., 11:31
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
(1, 10, '{\"1\": \"learned\", \"2\": \"learned\", \"3\": \"learned\", \"4\": \"learned\", \"5\": \"learned\", \"6\": \"learned\", \"7\": \"learned\", \"8\": \"learned\", \"9\": \"learned\", \"10\": \"learned\", \"12\": \"learned\", \"13\": \"learned\", \"15\": \"learned\", \"17\": \"learned\"}'),
(2, 3, '{\"1\": \"learned\", \"2\": \"learned\"}'),
(3, 2, '{\"1\": \"learned\", \"2\": \"learned\", \"3\": \"learned\", \"4\": \"learned\", \"17\": \"learned\"}');

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
(5, 2, '{\"3\": \"done\", \"7\": \"done\", \"8\": \"done\", \"9\": \"done\", \"10\": \"done\", \"11\": \"done\", \"13\": \"done\", \"19\": \"done\", \"20\": \"done\", \"21\": \"done\", \"22\": \"done\"}');

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
(4, 'Испытание знаний JavaScript: Функциональный лабиринт', 2, '{\"1\": {\"1\": \"Конструкция для создания объектов\", \"2\": \"Фрагмент кода, который выполняет определенную задачу и может быть вызван по необходимости\", \"3\": \"Переменная, содержащая набор инструкций\", \"4\": \"Специальный тип данных для хранения чисел\", \"question\": \"Что такое функция в JavaScript?\", \"rigthAnswer\": \"2\"}, \"2\": {\"1\": \"function myFunction() {}\", \"2\": \"let myFunction = function() {}\", \"3\": \"const myFunction = () => {}\", \"4\": \"Все варианты выше\", \"question\": \"Как объявить функцию в JavaScript?\", \"rigthAnswer\": \"1\"}, \"3\": {\"1\": \"Элементы, которые функция возвращает\", \"2\": \"Аргументы, переданные функции при её вызове\", \"3\": \"Внутренние переменные функции\", \"4\": \"Специальные ключевые слова для определения области видимости\", \"question\": \"Что такое параметры функции?\", \"rigthAnswer\": \"2\"}, \"4\": {\"1\": \"myFunction()\", \"2\": \"call myFunction()\", \"3\": \"invoke myFunction()\", \"4\": \"run myFunction()\", \"question\": \"Как можно вызвать функцию в JavaScript?\", \"rigthAnswer\": \"1\"}, \"5\": {\"1\": \"Значение, переданное функции при вызове\", \"2\": \"Значение, которое функция передает обратно при её завершении\", \"3\": \"Специальный тип данных для хранения строк\", \"4\": \"Результат выполнения условия внутри функции\", \"question\": \"Что такое возвращаемое значение функции?\", \"rigthAnswer\": \"2\"}, \"6\": {\"1\": \"Функции, которые не имеют имени\", \"2\": \"Функции, которые могут быть вызваны только один раз\", \"3\": \"Функции, которые автоматически вызываются при запуске программы\", \"4\": \"Функции, которые имеют доступ к глобальной области видимости\", \"question\": \"Что такое анонимные функции в JavaScript?\", \"rigthAnswer\": \"1\"}, \"7\": {\"1\": \"Передать имя функции в виде строки\", \"2\": \"Создать объект функции и передать его\", \"3\": \"Использовать функциональное выражение\", \"4\": \"Использовать функциональное выражение в качестве аргумента\", \"question\": \"Как можно передать функцию в качестве аргумента в другую функцию?\", \"rigthAnswer\": \"4\"}, \"8\": {\"1\": \"Специальная функция, выполняющаяся после завершения другой функции\", \"2\": \"Функция, которая может быть вызвана только внутри другой функции\", \"3\": \"Возможность функции получать доступ к области видимости внешней функции, даже после того, как внешняя функция завершилась\", \"4\": \"Ошибка, возникающая при попытке вызвать несуществующую функцию\", \"question\": \"Что такое замыкание (closure) в JavaScript?\", \"rigthAnswer\": \"3\"}, \"9\": {\"1\": \"Использовать ключевое слово \", \"2\": \"Определить функцию внутри другой функции и вернуть её\", \"3\": \"Создать объект функции с вложенными методами\", \"4\": \"Использовать ключевое слово \", \"question\": \"Как можно создать замыкание в JavaScript?\", \"rigthAnswer\": \"2\"}, \"10\": {\"1\": \"Процесс, при котором функция вызывает саму себя\", \"2\": \"Процесс, при котором функция вызывает другую функцию\", \"3\": \"Ошибка, возникающая при попытке вызвать функцию слишком много раз\", \"4\": \"Процесс, при котором функция выполняется только один раз\", \"question\": \"Что такое рекурсия в JavaScript?\", \"rigthAnswer\": \"1\"}}'),
(8, 'Тест на переменные в JavaScript', 1, '{\"1\": {\"1\": \"Место в памяти для хранения данных.\", \"2\": \"Функция для выполнения операций с данными.\", \"3\": \"Элемент массива.\", \"4\": \"Циклическая конструкция.\", \"question\": \"Что такое переменная в JavaScript?\", \"rigthAnswer\": \"1\"}, \"2\": {\"1\": \"variable x;\", \"2\": \"varl x;\", \"3\": \"x = variable;\", \"4\": \"let x;\", \"question\": \"Как объявить переменную в JavaScript?\", \"rigthAnswer\": \"4\"}, \"3\": {\"1\": \"let и var\", \"2\": \"variable и value\", \"3\": \"set и get\", \"4\": \"int и float\", \"question\": \"Какие ключевые слова используются для объявления переменных в JavaScript?\", \"rigthAnswer\": \"1\"}, \"4\": {\"1\": \"null\", \"2\": \"undefined\", \"3\": \"0\", \"4\": \"NaN\", \"question\": \"Какое значение имеет переменная по умолчанию, если ей не присвоено никакого значения?\", \"rigthAnswer\": \"2\"}, \"5\": {\"1\": \"changeValue(5);\", \"2\": \"x.setValue(5);\", \"3\": \"x = 5;\", \"4\": \"setValue = 5;\", \"question\": \"Как изменить значение переменной в JavaScript?\", \"rigthAnswer\": \"3\"}, \"6\": {\"1\": \"Да\", \"2\": \"Нет\", \"3\": \"Только для числовых переменных\", \"4\": \"Только для строковых переменных\", \"question\": \"Можно ли изменить тип переменной после ее объявления?\", \"rigthAnswer\": \"2\"}, \"7\": {\"1\": \"Место, где можно получить доступ к переменной.\", \"2\": \"Значение переменной в данный момент времени.\", \"3\": \"Способность переменной к изменению.\", \"4\": \"Срок жизни переменной.\", \"question\": \"Что такое область видимости переменной в JavaScript?\", \"rigthAnswer\": \"1\"}, \"8\": {\"1\": \"==\", \"2\": \"===\", \"3\": \"!=\", \"4\": \"!==\", \"question\": \"Какой оператор используется для строгого равенства по значению и типу?\", \"rigthAnswer\": \"2\"}, \"9\": {\"1\": \"parseInt()\", \"2\": \"parseFloat()\", \"3\": \"Number()\", \"4\": \"toString()\", \"question\": \"Какая функция используется для преобразования строки в число?\", \"rigthAnswer\": \"1\"}, \"10\": {\"1\": \"getType(myVariable)\", \"2\": \"myVariable.type()\", \"3\": \"myVariable.getType()\", \"4\": \"typeof myVariable\", \"question\": \"Как проверить тип данных переменной в JavaScript?\", \"rigthAnswer\": \"4\"}}'),
(10, 'Операторский квиз: Преодоление JavaScript', 3, '{\"1\": {\"1\": \"&&\", \"2\": \"||\", \"3\": \"%\", \"4\": \"+\", \"question\": \"Что из следующего является арифметическим оператором в JavaScript?\", \"rigthAnswer\": \"4\"}, \"2\": {\"1\": \"==\", \"2\": \"===\", \"3\": \"=\", \"4\": \"!=\", \"question\": \"Какой оператор используется для сравнения значения и типа?\", \"rigthAnswer\": \"2\"}, \"3\": {\"1\": \"--\", \"2\": \"++\", \"3\": \"+=\", \"4\": \"-=\", \"question\": \"Какой оператор используется для инкрементирования значения переменной на 1?\", \"rigthAnswer\": \"2\"}, \"4\": {\"1\": \"+\", \"2\": \"++\", \"3\": \"+=\", \"4\": \"String()\", \"question\": \"Какой оператор используется для конкатенации строк?\", \"rigthAnswer\": \"1\"}, \"5\": {\"1\": \"==\", \"2\": \"===\", \"3\": \"=\", \"4\": \"!=\", \"question\": \"Какой оператор используется для проверки на равенство, но без учета типа данных?\", \"rigthAnswer\": \"1\"}, \"6\": {\"1\": \"==\", \"2\": \"+=\", \"3\": \"===\", \"4\": \"=>\", \"question\": \"Какой оператор используется для сокращенного присваивания?\", \"rigthAnswer\": \"2\"}, \"7\": {\"1\": \"&&\", \"2\": \"||\", \"3\": \"!\", \"4\": \"&\", \"question\": \"Какой оператор используется для логического И?\", \"rigthAnswer\": \"1\"}, \"8\": {\"1\": \"&&\", \"2\": \"||\", \"3\": \"!\", \"4\": \"&\", \"question\": \"Какой оператор используется для логического ИЛИ?\", \"rigthAnswer\": \"2\"}, \"9\": {\"1\": \"for\", \"2\": \"while\", \"3\": \"if\", \"4\": \"switch\", \"question\": \"Какой оператор используется для проверки условия и выполнения различных действий в зависимости от результата?\", \"rigthAnswer\": \"3\"}, \"10\": {\"1\": \"if\", \"2\": \"while\", \"3\": \"for\", \"4\": \"else\", \"question\": \"Какой оператор используется для проверки условия и выполнения действия, если условие ложно?\", \"rigthAnswer\": \"4\"}, \"11\": {\"1\": \"if\", \"2\": \"else\", \"3\": \"switch\", \"4\": \"while\", \"question\": \"Какой оператор используется для проверки нескольких условий и выполнения действия в зависимости от результата?\", \"rigthAnswer\": \"3\"}, \"12\": {\"1\": \"typeof\", \"2\": \"Type()\", \"3\": \"typeof\", \"4\": \"type()\", \"question\": \"Какой оператор используется для определения типа данных?\", \"rigthAnswer\": \"3\"}, \"13\": {\"1\": \".\", \"2\": \"::\", \"3\": \":\", \"4\": \"in\", \"question\": \"Какой оператор используется для проверки наличия свойства в объекте?\", \"rigthAnswer\": \"4\"}, \"14\": {\"1\": \".\", \"2\": \"::\", \"3\": \":\", \"4\": \"in\", \"question\": \"Какой оператор используется для доступа к свойствам и методам объекта?\", \"rigthAnswer\": \"1\"}, \"15\": {\"1\": \"ney\", \"2\": \"new\", \"3\": \"create\", \"4\": \"instance\", \"question\": \"Какой оператор используется для создания нового экземпляра объекта?\", \"rigthAnswer\": \"2\"}}'),
(11, 'Тест на типы данных: Путеводитель по JavaScript', 4, '{\"1\": {\"1\": \"Object\", \"2\": \"String\", \"3\": \"Array\", \"4\": \"Function\", \"question\": \"Какой из следующих типов данных является примитивным в JavaScript?\", \"rigthAnswer\": \"2\"}, \"2\": {\"1\": \"Float\", \"2\": \"Number\", \"3\": \"Boolean\", \"4\": \"String\", \"question\": \"Какой тип данных используется для хранения целочисленных значений?\", \"rigthAnswer\": \"2\"}, \"3\": {\"1\": \"Number\", \"2\": \"String\", \"3\": \"Boolean\", \"4\": \"Array\", \"question\": \"Какой тип данных используется для хранения булевых значений?\", \"rigthAnswer\": \"3\"}, \"4\": {\"1\": \"Object\", \"2\": \"Number\", \"3\": \"String\", \"4\": \"Boolean\", \"question\": \"Какой тип данных используется для хранения последовательности символов?\", \"rigthAnswer\": \"3\"}, \"5\": {\"1\": \"undefined\", \"2\": \"null\", \"3\": \"NaN\", \"4\": \"void\", \"question\": \"Какой тип данных используется для хранения неопределенных значений?\", \"rigthAnswer\": \"1\"}, \"6\": {\"1\": \"Object\", \"2\": \"Boolean\", \"3\": \"NaN\", \"4\": \"Undefined\", \"question\": \"Какой тип данных используется для хранения значений, которые не являются числами (Not a Number)?\", \"rigthAnswer\": \"3\"}, \"7\": {\"1\": \"Object\", \"2\": \"String\", \"3\": \"Number\", \"4\": \"Array\", \"question\": \"Какой тип данных используется для хранения ссылок на объекты?\", \"rigthAnswer\": \"1\"}, \"8\": {\"1\": \"Undefined\", \"2\": \"Null\", \"3\": \"NaN\", \"4\": \"Boolean\", \"question\": \"Какой тип данных используется для хранения пустого значения?\", \"rigthAnswer\": \"2\"}, \"9\": {\"1\": \"Object\", \"2\": \"Array\", \"3\": \"String\", \"4\": \"Boolean\", \"question\": \"Какой тип данных используется для хранения упорядоченных списков элементов?\", \"rigthAnswer\": \"2\"}, \"10\": {\"1\": \"Object\", \"2\": \"Array\", \"3\": \"String\", \"4\": \"Function\", \"question\": \"Какой тип данных используется для хранения функций?\", \"rigthAnswer\": \"4\"}}'),
(12, 'Тестирование функций: Изучение JavaScript', 2, '{\"1\": {\"1\": \"Структура данных для хранения информации.\", \"2\": \"Блок кода, который выполняет определенную задачу.\", \"3\": \"Объект, содержащий методы и свойства.\", \"4\": \"Переменная, содержащая строку.\", \"question\": \"Что такое функция в JavaScript?\", \"rigthAnswer\": \"2\"}, \"2\": {\"1\": \"def myFunction() {}\", \"2\": \"function myFunction() {}\", \"3\": \"void myFunction() {}\", \"4\": \"new myFunction() {}\", \"question\": \"Как объявить функцию в JavaScript?\", \"rigthAnswer\": \"2\"}, \"3\": {\"1\": \"В круглых скобках при объявлении функции.\", \"2\": \"В квадратных скобках при объявлении функции.\", \"3\": \"В фигурных скобках при объявлении функции.\", \"4\": \"В угловых скобках при объявлении функции.\", \"question\": \"Как передать параметры в функцию в JavaScript?\", \"rigthAnswer\": \"1\"}, \"4\": {\"1\": \"Используя оператор return.\", \"2\": \"Используя оператор break.\", \"3\": \"Используя оператор return, за которым следует значение.\", \"4\": \"Используя оператор yield.\", \"question\": \"Как вернуть значение из функции в JavaScript?\", \"rigthAnswer\": \"3\"}, \"5\": {\"1\": \"Функция, которая не имеет имени.\", \"2\": \"Функция, которая не принимает параметры.\", \"3\": \"Функция, которая не имеет имени и объявляется без имени.\", \"4\": \"Функция, которая не возвращает значение.\", \"question\": \"Что такое анонимная функция в JavaScript?\", \"rigthAnswer\": \"3\"}, \"6\": {\"1\": \"myFunction();\", \"2\": \"ИмяФункции();\", \"3\": \"call myFunction();\", \"4\": \"run myFunction();\", \"question\": \"Как вызвать функцию в JavaScript?\", \"rigthAnswer\": \"2\"}, \"7\": {\"1\": \"Значения, передаваемые функции для выполнения определенных действий.\", \"2\": \"Внутренние переменные функции.\", \"3\": \"Значения, возвращаемые функцией.\", \"4\": \"Методы, применяемые к функции.\", \"question\": \"Что такое параметры функции в JavaScript?\", \"rigthAnswer\": \"1\"}, \"8\": {\"1\": \"Область, в которой переменная доступна для использования.\", \"2\": \"Список переменных, объявленных в функции.\", \"3\": \"Область, в которой переменная определена.\", \"4\": \"Список функций, в которых переменная используется.\", \"question\": \"Что такое область видимости переменных в JavaScript?\", \"rigthAnswer\": \"1\"}, \"9\": {\"1\": \"Возможность функции вызывать саму себя.\", \"2\": \"Процесс, при котором функция вызывает саму себя внутри своего тела.\", \"3\": \"Специальный вид анонимных функций.\", \"4\": \"Метод, позволяющий проверить, вызывалась ли функция ранее.\", \"question\": \"Что такое рекурсия в JavaScript?\", \"rigthAnswer\": \"2\"}, \"10\": {\"1\": \"parseInt()\", \"2\": \"parseFloat()\", \"3\": \"Number()\", \"4\": \"Все вышеперечисленные\", \"question\": \"Какая функция используется для преобразования строки в число в JavaScript?\", \"rigthAnswer\": \"4\"}}'),
(13, 'Тест на объекты: Путеводитель по JavaScript', 5, '{\"1\": {\"1\": \"Примитивный тип данных.\", \"2\": \"Структура данных, которая содержит свойства и методы.\", \"3\": \"Функция для создания экземпляров.\", \"4\": \"Отдельный блок кода.\", \"question\": \"Что такое объект в JavaScript?\", \"rigthAnswer\": \"2\"}, \"2\": {\"1\": \"С помощью фигурных скобок {} и ключевого слова new.\", \"2\": \"С помощью круглых скобок ().\", \"3\": \"С помощью квадратных скобок [].\", \"4\": \"С помощью ключевого слова object.\", \"question\": \"Как объявить объект в JavaScript?\", \"rigthAnswer\": \"1\"}, \"3\": {\"1\": \"()\", \"2\": \"[]\", \"3\": \"{}\", \"4\": \"<>\", \"question\": \"Какие символы используются для обозначения свойств объекта в JavaScript?\", \"rigthAnswer\": \"3\"}, \"4\": {\"1\": \"Используя круглые скобки ().\", \"2\": \"Используя квадратные скобки [].\", \"3\": \"Используя точку .\", \"4\": \"Используя восклицательный знак !.\", \"question\": \"Как получить доступ к свойству объекта в JavaScript?\", \"rigthAnswer\": \"3\"}, \"5\": {\"1\": \"Функция, связанная с объектом.\", \"2\": \"Специальный тип свойства объекта.\", \"3\": \"Специальный тип данных в объекте.\", \"4\": \"Имя объекта.\", \"question\": \"Что такое метод объекта в JavaScript?\", \"rigthAnswer\": \"1\"}, \"6\": {\"1\": \"С помощью ключевого слова add.\", \"2\": \"Присвоением значения новому ключу.\", \"3\": \"Используя функцию newProperty().\", \"4\": \"Через методы объекта.\", \"question\": \"Как добавить новое свойство к объекту в JavaScript?\", \"rigthAnswer\": \"2\"}, \"7\": {\"1\": \"Используя ключевое слово delete.\", \"2\": \"Изменяя значение свойства на null.\", \"3\": \"Изменяя значение свойства на undefined.\", \"4\": \"Используя ключевое слово delete или оператор delete.\", \"question\": \"Как удалить свойство из объекта в JavaScript?\", \"rigthAnswer\": \"4\"}, \"8\": {\"1\": \"Используя функцию copy().\", \"2\": \"Изменяя значение свойств объекта.\", \"3\": \"Присваивая объект другой переменной.\", \"4\": \"Используя Object.assign() или оператор spread (...).\", \"question\": \"Как скопировать объект в JavaScript?\", \"rigthAnswer\": \"4\"}, \"9\": {\"1\": \"Используя оператор has.\", \"2\": \"Используя оператор in.\", \"3\": \"Используя метод check().\", \"4\": \"Используя ключевое слово exists.\", \"question\": \"Как проверить наличие свойства в объекте в JavaScript?\", \"rigthAnswer\": \"2\"}, \"10\": {\"1\": \"С помощью функции object().\", \"2\": \"С помощью функции newObject().\", \"3\": \"С помощью конструктора объекта и ключевого слова new.\", \"4\": \"Присваиванием значений ключам объекта.\", \"question\": \"Как создать новый экземпляр объекта в JavaScript?\", \"rigthAnswer\": \"3\"}}'),
(14, 'Краткий квиз: Знание типов данных в JavaScript', 4, '{\"1\": {\"1\": \"Object\", \"2\": \"Array\", \"3\": \"String\", \"4\": \"Number\", \"question\": \"Какой из следующих типов данных является примитивным в JavaScript?\", \"rigthAnswer\": \"4\"}, \"2\": {\"1\": \"String\", \"2\": \"Number\", \"3\": \"Boolean\", \"4\": \"Object\", \"question\": \"Какой тип данных используется для хранения булевых значений?\", \"rigthAnswer\": \"3\"}, \"3\": {\"1\": \"String\", \"2\": \"Number\", \"3\": \"Boolean\", \"4\": \"Object\", \"question\": \"Какой тип данных используется для хранения последовательности символов?\", \"rigthAnswer\": \"1\"}, \"4\": {\"1\": \"Number\", \"2\": \"Boolean\", \"3\": \"Undefined\", \"4\": \"Object\", \"question\": \"Какой тип данных используется для хранения неопределенных значений?\", \"rigthAnswer\": \"3\"}, \"5\": {\"1\": \"Boolean\", \"2\": \"Undefined\", \"3\": \"NaN\", \"4\": \"Object\", \"question\": \"Какой тип данных используется для хранения значений, которые не являются числами (Not a Number)?\", \"rigthAnswer\": \"3\"}}'),
(15, 'Тест на операторы: Изучение JavaScript', 3, '{\"1\": {\"1\": \"==\", \"2\": \"===\", \"3\": \"!=\", \"4\": \"!=\", \"question\": \"Какой оператор используется для сравнения значений без учета типа данных?\", \"rigthAnswer\": \"1\"}, \"2\": {\"1\": \"&&\", \"2\": \"||\", \"3\": \"!\", \"4\": \"&\", \"question\": \"Какой оператор используется для выполнения логического И в JavaScript?\", \"rigthAnswer\": \"1\"}, \"3\": {\"1\": \"&&\", \"2\": \"||\", \"3\": \"!\", \"4\": \"&\", \"question\": \"Какой оператор используется для выполнения логического ИЛИ в JavaScript?\", \"rigthAnswer\": \"2\"}, \"4\": {\"1\": \"==\", \"2\": \"===\", \"3\": \"=\", \"4\": \":=\", \"question\": \"Какой оператор используется для присваивания значения переменной в JavaScript?\", \"rigthAnswer\": \"3\"}, \"5\": {\"1\": \"+\", \"2\": \"++\", \"3\": \"+=\", \"4\": \"--\", \"question\": \"Какой оператор используется для увеличения значения переменной на 1?\", \"rigthAnswer\": \"2\"}, \"6\": {\"1\": \"+\", \"2\": \"++\", \"3\": \"-=\", \"4\": \"--\", \"question\": \"Какой оператор используется для вычитания значения переменной на 1?\", \"rigthAnswer\": \"3\"}, \"7\": {\"1\": \"?\", \"2\": \"?:\", \"3\": \":\", \"4\": \"!?\", \"question\": \"Какой оператор используется для выполнения условного (тернарного) оператора в JavaScript?\", \"rigthAnswer\": \"2\"}, \"8\": {\"1\": \"+\", \"2\": \"++\", \"3\": \"+=\", \"4\": \".\", \"question\": \"Какой оператор используется для конкатенации строк в JavaScript?\", \"rigthAnswer\": \"1\"}, \"9\": {\"1\": \"typeof\", \"2\": \"Type()\", \"3\": \"type()\", \"4\": \"typeof()\", \"question\": \"Какой оператор используется для определения типа данных в JavaScript?\", \"rigthAnswer\": \"1\"}, \"10\": {\"1\": \".\", \"2\": \"::\", \"3\": \":\", \"4\": \"in\", \"question\": \"Какой оператор используется для проверки наличия свойства в объекте?\", \"rigthAnswer\": \"4\"}}'),
(16, 'Тест на объект Math: Исследование JavaScript', 6, '{\"1\": {\"1\": \"min()\", \"2\": \"ceil()\", \"3\": \"floor()\", \"4\": \"round()\", \"question\": \"Какой метод объекта Math используется для нахождения наименьшего целого числа, большего или равного заданному числу?\", \"rigthAnswer\": \"2\"}, \"2\": {\"1\": \"sqrt()\", \"2\": \"pow()\", \"3\": \"sqrt()\", \"4\": \"root()\", \"question\": \"Какой метод объекта Math используется для нахождения квадратного корня числа?\", \"rigthAnswer\": \"3\"}, \"3\": {\"1\": \"PI()\", \"2\": \"pi()\", \"3\": \"pie()\", \"4\": \"Math.PI\", \"question\": \"Какой метод объекта Math используется для нахождения значения числа Пи (π)?\", \"rigthAnswer\": \"1\"}, \"4\": {\"1\": \"randomInt()\", \"2\": \"randomNumber()\", \"3\": \"random()\", \"4\": \"generateRandom()\", \"question\": \"Какой метод объекта Math используется для генерации псевдослучайного числа между 0 (включительно) и 1 (не включительно)?\", \"rigthAnswer\": \"3\"}, \"5\": {\"1\": \"absolute()\", \"2\": \"abs()\", \"3\": \"modulus()\", \"4\": \"fabs()\", \"question\": \"Какой метод объекта Math используется для нахождения абсолютного значения числа?\", \"rigthAnswer\": \"2\"}}'),
(17, 'Переменный блиц: Знание JavaScript', 1, '{\"1\": {\"1\": \"let myVar;\", \"2\": \"const myVar;\", \"3\": \"var myVar;\", \"4\": \"Все вышеперечисленные варианты.\", \"question\": \"Как объявить переменную в JavaScript?\", \"rigthAnswer\": \"4\"}, \"2\": {\"1\": \"+=\", \"2\": \"==\", \"3\": \"=\", \"4\": \"===\", \"question\": \"Какой оператор используется для присваивания значения переменной в JavaScript?\", \"rigthAnswer\": \"3\"}, \"3\": {\"1\": \"let myConst;\", \"2\": \"const myConst;\", \"3\": \"var myConst;\", \"4\": \"const = myConst;\", \"question\": \"Как объявить константу в JavaScript?\", \"rigthAnswer\": \"2\"}, \"4\": {\"1\": \"Null\", \"2\": \"Notdefined\", \"3\": \"Undefined\", \"4\": \"NaN\", \"question\": \"Какой тип данных у переменной, которая не была инициализирована?\", \"rigthAnswer\": \"3\"}, \"5\": {\"1\": \"delete myVar;\", \"2\": \"myVar = null;\", \"3\": \"Нельзя удалить переменную в JavaScript.\", \"4\": \"myVar = undefined;\", \"question\": \"Как удалить переменную в JavaScript?\", \"rigthAnswer\": \"3\"}}'),
(18, 'Тест на объекты: Глубины JavaScript', 5, '{\"1\": {\"1\": \"let obj = {};\", \"2\": \"let obj = ();\", \"3\": \"let obj = [];\", \"4\": \"let obj = \\\"\\\";\", \"question\": \"Как создать пустой объект в JavaScript?\", \"rigthAnswer\": \"1\"}, \"2\": {\"1\": \"person.addProperty(\\\"name\\\", \\\"John\\\");\", \"2\": \"person.name = \\\"John\\\";\", \"3\": \"person.setProperty(\\\"name\\\", \\\"John\\\");\", \"4\": \"person[\\\"name\\\"] = \\\"John\\\";\", \"question\": \"Как добавить свойство \\\"name\\\" со значением \\\"John\\\" в объект \\\"person\\\"?\", \"rigthAnswer\": \"2\"}, \"3\": {\"1\": \"person.get(\\\"age\\\");\", \"2\": \"person.age;\", \"3\": \"person.getProperty(\\\"age\\\");\", \"4\": \"person[\\\"age\\\"];\", \"question\": \"Как получить значение свойства \\\"age\\\" объекта \\\"person\\\"?\", \"rigthAnswer\": \"2\"}, \"4\": {\"1\": \"delete user.email;\", \"2\": \"user.remove(\\\"email\\\");\", \"3\": \"user.deleteProperty(\\\"email\\\");\", \"4\": \"user.email = null;\", \"question\": \"Как удалить свойство \\\"email\\\" из объекта \\\"user\\\"?\", \"rigthAnswer\": \"1\"}, \"5\": {\"1\": \"location.has(\\\"city\\\");\", \"2\": \"location.isProperty(\\\"city\\\");\", \"3\": \"\\\"city\\\" in location;\", \"4\": \"location.contains(\\\"city\\\");\", \"question\": \"Как проверить наличие свойства \\\"city\\\" в объекте \\\"location\\\"?\", \"rigthAnswer\": \"3\"}}');

-- --------------------------------------------------------

--
-- Структура таблицы `tests_progress`
--

CREATE TABLE `tests_progress` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `done_tests` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tests_progress`
--

INSERT INTO `tests_progress` (`id`, `user_id`, `done_tests`) VALUES
(1, 2, '[]'),
(2, 10, '{\"4\": \"10\", \"8\": \"4\", \"14\": \"4\"}');

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
(2, 'Функции в JavaScript'),
(3, 'Операторы в JavaScript'),
(4, 'Типы данных в JavaScript'),
(5, 'Объекты в JavaScript'),
(6, 'Объект Math в JavaScript');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_theme_id` (`test_theme_id`);

--
-- Индексы таблицы `tests_progress`
--
ALTER TABLE `tests_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `tests_progress`
--
ALTER TABLE `tests_progress`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tests_themes`
--
ALTER TABLE `tests_themes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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

--
-- Ограничения внешнего ключа таблицы `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`test_theme_id`) REFERENCES `tests_themes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tests_progress`
--
ALTER TABLE `tests_progress`
  ADD CONSTRAINT `tests_progress_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
