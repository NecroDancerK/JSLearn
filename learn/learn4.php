<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '/components/mainHead.php' ?>


<body>

  <?php

  require_once "components/header.php";

  ?>


  <div class="flex justify-between text-center w-full fixed left-0 top-[66px]">
    <a href="learn.php" class=" w-1/4 bg-red-600 p-2 uppercase text-lg text-white font-semibold">Учебник</a>
    <a href="../tasks/tasks1.php"
      class="bg-gray-800 w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Упражнения</a>
    <a href="../tests.php"
      class="bg-gray-800 w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Тесты</a>
    <a href="../playground.php"
      class="bg-gray-800 w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Playground</a>
  </div>
  <aside class="siderbar fixed top-0 left-0 h-full mt-[110px] bg-gray-100 2xl:w-[330px] w-[260px] flex flex-col">
    <div class="scrollbox overflow-auto">
      <div class="scrollbox-inner pb-2" id="sidebar-content">
        <h3 class="text-xl font-bold mb-2 pl-2 mt-4">Глава 1. Введение в JavaScript</h3>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn1.php">
          Что такое JavaScript
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn2.php">
          Первая
          программа на JavaScript
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn3.php">
          Выполнение
          кода Javascript
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn4.php">
          Подключение
          внешнего файла JavaScript
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn5.php">
          Консоль
          браузера и console.log
        </a>
        <h3 class="text-xl font-bold mb-2 pl-2 mt-4">Глава 2. Основы JavaScript</h3>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn6.php">
          Переменные и
          константы
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn7.php">
          Типы
          данных
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn8.php">
          Арифметические
          операции
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn9.php">
          Поразрядные
          операции
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn10.php">
          Условные
          выражения
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn11.php">
          Условные
          операторы ?: и ??
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn12.php">
          Преобразования
          данных
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn13.php">
          Введение в
          массивы
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn14.php">
          Условные
          конструкции
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn15.php">Циклы</a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn16.php">
          Отладка и
          отладчик
        </a>
        <h3 class="text-xl font-bold mb-2 pl-2 mt-4">Глава 3. Функциональное программирование</h3>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn17.php">
          Функции
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn18.php">
          Параметры функции
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn19.php">
          Результат функции
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn20.php">
          Стрелочные функции
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn21.php">
          Область видимости переменных
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn22.php">
          Замыкания и функции IIFE
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn23.php">
          Рекурсивные функции
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn24.php">
          Переопределение функций
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn25.php">
          Hoisting
        </a>
        <a class="block pl-2 py-2  font-semibold hover:bg-neutral-500 hover:text-white" href="learn26.php">
          Передача параметров по значению и по ссылке
        </a>
      </div>
    </div>

  </aside>
  <main class="pt-36 pb-10 mx-auto w-3/5 border px-7">
    <h3 class="text-3xl font-bold mb-6">Первая программа на JavaScript</h3>

    <div class="buttons flex justify-between my-4 text-white font-bold text-lg">
      <a class="bg-red-600 p-3 rounded" href="learn.php" id="btn-prev">Назад</a>
      <a class="bg-red-600 p-3 rounded" href="learn2.php" id="btn-next">Вперед</a>
    </div>

    <div class="font-normal font-serif text-xl mb-10">
      <p>
        Создади ЭТО ЧЕТВЕРТОЕ
      </p>
      <br>
      <p>
        В качестве текстового редактора можно взять любой, который нравится - Atom, Sublime Text, Visual Studio Code,
        Notepad++ и другие. В данном руководстве я буду ориентироваться на бесплатный и многофункциональный текстовый
        редактор <a class="text-blue-600 underline" href="https://code.visualstudio.com/download">Visual Studio
          Code</a>,
        поскольку он является наиболее популярным.
      </p>
      <br>
      <p>
        В качестве браузера также можно взять последние версии любого предпочтительного веб-браузера. В настоящем
        руководстве я буду преимущественно ориентироваться на Google Chrome.
      </p>
      <br>
      <p>
        Для начала определим для нашего приложения какой-нибудь каталог. Например, создадим на диске C папку app. В этой
        папке создадим файл под названием index.html. То есть данный файл будет представлять веб-страницу с кодом HTML.
      </p>
      <br>
      <img src="img/lessons/2/1.12.webp" alt="">
      <br>
      <p>
        Откроем этот файл в текстовом редакторе и определим в файле следующий код:
      </p>
      <br>
      <div id="highlighter_746735" class="syntaxhighlighter  js border pl-6">
        <!-- <div class="toolbar"><span><a href="#" class="toolbar_item command_help help">?</a></span></div> -->
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td class="gutter border-r-2 border-green-700">
                <div class="line number1 index0 alt2">1</div>
                <div class="line number2 index1 alt1">2</div>
                <div class="line number3 index2 alt2">3</div>
                <div class="line number4 index3 alt1">4</div>
                <div class="line number5 index4 alt2">5</div>
                <div class="line number6 index5 alt1">6</div>
                <div class="line number7 index6 alt2">7</div>
                <div class="line number8 index7 alt1">8</div>
                <div class="line number9 index8 alt2">9</div>
                <div class="line number10 index9 alt1">10</div>
                <div class="line number11 index10 alt2">11</div>
                <div class="line number12 index11 alt1">12</div>
              </td>
              <td class="code pl-2">
                <div class="container">
                  <div class="line number1 index0 alt2"><code class="js plain">&lt;!DOCTYPE html&gt;</code></div>
                  <div class="line number2 index1 alt1"><code class="js plain">&lt;html&gt;</code></div>
                  <div class="line number3 index2 alt2"><code class="js plain">&lt;head&gt;</code></div>
                  <div class="line number4 index3 alt1"><code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                      class="js plain">&lt;meta charset=</code><code class="js string">"utf-8"</code> <code
                      class="js plain">/&gt;</code></div>
                  <div class="line number5 index4 alt2"><code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                      class="js plain">&lt;title&gt;JSLearn.com&lt;/title&gt;</code></div>
                  <div class="line number6 index5 alt1"><code class="js plain">&lt;/head&gt;</code></div>
                  <div class="line number7 index6 alt2"><code class="js plain">&lt;body&gt;</code></div>
                  <div class="line number8 index7 alt1"><code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                      class="js plain">&lt;script&gt;</code></div>
                  <div class="line number9 index8 alt2"><code
                      class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                      class="js plain">document.write(</code><code
                      class="js string">"&lt;h2&gt;Первая программа на JavaScript&lt;/h2&gt;"</code><code
                      class="js plain">);</code></div>
                  <div class="line number10 index9 alt1"><code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                      class="js plain">&lt;/script&gt;</code></div>
                  <div class="line number11 index10 alt2"><code class="js plain">&lt;/body&gt;</code></div>
                  <div class="line number12 index11 alt1"><code class="js plain">&lt;/html&gt;</code></div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <br>
      <p>
        Здесь мы определяем стандартные элементы html. В элементе <span class="font-bold">head</span> определяется
        кодировка utf-8 и заголовок (элемент
        title). В элементе <span class="font-bold">body</span> определяется тело веб-страницы, которое в данном случае
        состоит только из одного
        элемента <span class="font-bold">&lt;script&gt;</span>
      </p>
      <br>
      <p>
        Подключение кода javascript на html-страницу осуществляется с помощью тега
        <span class="font-bold">&lt;script&gt;</span>. Данный тег следует размещать либо в заголовке(между тегами
        &lt;head> и &lt;/head>), либо в теле веб - странице(между тегами &lt;body> и &lt;/body>).Нередко подключение
        скриптов происходит перед закрывающим тегом &lt;/body> для оптимизации загрузки веб - страницы.
      </p>
      <br>
      <p>
        Раньше надо было в теге
        &lt;script&gt; указывать тип скрипта, так как данный тег может использоваться не только для подключения
        инструкций javascript, но и для других целей.Так, даже сейчас вы можете встретить на некоторых веб - страницах
        такое определение элемента script:
      </p>
      <br>
      <div id="highlighter_810095" class="syntaxhighlighter  xml border pl-6">
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td class="gutter border-r-2 border-green-700">
                <div class="line number1 index0 alt2">1</div>
              </td>
              <td class="code pl-2">
                <div class="container">
                  <div class="line number1 index0 alt2"><code class="xml plain">&lt;</code><code
                      class="xml keyword">script</code> <code class="xml color1">type</code><code
                      class="xml plain">=</code><code class="xml string">"text/javascript"</code><code
                      class="xml plain">&gt;</code></div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <br>
      <p>
        Но в настоящее время предпочтительнее опускать атрибут type, так как браузеры по умолчанию считают, что элемент
        script содержит инструкции javascript.
      </p>
      <br>
      <p>
        Используемый нами код javascript содержит одно выражение:
      </p>
      <br>
      <div id="highlighter_858382" class="syntaxhighlighter  js border pl-6">
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td class="gutter border-r-2 border-green-700">
                <div class="line number1 index0 alt2">1</div>
              </td>
              <td class="code pl-2">
                <div class="container">
                  <div class="line number1 index0 alt2"><code class="js plain">document.write(</code><code
                      class="js string">"&lt;h2&gt;Первая программа на JavaScript&lt;/h2&gt;"</code><code
                      class="js plain">);</code></div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <br>
      <p>
        Код javascript может содержать множество инструкций и каждая инструкция завершается точкой с запятой. Наша
        инструкция вызывает метод document.write(), который выводит на веб-страницу некоторое содержимое, в данном
        случае это заголовок
        &lt;h2&gt;Первая программа на JavaScript&lt;/h2&gt;
      </p>
      <br>
      <p>
        Вид файла в текстовом редакторе Visual Studio Code:
      </p>
      <br>
      <img src="img/lessons/2/1.2.webp" alt="">
      <br>
      <p>
        Теперь, когда веб-страница готова, откроем ее в веб-браузере:
      </p>
      <br>
      <img src="img/lessons/2/1.1.webp" alt="">
      <br>
      <p>
        И веб-браузер отобразит заголовок, который мы передали в метод document.write() в коде javascript.
      </p>

    </div>

    <div class="buttons flex justify-between my-4 text-white font-bold text-lg items-center">
      <a class="bg-red-600 p-3 rounded" href="learn.php" id="btn-prev">Назад</a>
      <div class="profile rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-200">
        <a href="./profile.php">
          <img src="../img/avatar(1).webp" alt="">
        </a>
      </div>
      <a class="bg-red-600 p-3 rounded" href="learn2.php" id="btn-next">Вперед</a>
    </div>
  </main>
  <footer></footer>

  <script src="../js/script.js"></script>
</body>

</html>