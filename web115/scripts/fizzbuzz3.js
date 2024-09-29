const form = document.getElementById("name-form");
const fizzBuzzBang = [{ 3: "Plushy" }, { 5: "Bone" }, { 7: "Pooper" }];

const checkDivision = (firstDivisor, secondDivisor) =>
  firstDivisor % secondDivisor === 0;

form.addEventListener("submit", function (event) {
  // If we don't do this, the form will attempt to submit and refresh the page
  event.preventDefault();

  const firstName = document.getElementById("first-name").value;
  const middleInitial = document.getElementById("middle-initial").value;
  const lastName = document.getElementById("last-name").value;
  const greeting = document.getElementById("greeting");
  const loopList = document.getElementById("loop-list");
  const firstDivisor = 3;
  const secondDivisor = 5;

  // Validate that the user has entered a name
  if (!firstName || !lastName) {
    alert("Please enter your first and last name.");
    return;
  }

  // First, make sure we reset our heading
  greeting.textContent = "Welcome to Paws & Whiskers Co.";
  // And clear our list
  loopList.innerHTML = "";

  // Now we can add the user's name to the greeting
  greeting.textContent = `${
    greeting.textContent
  } ${firstName} ${middleInitial}${middleInitial ? "." : ""} ${lastName}!`
    .replace(/\s+/g, " ")
    .trim();

  let count;
  do {
    count = prompt(`How high do you want to count, ${firstName}?`);
    if (isNaN(count) || count === null || count.trim() === "") {
      alert("Please enter a valid number.");
    } else {
      count = Number(count);
      break;
    }
  } while (true);

  for (let x = 1; x <= count; x++) {
    // Create a new list item
    const listItem = document.createElement("li");

    let found = false;
    for (const obj of fizzBuzzBang) {
      for (const [divisor, word] of Object.entries(obj)) {
        if (checkDivision(x, Number(divisor))) {
          listItem.textContent = `${listItem.textContent}${word}`;
          found = true;
          break;
        }
      }
    }
    if (!found) {
      listItem.textContent = `Not divisible by ${fizzBuzzBang
        .map((obj) => Object.keys(obj)[0])
        .join(", ")}`;
    }

    // Append the list item to the loop list
    loopList.appendChild(listItem);
  }
});
