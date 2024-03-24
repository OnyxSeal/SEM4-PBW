// year
document.querySelector("#year").textContent = new Date().getFullYear();

let harusbgt = document.getElementById("harus");
let btn = document.getElementById("btnn");

harusbgt.addEventListener("click", function () {
  if (harusbgt.checked) {
    btn.removeAttribute("disabled");
  } else {
    btn.setAttribute("disabled", "disabled");
  }
});
