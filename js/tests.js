let rightAnswer;
let testLength;

// Получаем параметры из URL
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

// Получаем значение определённого параметра
const test = urlParams.get('test');
const question = urlParams.get('question');

// Создаём объект с параметрами
const params = new URLSearchParams();
params.append('test', test);
params.append('question', question);


fetch('testsGetRightAnswer.php', {
  method: 'POST',
  body: params, // Передаём параметры в теле запроса
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded'
  }
})
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json(); // Преобразуем ответ в JSON
  })
  .then(data => {
    // Обрабатываем полученные данные
    rightAnswer = data[0];
    testLength = data[1];
  })
  .catch(error => {
    // Обрабатываем ошибку
    console.error('There was a problem with the fetch operation:', error);
  });

function startNewTest() {
  // Очистить переменную currentScore в localStorage
  question == 1 ? currentScore = 0 : currentScore = localStorage.getItem('currentScore');
}

function checkAnswer() {
  let radios = document.getElementsByName("answer");
  let currentScore;
  question == 1 ? currentScore = 0 : currentScore = localStorage.getItem('currentScore');

  let selectedRadio;
  for (let i = 0; i < radios.length; i++) {
    if (radios[i].checked) {
      selectedRadio = radios[i].value;
      break;
    }
  }

  if (selectedRadio == rightAnswer) {
    currentScore++;
  }
  localStorage.setItem('currentScore', currentScore);
  localStorage.setItem('testLength', testLength);
}



