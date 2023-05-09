<?php

// Load the XML file into a SimpleXML object
$xml = simplexml_load_file('directory.xml');

// Search for businesses that match the search term and location
$matches = [];
$search_term = isset($_POST['search-term']) ? $_POST['search-term'] : '';
$search_location = isset($_POST['search-location']) ? $_POST['search-location'] : '';
$page_name = isset($_POST['page-name']) ? $_POST['page-name'] : '';
// $pageName = $_POST["pageName"];

foreach ($xml->business as $business) {
    // Check if search term and/or location match any of the fields
    $search_term_match = ($search_term === '' || stristr($business->name, $search_term) !== false || stristr($business->address, $search_term) !== false || stristr($business->phone, $search_term) !== false || stristr($business->email, $search_term) !== false || stristr($business->website, $search_term) !== false || stristr($business->category, $search_term) !== false || stristr($business->description, $search_term) !== false);
    
    $search_location_match = ($search_location === '' || stristr($business->address, $search_location) !== false);

    if ($search_term_match && $search_location_match) {
        $matches[] = $business;
    }
}


// Output the search results as HTML
if (count($matches) > 0) {
    foreach ($matches as $match) {
      if ($page_name == "index.html") {
        echo "<div class='col-lg-3 col-md-4 col-sm-6 col-12'>

        <div class='business-thumbnail'>
            <a href='#'>
              <img
                src='{$match->logo}' alt='Logo'
              />
            </a>
            <div class='business-details'>
              <h3 class='business-name'><a href='#'>{$match->name}</a></h3>
              <p class='business-address'><a href='#'>{$match->address}</a></p>
              <p class='business-category'>{$match->category}</p>
            </div>
          </div>
      </div>";
      }
      else if ($page_name == "search_page.html") {
        echo "<h2>{$match->name}</h2>
        <img src='{$match->logo}' alt='Logo'>
        <p>{$match->description}</p>
        <p>Address: {$match->address}</p>
        <p>Phone: {$match->phone}</p>
        <p>Email: {$match->email}</p>
        <p>Website: {$match->website}</p>
        <hr>";
      }
        
       
    }
} else {
    echo "<p>No matches found</p>";
}

?>
