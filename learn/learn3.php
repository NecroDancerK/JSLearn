<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '/components/mainHead.php' ?>


<body <?php if (isset($_COOKIE['isDarkMode']) && $_COOKIE['isDarkMode'] === 'true') { ?>
    class="dark bg-white dark:bg-gray-900" <?php } ?>>
  <div class="wrapper dark:bg-gray-900">
    <?php

    require_once "components/header.php";

    require_once "../php/helpers.php";

    $pdo = getPDO();

    $query = "SELECT id FROM `tasks`;";
    $statement = $pdo->query($query);

    $results = $statement->fetchAll(PDO::FETCH_NUM);
    ?>


    <?php require_once "components/headerNav.php" ?>

    <?php require_once "components/aside.php" ?>
    <main
      class="pt-36 pb-10 mx-auto w-3/5 border border-b-0 dark:border-gray-950 px-7 dark:bg-gray-900 dark:text-white">
      <h3 class="text-3xl font-bold mb-6">Выполнение кода javascript</h3>

      <div class="buttons flex justify-between my-4 text-white font-bold text-lg">
        <a class="bg-red-600 p-3 rounded" href="learn.php" id="btn-prev">Назад</a>
        <a class="bg-red-600 p-3 rounded" href="learn2.php" id="btn-next">Вперед</a>
      </div>

      <div class="font-normal font-serif text-xl mb-10">
        <p class="mb-7">
          Когда браузер получает веб-страницу с кодом html и javascript, то он ее интерпретирует. Результат
          интерпретации в виде различных элементов - кнопок, полей ввода, текстовых блоков и т.д., мы видим перед собой
          в браузере. Интерпретация веб-страницы происходит последовательно сверху вниз.
        </p>
        <p class="mb-7">
          Когда браузер встречает на веб-странице элемент
          &lt;script&gt;
          с кодом javascript, то вступает в действие встроенный интерпретатор javascript.И пока он не закончит свою
          работу, дальше интерпретация веб - страницы не идет.
        </p>
        <p class="mb-7">
          Рассмотрим небольшой пример и для этого определим файл index.html со следующим кодом:
        </p>
        <div id="highlighter_754800" class="syntaxhighlighter  xml border pl-6 mb-7">
          <div class="toolbar"><span><a href="#" class="toolbar_item command_help help"></a></span></div>
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
                  <div class="line number13 index12 alt2">13</div>
                  <div class="line number14 index13 alt1">14</div>
                  <div class="line number15 index14 alt2">15</div>
                  <div class="line number16 index15 alt1">16</div>
                  <div class="line number17 index16 alt2">17</div>
                  <div class="line number18 index17 alt1">18</div>
                  <div class="line number19 index18 alt2">19</div>
                  <div class="line number20 index19 alt1">20</div>
                </td>
                <td class="code pl-2">
                  <div class="container">
                    <div class="line number1 index0 alt2"><code class="xml plain">&lt;!DOCTYPE html&gt;</code></div>
                    <div class="line number2 index1 alt1"><code class="xml plain">&lt;</code><code
                        class="xml keyword">html</code><code class="xml plain">&gt;</code></div>
                    <div class="line number3 index2 alt2"><code class="xml plain">&lt;</code><code
                        class="xml keyword">head</code><code class="xml plain">&gt;</code></div>
                    <div class="line number4 index3 alt1"><code class="xml spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="xml plain">&lt;</code><code class="xml keyword">meta</code> <code
                        class="xml color1">charset</code><code class="xml plain">=</code><code
                        class="xml string">"utf-8"</code> <code class="xml plain">/&gt;</code></div>
                    <div class="line number5 index4 alt2"><code class="xml spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="xml plain">&lt;</code><code class="xml keyword">title</code><code
                        class="xml plain">&gt;METANIT.COM&lt;/</code><code class="xml keyword">title</code><code
                        class="xml plain">&gt;</code></div>
                    <div class="line number6 index5 alt1"><code class="xml spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="xml plain">&lt;</code><code class="xml keyword">script</code><code
                        class="xml plain">&gt;</code></div>
                    <div class="line number7 index6 alt2"><code
                        class="xml spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="xml plain">document.write("Начальный текст");</code></div>
                    <div class="line number8 index7 alt1"><code class="xml spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="xml plain">&lt;/</code><code class="xml keyword">script</code><code
                        class="xml plain">&gt;</code></div>
                    <div class="line number9 index8 alt2"><code class="xml plain">&lt;/</code><code
                        class="xml keyword">head</code><code class="xml plain">&gt;</code></div>
                    <div class="line number10 index9 alt1"><code class="xml plain">&lt;</code><code
                        class="xml keyword">body</code><code class="xml plain">&gt;</code></div>
                    <div class="line number11 index10 alt2"><code
                        class="xml spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="xml plain">&lt;</code><code
                        class="xml keyword">h2</code><code class="xml plain">&gt;Первый заголовок&lt;/</code><code
                        class="xml keyword">h2</code><code class="xml plain">&gt;</code></div>
                    <div class="line number12 index11 alt1"><code
                        class="xml spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="xml plain">&lt;</code><code
                        class="xml keyword">script</code><code class="xml plain">&gt;</code></div>
                    <div class="line number13 index12 alt2"><code
                        class="xml spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="xml plain">document.write("Первый текст");</code></div>
                    <div class="line number14 index13 alt1"><code
                        class="xml spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="xml plain">&lt;/</code><code
                        class="xml keyword">script</code><code class="xml plain">&gt;</code></div>
                    <div class="line number15 index14 alt2"><code
                        class="xml spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="xml plain">&lt;</code><code
                        class="xml keyword">h2</code><code class="xml plain">&gt;Второй заголовок&lt;/</code><code
                        class="xml keyword">h2</code><code class="xml plain">&gt;</code></div>
                    <div class="line number16 index15 alt1"><code
                        class="xml spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="xml plain">&lt;</code><code
                        class="xml keyword">script</code><code class="xml plain">&gt;</code></div>
                    <div class="line number17 index16 alt2"><code
                        class="xml spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="xml plain">document.write("Второй текст");</code></div>
                    <div class="line number18 index17 alt1"><code
                        class="xml spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="xml plain">&lt;/</code><code
                        class="xml keyword">script</code><code class="xml plain">&gt;</code></div>
                    <div class="line number19 index18 alt2"><code class="xml plain">&lt;/</code><code
                        class="xml keyword">body</code><code class="xml plain">&gt;</code></div>
                    <div class="line number20 index19 alt1"><code class="xml plain">&lt;/</code><code
                        class="xml keyword">html</code><code class="xml plain">&gt;</code></div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <p class="mb-7">
          Здесь три вставки кода javascript - один в секции

          <head> и по одному после каждого заголовка.
        </p>
        <p class="mb-7">
          Откроем веб-страницу в браузере и мы увидим, что браузер последовательно выполняет код веб-страницы:
        </p>
        <img class="mb-7" src="../img/lessons/1.4.png" alt="">
        <p class="mb-7">
          Здесь мы видим, что вначале выполняется код javascript из секции head, который выводит на веб-страницу
          некоторый текст:
        </p>

        <div id="highlighter_879315" class="syntaxhighlighter  js border pl-6 mb-7">
          <div class="toolbar"><span><a href="#" class="toolbar_item command_help help"></a></span></div>
          <table border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td class="gutter border-r-2 border-green-700">
                  <div class="line number1 index0 alt2">1</div>
                </td>
                <td class="code pl-2">
                  <div class="container">
                    <div class="line number1 index0 alt2"><code class="js plain">document.write(</code><code
                        class="js string">"Начальный текст"</code><code class="js plain">);</code></div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <p class="mb-7">
          Далее выводится первый стандартный html-элемент
          &lt;h2&gt;:
        </p>
        <div id="highlighter_449780" class="syntaxhighlighter  xml  border pl-6 mb-7">
          <div class="toolbar"><span><a href="#" class="toolbar_item command_help help"></a></span></div>
          <table border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td class="gutter  border-r-2 border-green-700">
                  <div class="line number1 index0 alt2">1</div>
                </td>
                <td class="code  pl-2">
                  <div class="container">
                    <div class="line number1 index0 alt2"><code class="xml plain">&lt;</code><code
                        class="xml keyword">h2</code><code class="xml plain">&gt;Первый заголовок&lt;/</code><code
                        class="xml keyword">h2</code><code class="xml plain">&gt;</code></div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <p class="mb-7">
          Подключение кода javascript на html-страницу осуществляется с помощью тега
          <span class="font-bold">&lt;script&gt;</span>. Данный тег следует размещать либо в заголовке(между тегами
          &lt;head> и &lt;/head>), либо в теле веб - странице(между тегами &lt;body> и &lt;/body>).Нередко подключение
          скриптов происходит перед закрывающим тегом &lt;/body> для оптимизации загрузки веб - страницы.
        </p>
        <p class="mb-7">
          Раньше надо было в теге
          &lt;script&gt; указывать тип скрипта, так как данный тег может использоваться не только для подключения
          инструкций javascript, но и для других целей.Так, даже сейчас вы можете встретить на некоторых веб -
          страницах
          такое определение элемента script:
        </p>
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
        <p class="mb-7">
          Но в настоящее время предпочтительнее опускать атрибут type, так как браузеры по умолчанию считают, что
          элемент
          script содержит инструкции javascript.
        </p>
        <p class="mb-7">
          Используемый нами код javascript содержит одно выражение:
        </p>
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
        <p class="mb-7">
          Код javascript может содержать множество инструкций и каждая инструкция завершается точкой с запятой. Наша
          инструкция вызывает метод document.write(), который выводит на веб-страницу некоторое содержимое, в данном
          случае это заголовок
          &lt;h2&gt;Первая программа на JavaScript&lt;/h2&gt;
        </p>
        <p class="mb-7">
          Вид файла в текстовом редакторе Visual Studio Code:
        </p>
        <img class="mb-7" src="../img/lessons/2/1.2.webp" alt="">
        <p class="mb-7">
          Теперь, когда веб-страница готова, откроем ее в веб-браузере:
        </p>
        <img class="mb-7" src="../img/lessons/2/1.1.webp" alt="">
        <p class="mb-7">
          И веб-браузер отобразит заголовок, который мы передали в метод document.write() в коде javascript.
        </p>

      </div>

      <div class="buttons flex justify-between my-4 text-white font-bold text-lg items-center">
        <a class="bg-red-600 p-3 rounded" href="learn.php" id="btn-prev">Назад</a>
        <div
          class="profile relative profile-observing rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700">
          <a class="relative z-10" href="../profile.php">
            <img src="../img/avatar(1).webp" alt="">
          </a>

          <svg class="progress-circle absolute -bottom-[11px] -right-[10px]" width="60" height="60">
            <circle class="progress" cx="30" cy="30" r="20" stroke-width="4" fill="transparent" />
          </svg>

        </div>
        <a class="bg-red-600 p-3 rounded" href="learn2.php" id="btn-next">Вперед</a>
      </div>
    </main>
    <footer></footer>
  </div>

  <?php include_once 'components/scripts.php' ?>


</body>

</html>