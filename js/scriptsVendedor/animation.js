const selected = document.querySelector(".selected");
const optionsContainer = document.querySelector(".options-container");

const optionsList = document.querySelectorAll(".option");
const caretdown = document.querySelector("#caret-down");
console.log(caretdown);
selected.addEventListener("click", () => {
  optionsContainer.classList.toggle("active");
    caretdown.classList.toggle("rotar");
});

optionsList.forEach(o => {
  o.addEventListener("click", () => {
    selected.innerHTML = o.querySelector("label").innerHTML;
    optionsContainer.classList.remove("active");
    caretdown.classList.remove("rotar");

  });
});