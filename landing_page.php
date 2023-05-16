<?php
$xml = simplexml_load_file('directory.xml');

$business = null;

// Retrieve the business name from the query parameter
if (isset($_GET['name'])) {
    $businessName = $_GET['name'];

    // Find the business element with a matching name
    $businesses = $xml->xpath("//business[name='{$businessName}']");
    if (!empty($businesses)) {
        $business = $businesses[0];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $business ? $business->name : 'Business Not Found'; ?></title>

    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="node_modules/bootstrap/dist/css/bootstrap.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="node_modules/bootstrap-icons/font/bootstrap-icons.css"
    />
</head>
<body>
<?php include('navbar_footer/navbar.php'); ?>
<div style="margin-top: 100px"></div>
    <?php if ($business): ?>
        <h1><?php echo $business->name; ?></h1>
        <p><strong>Address:</strong> <?php echo $business->address; ?></p>
        <p><strong>Phone:</strong> <?php echo $business->phone; ?></p>
        <p><strong>Email:</strong> <?php echo $business->email; ?></p>
        <p><strong>Website:</strong> <a href="<?php echo $business->website; ?>"><?php echo $business->website; ?></a></p>
        <p><strong>Description:</strong> <?php echo $business->description; ?></p>
        <p><strong>Opening Hours:</strong></p>
        <ul>
            <?php foreach ($business->opening_hours->children() as $day => $hours): ?>
                <li><strong><?php echo ucfirst($day); ?>:</strong> <?php echo $hours; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <h1>Business Not Found</h1>
        <p>The requested business was not found.</p>
    <?php endif; ?>
    <?php include('navbar_footer/footer.php'); ?>
</body>
</html>




