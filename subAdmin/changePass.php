<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Password</title>
    <link rel="icon" type="image/png" href="login/images/icons/civicicon.png" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
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
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }



        .change-password-container {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 500px;
            margin-left: 88px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: left;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

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
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            position: relative;
            top: 100px;
        }

        /* Style for the close button */
        .close {
            position: absolute;
            right: 10px;
            top: 0px;
            font-size: 24px;
            cursor: pointer;
        }

        /* Style for the close button inside the modal content */
        #closeButton {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Style for the close button on hover */
        #closeButton:hover {
            background-color: #0056b3;
        }

        /* Media query for screens smaller than 768px */
        @media (max-width: 768px) {
            .change-password-container {
                width: 90%;
                margin: 0 auto;
            }
        }

        @media (max-width: 765px) {
            .main {
                border-radius: 0;
            }

            .h1-group {
                top: 0px;
                left: 40px;
            }

            .custom-button {
                left: 50%;
                top: 120px;
            }

            .back-button {
                left: 0;
            }

            .form-group label {
                font-size: 14px;
            }

            .modal-content {
                left: -10px;
            }
        }

        @media (max-width: 576px) {
            .main {
                border-radius: 0;
            }

            .h1-group {
                top: 0px;
                left: 20px;
            }

            .custom-button {
                left: 50%;
                top: 120px;
            }

            .back-button {
                left: 0;
            }

            .form-group label {
                font-size: 14px;
            }

            .modal-content {
                left: -10px;
            }
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
        <h1 class="h1-group">Change Password</h1>
        <div class="change-password-container">
            <h2>Insert your password here</h2>
            <form id="changePasswordForm">
                <div class="form-group">
                    <label for="currentPassword">Current Password:</label>
                    <input type="password" id="currentPassword" name="currentPassword">
                </div>
                <div class="form-group">
                    <label for="newPassword">New Password:</label>
                    <input type="password" id="newPassword" name="newPassword">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm New Password:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword">
                </div>

                <!-- Button to open the modal -->
                <button id="openModalButton">Submit</button>

                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close" id="closeModal">&times;</span>
                        <p>Are you sure?</p>
                        <button id="closeButton">Ok</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
    <script>
        // Get the modal and button elements
        const myModal = document.getElementById("myModal");
        const openModalButton = document.getElementById("openModalButton");
        const closeModalButton = document.getElementById("closeModal");
        const closeButton = document.getElementById("closeButton");
        const changePasswordForm = document.getElementById("changePasswordForm");

        // Open the modal when the button is clicked
        openModalButton.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the form submission
            myModal.style.display = "block";
        });

        // Close the modal when the close button is clicked
        closeModalButton.addEventListener("click", function() {
            myModal.style.display = "none";
        });

        // Close the modal when the close button inside the modal content is clicked
        closeButton.addEventListener("click", function() {
            myModal.style.display = "none";
        });

        // Close the modal when clicking outside of it
        window.addEventListener("click", function(event) {
            if (event.target === myModal) {
                myModal.style.display = "none";
            }
        });
    </script>
</body>

</html>