function setProgressFromBack(percent) {
  const progress = document.querySelector('.progress');

  const circumference = 125.6; // окружность круга
  const offset = circumference - (percent / 100) * circumference;

  progress.style.strokeDashoffset = offset;
}

function setProgressFromFront(percent) {
  const progress = document.querySelector('.progress');

  const circumference = 125.6; // окружность круга
  const offset = circumference - (percent / 100) * circumference;

  // Добавляем класс для запуска анимации
  progress.classList.add('animate');
  // Устанавливаем новое значение атрибута stroke-dashoffset для запуска анимации
  progress.style.strokeDashoffset = offset;


  // Устанавливаем таймаут для удаления класса анимации после завершения
  setTimeout(() => {
    progress.classList.remove('animate');
  }, 500); // Длительность анимации в миллисекундах
}


// Создаем новый объект XMLHttpRequest
let xhr = new XMLHttpRequest();

// Настройка запроса
xhr.open('POST', 'progressPercent.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Установка заголовка Content-Type

// Обработка ответа от сервера
xhr.onreadystatechange = function () {
  if (xhr.readyState == 4 && xhr.status == 200) {
    // Обработка успешного ответа от сервера
    setProgressFromBack(xhr.responseText * 100);
  }
};

// Отправка данных на сервер
xhr.send(``);


