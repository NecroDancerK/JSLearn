const result = document.getElementById('result');
result.textContent = localStorage.getItem('currentScore') + " Из " + localStorage.getItem('testLength');;

const resultPercent = document.getElementById('result-percent');
resultPercent.textContent = Math.round(localStorage.getItem('currentScore') / localStorage.getItem('testLength') * 100) + "%";


const results = new URLSearchParams();
results.append('testId', test);
results.append('result', localStorage.getItem('currentScore'));

fetch('testsProgress.php', {
  method: 'POST',
  body: results, // Передаём параметры в теле запроса
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded'
  }
})
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.text(); // Преобразуем ответ в JSON
  })
  .then(data => {
    // Обрабатываем полученные данные
    console.log(data);
  })
  .catch(error => {
    // Обрабатываем ошибку
    console.error('There was a problem with the fetch operation:', error);
  });