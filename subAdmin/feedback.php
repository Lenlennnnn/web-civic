<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feedback Report</title>
    <link rel="stylesheet" href="css/report.css" />
    <link rel="icon" type="image/png" href="login/images/icons/civicicon.png" />

    <style>
        .back-button {
            /* Other styles */
            background-color: #a90101;
            color: white;
            border: 1px solid #ccc;
            padding: 10px;
            width: 100px;
            height: 50px;
            border-radius: 0px 0px 15px 0px;
            /* Set the border-radius to 50% to create a circular container */
            display: flex;
            /* Use flexbox to center the icon */
            align-items: center;
            /* Center the icon vertically */
            justify-content: center;
            /* Center the icon horizontally */
            position: fixed;
            /* Change the position to absolute */
            top: 0px;
            /* Adjust the top position as needed */
            left: 0px;
            /* Adjust the right position as needed */
            cursor: pointer;
            /* Add a cursor pointer to indicate interactivity */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Add a subtle shadow */
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            /* Add smooth transitions */
        }

        .back-button:hover {
            background-color: #8c0000;
            /* Change background color on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Add shadow on hover */
            transform: scale(1.1);
            /* Slightly scale up on hover */
        }

        /* Make the icon bold */
        .back-button ion-icon {
            transform: scale(3.2);
        }

        .report-container {
            height: 550px;
        }

        .feedback-container {
            border: 0px;
            display: flex;

        }

        .feedback-box {
            border: 1px solid black;
            padding: 20px;
            text-align: center;
            margin-right: 10px;
            margin-left: 10px;
            /* Increase the right margin for spacing */
            margin-bottom: 5px;
            border-radius: 15px;
            width: 250px;
            height: 350px;
            background-color: #343a40;
            transition: transform 0.2s;
            text-decoration: none;

        }

        .feedback-box:hover {
            transform: scale(1.1);
        }

        .yellow-star {
            color: yellow !important;
            font-size: 21px;
        }

        h2,
        p {
            color: white;
            margin: 20px;
        }


        .report-button {
            position: absolute;
            top: 60px;
            /* Adjust the top position as needed */
            right: 60px;
            /* Adjust the right position as needed */
            background-color: #ff8f00;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.5s;
        }

        .report-button:hover {
            background-color: #ffc302;
            /* Change the background color on hover */
            transform: scale(1.1);
            /* Enlarge the button on hover */
        }

        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 3px 6px;
            font-size: 12px;
        }

        .centerName {
            margin-top: 40px;
            padding: 20px;
        }

        h2 {
            font-size: 60px;
        }

        h1 {
            position: relative;

            right: -10px;
        }
    </style>
</head>

<body>
    <div class="main-info">
        <a href="dashboard.php">
            <div class="back-button">
                <ion-icon name="return-down-back-outline"></ion-icon>
            </div>
        </a>
        <div class="report-container">

            <!-- <div class="retainer">
                <a href="viewReport.php">
                    <button class="report-button">View Reports <span class="notification-badge">1</span></button>
                </a>
            </div> -->

            <br />
            <br>
            <hr />
            <br />
            <h1>Feedback</h1>
            <br>
            <br>


            <div class="feedback-container">
                <!-- First Feedback Container -->

                <a href="testimonial.php" class="feedback-box">
                    <div class="centerName">
                        <h2>58k</h2>
                        <!-- Star Icons -->
                        <ion-icon name="star" class="yellow-star"></ion-icon>
                        <ion-icon name="star" class="yellow-star"></ion-icon>
                        <ion-icon name="star" class="yellow-star"></ion-icon>
                        <ion-icon name="star" class="yellow-star"></ion-icon>
                        <ion-icon name="star" class="yellow-star"></ion-icon>
                        <p>Excellent</p>
                    </div>
                </a>



                <!-- Second Feedback Container -->
                <a href="testimonial.php" class="feedback-box">
                    <div class="centerName">
                        <h2>12k</h2>

                        <!-- Star Icons -->
                        <ion-icon name="star" class="yellow-star"></ion-icon>
                        <ion-icon name="star" class="yellow-star"></ion-icon>
                        <ion-icon name="star" class="yellow-star"></ion-icon>
                        <ion-icon name="star" class="yellow-star"></ion-icon>
                        <ion-icon name="star-outline" class="yellow-star"></ion-icon>

                        <p>Great</p>

                    </div>
                </a>
                <!-- Third Feedback Container -->
                <a href="testimonial.php" class="feedback-box">
                    <div class="centerName">
                        <h2>10k</h2>

                        <!-- Star Icons -->
                        <ion-icon name="star" class="yellow-star"></ion-icon>
                        <ion-icon name="star" class="yellow-star"></ion-icon>
                        <ion-icon name="star" class="yellow-star"></ion-icon>
                        <ion-icon name="star-outline" class="yellow-star"></ion-icon>
                        <ion-icon name="star-outline" class="yellow-star"></ion-icon>

                        <p>Good</p>

                    </div>
                </a>
                <!-- Fourth Feedback Container -->
                <a href="testimonial.php" class="feedback-box">
                    <div class="centerName">
                        <h2>2k</h2>

                        <!-- Star Icons -->
                        <ion-icon name="star" class="yellow-star"></ion-icon>
                        <ion-icon name="star" class="yellow-star"></ion-icon>
                        <ion-icon name="star-half-outline" class="yellow-star"></ion-icon>
                        <ion-icon name="star-outline" class="yellow-star"></ion-icon>
                        <ion-icon name="star-outline" class="yellow-star"></ion-icon>

                        <p>Fair</p>

                    </div>
                </a>
                <!-- Fifth Feedback Container -->
                <a href="testimonial.php" class="feedback-box">
                    <div class="centerName">
                        <h2>700</h2>

                        <!-- Star Icons -->
                        <ion-icon name="star" class="yellow-star"></ion-icon>
                        <ion-icon name="star-outline" class="yellow-star"></ion-icon>
                        <ion-icon name="star-outline" class="yellow-star"></ion-icon>
                        <ion-icon name="star-outline" class="yellow-star"></ion-icon>
                        <ion-icon name="star-outline" class="yellow-star"></ion-icon>

                        <p>Poor</p>

                    </div>
                </a>
            </div>


        </div>
        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    </div>
</body>

</html>