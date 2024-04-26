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






const originalString = currentURL + '&question=1';
let substringToRemove = "Result";

let resultString = originalString.replace(new RegExp(substringToRemove, 'g'), '');

const currentTest = sidebar.querySelector(`a[href="${resultString}"]`)

console.log(currentTest);

currentTest.innerHTML = "<i class=\"fa-solid fa-check absolute left-1 top-1/2 -mt-2\"></i>" + currentTest.innerHTML;

console.log(currentTest);

const checkItems = document.querySelectorAll('.fa-check');

console.log(checkItems);

console.log(Math.ceil((checkItems.length / sidebarItems.length) * 100));

setProgressFromFront(Math.ceil((checkItems.length / sidebarItems.length) * 100));