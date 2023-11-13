<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reports</title>
    <link rel="icon" type="image/png" href="login/images/icons/civicicon.png" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="icon" type="image/png" href="login/images/icons/civicicon.png" />

    <style>
        .h1-group {
            position: relative;
            bottom: 58px;
            right: 180px;
        }


        .close {
            position: relative;
            top: -10px;
            right: -440px;
            font-size: 25px;
            font-weight: bold;
            cursor: pointer;
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
        }

        body {
            background-color: #E1E1E1;
        }

        /* table design */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            position: relative;
            right: 150px;
            top: 5px;
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

        tr {
            background-color: white;
        }

        td:hover {

            transform: scale(1.01);
            /* Increase the scale on hover */
            transition: transform 0.5s ease;
            /* Add a smooth transition effect */
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
            width: 151%;
        }

        .tableIto {
            position: relative;
            bottom: 65px;
        }

        .date-column {
            width: 150px;
        }

        span {
            color: #007bff;
            margin-left: 260px;
        }

        /* modal */
        /* Styles for the modal container */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
            align-items: center;
            justify-content: center;
        }

        /* Styles for the modal content */
        .modal-content {
            background-color: #fefefe;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 500px;
            height: 500px;
            position: relative;
            left: 30%;
            top: 10%;
        }

        /* Styles for the close button */
        .close-modal {
            position: absolute;
            top: 0px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
            color: black;
        }


        /* Styles for the table row with the open-modal class */
        .open-modal {
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .open-modal:hover {
            background-color: #f0f0f0;
            /* Add a background color on hover */
        }

        /* Style for the user profile section */
        .user-profile {
            margin-bottom: 20px;
        }

        .profile-image {
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Style for the report options */
        .report-options {
            margin-top: 20px;
        }

        label {
            margin-right: 10px;
        }

        p {
            text-align: left;
        }

        .scrollable-text {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
            /* Allow vertical resizing */
            height: 300px;
            /* Set the initial height */
            width: 100%;
            /* Allow vertical resizing */
            overflow-y: auto;
            /* Enable vertical scroll when content exceeds height */
            font-size: 14px;
            /* Adjust the font size as needed */
            line-height: 1.5;
        }

        .fixed-height-textarea {
            height: 150px;
            /* Set the desired height */
            width: 100%;
            resize: none;
            /* Prevent resizing by the user */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            line-height: 1.5;
        }



        /* Style for the submit button */
        #submitReport {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            position: fixed;
            width: 460px;
            top: 500px;
        }

        #submitReport:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="topbar">
            <a href="feedback.php">
                <div class="back-button">
                    <ion-icon name="return-down-back-outline"></ion-icon>
                </div>
            </a>

            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        </div>
        <h1 class="h1-group">User Report</h1>

        <!-- Upcoming Events Container -->
        <table class="tableIto">
            <thead>
                <tr>
                    <th colspan="3" class="number-column">Reports</th>
                </tr>
            </thead>
            <tbody>
                <tr class="clickable-row" onclick="window.location.href='#';">
                    <td class="number-column">1</td>
                    <td class="open-modal"> <!-- Add a class for opening the modal -->
                        <img src="img/adminpic.jpg" alt="Profile Icon" class="profile-icon" width="25px" style="border-radius: 50%;">
                        <b>Lobo admin report Johndel Jim for posting inappropriate content.</b> <span>10 hours ago</span>
                    </td>

                </tr>

            </tbody>
        </table>

        <!-- The modal container -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close-modal" id="closeModal">&times;</span>
                <div class="user-profile">
                    <img src="img/dean2.jpg" alt="User Profile" class="profile-image" width="100px">
                    <h2>Dean Winchester</h2>
                </div>
                <label for="" style="text-align: left;">Reason for Report</label>
                <textarea class="fixed-height-textarea" readonly>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor lectus vel ante ultrices.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor lectus vel ante ultrices.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor lectus vel ante ultrices.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor lectus vel ante ultrices.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor lectus vel ante ultrices.
    </textarea>

                <div class="report-options">
                    <input type="radio" id="banned" name="report-option" value="Banned account">
                    <label for="banned">Banned account</label>
                    <br>
                    <input type="radio" id="suspend" name="report-option" value="Suspend for 1 month">
                    <label for="suspend">Suspend for 1 month</label>
                </div>


                <button id="submitReport">Submit Report</button>
            </div>

        </div>

    </div>
    <script>
        // Get the modal and close button elements
        const modal = document.getElementById("myModal");
        const closeModal = document.getElementById("closeModal");

        // Get the table data element that opens the modal
        const openModalTrigger = document.querySelector(".open-modal");

        // Function to open the modal
        function openModal() {
            modal.style.display = "block";
        }

        // Function to close the modal
        function closeModalFunction() {
            modal.style.display = "none";
        }

        // Event listener to open the modal when clicking the table data
        openModalTrigger.addEventListener("click", openModal);

        // Event listener to close the modal when clicking the close button
        closeModal.addEventListener("click", closeModalFunction);

        // Event listener to close the modal when clicking outside the modal content
        window.addEventListener("click", (event) => {
            if (event.target === modal) {
                closeModalFunction();
            }
        });

        // Get the modal and the submit button
        const myModal = document.getElementById("myModal");
        const submitReportButton = document.getElementById("submitReport");

        // Add an event listener to the Submit Report button
        submitReportButton.addEventListener("click", function() {
            myModal.style.display = "none";
        });
    </script>
</body>

</html>