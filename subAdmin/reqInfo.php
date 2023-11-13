<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Event Information</title>
  <link rel="stylesheet" href="css/reqInfo.css" />
  <link rel="icon" type="image/png" href="login/images/icons/civicicon.png" />

  <style>
    #main-info {
      background-color: white;
    }

    body {
      background-color: #E1E1E1;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input,
    select,
    textarea {
      width: 345%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .event-details {
      position: relative;
      top: 50px;
    }

    .launch-buttonn {
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
      background-color: #28a745;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
      transition: background-color 0.3s ease;
    }

    .launch-buttonn:hover {
      background-color: #1f7d39;
    }

    a {
      color: black;
      text-decoration: none;
    }

    a:hover {
      color: blue;
    }
  </style>
</head>

<body>
  <div id="main-info">
    <div class="event-info">
      <div class="event-image">
        <img src="img/emergency.jpg" alt="Event Image" />
      </div>
      <a href="validateRequest.php">
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
            <input type="text" id="title" name="title" value="Prevent Ignite" readonly />
          </div>
        </div>
        <div class="form-group">
          <label for="campus">Civic Engagement:</label>
          <div class="input-container">
            <input type="text" id="title" name="title" value="Seminar Training" readonly />
          </div>
        </div>
      </div>
    </div>
    <h2>Project Description</h2>
    <div class="event-description">
      <h2 style="color: white;">INTRODUCTION</h2>
      <div class="description-info">
        <p>
          Preventing fire drills is a proactive and essential aspect of fire safety, underscoring the importance of effective fire prevention measures. While fire drills play a crucial role in preparing individuals for emergency situations, preventing fires from occurring in the first place is the most effective strategy for safeguarding lives and property. Fire prevention encompasses a wide range of practices, from maintaining fire-resistant building materials and systems to promoting responsible fire use in homes and workplaces. It is a comprehensive approach that not only reduces the risks of fire-related disasters but also minimizes the disruption and trauma that fire drills aim to simulate. In this exploration, we delve into the fundamental principles of fire prevention, recognizing that a safer world is one where fire drills remain a precautionary measure rather than a necessary response to tragedy.
        </p>
      </div>
      <h2 style="color: white;">OBJECTIVES</h2>
      <div class="description-info">
        <p>
          1. Reduce Fire Incidents: To significantly decrease the occurrence of fires in homes, workplaces, and public spaces through proactive measures.
          <br><br>
          2. Preserve Life and Property: To safeguard the lives of individuals and protect property by preventing fires and minimizing their destructive impact.
          <br><br>
          3. Promote Fire Safety Education: To educate communities about fire safety practices, ensuring they are well-informed and capable of taking preventive actions.
          <br><br>
          4. Enhance Building Safety: To enforce and improve building and construction standards to minimize fire risks and enhance fire-resistant features.
          <br><br>
          5. Encourage Safe Fire Use: To promote responsible and safe practices for handling open flames, electrical equipment, and flammable materials.
          <br><br>
          6. Raise Awareness: To create awareness about the dangers of fire and the importance of fire prevention, fostering a culture of safety.
          <br><br>
          7. Legal and Regulatory Compliance: To ensure that individuals, businesses, and organizations adhere to fire safety regulations and codes.
          <br><br>
          8. Emergency Preparedness: To complement fire prevention efforts with emergency preparedness plans, ensuring that people know how to respond in the event of a fire.
          <br><br>
          9. Monitor and Evaluate Risk: To continually assess and mitigate fire risks in different settings, adapting prevention measures as needed.
          <br><br>
          10. Sustainability and Resilience: To integrate fire prevention strategies into broader sustainability and resilience plans, reducing the long-term impact of fires on communities and ecosystems.
        </p>
      </div>
      <h2 style="color: white;">REQUESTER</h2>
      <div class="description-info">
        <a href="http://localhost/Civic-web/totalStudentInfo.php">Cruz, Juan D/id=1869457616784805/fsdjhj34345kjl</a>
      </div>
      <div class="launch-buttonn">
        <a href="pendingAct.php" class="launch-link">
          <span>Approve</span>
        </a>
      </div>
      <div class="launch-button">
        <a href="validateRequest.php" class="launch-link">
          <span>Decline</span>
        </a>
      </div>

      <!-- Continue with the rest of the content -->
    </div>
  </div>
</body>

</html>