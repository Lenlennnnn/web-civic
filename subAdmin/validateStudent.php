<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Validation</title>
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
            <a href="userManagement.php">
                <div class="back-button">
                    <ion-icon name="return-down-back-outline"></ion-icon>
                </div>
            </a>

            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        </div>
        <h1 class="h1-group">Validate Student</h1>

        <div class="container py-5">
            <div class="row">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>NSTP Program</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="clickable-row" onclick="window.location.href='validateStudentInfo.php';">
                            <td>1</td>
                            <td>Cruz, Juan D.</td>
                            <td>20-12345@g.batstate-u.edu.ph</td>
                            <td>Male</td>
                            <td>Civic Welfare Traing Service</td>

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