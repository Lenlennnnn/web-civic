<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Information</title>
    <link rel="stylesheet" href="css/dashboard.css" />
    <link rel="stylesheet" href="css/totalStudents.css" />
    <link rel="stylesheet" href="css/totalStudentInfo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
    <link rel="icon" type="image/png" href="login/images/icons/civicicon.png" />

    <style>
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
            color: #333;
            background-color: #f9f9f9;
            cursor: not-allowed;
        }

        .main {
            background-color: #E1E1E1;
        }

        body {
            background-color: #E1E1E1;

        }

        .container123 {
            background-color: white;
        }

        /* Style for the modal */
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

        /* Style for the modal content */
        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 0px;
            border: 1px solid #888;
            width: 100%;
            max-width: 500px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            position: fixed;
            top: 0px;
            left: 30%;
        }

        /* Style for the close button */
        .close {
            position: absolute;
            right: 5px;
            top: 0px;
            font-size: 24px;
            cursor: pointer;
        }


        /* Style for the "Credentials" header */
        .modal-content h3 {
            background-color: #343a40;
            color: #fff;
            padding: 8px 0;
            text-align: center;
            margin-bottom: 0px;
            max-height: 300px;
            overflow-y: auto;
        }

        /* Style for the table in the modal */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0px;
            max-height: 300px;
            overflow-y: auto;
        }

        s th,
        td {
            padding: 8px 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
        }

        th {
            text-align: left;
            background-color: #f0f0f0;
            padding: 10px;
        }

        /* Style for "No." column */
        td:first-child {
            width: 50px;
            border-right: 1px solid #ddd;
        }

        /* Style for "Certificates" column */
        td:nth-child(2) {
            width: 90%;
        }

        /* Style for table rows on hover */
        tr:hover {
            background-color: #f5f5f5;
        }

        /* Style for the details modal */
        #detailsModal {
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

        /* Style for the details modal content */
        #detailsModal .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 830px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            position: fixed;
            top: -130px;
            left: 18%;
        }

        .header {
            margin-left: -350px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="topbar">
            <a href="joinStudent.php">
                <div class="back-button">
                    <ion-icon name="return-down-back-outline"></ion-icon>
                </div>
            </a>
            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        </div>
        <h1 class="h1-group">Student Information</h1>
        <div class="container123">

            <div class="header">
                <img src="img/dean2.jpg" alt="Student Photo" class="picture">
            </div>



            <!-- Personal Information -->
            <div class="form-group">
                <h5><u>Personal Information</u></h5>
                <label for="full-name">Full Name:</label>
                <input type="text" id="full-name" name="full-name" value="Cruz, Juan D." readonly>
            </div>

            <div class="form-group">
                <label for="grade-level">Date of birth:</label>
                <input type="text" id="grade-level" name="grade-level" value="May 27, 2001" readonly>
            </div>

            <div class="form-group">
                <label for="grade-level">Gender:</label>
                <input type="text" id="grade-level" name="grade-level" value="Male" readonly>
            </div>

            <div class="form-group">
                <label for="grade-level">Adress:</label>
                <input type="text" id="grade-level" name="grade-level" value="331 Santiago Malvar Batangas" readonly>
            </div>

            <!-- Academic Information -->
            <div class="form-group">
                <h5><u>Academic Information</u></h5>
                <label for="grade-level">User Type:</label>
                <input type="text" id="grade-level" name="grade-level" value="Regular" readonly>
            </div>

            <div class="form-group">
                <label for="grade-level">Campus:</label>
                <input type="text" id="grade-level" name="grade-level" value="Malvar Campus" readonly>
            </div>
            <div class="form-group">
                <label for="grade-level">SR-CODE:</label>
                <input type="text" id="grade-level" name="grade-level" value="20-12345" readonly>
            </div>
            <div class="form-group">
                <label for="grade-level">Course:</label>
                <input type="text" id="grade-level" name="grade-level" value="Bachelor of Science in Information Tecnology" readonly>
            </div>

            <div class="form-group">
                <label for="grade-level">Year and Section:</label>
                <input type="text" id="grade-level" name="grade-level" value="Second year - 2102" readonly>
            </div>

            <div class="form-group">
                <label for="grade-level">Email:</label>
                <input type="text" id="grade-level" name="grade-level" value="20-12345@g.batstate-u.edu.ph" readonly>
            </div>
            <div class="form-group">
                <label for="grade-level">Active Points:</label>
                <input type="text" id="grade-level" name="grade-level" value="123.45" readonly>
            </div>
        </div>
    </div>
    <script>
        // Get the modal and button elements
        const proofModal = document.getElementById("proofModal");
        const viewProofButton = document.getElementById("viewProofButton");
        const closeProofModal = document.getElementById("closeProofModal");

        // Open the modal when the button is clicked
        viewProofButton.addEventListener("click", function(event) {
            event.preventDefault();
            proofModal.style.display = "block";
        });

        // Close the modal when the close button is clicked
        closeProofModal.addEventListener("click", function() {
            proofModal.style.display = "none";
        });

        // Close the modal when clicking outside of it
        window.addEventListener("click", function(event) {
            if (event.target === proofModal) {
                proofModal.style.display = "none";
            }
        });

        // Get the table rows with the "withcert" class
        const tableRowsWithCert = document.querySelectorAll("table tbody tr.withcert");

        // Add a click event listener to each "withcert" table row
        tableRowsWithCert.forEach((row, index) => {
            row.addEventListener("click", function() {
                const detailsModal = document.getElementById("detailsModal");
                detailsModal.style.display = "block";
            });
        });


        // Close the details modal when the close button is clicked
        const closeDetailsModal = document.getElementById("closeDetailsModal");
        closeDetailsModal.addEventListener("click", function() {
            const detailsModal = document.getElementById("detailsModal");
            detailsModal.style.display = "none";
        });
    </script>
</body>

</html>