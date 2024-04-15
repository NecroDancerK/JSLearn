const newThemeSelect = document.getElementById("newTheme");
const newThemeInput = document.getElementById("newThemeInput");
const themeSelect = document.getElementById("taskTheme");

console.log(themeSelect.value);

themeSelect.addEventListener('click',
  () => themeSelect.value == "newTheme" ?
    newThemeInput.classList.remove('hidden') :
    newThemeInput.classList.add('hidden'));