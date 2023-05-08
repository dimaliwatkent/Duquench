<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <?php
        function get_barangays($municipality) {
            $xml = simplexml_load_file('location.xml');
            $barangays = "";
            foreach ($xml->municipality as $m) {
                if ($m->attributes()->name == $municipality) {
                    $barangays = implode(",", json_decode(json_encode($m->barangay), true));
                    break;
                }
            }
            return $barangays;
        }
        
          ?>
  </head>
  <body>
    <h1>Add a Business</h1>
    <form action="add_data.php" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" /><br /><br />
      <label for="address">Address:</label>
      <input type="text" id="address" name="address"  readonly /><br /><br />

      <!-- <label for="municipality">Municipality:</label> -->
      <select id="municipality" name="municipality">
        <option value="">Select a municipality</option>
        <option value="Boac" data-barangays="<?php echo get_barangays('Boac'); ?>">Boac</option>
        <option value="Buenavista" data-barangays="<?php echo get_barangays('Buenavista'); ?>">Buenavista</option>
        <option value="Gasan" data-barangays="<?php echo get_barangays('Gasan'); ?>">Gasan</option>
        <option value="Mogpog" data-barangays="<?php echo get_barangays('Mogpog'); ?>">Mogpog</option>
        <option value="Santa Cruz" data-barangays="<?php echo get_barangays('Santa Cruz'); ?>">Santa Cruz</option>
        <option value="Torrijos" data-barangays="<?php echo get_barangays('Torrijos'); ?>">Torrijos</option>
    </select>

      <!-- <label for="barangay">Barangay:</label> -->
      <select id="barangay" name="barangay">
        <option value="">Select a barangay</option>
      </select>
      <br /><br />
      

      <label for="phone">Phone:</label>
      <input type="text" id="phone" name="phone" /><br /><br />
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" /><br /><br />
      <label for="website">Website:</label>
      <input type="text" id="website" name="website" /><br /><br />
      <label for="category">Category:</label>
      <input type="text" id="category" name="category" /><br /><br />
      <label for="description">Description:</label><br />
      <textarea id="description" name="description"></textarea><br /><br />
      <label for="logo">Logo:</label>
      <input
        type="text"
        id="logo"
        name="logo"
        value="https://via.placeholder.com/200x200"
      /><br /><br />
      

      <!-- Opening hours -->
      <label for="opening-time">Opening Time:</label>
      <input type="time" id="opening-time" name="opening-time" >

      <label for="closing-time">Closing Time:</label>
      <input type="time" id="closing-time" name="closing-time" /><br /><br />

      <label for="time">Selected Time:</label>
      <input type="text" id="time" name="time" readonly /><br /><br />

      <label for="mondayCheck">Monday:</label>
      <input
        type="checkbox"
        id="mondayCheck"
        name="mondayCheck"
        value="monday"
      >

      <label for="tuesdayCheck">Tuesday:</label>
      <input
        type="checkbox"
        id="tuesdayCheck"
        name="tuesdayCheck"
        value="tuesday"
      >

      <label for="wednesdayCheck">Wednesday:</label>
      <input
        type="checkbox"
        id="wednesdayCheck"
        name="wednesdayCheck"
        value="wednesday"
      >

      <label for="thursdayCheck">Thursday:</label>
      <input
        type="checkbox"
        id="thursdayCheck"
        name="thursdayCheck"
        value="thursday"
      >

      <label for="fridayCheck">Friday:</label>
      <input
        type="checkbox"
        id="fridayCheck"
        name="fridayCheck"
        value="friday"
      >

      <label for="saturdayCheck">Saturday:</label>
      <input
        type="checkbox"
        id="saturdayCheck"
        name="saturdayCheck"
        value="saturday"
      >

      <label for="sundayCheck">Sunday:</label>
      <input
        type="checkbox"
        id="sundayCheck"
        name="sundayCheck"
        value="sunday"
      /><br /><br />

      <label for="monday">Monday:</label>
      <input type="text" id="monday" name="monday" value="Closed" /><br /><br />
      <label for="tuesday">Tuesday:</label>
      <input
        type="text"
        id="tuesday"
        name="tuesday"
        value="Closed"
      /><br /><br />
      <label for="wednesday">Wednesday:</label>
      <input
        type="text"
        id="wednesday"
        name="wednesday"
        value="Closed"
      /><br /><br />
      <label for="thursday">Thursday:</label>
      <input
        type="text"
        id="thursday"
        name="thursday"
        value="Closed"
      /><br /><br />
      <label for="friday">Friday:</label>
      <input type="text" id="friday" name="friday" value="Closed" /><br /><br />
      <label for="saturday">Saturday:</label>
      <input
        type="text"
        id="saturday"
        name="saturday"
        value="Closed"
      /><br /><br />
      <label for="sunday">Sunday:</label>
      <input type="text" id="sunday" name="sunday" value="Closed" /><br /><br />
      <!-- End of Opening hours -->

      <input type="submit" value="Save" />
    </form>
    <script src="script.js"></script>
    <script>
      const form = document.querySelector("form");
      const municipalityDropdown = document.getElementById("municipality");
      const barangayDropdown = document.getElementById("barangay");
      const addressInput = document.getElementById("address");

      // Populate the barangay dropdown menu when the municipality is selected
      municipalityDropdown.addEventListener("change", function () {
        const selectedMunicipality =
          municipalityDropdown.options[municipalityDropdown.selectedIndex];
        const barangays = selectedMunicipality.dataset.barangays.split(",");
        barangayDropdown.innerHTML = "";
        barangays.forEach(function (barangay) {
          const option = document.createElement("option");
          option.value = barangay;
          option.textContent = barangay;
          barangayDropdown.appendChild(option);
        });
      });

      // Handle form submission
      form.addEventListener("submit", function (event) {
        event.preventDefault();

        //// Get the selected values from the dropdown menus
        const selectedBarangay = barangayDropdown.value;
        const selectedMunicipality = municipalityDropdown.value;
        // Create the formatted address string
        const address = `${selectedBarangay}, ${selectedMunicipality}`;

        // Set the formatted address as the value of the address input field
        addressInput.value = address;
        form.submit();
      });

      // Add an event listener to the municipality dropdown
      municipalityDropdown.addEventListener("change", function () {
        // Get the selected municipality option
        const selectedMunicipality =
          municipalityDropdown.options[municipalityDropdown.selectedIndex];

        // Get the barangays for the selected municipality
        const barangays = selectedMunicipality.dataset.barangays.split(",");

        // Clear the barangay dropdown
        barangayDropdown.innerHTML = "";

        // Add the default "Select a barangay" option
        const defaultOption = document.createElement("option");
        defaultOption.text = "Select a barangay";
        barangayDropdown.add(defaultOption);

        // Add the barangays for the selected municipality to the barangay dropdown
        barangays.forEach(function (barangay) {
          const option = document.createElement("option");
          option.value = barangay;
          option.textContent = barangay;
          barangayDropdown.appendChild(option);
        });

        // Update the address textbox
        const addressTextbox = document.getElementById("address");
        addressTextbox.value =
          selectedMunicipality.text +
          ", " +
          barangayDropdown.options[barangayDropdown.selectedIndex].text;
      });

      // Add an event listener to the barangay dropdown
      barangayDropdown.addEventListener("change", function () {
        const selectedMunicipality =
          municipalityDropdown.options[municipalityDropdown.selectedIndex];
        const selectedBarangay =
          barangayDropdown.options[barangayDropdown.selectedIndex];
        const addressTextbox = document.getElementById("address");
        addressTextbox.value =
          selectedMunicipality.text + ", " + selectedBarangay.text;
      });
    </script>
  </body>
</html>
