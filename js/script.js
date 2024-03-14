function goBack() {
  window.history.back();
}

// Автоматическое выставление активной вкладки сайдбара
const sidebar = document.getElementById("sidebar-content");
const sidebarItems = sidebar.getElementsByTagName("a");

const currentURL = window.location.href.split("/").pop();

const pageNum = +currentURL.match(/\d+/)[0];

for (const item of sidebarItems) {
  if (item.getAttribute("href").match(/\d+/)[0] == pageNum) {
    item.classList.remove("hover:bg-neutral-500", "hover:text-white");
    item.classList.add("bg-red-600", "text-white");
  }
}

// Автоматическое изменение тега href для кнопок вперед и назад для страниц учебника
const btnPrev = document.querySelectorAll('#btn-prev');
const btnNext = document.querySelectorAll('#btn-next');



for (const btn of btnPrev) {
  btn.setAttribute("href", "learn" + (pageNum - 1) + ".php");
}

for (const btn of btnNext) {
  btn.setAttribute("href", "learn" + (pageNum + 1) + ".php");
}

// Переключение темы
function switchTheme() {
  const switchBtn = document.getElementById("themeBtn");
  switchBtn.getAttribute("src") == "../img/free-icon-dark-mode-12657259.webp" ? switchBtn.setAttribute("src", "../img/free-icon-dark-mode-12657273.webp") : switchBtn.setAttribute("src", "../img/free-icon-dark-mode-12657259.webp");
  document.body.classList.toggle("dark");

  // Сохранение выбора темы в cookie
  const isDarkMode = document.body.classList.contains("dark");
  document.cookie = `isDarkMode=${isDarkMode}; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;
}


function handleIntersection(entries, observer) {
  entries.forEach(entry => {
    if (entry.isIntersecting) {

      let xhr = new XMLHttpRequest();

      // Настройка запроса
      xhr.open('POST', 'learnProgress.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Установка заголовка Content-Type

      // Обработка ответа от сервера
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          console.log(xhr.responseText);
          setProgressFromFront(xhr.responseText * 100);
          // Обработка успешного ответа от сервера

        }
      };

      // Отправка данных на сервер
      xhr.send(`learnId=${pageNum}`);

      console.log('Элемент появился на экране!');
      // Можно также остановить отслеживание появления элемента, если нужно:
      observer.unobserve(entry.target);
    }
  });
}

// Наблюдатель за пересечениями
const observer = new IntersectionObserver(handleIntersection, { threshold: 1 });

// Элемент, который вы хотите отслеживать
const targetElement = document.querySelector('.profile-observing');

// Начать отслеживание
observer.observe(targetElement);
