<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Event Information</title>
  <link rel="stylesheet" href="css/eventInfo.css" />
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

    .input-container {
      flex: 1;
    }

    input[type="text"] {
      width: 85%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .event-details {
      position: relative;
      top: 95px;
    }

    .edit-button {
      margin-top: 343px;
      margin-right: 74%;
    }

    /* Modal styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .container-post {
      max-width: 600px;
      margin: auto;
      padding: 20px;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input,
    select,
    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .date-fields {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
    }

    button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }

    #cancelButton {
      background-color: #f34e4e;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    #cancelButton:hover {
      background-color: #ffa3a3;
    }

    /* ===================this is for form====================== */
    .modal {
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

    /* Center the modal content */
    .modal-content {
      border-radius: 20px;
      background-color: #fff;
      margin: auto;
      margin-top: 1%;
      /* Adjust as needed for vertical centering */
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 600px;
      /* Limit the width if necessary */
    }

    /* Close Button */
    #cancelButton {
      float: right;
    }

    .location-input {
      display: flex;
      align-items: center;
      position: relative;
    }

    /* Style for the input field */
    .location-input input[type="text"] {
      flex: 1;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    /* Style for the "Set Location" button */
    .set-location-button {
      position: absolute;
      top: 35%;
      transform: translateY(-50%);
      left: 10px;
      text-decoration: none;
      color: #dc3545;
      /* Change this to your desired color */
    }

    /* Style for the icon within the button */
    .set-location-button ion-icon {
      font-size: 20px;
      vertical-align: middle;
    }

    /* Style for the input field placeholder text */
    #location::placeholder {
      text-indent: 26px;
      /* Adjust this value to change the margin-left */
    }

    .date-time-container2 {
      margin-right: 150px;
    }

    .date-time-field2 {
      position: relative;
      right: 70px;
    }

    a {
      color: black;
    }

    a:hover {
      color: blue;
    }
  </style>
</head>

<body>
  <div id="main-info">
    <div class="event-info">
      <div class="edit-button">
        <a href="#" id="editButton">
          <ion-icon name="pencil-outline"></ion-icon>
        </a>
      </div>
      <div class="event-image">
        <img src="img/LTS.jpg" alt="Event Image" />
      </div>
      <a href="pendingAct.php">
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
            <input type="text" id="title" name="title" value="Teaching Literacy" readonly />
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
      <div class="launch-button">
        <a href="#" class="launch-link" id="setButton">
          <ion-icon name="create"></ion-icon>
          <span>Set</span>
        </a>
      </div>

      <!-- Modal -->
      <div class="modal" id="setModal">
        <div class="modal-content">
          <div class="container-post">
            <form>

              <div class="date-fields">
                <div class="date-time-container1">
                  <div class="date-time-field">
                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" required style="width: 190px" />
                  </div>
                  <div class="date-time-field">
                    <label for="start_time">Start Time:</label>
                    <input type="time" id="start_time" name="start_time" required style="width: 120px" />
                  </div>
                </div>
                <div class="date-time-container2">
                  <div class="date-time-field">
                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date" required style="width: 190px" />
                  </div>
                  <div class="date-time-field2">
                    <label for="end_time">End Time:</label>
                    <input type="time" id="end_time" name "end_time" required style="width: 120px" />
                  </div>
                </div>
              </div>
              <div class="location-field">
                <label for="location">Location:</label>
                <div class="location-input">
                  <input type="text" id="location" name="location" placeholder="Set Location" readonly />
                  <a href="https://maps.google.com" target="_blank" class="set-location-button">
                    <ion-icon name="locate"></ion-icon>
                  </a>
                </div>
              </div>

              <label for="image">Upload Image:</label>
              <input type="file" id="image" name="image" accept="image/*" required />
              <label for="title">Active Points:</label>
              <input type="text" id="title" name="title" required placeholder="Input points" />
              <br>
              <button id="postB" type="submit">
                <ion-icon name="rocket" style="vertical-align: middle; margin-right: 5px;"></ion-icon> Post
              </button>

              <button type="button" id="cancelButton">Cancel</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
  <script>
    const editButton = document.getElementById("editButton");
    const contentElements = document.querySelectorAll(".description-info p");
    let isEditing = false;

    editButton.addEventListener("click", () => {
      isEditing = !isEditing;
      contentElements.forEach((element) => {
        element.contentEditable = isEditing;
        element.style.border = isEditing ? "1px solid #000" : "none";
      });

      // Toggle the edit button's style based on the editing state
      if (isEditing) {
        editButton.classList.add("editing");
      } else {
        editButton.classList.remove("editing");
      }
    });

    // Get the "Set" button and the modal element
    const setButton = document.getElementById("setButton");


    // Function to open the modal
    function openSetModal() {
      const setModal = document.getElementById("setModal"); // Define setModal here
      setModal.style.display = "block";
    }

    // Event listener for opening the modal
    setButton.addEventListener("click", openSetModal);

    const cancelButton = document.getElementById("cancelButton");

    // Add a click event listener to the cancel button
    cancelButton.addEventListener("click", function() {
      const setModal = document.getElementById("setModal"); // Define setModal here as well
      // Hide the modal
      setModal.style.display = "none";
    });

    // Add a click event listener to the "Post" button
    const postButton = document.getElementById("postB");
    postButton.addEventListener("click", function() {
      // Redirect to dashboard.php when the "Post" button is clicked
      window.location.href = "dashboard.php";
    });
  </script>
</body>

</html>