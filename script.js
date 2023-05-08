// Get all the buttons
const buttons = document.querySelectorAll('#municipalities-button button');

// Set the initial value of the active button to the 'All' button
let activeButtonDataFilter = '';
console.log(activeButtonDataFilter);

// Call the search function with the initial value of activeButtonDataFilter
search(activeButtonDataFilter);

// Loop through each button and add a click event listener
buttons.forEach(button => {
  button.addEventListener('click', () => {

    // Remove the 'active' class from all buttons
    buttons.forEach(btn => btn.classList.remove('active'));

    // Add the 'active' class to the clicked button
    button.classList.add('active');

    // Get the value of the 'data-filter' attribute of the active button
    activeButtonDataFilter = button.getAttribute('data-filter');

    // Log the value of data-filter of the active button to the console
    console.log(activeButtonDataFilter);

    // Call the search function with the value of activeButtonDataFilter
    search(activeButtonDataFilter);

  });
});

//=========================

function search(activeButtonDataFilter) {
  // Create a new XMLHttpRequest object
  const xhr = new XMLHttpRequest();

  // Set the URL of the PHP file
  const url = 'search.php';

  // Set the request method to POST
  xhr.open('POST', url, true);

  // Set the request header
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  // Define a function to handle the response
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Update the HTML with the search results
        document.getElementById('results-container').innerHTML = xhr.responseText;
      } else {
        console.error('Error:', xhr.statusText);
      }
    }
  };

  // Define the POST parameters
  const params = `search-location=${activeButtonDataFilter}`;

  // Send the AJAX request with the POST parameters
  xhr.send(params);
}


