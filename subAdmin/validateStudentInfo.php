<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User's Information</title>
    <link rel="stylesheet" href="css/dashboard.css" />
    <link rel="stylesheet" href="css/totalStudents.css" />
    <link rel="stylesheet" href="css/totalStudentInfo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.0.1/css/ionicons.min.css">
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

        /* font label */
        i {
            font-weight: 300;
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

        #corcon {
            margin-top: 30px;
            width: 60%;
            height: 90%;
        }

        .imgcor {
            height: 95%;
        }

        .checktag {
            font-weight: normal;
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

        .datejoin {
            margin-left: 700px;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="topbar">
            <a href="validateStudent.php">
                <div class="back-button">
                    <ion-icon name="return-down-back-outline"></ion-icon>
                </div>
            </a>
            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        </div>
        <h1 class="h1-group">User Information</h1>
        <div class="container123">

            <div class="header">
                <img src="img/dean2.jpg" alt="Student Photo" class="picture">
            </div>

            <!-- Menu Button -->
            <div class="menu-button">
                <div id="menu-modall" class="modal">
                    <div class="modal-content">
                        <span class="close-modal" id="close-icon">&times;</span>
                        <div class="modal-header">
                            <h5>Tagging</h5>
                        </div>
                        <div class="modal-body">
                            <div class="school-checkbox">
                                <input type="checkbox" id="school1" name="school1" value="School 1">
                                <label for="school1" class="checktag">This user is inactive</label><br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="savebtn">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Personal Information -->
            <div class="form-group">
                <h5><u>Personal Information</u></h5>
                <label for="full-name">First Name:</label>
                <input type="text" id="full-name" name="full-name" value="Juan" readonly>
            </div>
            <div class="form-group">
                <label for="grade-level">Middle Name:</label>
                <input type="text" id="grade-level" name="grade-level" value="Dela" readonly>
            </div>
            <div class="form-group">
                <label for="grade-level">Last Name:</label>
                <input type="text" id="grade-level" name="grade-level" value="Cruz" readonly>
            </div>
            <div class="form-group">
                <label for="grade-level">Gender:</label>
                <input type="text" id="grade-level" name="grade-level" value="Male" readonly>
            </div>

            <div class="form-group">
                <label for="grade-level">Date of birth: <i>(Month Day, Year)</i></label>
                <input type="text" id="grade-level" name="grade-level" value="May 27, 2001" readonly>
            </div>

            <div class="form-group">
                <label for="grade-level">Address: <i>(House Number, Street/Building Name, Barangay, City, Province)</i></label>
                <input type="text" id="grade-level" name="grade-level" value="0980 Barangay Silo Malvar Batangas" readonly>
            </div>

            <div class="form-group">
                <label for="grade-level">Contact Number: <i>(09XX-XXX-XXXX)</i></label>
                <input type="text" id="grade-level" name="grade-level" value="09123456789" readonly>
            </div>

            <div class="form-group">
                <label for="grade-level">Incase of Emergency: <i>(09XX-XXX-XXXX)</i></label>
                <input type="text" id="grade-level" name="grade-level" value="09876543210" readonly>
            </div>

            <!-- Academic Information -->
            <div class="form-group">
                <h5><u>Academic Information</u></h5>
                <label for="grade-level">SR-CODE: <i>(20-XXXXX)</i></label>
                <input type="text" id="grade-level" name="grade-level" value="20-12345" readonly>
            </div>

            <div class="form-group">
                <label for="grade-level">Email: <i>(20-XXXXX@g.batstate-u.edu.ph)</i></label>
                <input type="text" id="grade-level" name="grade-level" value="20-12345@g.batstate-u.edu.ph" readonly>
            </div>

            <div class="form-group">
                <label for="grade-level">Campus:</label>
                <input type="text" id="grade-level" name="grade-level" value="JPLPC Malvar Batangas" readonly>
            </div>

            <div class="form-group">
                <label for="grade-level">Course:</label>
                <input type="text" id="grade-level" name="grade-level" value="Bachelor Of Science in Information Technology" readonly>
            </div>

            <div class="form-group">
                <label for="grade-level">Year and Section:</label>
                <input type="text" id="grade-level" name="grade-level" value="4th Year - 4102" readonly>
            </div>

            <div class="form-group">
                <label for="grade-level">NSTP Program:</label>
                <input type="text" id="grade-level" name="grade-level" value="Civic Welfare Training Service" readonly>
            </div>

            <div class="form-group">
                <label for="grade-level">User Type:</label>
                <input type="text" id="grade-level" name="grade-level" value="Undergraduate Student" readonly>
            </div>

            <!--  records/credentials -->
            <div class="form-group">
                <label for="proofOfEnrollment">Credentials:</label>
                <input type="text" id="proofOfEnrollmentInput" name="proofOfEnrollment" value="COR.pdf" readonly>
                <a href="#" id="viewProofOfEnrollment" style="color: #dc3545;">View the file</a>
            </div>

            <!-- Modal for displaying the file -->
            <div id="proofOfEnrollmentModal" class="modal">
                <div class="modal-content" id="corcon">
                    <span class="close" id="closeProofOfEnrollmentModal">&times;</span>
                    <img src="img/COR.jpg" alt="" class="imgcor">
                </div>
            </div>


            <div class="form-group">

                <a href="validateStudent.php">
                    <button type="button" class="btn btn-success" id="approveButton">Approved</button>
                </a>


                <button type="button" class="btn btn-danger" id="declineButton">Decline</button>
            </div>

        </div>
        <script>
            const clickableRows = document.querySelectorAll(".clickable-row");
            clickableRows.forEach((row) => {
                row.addEventListener("click", () => {
                    const href = row.getAttribute("data-href");
                    if (href) {
                        window.location.href = href;
                    }
                });
            });

            // Get references to the "Save" button and the modal
            const saveButton = document.querySelector(".savebtn");
            const menuModall = document.getElementById("menu-modal");

            // Add a click event listener to the "Save" button
            saveButton.addEventListener("click", function() {
                // Close the modal by hiding it
                menuModal.style.display = "none";
            });

            /* modal for cor */
            const viewProofOfEnrollmentButton = document.getElementById("viewProofOfEnrollment");
            const proofOfEnrollmentModal = document.getElementById("proofOfEnrollmentModal");
            const closeProofOfEnrollmentModal = document.getElementById("closeProofOfEnrollmentModal");
            const fileContent = document.getElementById("fileContent");

            // Function to open the modal
            viewProofOfEnrollmentButton.addEventListener("click", function(e) {
                e.preventDefault();
                proofOfEnrollmentModal.style.display = "block";

                // You can load and display the file content in this section if needed.
                // Example: fileContent.innerText = "File content goes here.";
            });

            // Function to close the modal
            closeProofOfEnrollmentModal.addEventListener("click", function() {
                proofOfEnrollmentModal.style.display = "none";
            });

            // Close the modal if the user clicks outside of it
            window.addEventListener("click", function(event) {
                if (event.target === proofOfEnrollmentModal) {
                    proofOfEnrollmentModal.style.display = "none";
                }
            });

            /* modal for student ID */
            const viewProofStudentIDLink = document.getElementById("viewProofStudentIDLink");
            const viewProofStudentIDModal = document.getElementById("viewProofStudentIDModal");
            const closeViewProofStudentIDModal = document.getElementById("closeViewProofStudentIDModal");
            const studentIDFileContent = document.getElementById("studentIDFileContent");

            // Function to open the modal
            viewProofStudentIDLink.addEventListener("click", function(e) {
                e.preventDefault();
                viewProofStudentIDModal.style.display = "block";

                // You can load and display the file content in this section if needed.
                // Example: studentIDFileContent.innerText = "File content goes here.";
            });

            // Function to close the modal
            closeViewProofStudentIDModal.addEventListener("click", function() {
                viewProofStudentIDModal.style.display = "none";
            });

            // Close the modal if the user clicks outside of it
            window.addEventListener("click", function(event) {
                if (event.target === viewProofStudentIDModal) {
                    viewProofStudentIDModal.style.display = "none";
                }
            });

            /* modal for parent consent */
            const proofParentLink = document.getElementById("proofParentLink");
            const proofParentModal = document.getElementById("proofParentModal");
            const closeProofParentModal = document.getElementById("closeProofParentModal");
            const proofParentFileContent = document.getElementById("proofParentFileContent");

            // Function to open the modal
            proofParentLink.addEventListener("click", function(e) {
                e.preventDefault();
                proofParentModal.style.display = "block";

                // You can load and display the file content in this section if needed.
                // Example: proofParentFileContent.innerText = "File content goes here.";
            });

            // Function to close the modal
            closeProofParentModal.addEventListener("click", function() {
                proofParentModal.style.display = "none";
            });

            // Close the modal if the user clicks outside of it
            window.addEventListener("click", function(event) {
                if (event.target === proofParentModal) {
                    proofParentModal.style.display = "none";
                }
            });
        </script>
</body>

</html>