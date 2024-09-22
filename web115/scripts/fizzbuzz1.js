const form = document.getElementById("name-form");

form.addEventListener("submit", function (event) {
  // If we don't do this, the form will attempt to submit and refresh the page
  event.preventDefault();

  const firstName = document.getElementById("first-name").value;
  const middleInitial = document.getElementById("middle-initial").value;
  const lastName = document.getElementById("last-name").value;
  const greeting = document.getElementById("greeting");
  const loopList = document.getElementById("loop-list");
  const count = 140;

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

  for (let x = 1; x <= count; x++) {
    // Create a new list item
    const listItem = document.createElement("li");
    if (x % 3 === 0 && x % 5 === 0) {
      listItem.textContent = "PlushyBone (divisible by 3 and 5)";
    } else if (x % 3 === 0) {
      listItem.textContent = "Plushy (divisible by 3)";
    } else if (x % 5 === 0) {
      listItem.textContent = "Bone (divisible by 5)";
    } else {
      listItem.textContent = "Woof! (not divisible by 3 or 5)";
    }

    // Append the list item to the loop list
    loopList.appendChild(listItem);
  }
});
