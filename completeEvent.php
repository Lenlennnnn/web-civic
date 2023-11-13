<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Event Information</title>
  <link rel="stylesheet" href="css/completeEvent.css" />
  <link rel="icon" type="image/png" href="login/images/icons/civicicon.png" />

  <style>
    #main-info {
      background-color: white;
    }

    body {
      background-color: #E1E1E1;
    }



    .event-details {
      display: flex;
      flex-direction: column;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      margin-bottom: 10px;
      /* Add spacing between form groups */
    }

    label {

      /* Adjust the width as needed */
      text-align: left;
      margin-right: 10px;
      /* Add some spacing between the label and input */
      font-weight: bold;
      margin-bottom: 5px;
    }

    .event-details {
      position: inherit;
      margin-top: 25px;


    }

    .input-container {
      flex: 1;
    }

    input[type="text"] {
      width: 85%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }


    .user-icon {
      position: absolute;
      top: 350px;
      right: 60px;
      font-size: 50px;
      color: #343a40;
      cursor: pointer;
    }

    .user-icon:hover {
      transform: scale(1.2);
      transition: transform 0.2s;
    }

    .hyperlink {
      text-decoration: underline;
      color: black;
      cursor: pointer;
      margin-left: 5px;
      position: relative;
      top: -27px;
      left: 4px;
      text-decoration: none;
    }

    .hyperlink:hover {
      color: #0056b3;
      /* Darker color on hover */
    }
  </style>
</head>

<body>
  <div id="main-info">
    <div class="event-info">
      <a href="attendance.php">
        <div class="notification-icon">
          <ion-icon name="person-circle" class="user-icon"></ion-icon>
        </div>
      </a>
      <div class="event-image">
        <img src="img/linis.jpg" alt="Event Image" />
      </div>
      <a href="completedAct.php">
        <div class="back-button">
          <ion-icon name="return-down-back-outline"></ion-icon>
        </div>
      </a>
      <!-- ====== ionicons ======= -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <div class="event-details">
        <div class="form-group">
          <label for="campus">Title:</label>
          <div class="input-container">
            <input type="text" id="title" name="title" value="Clean and Green" readonly />
          </div>
        </div>
        <div class="form-group">
          <label for="campus">Civic Engagement:</label>
          <div class="input-container">
            <input type="text" id="title" name="title" value="Tree Planting" readonly />
          </div>
        </div>
        <div class="form-group">
          <label for="campus">Location:</label>
          <div class="input-container">
            <input type="text" id="title" name="title" value="" readonly />
            <a href="https://www.google.com.ph/maps/place/Manila,+Metro+Manila/@14.604291,120.9418795,12.46z/data=!4m6!3m5!1s0x3397ca03571ec38b:0x69d1d5751069c11f!8m2!3d14.5995124!4d120.9842195!16zL20vMDE5NXBk?entry=ttu" target="_blank" class="hyperlink">maps/place/Manila,+Metro+Manila/@14.604291,120.9418795,12.46z</a>
          </div>

        </div>
        <div class="form-group">
          <label for="campus">Date and Time:</label>
          <div class="input-container">
            <input type="text" id="title" name="title" value="2023/08/20 - 2023/08/23 (Monday) / 9:00 AM - 4:00 PM" readonly />
          </div>
        </div>
      </div>


    </div>
    <h2>Project Description</h2>
    <div class="event-description">
      <h2 style="color: white;">INTRODUCTION</h2>
      <div class="description-info">
        <p>
          Cleaning the environment is a vital responsibility that transcends personal and collective interests, embodying our commitment to safeguarding the planet and ensuring a sustainable future for generations to come. It involves the conscientious removal of pollutants, waste, and harmful elements from our surroundings, promoting the restoration and preservation of natural ecosystems. Cleaning the environment is not limited to physical debris but extends to addressing broader issues such as air and water quality, deforestation, and climate change mitigation. It signifies our dedication to harmonious coexistence with nature, recognizing that a cleaner environment not only enhances our own well-being but also plays an essential role in protecting the intricate web of life on Earth and preserving the beauty and diversity of our planet.
        </p>
      </div>
      <h2 style="color: white;">OBJECTIVES</h2>
      <div class="description-info">
        <p>
          1. Reduce Pollution: To decrease the release of pollutants into the air, water, and soil, mitigating the adverse effects on human health and ecosystems.
          <br><br>
          2. Waste Reduction and Recycling: To minimize waste generation and promote recycling efforts, conserving natural resources and reducing landfill usage.
          <br><br>
          3. Preserve Biodiversity: To protect and restore natural habitats, safeguarding the diverse species that constitute the Earth's ecosystems.
          <br><br>
          4. Combat Climate Change: To reduce greenhouse gas emissions through sustainable practices, contributing to global efforts to mitigate climate change.
          <br><br>
          5. Promote Sustainable Resource Management: To encourage responsible use of resources, ensuring their availability for future generations.
          <br><br>
          6. Improve Air and Water Quality: To enhance the quality of the air we breathe and the water we drink, safeguarding human health and the environment.
          <br><br>
          7. Educate and Raise Awareness: To inform and engage communities about environmental issues, fostering a sense of responsibility and sustainable practices.
          <br><br>
          8. Laws and Regulations Compliance: To ensure compliance with environmental laws and regulations, holding individuals, businesses, and industries accountable for their impact on the environment.
          <br><br>
          9. Economic and Social Benefits: To recognize and promote the economic and social benefits of a clean environment, including increased property values, improved public health, and job creation in sustainable industries.
          <br><br>
          10. Sustainable Development: To align environmental cleanliness with broader goals of sustainable development, balancing human needs with ecological imperatives.
        </p>
      </div>
      <h2 style="color: white;">CAMPUS</h2>
      <div class="description-info">
        <p>
          JPLPC Malvar Batangas
        </p>
      </div>
      <h2 style="color: white;">MATERIALS</h2>
      <div class="description-info">
        <p>
          1. Safety Gear <br>

          2. Trash Bags and Containers <br>

          3. Cleaning Tools <br>

          4. Cleaning Supplies <br>

          5. Disposal Equipment

        </p>
      </div>
    </div>
  </div>
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
  <script>
  </script>
</body>

</html>