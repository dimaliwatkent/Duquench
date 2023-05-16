<div id="myDiv" onclick="redirectToLandingPage('<?php echo $match['name']; ?>');">
  Click me!
</div>

<script>
  function redirectToLandingPage(name) {
    var url = 'landing_page.php?name=' + encodeURIComponent(name);
    window.location.href = url;
  }
</script>
