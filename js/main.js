const btn = document.getElementById("btn");
const redBtn = document.getElementById("btn-red")

// redBtn.classList.remove('translate-x-[163px]');

btn.addEventListener('mouseover', function() {
  redBtn.classList.add('translate-x-[163px]');
});

btn.addEventListener('mouseout', function() {
  redBtn.classList.remove('translate-x-[163px]');
});