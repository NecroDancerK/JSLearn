<header class="flex justify-between items-center p-4 py-3 gap-5 fixed w-full z-10 bg-white dark:bg-gray-900">
  <div class="flex gap-10 items-center ">
    <div class="logo">
    <a href="/learn/learn1.php">
        <img class="w-9" src="../img/JavaScript-logo.webp" alt="">
      </a>
    </div>
    <!-- <form class="relative" action="" method="get">
      <input class="search rounded-3xl border py-2 pr-10 pl-4 outline-red-600 dark:bg-gray-800 dark:border-gray-950 dark:text-white"
        type="search" name="search" placeholder="Search" id="">
      <div class="rounded-full w-10 h-10 absolute right-[1px] top-[1px] hover:bg-gray-200 dark:hover:bg-gray-700">
        <button
          class="bg-[url('img\free-icon-search-4024513.webp')] bg-center bg-no-repeat bg-cover w-6 h-6 absolute right-[7px] top-[9px] rounded-full"
          type="submit">
          <img src="../img/free-icon-search-4024513.webp" alt="">
        </button>
      </div>
    </form> -->
    <button class="rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700"
      onclick="switchTheme()">
      <img id="themeBtn" class="w-6 h-6" <?php if (isset($_COOKIE['isDarkMode']) && $_COOKIE['isDarkMode'] === 'true') { ?>
    src="../img/free-icon-dark-mode-12657259.webp" <?php } 
    else { ?> src="../img/free-icon-dark-mode-12657273.webp" <?php } ?> alt="">
    </button>
  </div>
  <h2 class="text-red-600 font-bold text-2xl dark:text-white">
    Лучший сайт обучения JavaScript
  </h2>


  <div class="profile rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700">
    <a class="relative z-10" href="../profile.php">
      <img src="../img/avatar(1).webp" alt="">
    </a>

    <svg class="progress-circle absolute right-[6px] top-1" width="60" height="60">
      <circle class="progress" cx="30" cy="30" r="20" stroke-width="4" fill="transparent" />
    </svg>

  </div>
</header>