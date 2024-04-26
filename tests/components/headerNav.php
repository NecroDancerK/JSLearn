<div class="flex justify-between text-center w-full fixed left-0 top-[66px] z-10">
  <a href="../learn/learn1.php"
    class="bg-gray-800 dark:bg-gray-700 dark:hover:bg-black w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Учебник</a>
  <a href="../tasks/tasks.php?task=<?php
  if (!empty ($results)) {
    echo $results[0][0];
  }
  ?>" class="bg-gray-800 dark:bg-gray-700 dark:hover:bg-black w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Упражнения</a>
  <a href="tests.php" class=" w-1/4 bg-red-600 p-2 uppercase text-lg text-white font-semibold">Тесты</a>
  <a href="../playground.php"
    class="bg-gray-800 dark:bg-gray-700 dark:hover:bg-black w-1/4 hover:bg-black p-2 uppercase text-lg text-white font-semibold">Playground</a>
</div>