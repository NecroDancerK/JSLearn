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

          setProgressFromFront(xhr.responseText * 100);
          // Обработка успешного ответа от сервера

        }
      };

      // Отправка данных на сервер
      xhr.send(`learnId=${pageNum}`);

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