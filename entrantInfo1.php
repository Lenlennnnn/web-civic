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

        .menu-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #fff;
            /* Change this to your preferred background color */
            padding: 5px 10px;
            cursor: pointer;
        }

        /* Apply initial styles to the icon */
        ion-icon[name="menu-outline"] {
            font-size: 30px;
            /* Set your desired initial size */
            transition: transform 0.3s;
            /* Add a smooth scaling transition effect */
        }

        /* Apply the hover effect to enlarge the icon */
        ion-icon[name="menu-outline"]:hover {
            transform: scale(1.2);
            /* Enlarge the icon on hover (adjust the scale factor as needed) */
        }

        /* for modal */

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 5px;
            width: 70%;
        }

        .close-modal {
            position: absolute;
            top: 0px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
        }

        .header {
            margin-left: -350px;
            margin-bottom: 10px;
        }

        .close {
            text-align: end;
        }

        .savebtn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 10px;
        }

        .savebtn:hover {
            background-color: #0056b3;
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

            <div class="menu-button">
                <ion-icon name="menu-outline" id="menu-icon"></ion-icon>
                <div id="menu-modall" class="modal">
                    <div class="modal-content">
                        <span class="close-modal" id="close-icon">&times;</span>
                        <div class="modal-header">
                            <h5>Attendance</h5>
                        </div>
                        <div class="modal-body">
                            <div class="school-checkbox">
                                <input type="checkbox" id="school1" name="school1" value="School 1">
                                <label for="school1" class="checktag">Attended</label><br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="savebtn">Proceed</button>
                        </div>
                    </div>
                </div>
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
        // Get references to the menu icon and the modal
        const menuIcon = document.getElementById("menu-icon");
        const menuModal = document.getElementById("menu-modall");
        const closeIcon = document.getElementById("close-icon");

        // Function to open the modal
        function openModal() {
            menuModal.style.display = "block";
        }

        // Function to close the modal
        function closeModal() {
            menuModal.style.display = "none";
        }

        // Event listeners for opening and closing the modal
        menuIcon.addEventListener("click", openModal);
        closeIcon.addEventListener("click", closeModal);

        // Close the modal if the user clicks outside of it
        window.addEventListener("click", (event) => {
            if (event.target === menuModal) {
                closeModal();
            }
        });

        // Get references to the "Save" button and the modal
        const saveButton = document.querySelector(".savebtn");
        const menuModall = document.getElementById("menu-modal");

        // Add a click event listener to the "Save" button
        saveButton.addEventListener("click", function() {
            // Close the modal by hiding it
            menuModal.style.display = "none";
        });
    </script>
</body>

</html>