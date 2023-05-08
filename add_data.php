<?php
// Get the form data
$name = htmlspecialchars($_POST['name']);
$address = htmlspecialchars($_POST['address']);
$phone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);
$website = htmlspecialchars($_POST['website']);
$category = htmlspecialchars($_POST['category']);
$description = htmlspecialchars($_POST['description']);
$logo = htmlspecialchars($_POST['logo']);
$monday = htmlspecialchars($_POST['monday']);
$tuesday = htmlspecialchars($_POST['tuesday']);
$wednesday = htmlspecialchars($_POST['wednesday']);
$thursday = htmlspecialchars($_POST['thursday']);
$friday = htmlspecialchars($_POST['friday']);
$saturday = htmlspecialchars($_POST['saturday']);
$sunday = htmlspecialchars($_POST['sunday']);

// Load the XML file
$xml = new DOMDocument();
$xml->preserveWhiteSpace = false;
$xml->formatOutput = true;
$xml->load('directory.xml');

// Add a new business to the directory
$directory = $xml->getElementsByTagName('directory')->item(0);
$business = $directory->appendChild($xml->createElement('business'));
$business->appendChild($xml->createElement('name', $name));
$business->appendChild($xml->createElement('address', $address));
$business->appendChild($xml->createElement('phone', $phone));
$business->appendChild($xml->createElement('email', $email));
$business->appendChild($xml->createElement('website', $website));
$business->appendChild($xml->createElement('category', $category));
$business->appendChild($xml->createElement('description', $description));
$business->appendChild($xml->createElement('logo', $logo));
$opening_hours = $business->appendChild($xml->createElement('opening_hours'));
$opening_hours->appendChild($xml->createElement('monday', $monday));
$opening_hours->appendChild($xml->createElement('tuesday', $tuesday));
$opening_hours->appendChild($xml->createElement('wednesday', $wednesday));
$opening_hours->appendChild($xml->createElement('thursday', $thursday));
$opening_hours->appendChild($xml->createElement('friday', $friday));
$opening_hours->appendChild($xml->createElement('saturday', $saturday));
$opening_hours->appendChild($xml->createElement('sunday', $sunday));


// Save the updated XML file
$xml->save('directory.xml');

// Redirect back to the admin panel
header('Location: index.php');
exit;
?>
