const openingTimeInput = document.getElementById("opening-time");
const closingTimeInput = document.getElementById("closing-time");
const timeInput = document.getElementById("time");

const mondayCheckbox = document.getElementById("mondayCheck");
const tuesdayCheckbox = document.getElementById("tuesdayCheck");
const wednesdayCheckbox = document.getElementById("wednesdayCheck");
const thursdayCheckbox = document.getElementById("thursdayCheck");
const fridayCheckbox = document.getElementById("fridayCheck");
const saturdayCheckbox = document.getElementById("saturdayCheck");
const sundayCheckbox = document.getElementById("sundayCheck");

const mondayInput = document.getElementById("monday");
const tuesdayInput = document.getElementById("tuesday");
const wednesdayInput = document.getElementById("wednesday");
const thursdayInput = document.getElementById("thursday");
const fridayInput = document.getElementById("friday");
const saturdayInput = document.getElementById("saturday");
const sundayInput = document.getElementById("sunday");

function updateTime() {
  const openingTime = openingTimeInput.value;
  const closingTime = closingTimeInput.value;

  const openingTimeFormatted = formatTime(openingTime);
  const closingTimeFormatted = formatTime(closingTime);

  const timeString = `${openingTimeFormatted} - ${closingTimeFormatted}`;
  timeInput.value = timeString;
}

function formatTime(time) {
  const [hours, minutes] = time.split(":");
  const hoursInt = parseInt(hours);
  const isPM = hoursInt >= 12;

  let formattedHours = hoursInt % 12;
  if (formattedHours === 0) {
    formattedHours = 12;
  }

  const formattedMinutes = minutes.padStart(2, "0");
  const formattedTime = `${formattedHours}:${formattedMinutes} ${
    isPM ? "PM" : "AM"
  }`;

  return formattedTime;
}

openingTimeInput.addEventListener("change", updateTime);
closingTimeInput.addEventListener("change", updateTime);

mondayCheckbox.addEventListener("change", () => {
  if (mondayCheckbox.checked) {
    mondayInput.value = timeInput.value;
  } else {
    mondayInput.value = "Closed";
  }
});

tuesdayCheckbox.addEventListener("change", () => {
  if (tuesdayCheckbox.checked) {
    tuesdayInput.value = timeInput.value;
  } else {
    tuesdayInput.value = "Closed";
  }
});

wednesdayCheckbox.addEventListener("change", () => {
  if (wednesdayCheckbox.checked) {
    wednesdayInput.value = timeInput.value;
  } else {
    wednesdayInput.value = "Closed";
  }
});

thursdayCheckbox.addEventListener("change", () => {
  if (thursdayCheckbox.checked) {
    thursdayInput.value = timeInput.value;
  } else {
    thursdayInput.value = "Closed";
  }
});

fridayCheckbox.addEventListener("change", () => {
  if (fridayCheckbox.checked) {
    fridayInput.value = timeInput.value;
  } else {
    fridayInput.value = "Closed";
  }
});

saturdayCheckbox.addEventListener("change", () => {
  if (saturdayCheckbox.checked) {
    saturdayInput.value = timeInput.value;
  } else {
    saturdayInput.value = "Closed";
  }
});

sundayCheckbox.addEventListener("change", () => {
  if (sundayCheckbox.checked) {
    sundayInput.value = timeInput.value;
  } else {
    sundayInput.value = "Closed";
  }
});
