const newThemeSelect = document.getElementById("newTheme");
const newThemeInput = document.getElementById("newThemeInput");
const themeSelect = document.getElementById("testTheme");


themeSelect.addEventListener('click',
  () => themeSelect.value == "newTheme" ?
    newThemeInput.classList.remove('hidden') :
    newThemeInput.classList.add('hidden'));

let questionCounter = 1; // Счетчик для номера вопроса

// Функция для добавления нового вопроса
function addQuestion() {
  // Клонируем шаблон вопроса
  const questionTemplate = document.querySelector('.question1').cloneNode(true);

  // Увеличиваем счетчик и обновляем номер вопроса
  questionCounter++;
  questionTemplate.querySelector('label').innerHTML = `Вопрос №${questionCounter}:
  <div class="mt-4 flex gap-3">
  <input class="border border-red-600 dark:bg-gray-800 w-full rounded" name="question1">
</div>`;
  
  // Обновляем атрибуты name и value
  questionTemplate.querySelector('[name="question1"]').setAttribute('name', `question${questionCounter}`);
  questionTemplate.querySelector('[name="question1rightAnswer"]').setAttribute('name', `question${questionCounter}rightAnswer`);
  const inputz = questionTemplate.querySelectorAll('.option input');
  inputz.forEach((input, index) => {
    input.setAttribute('name', `question${questionCounter}Answer${index + 1}`);
  });


  // Очищаем значения полей в шаблоне
  const inputs = questionTemplate.querySelectorAll('input');
  inputs.forEach(input => {
    input.value = '';
  });

  // Добавляем новый вопрос в конец контейнера
  document.getElementById('questionsContainer').appendChild(questionTemplate);
}

// Обработчик события для кнопки добавления вопроса
document.getElementById('addQuestionBtn').addEventListener('click', addQuestion);