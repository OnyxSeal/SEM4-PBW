let displayyyyyyy = "";
let hps = document.getElementById("penghapus");

function updateDisplay() {
  if (displayyyyyyy === "") {
    document.getElementById("display").innerHTML = "0";
  } else {
    document.getElementById("display").innerHTML = displayyyyyyy;
  }
}

function CD() {
  displayyyyyyy = "";
  updateDisplay();
}

function angkaAjah(numButt) {
  displayyyyyyy += numButt;
  updateDisplay();
}

function operatorBro(operator) {
  if (
    displayyyyyyy !== "" &&
    !isNaN(displayyyyyyy.charAt(displayyyyyyy.length - 1))
  ) {
    displayyyyyyy += operator;
    updateDisplay();
  }
}

function posNeg() {
  if (displayyyyyyy !== "") {
    if (displayyyyyyy.charAt(0) === "-") {
      displayyyyyyy = displayyyyyyy.slice(1);
    } else {
      displayyyyyyy = `-${displayyyyyyy}`;
    }
    updateDisplay();
  }
}

function gasHitung() {
  if (
    displayyyyyyy !== "" &&
    !isNaN(displayyyyyyy.charAt(displayyyyyyy.length - 1))
  ) {
    try {
      const result = calculateExpression(displayyyyyyy);
      console.log(`${displayyyyyyy} = ${result}`);
      displayyyyyyy = result.toString();
      updateDisplay();
    } catch (error) {
      displayyyyyyy = "Error";
      updateDisplay();
    }
  }
}

function calculateExpression(expression) {
  try {
    const result = Function(`'use strict'; return (${expression});`)();
    return result;
  } catch (error) {
    return "Error";
  }
}

function persenan() {
  if (displayyyyyyy !== "") {
    try {
      const number = parseFloat(displayyyyyyy);
      const percentage = number / 100;
      displayyyyyyy = percentage.toString();
      updateDisplay();
    } catch (error) {
      displayyyyyyy = "Error";
      updateDisplay();
    }
  }
}

function penghapus() {
  if (displayyyyyyy.length > 0) {
    displayyyyyyy = displayyyyyyy.slice(0, -1);
    updateDisplay();
  }
}