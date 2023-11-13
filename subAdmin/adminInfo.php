<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin's Information</title>
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

        .header {
            margin-left: -350px;
            margin-bottom: 10px;
        }
    </style>

</head>

<body>
    <div class="main">
        <div class="topbar">
            <a href="group.php">
                <div class="back-button">
                    <ion-icon name="return-down-back-outline"></ion-icon>
                </div>
            </a>
            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        </div>
        <h1 class="h1-group">Sub-Admin's Information</h1>
        <div class="container123">

            <div class="header">
                <img src="img/adminpic.jpg" alt="admin Photo" class="picture">
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="Alexander Ford" readonly>
            </div>
            <div class="form-group">
                <label for="username">User ID:</label>
                <input type="text" id="username" name="username" value="20-12345" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="text" id="email" name="email" value="alexander@gmail.com" readonly>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" value="09123456789" readonly>
            </div>
            <div class="form-group">
                <label for="office-address">Address:</label>
                <input type="text" id="office-address" name="office-address" value="123 Main St, Suite 456" readonly>
            </div>
            <div class="form-group">
                <label for="office-address">Campus:</label>
                <input type="text" id="office-address" name="office-address" value="JPLC Malvar Batangas" readonly>
            </div>
            <div class="form-group">
                <label for="role">Role/Title:</label>
                <input type="text" id="role" name="role" value="Sub Administrator of Malvar Campus" readonly>
            </div>
            <div class="form-group">
                <label for="department">Department/Division:</label>
                <input type="text" id="department" name="department" value="School Head" readonly>
            </div>
            <div class="form-group">
                <label for="date-joining">Date of Joining:</label>
                <input type="text" id="date-joining" name="date-joining" value="2022-01-15" readonly>
            </div>
            <div class="form-group">
                <label for="responsibilities">Responsibilities:</label>
                <input type="text" id="responsibilities" name="responsibilities" value="NSTP management, budgeting" readonly>
            </div>
            <div class="form-group">
                <label for="social-media">Social Media Profiles:</label>
                <input type="text" id="social-media" name="social-media" value="LinkedIn: linkedin.com/alexander" readonly>
            </div>
            <div class="form-group">
                <label for="emergency-contact">Emergency Contact Information:</label>
                <input type="text" id="emergency-contact" name="emergency-contact" value="123-456-7890" readonly>
            </div>
            <div class="form-group">
                <label for="meeting-schedule">Meeting Schedule:</label>
                <input type="text" id="meeting-schedule" name="meeting-schedule" value="Weekly team meetings, 10:00 AM" readonly>
            </div>
            <div class="form-group">
                <label for="preferred-communication">Preferred Communication Channels:</label>
                <input type="text" id="preferred-communication" name="preferred-communication" value="Email, Slack" readonly>
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
        </script>
</body>

</html>