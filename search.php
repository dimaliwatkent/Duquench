<?php

// Load the XML file into a SimpleXML object
$xml = simplexml_load_file('directory.xml');

// Search for businesses that match the search term and location
$matches = [];
$search_term = isset($_POST['search-term']) ? $_POST['search-term'] : '';
$search_location = isset($_POST['search-location']) ? $_POST['search-location'] : '';
$page_name = isset($_POST['page-name']) ? $_POST['page-name'] : '';

// Convert SimpleXML object to array
$businesses = json_decode(json_encode($xml), true)['business'];

// Filter businesses based on search term and location
$matches = array_filter($businesses, function ($business) use ($search_term, $search_location) {
    $search_term_match = empty($search_term) || stripos($business['name'], $search_term) !== false 
        || stripos($business['address'], $search_term) !== false 
        || stripos($business['phone'], $search_term) !== false 
        || stripos($business['email'], $search_term) !== false 
        || stripos($business['website'], $search_term) !== false 
        || stripos($business['category'], $search_term) !== false 
        || stripos($business['description'], $search_term) !== false;
    
    $search_location_match = empty($search_location) || stripos($business['address'], $search_location) !== false;

    return $search_term_match && $search_location_match;
});

// Randomize the order of matches
shuffle($matches);

// Output the search results as HTML
if (count($matches) > 0) {
  echo "<div class='container' style='text-transform: uppercase;'><h4>{$search_term} {$search_location}</h4></div>";

    foreach ($matches as $match) {
        if ($page_name == "index.html") {
            echo "<div class='col-lg-3 col-md-4 col-sm-6 col-12'>
                    <div class='business-thumbnail'>
                    <a href='landing_page.php?name={$match['name']}'>
                            <img src='{$match['logo']}' alt='Logo' />
                        </a>
                        <div class='business-details'>
                            <h3 class='business-name'><a href='landing_page.php?name={$match['name']}'>{$match['name']}</a></h3>
                            <p class='business-address'><a href='#'>{$match['address']}</a></p>
                            <p class='business-category'>{$match['category']}</p>
                        </div>
                    </div>
                  </div>";
        } else if ($page_name == 'search_page.html') {
          echo "<div class='container'>
          <div class='row' onclick=\"redirectToLandingPage('{$match['name']}');\">
            <div class='col-md-4'>
              <img src='{$match['logo']}' class='img-fluid business-img' alt='Business Image'/>
            </div>
            <div class='col-md-8'>
              <div class='business-container'>
                <h2 class='business-name'>{$match['name']}</h2>
                <p class='business-info'>Address: {$match['address']}</p>
                <p class='business-info business-website'>
                  Website: <a href='#'>{$match['website']}</a>
                </p>
                <p class='business-description'>
                  {$match['description']}
                </p>
              </div>
            </div>
          </div>
        </div>";
        }
    }
} else {
    echo "<p>No matches found</p>";
}

?>

<script>
  function redirectToLandingPage(name) {
    var url = 'landing_page.php?name=' + encodeURIComponent(name);
    window.location.href = url;
  }
</script>
