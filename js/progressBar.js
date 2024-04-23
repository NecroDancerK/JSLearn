function setProgressFromBack(percent) {
  const progress = document.querySelectorAll('.progress');

  const circumference = 125.6; // окружность круга
  const offset = circumference - (percent / 100) * circumference;

  for (const elem of progress) {
    elem.style.strokeDashoffset = offset;
  }

}

function setProgressFromFront(percent) {
  const progress = document.querySelectorAll('.progress');

  const circumference = 125.6; // окружность круга
  const offset = circumference - (percent / 100) * circumference;


  for (const elem of progress) {
    // Добавляем класс для запуска анимации
    elem.classList.add('animate');
    // Устанавливаем новое значение атрибута stroke-dashoffset для запуска анимации
    elem.style.strokeDashoffset = offset;


    // Устанавливаем таймаут для удаления класса анимации после завершения
    setTimeout(() => {
      elem.classList.remove('animate');
    }, 500); // Длительность анимации в миллисекундах
  }

}


// Создаем новый объект XMLHttpRequest
let xhr1 = new XMLHttpRequest();

// Настройка запроса
xhr1.open('POST', 'progressPercent.php', true);
xhr1.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Установка заголовка Content-Type

// Обработка ответа от сервера
xhr1.onreadystatechange = function () {
  if (xhr1.readyState == 4 && xhr1.status == 200) {
    // Обработка успешного ответа от сервера
    setProgressFromBack(xhr1.responseText * 100);
  }
};

// Отправка данных на сервер
xhr1.send(``);


let xhr2 = new XMLHttpRequest();

// Настройка запроса
xhr2.open('POST', 'learnProgress.php', true);
xhr2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Установка заголовка Content-Type

// Обработка ответа от сервера
xhr2.onreadystatechange = function () {
  if (xhr2.readyState == 4 && xhr2.status == 200) {
    // Обработка успешного ответа от сервера
    setProgressFromBack(xhr2.responseText * 100);
  }
};

// Отправка данных на сервер
xhr2.send(``);


let xhr3 = new XMLHttpRequest();

// Настройка запроса
xhr3.open('POST', 'getTestsProgress.php', true);
xhr3.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Установка заголовка Content-Type

// Обработка ответа от сервера
xhr3.onreadystatechange = function () {
  if (xhr3.readyState == 4 && xhr3.status == 200) {
    // Обработка успешного ответа от сервера
    setProgressFromBack(xhr3.responseText * 100);
  }
};

// Отправка данных на сервер
xhr3.send(``);