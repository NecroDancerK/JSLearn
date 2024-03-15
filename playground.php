<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JSLearn</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="apple-touch-icon" sizes="180x180" href="/img/favicons/apple-touch-icon.webp">
  <link rel="icon" type="image/png" sizes="32x32" href="/img/favicons/favicon-32x32.webp">
  <link rel="icon" type="image/png" sizes="16x16" href="/img/favicons/favicon-16x16.webp">
  <link rel="manifest" href="/site.webmanifest">
</head>


<!-- <body class=""> -->

<body <?php if (isset ($_COOKIE['isDarkMode']) && $_COOKIE['isDarkMode'] === 'true') { ?>
    class="dark " <?php } ?>>
  <div class="wrapper  2xl:h-screen xl:h-auto dark:bg-gray-900 text-white">
    <?php

    require_once "components/header.php";

    require_once "php/helpers.php";

    $results = getTasksIdsFromDB();

    ?>

    <div class="flex justify-between text-center w-full fixed left-0 top-[66px]">
      <a href="learn/learn1.php"
        class="bg-gray-800 w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Учебник</a>
      <a href="tasks/tasks.php?task=<?php
      if (!empty ($results)) {
        echo $results[0][0];
      }
      ?>" class="bg-gray-800 w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Упражнения</a>
      <a href="../tests/tests.php"
        class="bg-gray-800 w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Тесты</a>
      <a href="playground.php" class=" w-1/4 bg-red-600 p-2 uppercase text-lg text-white font-semibold">Playground</a>
    </div>
    <main class="pt-[110px]">

      <div class="container mx-auto w-full h-[85vh] p-5 flex flex-col md:flex-row">
        <div class="left basis-1/2 p-[10px]">

          <label class="flex items-center bg-black h-[30px]"><i class="fa-brands fa-html5 mx-3"></i> HTML</label>
          <textarea
            class="w-full h-[28%] bg-neutral-800 text-white py-[10px] px-[20px] border-0 outline-0 resize-none text-lg mb-3"
            id="html-code" onkeyup="run()">
<button onclick= "changeColor(this)">НАЖМИ НА МЕНЯ</button>
      </textarea>

          <label class="flex items-center bg-black h-[30px]"><i class="fa-brands fa-css3-alt mx-3"></i> CSS</label>
          <textarea
            class="w-full h-[28%] bg-neutral-800 text-white py-[10px] px-[20px] border-0 outline-0 resize-none text-lg mb-3"
            id="css-code" onkeyup="run()">
button {
  padding: 20px;
  font-size: 20px;
  background: red;
  border: 0;
  margin: 200px;
  color: white;
  }
  
.toggleStyle {
  background: black;
}
        </textarea>

          <label class="flex items-center bg-black h-[30px]"><i class="fa-brands fa-js mx-3"></i> JS</label>
          <textarea
            class="w-full h-[28%] bg-neutral-800 text-white py-[10px] px-[20px] border-0 outline-0 resize-none text-lg mb-3"
            id="js-code" onkeyup="run()">
function changeColor(x) {
  x.classList.toggle("toggleStyle");
}
      </textarea>
        </div>
        <div class="rigth basis-1/2 p-[10px]">
          <label class="flex items-center bg-black h-[30px]"><i class="fa-solid fa-play mx-3"></i> Output</label>
          <iframe class="w-full h-[95%] border border-black outline-0 bg-white" id="output"></iframe>
        </div>
      </div>

    </main>
    <footer></footer>
  </div>
  <script>

    function run() {
      let htmlCode = document.getElementById('html-code').value;
      let cssCode = document.getElementById('css-code').value;
      let jsCode = document.getElementById('js-code').value;
      let output = document.getElementById('output');

      console.log(output);

      output.contentDocument.body.innerHTML = htmlCode + "<style>" + cssCode + "</style>";
      output.contentWindow.eval(jsCode);
    }

    window.addEventListener("load", () => {
      run();
    });


  </script>
  <script src="https://kit.fontawesome.com/89e7650dfb.js" crossorigin="anonymous"></script>
  <script src="../js/script.js"></script>
  <script src="../js/progressBar.js"></script>
  <script src="../js/tasks.js"></script>
</body>

</html>