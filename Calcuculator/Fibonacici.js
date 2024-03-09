function generateFibonacci() {
  const n = parseInt(document.getElementById("input").value);
  if (isNaN(n) || n < 1) {
    document.getElementById("result").innerHTML =
      "\nJangan masukin nilai negative apalagi dikosongin.";
  } else {
    const sequence = getFibonacciSequence(n);
    const sequenceHtml = sequence.join(", ");
    document.getElementById(
      "hasil"
    ).innerHTML = `Ini kalo deret Fibonaccinya sebanyak ${n}, ya segini: ${sequenceHtml}`;
  }
}

function getFibonacciSequence(n) {
  const sequence = [0, 1];
  for (let i = 2; i < n; i++) {
    sequence[i] = sequence[i - 1] + sequence[i - 2];
  }
  return sequence;
}
