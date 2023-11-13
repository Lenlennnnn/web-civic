<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feedbacks</title>
    <link rel="icon" type="image/png" href="login/images/icons/civicicon.png" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="icon" type="image/png" href="login/images/icons/civicicon.png" />

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
        }

        /* testimonial card */
        /* Testimonial section styling */
        .testimonial-section {
            color: #000;
            background-color: #f3f2f2;
            padding: 40px 0;
        }

        /* Testimonial heading styling */
        .testimonial-heading {
            text-align: center;
            font-weight: bold;
            font-size: 28px;
            margin-bottom: 20px;
        }

        /* Testimonial paragraph styling */
        .testimonial-paragraph {
            text-align: center;
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 40px;
        }

        /* Individual testimonial card styling */
        .card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        /* Testimonial card image styling */
        .card img {
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            display: block;
        }

        /* Testimonial card name styling */
        .card h5 {
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* Testimonial card role styling */
        .card h6 {
            font-weight: bold;
            font-size: 18px;
            margin: 10px 0;
        }

        /* Testimonial rating star styling */
        .card ul {
            list-style: none;
            padding: 0;
            margin-bottom: 20px;
        }

        .card ul li {
            display: inline;
            margin-right: 5px;
        }

        .card ul li i {
            color: #007bff;
            font-size: 20px;
        }

        /* Testimonial quote styling */
        .card p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .card i.fas.fa-quote-left.pe-2 {
            font-size: 24px;
        }

        .container {
            position: relative;
            bottom: 30px;
            right: 150px;

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
        <h1 class="h1-group">Feedbacks</h1>

        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-xl-8 text-center">
                    <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                        "Your feedback is invaluable to us; it helps us grow and improve our services."
                    </p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card">
                        <div class="card-body py-4 mt-2">
                            <div class="d-flex justify-content-center mb-4">
                                <img src="img/katy2.jpg" class="rounded-circle shadow-1-strong" width="100" height="100" alt="Anime Profile" />
                            </div>
                            <h5 class="font-weight-bold">Katy Perry</h5>
                            <h6 class="font-weight-bold my-3">Malvar Campus</h6>
                            <p>email@example.com</p>
                            <ul class="list-unstyled d-flex justify-content-center">
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>

                            </ul>
                            <p class="mb-2">

                                "The service exceeded my expectations, and I couldn't be happier with the results."
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card">
                        <div class="card-body py-4 mt-2">
                            <div class="d-flex justify-content-center mb-4">
                                <img src="img/avril.jpg" class="rounded-circle shadow-1-strong" width="100" height="100" />
                            </div>
                            <h5 class="font-weight-bold">Avril Lavigne</h5>
                            <h6 class="font-weight-bold my-3">Lipa Campus</h6>
                            <p>email@example.com</p>
                            <ul class="list-unstyled d-flex justify-content-center">
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                            </ul>
                            <p class="mb-2">
                                "The team's professionalism to detail made my experience truly exceptional."
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="card">
                        <div class="card-body py-4 mt-2">
                            <div class="d-flex justify-content-center mb-4">
                                <img src="img/taylor2.jpg" class="rounded-circle shadow-1-strong" width="100" height="100" />
                            </div>
                            <h5 class="font-weight-bold">Taylor Swift</h5>
                            <h6 class="font-weight-bold my-3">Alangilan Campus</h6>
                            <p>email@example.com</p>
                            <ul class="list-unstyled d-flex justify-content-center">
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>

                            </ul>
                            <p class="mb-2">
                                "Outstanding service that exceeded my expectations in every way!"
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="card">
                        <div class="card-body py-4 mt-2">
                            <div class="d-flex justify-content-center mb-4">
                                <img src="img/ariana2.jpg" class="rounded-circle shadow-1-strong" width="100" height="100" />
                            </div>
                            <h5 class="font-weight-bold">Ariana Grande</h5>
                            <h6 class="font-weight-bold my-3">Lobo Campus</h6>
                            <p>email@example.com</p>
                            <ul class="list-unstyled d-flex justify-content-center">
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>

                            </ul>
                            <p class="mb-2">
                                "Their professionalism and attention to detail really impressed me."
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="card">
                        <div class="card-body py-4 mt-2">
                            <div class="d-flex justify-content-center mb-4">
                                <img src="img/demi2.jpg" class="rounded-circle shadow-1-strong" width="100" height="100" />
                            </div>
                            <h5 class="font-weight-bold">Demi Lovato</h5>
                            <h6 class="font-weight-bold my-3">San Juan Campus</h6>
                            <p>email@example.com</p>
                            <ul class="list-unstyled d-flex justify-content-center">
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>

                            </ul>
                            <p class="mb-2">
                                "Their exceptional customer support made my experience a delight!"
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="card">
                        <div class="card-body py-4 mt-2">
                            <div class="d-flex justify-content-center mb-4">
                                <img src="img/selena2.jpg" class="rounded-circle shadow-1-strong" width="100" height="100" />
                            </div>
                            <h5 class="font-weight-bold">Selena Gomez</h5>
                            <h6 class="font-weight-bold my-3">Rosario Campus</h6>
                            <p>email@example.com</p>
                            <ul class="list-unstyled d-flex justify-content-center">
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-info"></i>
                                </li>

                            </ul>
                            <p class="mb-2">
                                "Their attention to detail and commitment to quality exceeded my expectations"
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</body>

</html>