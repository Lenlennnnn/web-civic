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

    .launch-button {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 300px;
      /* Set the width to 300px */
      margin: 20px auto;
      /* Center the button horizontally */
      padding: 10px;
      border: solid 1px #ccc;
      border-radius: 10px;
      background-color: #a90101;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
      transition: background-color 0.3s ease;
    }

    .launch-button:hover {
      background-color: #dc3545;
    }

    .launch-link {
      display: flex;
      align-items: center;
      text-decoration: none;
      color: #333;
    }

    .launch-link ion-icon {
      font-size: 24px;
      margin-right: 10px;
      color: white;
    }

    .launch-link span {
      font-size: 18px;
      color: white;
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


    .user-icon,
    .share-icon,
    .cancel-icon {
      position: absolute;
      top: 60px;
      right: 45px;
      font-size: 50px;
      color: #28a745;
      cursor: pointer;
    }

    .share-icon {
      top: 140px;
      color: #343a40;
    }

    .cancel-icon {
      top: 200px;
      color: #dc3545;
    }

    .user-icon:hover,
    .cancel-icon:hover,
    .share-icon:hover {
      transform: scale(1.2);
      transition: transform 0.2s;
    }

    .notification-icon {
      position: relative;
      display: inline-block;
      right: -1183px;
      top: -109px;
    }

    .user-icon {
      right: 5px;
      top: -2px;
      transition: transform 0.3s ease-in-out;
    }

    .notification-badge {
      position: absolute;
      top: -5px;
      right: -1px;
      background-color: #fd7e14;
      color: white;
      border-radius: 50%;
      padding: 4px 6px;
      font-size: 12px;
      transition: transform 0.3s ease-in-out;
    }

    .notification-icon:hover .user-icon {
      transform: scale(1.2);
    }

    .notification-icon:hover .notification-badge {
      transform: scale(1.2);
    }

    /* Style for the modal */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0px;
      width: 100%;
      height: 100%;
      overflow: auto;

    }

    /* Style for the modal content */
    .modal-content {
      background-color: #fff;
      margin: 10% auto;
      padding: 0px;
      border: 1px solid #888;
      width: 80%;
      max-width: 400px;
      border-radius: 5px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      position: fixed;
      left: 35%;
    }

    /* Style for the modal header */
    .modal-header {
      background-color: #343a40;
      color: white;
      text-align: center;
      padding: 1px;
      margin: 0;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }

    /* Style for the modal body */
    .modal-body {
      padding: 0px;
      position: relative;
      top: -20px;
    }

    /* Style for the school checkboxes */
    .school-checkbox {
      padding: 10px;
      padding-top: 0%;
    }

    /* Style for the modal footer */
    .modal-footer {
      text-align: center;
      padding-bottom: 10px;
    }

    /* Style for the save button */
    .modal-button {
      background-color: #28a745;
      transition: background-color 0.3s;
      color: #fff;
      border: none;
      border-radius: 4px;
      padding: 10px 20px;
      cursor: pointer;
    }

    i h4 {
      font-weight: normal;
    }

    .modal-button:hover {
      background-color: #1e7e34;
    }

    /* Style for the close button */
    .close {
      position: absolute;
      right: 10px;
      top: 0px;
      font-size: 24px;
      cursor: pointer;
      color: white;
    }

    .selection {
      position: relative;
      top: 0px;
      padding: 0;
      margin: 0;
    }

    /* Remove the button border and background */
    #selectAllBtn,
    #unselectAllBtn {
      border: none;
      background: none;
      cursor: pointer;
      text-decoration: underline;
      color: lightslategray;
      transition: color 0.3s;
    }

    #selectAllBtn:hover,
    #unselectAllBtn:hover {
      text-decoration: none;
      color: black;
    }

    /* Style for QR code modal */
    .modalqr {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-contentqr {
      background-color: #fff;
      margin: 10% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 300px;
      border-radius: 5px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    /* Style for the cancel button */
    #cancelQRCodeButton {
      background-color: #dc3545;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
      margin-top: 10px;
    }

    #cancelQRCodeButton:hover {
      background-color: #c82333;
    }

    #qrcode {
      margin-left: 77px;
    }

    #generateQRCodeButton {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: transform 0.2s;
      position: absolute;
      left: 83%;
      top: 62%;
    }

    #generateQRCodeButton:hover {
      background-color: #0056b3;
      transform: scale(1.1);
    }
  </style>
</head>

<body>
  <div id="main-info">
    <div class="event-info">
      <a href="joinStudent.php">
        <div class="notification-icon">
          <ion-icon name="person-circle" class="user-icon"></ion-icon>
          <span class="notification-badge">new</span>
        </div>
      </a>
      <!-- HTML -->
      <div class="modal" id="shareModal">
        <div class="modal-content">
          <span class="close" id="closeShareModal">&times;</span>
          <div class="modal-header">
            <h3>Share the event</h3>
          </div>
          <div class="modal-body">

            <i>
              <h4>Select campuses:</h4>
            </i>
            <div class="selection">
              <button id="selectAllBtn">Select All</button>
              <button id="unselectAllBtn">Unselect All</button>
            </div>
            <div class="school-checkbox">
              <input type="checkbox" id="school1" name="school1" value="School 1">
              <label for="school1">ARASOF Nasugbu Campus</label><br>
              <input type="checkbox" id="school2" name="school2" value="School 2">
              <label for="school2">Balayan Campus</label><br>
              <input type="checkbox" id="school3" name="school3" value="School 3">
              <label for="school3">JPLPC Malvar Campus</label><br>
              <input type="checkbox" id="school4" name="school4" value="School 4">
              <label for="school4">Lemery Campus</label><br>
              <input type="checkbox" id="school5" name="school5" value="School 5">
              <label for="school5">Lipa Campus</label><br>
              <input type="checkbox" id="school6" name="school6" value="School 6">
              <label for="school6">Lobo Campus</label><br>
              <input type="checkbox" id="school7" name="school7" value="School 7">
              <label for="school7">Mabini Campus</label><br>
              <input type="checkbox" id="school8" name="school8" value="School 8">
              <label for="school8">Pablo Borbon Campus 1(Poblacion)</label><br>
              <input type="checkbox" id="school9" name="school9" value="School 9">
              <label for="school9">Pablo Borbon Campus 2(Alanginan)</label><br>
              <input type="checkbox" id="school10" name="school10" value="School 10">
              <label for="school10">Rosario Campus</label><br>
              <input type="checkbox" id="school11" name="school11" value="School 11">
              <label for="school11">San Juan Campus</label><br>
            </div>
          </div>
          <div class="modal-footer">
            <button class="modal-button">Share</button>
          </div>
        </div>
      </div>


      <ion-icon name="share-social" class="share-icon"></ion-icon>
      <ion-icon name="close-circle" class="cancel-icon" id="cancelButton"></ion-icon>

      <!-- Generate QR code button -->
      <button id="generateQRCodeButton">Generate QR Code</button>

      <!-- Modal for displaying QR code -->
      <div id="qrCodeModal" class="modalqr">
        <div class="modal-contentqr">
          <p>Scan me! For attendance to get points</p>
          <div id="qrcode"></div>
          <button id="cancelQRCodeButton">Cancel</button>
        </div>
      </div>




      <div class="event-image">
        <img src="img/linis.jpg" alt="Event Image" />
      </div>
      <a href="dashboard.php">
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
            <input type="text" id="title" name="title" value="Malvar Batangas" readonly />
          </div>
        </div>
        <div class="form-group">
          <label for="campus">Date and Time:</label>
          <div class="input-container">
            <input type="text" id="title" name="title" value="2023/08/20 (Tuesday) / 9:00 AM - 4:00 PM" readonly />
          </div>
        </div>
      </div>


    </div>
    <h2>Project Description</h2>
    <div class="event-description">
      <h2 style="color: white;">INTRODUCTION</h2>
      <div class="description-info">
        <p>
          Teaching literacy is a foundational and transformative endeavor that empowers individuals to navigate, comprehend, and communicate effectively in a complex and interconnected world. Literacy is not merely the ability to read and write; it is the key to unlocking a world of knowledge, self-expression, and critical thinking. By fostering literacy skills, educators provide students with the essential tools to decode the written word, interpret diverse texts, and express themselves with confidence. Furthermore, teaching literacy transcends the classroom, as it equips learners with the lifelong capacity to explore new ideas, engage with diverse perspectives, and participate actively in their communities, both as informed citizens and as lifelong learners. In this introduction, we embark on a journey to explore the multifaceted realm of teaching literacy, understanding its profound impact on personal development, intellectual growth, and societal progress.
        </p>
      </div>
      <h2 style="color: white;">OBJECTIVES</h2>
      <div class="description-info">
        <p>
          1. Promote Reading Proficiency: To foster a love for reading and develop reading comprehension skills, enabling students to engage with a wide range of texts effectively.
          <br><br>
          2. Enhance Writing Competence: To cultivate students' ability to express their thoughts, ideas, and opinions clearly and coherently in writing, fostering effective communication skills.
          <br><br>
          3. Encourage Critical Thinking: To empower students with the capacity to analyze, evaluate, and interpret texts critically, enabling them to discern information and make informed decisions.
          <br><br>
          4. Cultivate Effective Communication: To nurture students' oral communication skills, helping them express themselves with confidence, clarity, and persuasiveness in both formal and informal settings.
          <br><br>
          5. Expand Vocabulary and Language Mastery: To enrich students' vocabulary and language proficiency, equipping them with the words and linguistic tools necessary to articulate complex thoughts and concepts.
          <br><br>
          6. Promote Information Literacy: To teach students how to assess the credibility and reliability of information sources, enabling them to navigate the information age effectively.
          <br><br>
          7. Foster a Lifelong Love of Learning: To instill a passion for learning, encouraging students to pursue knowledge independently, beyond the classroom.
          <br><br>
          8. Cultivate Cultural Awareness and Empathy: To introduce students to diverse perspectives through literature and texts, fostering cultural understanding and empathy.
          <br><br>
          9. Prepare for Academic and Career Success: To provide students with the literacy skills necessary for success in higher education and the workforce.
          <br><br>
          10. Promote Digital Literacy: To equip students with the skills needed to navigate the digital world, including online research, digital communication, and responsible online behavior.
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
          1. Whiteboard/Chalkboard <br>

          2. Markers/Chalk <br>

          3. Projector/Interactive Whiteboard <br>

          4. Textbooks <br>

          5. Supplementary Books and Reading Materials <br>

          6. Art Supplies

        </p>
      </div>
    </div>
  </div>
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
  <script>
    // Get the cancel icon element by its class
    const cancelIcon = document.querySelector('.cancel-icon');

    // Add a click event listener to the cancel icon
    cancelIcon.addEventListener('click', function() {
      // Ask the user if they are sure
      const userConfirmed = confirm('Are you sure you want invalidate the event?');

      // Check if the user confirmed
      if (userConfirmed) {
        // Redirect to the desired page (pendingAct.php) when the user clicks "Yes"
        window.location.href = 'pendingAct.php';
      }
    });

    /* modal */
    // Get the share icon and modal elements by their IDs
    const shareIcon = document.querySelector('.share-icon');
    const shareModal = document.getElementById('shareModal');
    const closeShareModal = document.getElementById('closeShareModal');

    // Add a click event listener to the share icon to open the modal
    shareIcon.addEventListener('click', function() {
      shareModal.style.display = 'block';
    });

    // Add a click event listener to the close button to close the modal
    closeShareModal.addEventListener('click', function() {
      shareModal.style.display = 'none';
    });

    // Close the modal when clicking outside of it
    window.addEventListener('click', function(event) {
      if (event.target === shareModal) {
        shareModal.style.display = 'none';
      }
    });

    /* select all */
    // Get the checkboxes and buttons by their IDs
    const checkboxes = document.querySelectorAll('.school-checkbox input[type="checkbox"]');
    const selectAllBtn = document.getElementById('selectAllBtn');
    const unselectAllBtn = document.getElementById('unselectAllBtn');

    // Function to handle the Select All button click
    selectAllBtn.addEventListener('click', function() {
      checkboxes.forEach(checkbox => {
        checkbox.checked = true;
      });
    });

    // Function to handle the Unselect All button click
    unselectAllBtn.addEventListener('click', function() {
      checkboxes.forEach(checkbox => {
        checkbox.checked = false;
      });
    });

    // Get the "Share" button element by its class
    const shareButton = document.querySelector('.modal-button');

    // Add a click event listener to the "Share" button
    shareButton.addEventListener('click', function() {
      // Hide the modal by setting its display property to "none"
      const shareModal = document.getElementById('shareModal');
      shareModal.style.display = 'none';
    });

    // Get the QR code modal and its content
    const qrCodeModal = document.getElementById("qrCodeModal");
    const qrCodeContent = document.querySelector(".modal-contentqr");

    // Get the generate QR code button and cancel QR code button
    const generateQRCodeButton = document.getElementById("generateQRCodeButton");
    const cancelQRCodeButton = document.getElementById("cancelQRCodeButton");

    // When the generate QR code button is clicked
    generateQRCodeButton.addEventListener("click", function() {
      // Display the QR code modal
      qrCodeModal.style.display = "block";

      // Generate and display the QR code (You can add your QR code generation code here)
      const qrCode = new QRCode(document.getElementById("qrcode"), {
        text: "Your QR code data here",
        width: 150,
        height: 150,
      });
    });

    // When the cancel QR code button is clicked
    cancelQRCodeButton.addEventListener("click", function() {
      // Close the QR code modal and remove the QR code
      qrCodeModal.style.display = "none";
      document.getElementById("qrcode").innerHTML = "";
    });
  </script>
</body>

</html>