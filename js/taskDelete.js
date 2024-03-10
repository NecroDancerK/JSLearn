// const answersStr = document.getElementById("answersStr").textContent;

// function showAnswer() {
//   const answersArray = answersStr.split(' ');

//   for (let index = 0; index < answersArray.length; index++) {
//     const input = arrayInputs[index];

//     if (input.getAttribute("readonly") !== "readonly") {
//       userInputArray.push(input.value);

//       if (userInputArray.length >= (answersArray.length + 1)) {
//         counter++;
//       }

//       showButton.innerText = "Скрыть ответ";
//       input.value = answersArray[index];
//       input.setAttribute("readonly", "readonly");
//       input.style.color = "blue";
//     } else {
//       showButton.innerText = "Показать ответ";

//       input.value = userInputArray[index + counter];

//       input.removeAttribute("readonly");
//       input.style.color = "";
//     }
//   }

//   checkButton.classList.toggle("hidden");
// }

const answersArray = answersStr.split(' ');

for (let index = 0; index < answersArray.length; index++) {
  const input = arrayInputs[index];

  userInputArray.push(input.value);

  input.value = answersArray[index];
  input.setAttribute("readonly", "readonly");
  input.style.color = "blue";
} 