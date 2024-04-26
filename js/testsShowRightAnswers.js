const answers = localStorage.getItem('answers');
// const answers = document.querySelectorAll('.answers');

const data = new URLSearchParams();
data.append('answers', answers);


fetch('testsShowRightAnswersScript.php', {
  method: 'POST',
  body: data, // Передаём параметры в теле запроса
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