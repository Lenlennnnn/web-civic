<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Completed Activities</title>
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

    .clickable-row:hover {
      background-color: #dcdcdc;
      /* Change to your desired highlight color */
      cursor: pointer;
    }


    .h1-group {
      position: relative;
      bottom: 58px;
      right: 180px;
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

    .back-button:hover {
      background-color: #8c0000;
      /* Change background color on hover */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      /* Add shadow on hover */
      transform: scale(1.1);
      /* Slightly scale up on hover */
    }

    thead {
      border: solid 1px black;
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
    <h1 class="h1-group">Completed Activities</h1>

    <div class="container py-5">
      <div class="row">
        <table id="example" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>No.</th>
              <th>Title</th>
              <th>Civic Engagement</th>
              <th>Date Started</th>
            </tr>
          </thead>
          <tbody>
            <tr class="clickable-row" onclick="window.location.href='completeEvent.php';">
              <td>1</td>
              <td>Sustainable Environmental Cleaning</td>
              <td>Clean Up Drive</td>
              <td>2022-04-12</td>

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