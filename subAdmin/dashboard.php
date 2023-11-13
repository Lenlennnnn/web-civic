<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Civicall Admin Dashboard</title>
  <link rel="icon" type="image/png" href="login/images/icons/civicicon.png" />
  <link rel="stylesheet" href="css/dashboard.css" />
  <link rel="stylesheet" href="css/post.css" />



  <style>
    .dashboard {
      color: #a90011;
      position: absolute;
      left: 80px;
      top: 10px;
    }

    .adminPro {
      color: #a90011;
      position: absolute;
      right: 90px;
    }

    .notifIcon {
      position: absolute;
      right: 204px;
      font-size: 20px;
      color: #6c757d;
    }

    .topbar {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      /* Add a shadow here */
    }

    .search {
      position: relative;
      top: 10px;
    }

    .user-profile {
      position: relative;
      bottom: 3px;
    }

    /* this is for upcoming */
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }

    th,
    td {
      padding: 8px 12px;
      border: 1px solid #ddd;
      text-align: left;
    }

    thead {
      background-color: #f2f2f2;
    }

    th {
      background-color: #333;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #ddd;
    }


    .number-column {
      width: 50px;
      /* Custom width, adjust as needed */
    }


    .date-column {
      width: 100px;
      /* Custom width, adjust as needed */
    }

    .upcoming {
      width: 100%;
    }

    .tableIto {
      position: relative;
      bottom: 65px;
    }

    .date-column {
      width: 150px;
    }

    /* for notification */
    /* Style for the notification icon */
    .notifIcon {
      font-size: 24px;
      cursor: pointer;
      transition: transform 0.2s;
    }

    .notifIcon:active {
      transform: scale(1.4);
    }

    .notifIcon:hover {
      color: black
    }




    /* Style for the notification dropdown container */
    #notificationDropdown {
      display: none;
      position: absolute;
      background-color: white;
      /* Changed background color to red */
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      min-width: 300px;
      width: 200px;
      padding: 0px;
      top: 30px;
      /* Adjust the positioning as needed */
      right: 65px;
      top: 65px;
      /* Adjust the positioning as needed */
      z-index: 1;

    }

    /* Style for the notification heading */
    #notificationDropdown .notification {
      font-size: 18px;
      color: #333;
      /* Adjust the color as needed */
      margin-bottom: 0px;
    }

    /* Style for individual notification items */
    #notificationDropdown a {
      display: block;
      text-decoration: none;
      color: #333;
      /* Adjust the color as needed */
      padding: 10px;
      border-bottom: 1px solid #ccc;
      /* Add a separator between items */
    }

    #notificationDropdown a:hover {
      background-color: #f0f0f0;
      /* Add a background color on hover */
    }

    /* Style for the icon circles */
    #notificationDropdown .icon-circle {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      text-align: center;
      line-height: 30px;
      margin-right: 10px;
    }

    /* Style for the icon inside the circles */
    #notificationDropdown i {
      color: #fff;
      /* Adjust the color as needed */
    }

    /* Style for the date and content of notifications */
    #notificationDropdown .small {
      font-size: 12px;
      color: #888;
      /* Adjust the color as needed */
    }

    /* Style for the "Show All Alerts" link */
    #notificationDropdown .others {
      text-align: center;
      margin-top: 10px;
      font-weight: bold;
      color: #333;
      /* Changed the color to red */
      text-decoration: none;
      /* Removed underline */
    }

    #notificationDropdown .others:hover {
      color: #555;
      /* Adjust the color on hover as needed */
    }

    .notifBack {
      background-color: #6c757d;

      padding: 10px;
    }

    /* ============================ dropdown menu ============================== */

    .avatar {
      position: relative;
      right: 25px;
      top: 5px;
      cursor: pointer;
    }

    .dropdown-menu {
      display: none;
      position: absolute;
      background-color: white;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      /* Position the dropdown menu below the avatar and center it horizontally */
      top: 120%;
      left: -70px;
      transform: translateX(-50%);
      /* Set a minimum width to prevent wrapping */
      min-width: 180px;
      /* Align the text to the right */
      text-align: left;
      border-radius: 0px;
      border: solid 1px #ccc;
    }

    .dropdown-menu,
    .popup-form-my_account {
      display: none;
    }

    /* Style the dropdown links */
    .dropdown-item {
      display: block;
      padding: 12px 16px;
      text-decoration: none;
      color: #333;
      /* Set white-space to nowrap to prevent text wrapping */
      white-space: nowrap;
      border-radius: 0px;
    }

    /* Change the background color on hover */
    .dropdown-item:hover {
      background-color: #ddd;
    }

    /* for notification */
    .badge {
      position: absolute;
      top: 10px;
      right: 195px;
      background-color: #28a745;
      color: white;
      border-radius: 50%;
      padding: 5px;
      font-size: 8px;
      z-index: 1;
    }

    a {
      transition: color 0.3s ease;
    }

    /* Apply the transition effect on hover */
    a:hover {
      color: #a90011;
      /* Change the link color on hover */
    }

    /* Style for the transition effect */
    .page-transition {
      opacity: 1;
      transition: opacity 0.5s ease-in-out;
    }

    /* Style for the page being loaded */
    .page-loading {
      opacity: 0;
    }
  </style>

</head>

<body>
  <!-- =============================================== Navigation ================================================ -->
  <div class="container1">
    <div class="navigation">
      <ul>
        <li>
          <a href="#">
            <span class="icon">
              <img src="img/logos.png" alt="" width="30px" height="30px" />
            </span>
            <span class="title">CIVICALL</span>
          </a>
        </li>

        <li>
          <a href="dashboard.php">
            <span class="icon">
              <ion-icon name="grid-outline"></ion-icon>
            </span>
            <span class="title">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="https://calendar.google.com/calendar/u/0/r?pli=1">
            <span class="icon">
              <ion-icon name="calendar-outline"></ion-icon>
            </span>
            <span class="title">Schedules</span>
          </a>
        </li>

        <li>
          <a href="messages.html" id="openMessagesModal" class="page-transition">
            <span class="icon">
              <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
            </span>
            <span class="title">Messages</span>
          </a>
        </li>

        <li>
          <a href="reportMonitoring.php" class="page-transition">
            <span class="icon">
              <ion-icon name="document-text-outline"></ion-icon> </span>
            <span class="title">Reports </span>
          </a>
        </li>

        <li>
          <a href="userManagement.php" class="page-transition">
            <span class="icon">
              <ion-icon name="bar-chart-outline"></ion-icon>
            </span>
            <span class="title">User Management</span>
          </a>
        </li>
      </ul>
    </div>


    <!-- =============================================== Upper Fields ================================================ -->
    <div class="main">
      <div class="topbar">
        <div class="toggle">
          <ion-icon name="menu-outline" class="hover-icon"></ion-icon>
        </div>
        <h1 class="dashboard">Dashboard</h1>
        <div class="search">
          <label>
            <input type="text" placeholder="Search here" class="bold-input" />
            <ion-icon name="search-outline" class="search-icon"></ion-icon>
          </label>
        </div>
        <!-- =============================================== Dropdown fields ================================================ -->
        <span class="badge">3+</span>
        <ion-icon name="notifications" class="notifIcon" id="notificationIcon"></ion-icon>
        <div class="dropdown-content" id="notificationDropdown">
          <div class="notifBack">
            <h6 class=" notification" style="color: white;">Notification</h6>
          </div>
          <a class="ancOne" href="validateRequest.php">
            <div class="divOne">
              <div class="small text-gray-500">December 12, 2023</div>
              <span class="font-weight-bold">20-12345 John Lui Corro has a request event for you to approve</span>
            </div>
          </a>
          <a class="ancTwo" href="upcomEventInfo.php">
            <div>
              <div class="small text-gray-500">December 7, 2023</div>
              Tomorrow is the Clean Drive event
            </div>
          </a>
          <a class="ancThree" href="validateStudent.php">
            <div>
              <div class="small text-gray-500">December 2, 2023</div>
              Cruz, Juan D. requesting for validation of account
            </div>
          </a>
          <a class="others text-center small text-gray-500" href="#">Show All Alerts</a>
        </div>

        <h5 class="adminPro">Malvar's Admin</h5>
        <div class="user-profile pull-right">
          <img class="avatar user-thumb hover-effect" src="img/profile.png" width="50px" onclick="toggleDropdown()" />

          <div class="dropdown-menu" id="dropdownMenu">
            <a class="dropdown-item" href="my_account.php">
              <ion-icon name="person-circle-outline" style="color:#888"></ion-icon> &nbsp;
              My Account
            </a>

            <a class="dropdown-item" href="feedback.php">
              <ion-icon name="warning-outline" style="color:#888"></ion-icon> &nbsp; Feedback Report
            </a>

            <a class="dropdown-item" href="changePass.php">
              <ion-icon name="lock-closed" style="color:#888"></ion-icon> &nbsp; Change Password
            </a>

            <!--    <a class="dropdown-item" href="trashBin.php">
              <ion-icon name="trash-bin" style="color:#888"></ion-icon> &nbsp; Trash Bin
            </a> -->

            <hr>
            <a class="dropdown-item" href="#" onclick="showLogoutPopup()">
              <ion-icon name="log-out-outline" style="color:#888"></ion-icon> &nbsp;
              Log Out
            </a>
          </div>
        </div>

        <!-- Popup Form -->
        <div class="popup-form" id="popupForm">
          <h2 id="popupTitle"></h2>
          <button onclick="closePopup()">Close</button>
        </div>

        <!-- Popup Form for Log Out -->
        <div id="logoutForm">
          <h2 id="logoutTitle">Log Out</h2>
          <p>Are you sure you want to log out?</p>
          <button onclick="performLogout()">Log Out</button>
          <button onclick="closeLogoutPopup()">Cancel</button>
        </div>
      </div>

      <!-- =============================================== Cards ================================================ -->
      <div class="cardBox">
        <a href="completedAct.php" class="no-underline">
          <div class="card">
            <div>
              <div class="numbers">1</div>
              <div class="cardName">Completed<br />Activities</div>
            </div>
            <div class="iconBx">
              <ion-icon name="checkmark-done-outline"></ion-icon>
            </div>
          </div>
        </a>
        <a href="pendingAct.php" class="no-underline">
          <div class="card">
            <div>
              <div class="numbers">1</div>
              <div class="cardName">Pending<br />Activities</div>
            </div>

            <div class="iconBx">
              <ion-icon name="receipt-outline"></ion-icon>
            </div>
          </div>
        </a>
        <a href="validateRequest.php" class="no-underline">
          <div class="card">
            <div>
              <div class="numbers">1</div>
              <div class="cardName">Validate<br />Request</div>
            </div>

            <div class="iconBx">
              <ion-icon name="git-pull-request-outline"></ion-icon>
            </div>
          </div>
        </a>
        <a href="totalStudents.php" class="no-underline">
          <div class="card">
            <div>
              <div class="numbers">2</div>
              <div class="cardName">Total<br />Students</div>
            </div>

            <div class="iconBx">
              <ion-icon name="accessibility-outline"></ion-icon>
            </div>
          </div>
        </a>
      </div>

      <!-- =============================================== upcoming Events ================================================ -->
      <div class="upcoming">
        <div class="upcomingEvents">
          <div class="cardHeader">
            <h2>Upcoming Events</h2>
            <a href="#" class="btn" id="openPostModal">Post</a>
            <div id="modalContainer" class="modal">
              <div class="modal-content">
                <!-- Content from post.html will be loaded here -->
              </div>
            </div>
          </div>

          <!-- Upcoming Events Container -->
          <table class="tableIto">
            <thead>
              <tr>
                <th class="number-column">No.</th>
                <th>Title</th>
                <th>Civic Engagement</th>
                <th class="date-column">Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="number-column">1</td>
                <td>Learn Teaching</td>
                <td>Teaching Literacy</td>
                <td class="date-column">Ongoing</td>
              </tr>
              <tr class="clickable-row" onclick="window.location.href='upcomEventInfo.php';">
                <td class="number-column">2</td>
                <td>Clean and Green</td>
                <td>Tree Planting</td>
                <td class="date-column">2023-08-20</td>
              </tr>
              <tr>
                <td class="number-column">3</td>
                <td>Null</td>
                <td>Null</td>
                <td class="date-column">Null</td>
              </tr>
              <tr>
                <td class="number-column">4</td>
                <td>Null</td>
                <td>Null</td>
                <td class="date-column">Null</td>
              </tr>
              <tr>
                <td class="number-column">5</td>
                <td>Null</td>
                <td>Null</td>
                <td class="date-column">Null</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- =============================================== Scripts ================================================ -->
  <script>
    // Get the notification icon and dropdown content
    const notificationIcon = document.getElementById('notificationIcon');
    const notificationDropdown = document.getElementById('notificationDropdown');

    // Track whether the dropdown is currently open
    let isDropdownOpen = false;

    // Add a click event listener to the notification icon
    notificationIcon.addEventListener('click', function() {
      // Toggle the visibility of the dropdown content
      isDropdownOpen = !isDropdownOpen;
      if (isDropdownOpen) {
        notificationDropdown.style.display = 'block';
      } else {
        notificationDropdown.style.display = 'none';
      }
    });

    // Close the dropdown if the user clicks outside of it
    window.addEventListener('click', function(event) {
      if (isDropdownOpen && event.target !== notificationIcon && event.target !== notificationDropdown) {
        notificationDropdown.style.display = 'none';
        isDropdownOpen = false;
      }
    });

    // JavaScript to handle the smooth transition
    const links = document.querySelectorAll(".page-transition");

    links.forEach((link) => {
      link.addEventListener("click", (e) => {
        e.preventDefault(); // Prevent the default navigation

        // Apply the transition effect
        document.body.classList.add("page-loading");

        // Navigate to the new page after a short delay (for the transition effect)
        setTimeout(() => {
          window.location.href = link.href;
        }, 500); // Adjust the delay time as needed
      });
    });
  </script>
  <script src="js/dashboard.js"></script>
  <script src="js/post.js"></script>



  <!-- =============================================== ionicons ================================================ -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>