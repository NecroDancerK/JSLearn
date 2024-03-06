function goBack() {
  window.history.back();
}

// Автоматическое выставление активной вкладки сайдбара
const sidebar = document.getElementById("sidebar-content");
const sidebarItems = sidebar.getElementsByTagName("a");

// const tasksSidebar = document.querySelector(".tasksAside");
// const tasksSidebarItems = tasksSidebar.getElementsByTagName("a");

// console.log(tasksSidebarItems.length);

// for (let index = 0; index <= tasksSidebarItems.length; index++) {
//   tasksSidebarItems[index].setAttribute("href", "tasks" + (index + 1) + ".php");
  
// }

const currentURL = window.location.href.split("/").pop();

for (const item of sidebarItems) {
  if (item.getAttribute("href") == currentURL) {
    item.classList.remove("hover:bg-neutral-500", "hover:text-white");
    item.classList.add("bg-red-600", "text-white");
  }
}

// Автоматическое изменение тега href для кнопок вперед и назад для страниц учебника
const btnPrev = document.querySelectorAll('#btn-prev');
const btnNext = document.querySelectorAll('#btn-next');

const pageNum = +currentURL.slice(-5, -4);

for (const btn of btnPrev) {
  btn.setAttribute("href", "learn" + (pageNum - 1) + ".php");
}

for (const btn of btnNext) {
  btn.setAttribute("href", "learn" + (pageNum + 1) + ".php");
}

// Изменение тега href для вкладки упражнения
/* const nextButtons = document.querySelectorAll('.nextButton');

for (const elem of nextButtons) {
  elem.setAttribute("href", "tasks" + (pageNum + 1) + ".php")
} */


// Переключение темы
function switchTheme() {
  const switchBtn = document.getElementById("themeBtn");
  document.body.classList.toggle("dark");

  // Сохранение выбора темы в localStorage
  const isDarkMode = document.body.classList.contains("dark");
  localStorage.setItem("isDarkMode", isDarkMode);
}

// Проверка сохраненной темы при загрузке страницы
window.onload = function() {
  const isDarkMode = localStorage.getItem("isDarkMode") === "true";
  if (isDarkMode) {
    document.body.classList.add("dark");
  }
};

