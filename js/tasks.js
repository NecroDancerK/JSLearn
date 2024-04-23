const userInputArray = [];
let counter = 0;
const arrayInputs = document.querySelectorAll(".inputTask");
const answersStr = document.getElementById("answersStr").textContent;


// Показывает ответ
function showAnswer() {
  const answersArray = answersStr.split(' ');

  for (let index = 0; index < answersArray.length; index++) {
    const input = arrayInputs[index];

    if (input.getAttribute("readonly") !== "readonly") {
      userInputArray.push(input.value);

      if (userInputArray.length >= (answersArray.length + 1)) {
        counter++;
      }

      showButton.innerText = "Скрыть ответ";
      input.value = answersArray[index];
      input.setAttribute("readonly", "readonly");
      input.style.color = "red";
    } else {
      showButton.innerText = "Показать ответ";

      input.value = userInputArray[index + counter];

      input.removeAttribute("readonly");
      input.style.color = "";
    }
  }

  checkButton.classList.toggle("hidden");
}

// Вычисляет размер инпутов по размеру ответов, чтобы они не были на пол экрана
const inputsArray = answersStr.split(' ');

for (let index = 0; index < inputsArray.length; index++) {
  const input = arrayInputs[index];

  let width = inputsArray[index].length * 10;

  input.style.width = width + "px";
  input.style.height = "21px";
  input.setAttribute("maxlength", inputsArray[index].length);
}


// Функция для проверки ответа, я перелопатил ее раз десять,
// Короче теперь функция сохраняет результат ввода пользователя и правильность его в виде true/false
function checkAnswer() {
  const answersArray = answersStr.split(' ');
  const resultPanelIncorrect = document.getElementById("resultIncorrect");
  const resultPanelCorrect = document.getElementById("resultCorrect");
  const resultPanelEnd = document.getElementById("resultEnd");
  const arrayIdStr = document.getElementById("arrayId").innerText;
  const exercisePanel = document.querySelector(".exercise");
  const checkButton = document.getElementById("checkButton");
  const nextButton = document.getElementById("nextButton");
  const resultsArray = []; // Массив для сохранения результатов пользователя

  for (let index = 0; index < answersArray.length; index++) {
    const input = arrayInputs[index];

    // Если ответ правильный, то добавляем true, если неправильный то false
    // Я максимально сократил этот момент, раньше тут был тернарный оператор, мог быть if else, но теперь тут просто проверка внутри скобок, которая как раз таки возвращается необходимые мне булевые значения, до этого тут был два раза resultsArray.push(true и false) и проверка перед ними)
    resultsArray.push(input.value.trim() == answersArray[index]);
  }

  if (!resultsArray.includes(false)) {
    // Туева хуча переключений классов для скрытия панели задания и отображения панели, что ответ правильный
    exercisePanel.classList.add("hidden");
    if (arrayIdStr == 1) {
      resultPanelCorrect.classList.remove("hidden");
      resultPanelCorrect.classList.add("block");
    } else {
      resultPanelEnd.classList.remove("hidden");
      resultPanelEnd.classList.add("block");
    }
    checkButton.classList.add("hidden");
    nextButton.classList.remove("hidden");

    // Создаем новый объект XMLHttpRequest
    let xhr = new XMLHttpRequest();
4
    // Настройка запроса
    xhr.open('POST', 'tasksProgress.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Установка заголовка Content-Type

    // Обработка ответа от сервера
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // Обработка успешного ответа от сервера
        console.log(xhr.responseText);
      }
    };

    // Отправка данных на сервер
    xhr.send(`taskId=${currentURL.match(/\d+/)[0]}`);

    const currentTask = sidebar.querySelector(`a[href="${currentURL}"]`)

    currentTask.innerHTML = "<i class=\"fa-solid fa-check absolute left-1 top-1/2 -mt-2\"></i>" + currentTask.innerHTML;

    const checkItems = document.querySelectorAll('.fa-check');

    // console.log(Math.ceil((checkItems.length / sidebarItems.length) * 100));

    setProgressFromFront(Math.ceil((checkItems.length / sidebarItems.length) * 100));

  } else {
    // Если ответ неправильный, то мы переключаем классы панели с заданием и панели неправильного ответа 
    exercisePanel.classList.toggle("hidden");
    resultPanelIncorrect.classList.toggle("hidden");
    if (checkButton.innerText === "Подтвердить ответ") {
      checkButton.innerText = "Попробовать снова";
    } else {
      checkButton.innerText = "Подтвердить ответ";
    }
  }
}


