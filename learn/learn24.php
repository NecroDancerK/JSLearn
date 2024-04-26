<?php

require_once "../php/helpers.php";
require_once "components/learnScript.php";

setJSONProgressForUsersTasks();
setJSONProgressForUsersTests()

  ?>

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
      <h3 class="text-3xl font-bold mb-6">Переопределение функций</h3>

        <div class="buttons flex justify-between my-4 text-white font-bold text-lg">
        <a class="bg-red-600 p-3 rounded" href="learn.php" id="btn-prev">Назад</a>
        <a class="bg-red-600 p-3 rounded" href="learn2.php" id="btn-next">Вперед</a>
      </div>
      <div class="font-normal font-serif text-xl mb-10">
        <p class="mb-7">
          Сегодняшний мир веб-сайтов трудно представить без языка JavaScript. JavaScript - это то, что делает живыми
          веб-страницы, которые мы каждый день просматриваем в своем веб-браузере.
        </p>
        <p class="mb-7">
          JavaScript был создан в 1995 году в компании Netscape разработчиком Брендоном Айком (Brendon Eich) в качестве
          языка сценариев в браузере Netscape Navigator 2. Первоначально язык назывался LiveScript, но на волне
          популярности
          в тот момент другого языка Java LiveScript был переименован в JavaScript. Однако данный момент до сих пор
          иногда
          приводит к некоторой путанице: некоторые начинающие разработчики считают, что Java и JavaScript чуть ли не
          один
          и
          тот же язык. Нет, это абсолютно два разных языка, и они связаны только по названию.
        </p>
        <p class="mb-7">
          Первоначально JavaScript обладал довольно небольшими возможностями. Его цель состояла лишь в том, чтобы
          добавить
          немного поведения на веб-страницу. Например, обработать нажатие кнопок на веб-странице, произвести
          какие-нибудь
          другие действия, связанные прежде всего с элементами управления.
        </p>
        <p class="mb-7">
          Однако развитие веб-среды, появление HTML5 и технологии Node.js открыло перед JavaScript гораздо большие
          горизонты. Сейчас JavaScript продолжает использоваться прежде всего для создания веб-приложений на стороне
          клиента, только теперь он предоставляет гораздо больше возможностей.
        </p>
        <p class="mb-7">
          Также он применяется как язык серверной стороны. То есть если раньше JavaScript применялся только на
          веб-странице,
          а на стороне сервера нам надо было использовать такие технологии, как PHP, ASP.NET, Ruby, Java, то сейчас
          благодаря Node.js мы можем обрабатывать все запросы к серверу также с помощью JavaScript.
        </p>
        <p class="mb-7">
          Также JavaScript может применяться для создания десктопных приложений, например, благодаря таким фреймворкам
          как
          Electron.
        </p>
        <p class="mb-7">
          В последнее время переживает бум сфера мобильной разработки. И JavaScript опять же не остается в стороне:
          увеличение мощности устройств и повсеместное распространение стандарта HTML5 привело к тому, что для создания
          приложений для смартфонов, планшетов и настольных компьютеров мы также можем использовать JavaScript. То есть
          JavaScript уже перешагнул границы веб-браузера, которые ему были очерчены при его создании.
        </p>
        <p class="mb-7">
          Также javascript может использоваться для разработки программ для встроенных устройство, в частности, для
          направления IoT(Internet of Things или Интернет вещей). То есть JavaScript можно использовать для
          программирования
          самых различных "умных" устройств, которые взаимодействуют с интернетом.
        </p>
        <p class="mb-7">
          Таким образом, вы можете встретить применение JavaScript практически повсюду. Сегодня это действительно один
          из
          самых популярных языков программирования, и его популярность еще будет расти.
        </p>
        <p class="mb-7">
          С самого начала существовало несколько веб-браузеров (Netscape, Internet Explorer), которые предоставляли
          различные реализации языка. И чтобы свести различные реализации к общему стержню и стандартизировать язык под
          руководством организации ECMA был разработан стандарт ECMAScript. В принципе сами термины JavaScript и
          ECMAScript
          являются во многом взаимозаменяемыми и относятся к одному и тому же языку.
        </p>
        <p class="mb-7">
          К настоящему времени ECMA было разработано несколько стандартов языка, которые отражают его развитие. В
          последнее
          время почти каждый год выходит новый стандарт. На данный момент последним принятым стандартом является
          ECMAScript
          2023, который был издан в июне 2023 года. В последние годы новые стандарты выпускаются почти каждый год,
          понемногу
          добавляя новые возможности к языку. Однако реализация стандартов в браузерах занимает довольно продолжительное
          время. Одни браузеры быстрее реализуют новые стандарты, другие медленнее. Кроме того, есть большой пласт
          старых
          версий браузеров, которыми простые пользователи продолжают пользоваться и которые естественно могут не
          поддерживать нововведения последних стандартов. И это надо учитывать при разработке программ на JavaScript. В
          данном же руководстве будут рассматриваться в основном те возможности JavaScript, которые поддерживаются всеми
          наиболее распространенными современными браузерами.
        </p>
        <p class="mb-7">
          JavaScript является интерпретируемым языком. Это значит, что код на языке JavaScript выполняется с помощью
          интерпретатора. Интерпретатор получает инструкции языка JavaScript, которые определены на веб-странице,
          выполняет
          их (или интерпретирует).
        </p>
        <h3 class="text-3xl font-bold my-6">Необходимый инструментарий для разработки</h3>
        <p class="mb-7">
          Для разработки на JavaScript нам потребуется прежде всего текстовый редактор для написания кода на данном
          языке
          программирования. В качестве текстового редактора я советую использовать такую программу как Visual Studio
          Code.
          Он бесплатен, имеет много возможностей, в частности, поддерживает подцветку синтаксиса JavaScript и является
          кроссплатформенным: может быть установлен как на Windows, так и на Linux и MacOS. Хотя этот может быть любой
          другой текстовый редактор.
        </p>
        <p class="mb-7">
          Для проверки выполнения программы нам потребуется также интерпретатор JavaScript, который можем выполнять
          программы JavaScript. В качестве интерпретатора мы будем использовать с тандартный веб-браузер. Можно
          использовать последние версии любых распространенных браузеров - Google Chrome, Microsoft Edge, Mozilla
          Firefox,
          Opera, Safari.
        </p>
        <p class="mb-7">
          Также существуют различные среды разработки, которые поддерживают JavaScript и облегчают разработку на этом
          языке, например, Visual Studio, WebStorm, Netbeans и так далее, которые могут упростить какие-то моменты
          создания программ на JavaScript. При желании можно использовать также эти среды разработки. Однако в общем
          случае достаточно текствого редактора и веб-браузера, а в простых случаях даже достаточно одного браузера.
        </p>
        <p class="mb-7">
          Итак, приступим к созданию первой программы.
        </p>
      </div>
      <div class="buttons flex justify-between my-4 text-white font-bold text-lg items-center">
        <button class="bg-red-600 p-3 rounded bg-transparent text-transparent" disabled id="btn-prev">Назад</button>
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