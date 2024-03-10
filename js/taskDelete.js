const answersArray = answersStr.split(' ');

for (let index = 0; index < answersArray.length; index++) {
  const input = arrayInputs[index];

  userInputArray.push(input.value);

  input.value = answersArray[index];
  input.setAttribute("readonly", "readonly");
  input.style.color = "red";
} 