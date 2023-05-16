<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DuQuench</title>
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
    <div class="container contact-section" style="margin-top: 100px">
  <h2>Contact Us</h2>
  <p>We'd love to hear from you! If you have any questions, suggestions, or feedback, please feel free to get in touch with us.</p>
  
  <div class="row">
    <div class="col-md-6 contact-info">
      <h3>General Inquiries</h3>
      <p>Email: duquench@gmail.com</p>
      <p>Phone: 0987 654 3210</p>
    </div>
    
    <div class="col-md-6 contact-info">
      <h3>Advertising Opportunities</h3>
      <p>Email: advertiseDuquench@gmail.com</p>
      <p>Phone: 0912 345 6789</p>
    </div>
  </div>
  
  <div class="contact-form">
    <h3>Send us a message</h3>
    <form>
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Your Name" required>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Your Email" required>
      </div>
      <div class="form-group">
        <textarea class="form-control" name="message" placeholder="Your Message" rows="5" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
  </div>
</div>

    <?php include('navbar_footer/footer.php'); ?>

    <script src="script.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
