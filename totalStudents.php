<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Total Students</title>
  <link rel="icon" type="image/png" href="login/images/icons/civicicon.png" />
  <link rel="stylesheet" href="css/dashboard.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <style>
    .container {
      position: relative;
      right: 235px;
      width: 200%;
      bottom: 50px;
    }

    .h1-group {
      position: relative;
      bottom: 58px;
      right: 180px;
    }

    /* for modal */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
      position: absolute;
      top: 50%;
      /* Position at the vertical center of the viewport */
      left: 50%;
      /* Position at the horizontal center of the viewport */
      transform: translate(-50%, -50%);
      /* Center the content */
      max-width: 46%;
      /* Limit the width of the content */
      height: 100%;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      overflow-y: auto;
      /* Add scrollbar if content exceeds modal height */
    }

    .close {
      position: relative;
      top: -10px;
      right: -440px;
      font-size: 25px;
      font-weight: bold;
      cursor: pointer;
    }


    /* Styles for elements inside .container-popup */
    .container-popup {
      width: 500px;
      padding: 20px;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .container-popup h2 {
      text-align: center;
    }

    .container-popup label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .container-popup input,
    .container-popup select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .container-popup button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }

    .container-popup button:hover {
      background-color: #0056b3;
    }

    .custom-button {
      position: absolute;
      top: 100px;
      left: -165px;
      transform: translate(-50%, -50%);
      cursor: pointer;
      /* Change cursor to pointer */
      /* Other button styling properties */

      /* Transition effect for hover */
      transition: background-color 0.3s, color 0.3s, transform 0.3s;
      z-index: 1;
    }

    .custom-button:hover {
      background-color: #007bff;
      /* Change background color on hover */
      color: #fff;
      /* Change text color on hover */
      transform: translate(-50%, -50%) scale(1.05);
      /* Scale up slightly on hover */
    }

    .upper-container {
      width: 100%;
      height: 50px;
      background-color: #007bff;
      /* Blue color */
      position: fixed;
      top: 0;
      left: 0;
      z-index: -1;
      /* Place the container behind the main content */
    }

    thead {
      border: solid 1px black;
    }

    .back-button:hover {
      background-color: #8c0000;
      /* Change background color on hover */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      /* Add shadow on hover */
      transform: scale(1.1);
      /* Slightly scale up on hover */
    }

    .main {
      background-color: #E1E1E1;
      border-radius: 50% 0px 0px 50%;
    }

    body {
      background-color: #E1E1E1;
    }
  </style>
</head>

<body>
  <div class="main">
    <div class="topbar">
      <a href="dashboard.php">
        <div class="back-button">
          <ion-icon name="return-down-back-outline"></ion-icon>
        </div>
      </a>

      <!-- ====== ionicons ======= -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    </div>
    <h1 class="h1-group">Total Students</h1>

    <div class="container py-5">
      <div class="row">
        <table id="example" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>SR-Code</th>
              <th>Gender</th>
              <th>Campus</th>
              <th>NSTP Program</th>
              <th>Year Level</th>
              <th>Active Points</th>
            </tr>
          </thead>
          <tbody>
            <tr class="clickable-row" onclick="window.location.href='totalStudentInfo.php';">
              <td>1</td>
              <td>Cruz, Juan D.</td>
              <td>20-12345</td>
              <td>Male</td>
              <td>Malvar</td>
              <td>Civic Welfare Traing Service</td>
              <td>Second Year</td>
              <td>123</td>

            </tr>

            <tr class="clickable-row" onclick="window.location.href='totalStudentInfo2.php';">
              <td>2</td>
              <td>Draguin, Sam C.</td>
              <td>20-54321</td>
              <td>Male</td>
              <td>Malvar</td>
              <td>Literacy Training Service</td>
              <td>Graduated</td>
              <td>321</td>

            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="js/addAdmin.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script>
    new DataTable("#example");
  </script>
</body>

</html>