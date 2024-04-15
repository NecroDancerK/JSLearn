const newThemeSelect = document.getElementById("newTheme");
const newThemeLabel = document.getElementById("newThemeLabel");
const themeSelect = document.getElementById("testTheme");
const numberOfQuestions = document.getElementById("numberOfQuestions");
const newThemeInput = newThemeLabel.querySelector('#newThemeInput');
const questionsContainer = document.getElementById('questionsContainer');
const deleteBtn = document.getElementById('deleteBtn');

questionsContainer.children.length === 1 ? deleteBtn.classList.add('hidden') : deleteBtn.classList.remove('hidden');

themeSelect.addEventListener('click', () => {
  if (themeSelect.value == "newTheme") {
    newThemeLabel.classList.remove('hidden');
    // Установка атрибута required
    newThemeInput.setAttribute('required', 'required');
  } else {
    newThemeLabel.classList.add('hidden');
    // Удаление атрибута required
    newThemeInput.removeAttribute('required');
  }
});

let questionCounter = numberOfQuestions.value; // Счетчик для номера вопроса


// Функция для добавления нового вопроса
function addQuestion() {
  // Клонируем шаблон вопроса
  const questionTemplate = document.querySelector('.question').cloneNode(true);

  // Увеличиваем счетчик и обновляем номер вопроса
  questionCounter++;
  questionTemplate.querySelector('label').innerHTML = `Вопрос №${questionCounter}:
  <div class="mt-4 flex gap-3">
  <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question1" required>
</div>`;

  // Обновляем атрибуты name и value
  questionTemplate.querySelector('[name="question1"]').setAttribute('name', `question${questionCounter}`);

  questionTemplate.querySelector('[name="question1rightAnswer"]').setAttribute('name', `question${questionCounter}rightAnswer`);
  questionTemplate.querySelector(`[name="question${questionCounter}rightAnswer"]`).value = "1";
  const inputz = questionTemplate.querySelectorAll('.option input');
  inputz.forEach((input, index) => {
    input.setAttribute('name', `question${questionCounter}Answer${index + 1}`);
  });

  // Устанавливаем значение 1 для <select>

  // Очищаем значения полей в шаблоне
  const inputs = questionTemplate.querySelectorAll('input');
  inputs.forEach(input => {
    input.value = '';
  });

  // Добавляем новый вопрос в конец контейнера
  document.getElementById('questionsContainer').appendChild(questionTemplate);

  numberOfQuestions.value = questionCounter;

  questionsContainer.children.length === 1 ? deleteBtn.classList.add('hidden') : deleteBtn.classList.remove('hidden');
}


// Обработчик события для кнопки удаления вопроса
function removeQuestion() {

  // Проверяем, есть ли вопросы для удаления
  if (questionsContainer.children.length > 1) {

    /// Получаем nodeList элементов
    let questions = document.querySelectorAll('.question');

    // Преобразуем nodeList в массив
    let questionsArray = Array.from(questions);

    // Удаляем последний элемент из массива
    let lastQuestion = questionsArray.pop();


    // Удаляем последний элемент из DOM
    if (lastQuestion) {
      lastQuestion.parentNode.removeChild(lastQuestion);
    }

    questionCounter--;

    numberOfQuestions.value = questionCounter;
  }


  questionsContainer.children.length === 1 ? deleteBtn.classList.add('hidden') : deleteBtn.classList.remove('hidden');
}



// Обработчик события для кнопки добавления вопроса
document.getElementById('addQuestionBtn').addEventListener('click', addQuestion);


