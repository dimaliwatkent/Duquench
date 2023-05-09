//THIS IS FOR LOCATION BUTTON FILTER IN FRONT PAGE

// Get all the buttons
const buttons = document.querySelectorAll("#municipalities-button button");

// Set the initial value of the active button to the 'All' button
let activeButtonDataFilter = "";

// Call the search function with the initial value of activeButtonDataFilter
search(activeButtonDataFilter);

// Loop through each button and add a click event listener
buttons.forEach((button) => {
  button.addEventListener("click", () => {
    // Remove the 'active' class from all buttons
    buttons.forEach((btn) => btn.classList.remove("active"));

    // Add the 'active' class to the clicked button
    button.classList.add("active");

    // Get the value of the 'data-filter' attribute of the clicked button
    activeButtonDataFilter = button.getAttribute("data-filter");

    // Call the search function with the value of activeButtonDataFilter
    search(activeButtonDataFilter);
  });
});

function search(activeButtonDataFilter) {
  // Create a new XMLHttpRequest object
  const xhr = new XMLHttpRequest();

  // Set the URL of the PHP file
  const url = "search.php";

  // Define a function to handle the response
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Update the HTML with the search results
        document.getElementById("results-container").innerHTML =
          xhr.responseText;
      } else {
        console.error("Error:", xhr.statusText);
      }
    }
  };

  // Define the POST parameters
  const params = `search-location=${activeButtonDataFilter}&page-name=index.html`;

  // Set the request method to POST and send the AJAX request with the POST parameters
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(params);
}
//THIS IS FOR THE SEARCH PAGE

// Call the function when the document is ready
$(document).ready(function () {
  // Listen for the form submission event
  $("form").submit(function (event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Get the search term, location, and page name values from the form fields
    let searchTerm = $("#search-term").val();
    let searchLocation = $("#search-location").val();
    let pageName = $("#page-name").val();

    // Send a POST request to the search.php script with the search parameters
    $.post(
      "search.php",
      {
        "search-term": searchTerm,
        "search-location": searchLocation,
        "page-name": pageName,
      },
      function (data) {
        // Update the search results container with the search results HTML
        $("#search-results").html(data);
      }
    );
  });

  // When the document is ready, check for search parameters in the URL query string and submit the search form
  let params = new URLSearchParams(location.search);
  let searchTerm = params.get("search-term");
  let searchLocation = params.get("search-location");

  $("#search-term").val(searchTerm);
  $("#search-location").val(searchLocation);

  $("form").submit();
});
