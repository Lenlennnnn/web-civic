<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Information</title>
    <link rel="stylesheet" href="css/eventInfo.css" />
</head>

<body>
    <div id="main-info">
        <div class="event-info">
            <div class="edit-button">
                <a href="#"><ion-icon name="pencil-outline"></ion-icon></a>
            </div>
            <div class="event-image">
                <img src="img/trees.jpg" alt="Event Image" />
            </div>
            <a href="dashboard.php">
                <div class="back-button">
                    <ion-icon name="return-down-back-outline"></ion-icon>
                </div>
            </a>
            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <div class="event-details">
                <h1 class="event-title">Planting Trees</h1>
                <p><b>Category:</b> Save the Earth</p>
                <p><b>Campus:</b> Malvar</p>
                <p><b>Location:</b> Malvar Batangas</p>
                <h4>Set Time & Date:</h4>
                <div class="time-date">
                    <label for="event-time"><ion-icon name="time-outline" class="time-icon"></ion-icon> Time:
                        &nbsp;</label>
                    <input type="time" id="event-time" name="event-time" required />
                </div>
                <div class="time-date">
                    <label for="event-date"><ion-icon name="calendar-outline" class="calendar-icon"></ion-icon>
                        Date: &nbsp;</label>
                    <input type="date" id="event-date" name="event-date" required />
                </div>
            </div>
        </div>
        <h2>Project Description</h2>
        <div class="event-description">
            <div class="description-info">
                <h3>Introduction</h3>
                <p>
                    Environmental degradation and deforestation are pressing issues that have a profound impact on human health and the planet's ecosystem. The Reforestation Initiative seeks to address these challenges by raising awareness and mobilizing communities to take action in planting trees and restoring our natural environment. Through various activities and partnerships, we aim to promote the health of our ecosystem and mitigate the effects of deforestation.
                </p>

                <h3>Objectives</h3>
                <p>
                    <i> The primary objectives of the Reforestation Initiative are:</i><br /><br />

                    To raise awareness about the importance of reforestation: We aim to educate communities about the critical role of trees in combating environmental degradation, enhancing air quality, restoring wildlife habitats, and regulating climate patterns.
                    <br>
                    <br>
                    To engage communities in tree planting efforts: We encourage communities to actively participate in reforestation activities, fostering a sense of environmental responsibility and community engagement.
                    <br>
                    <br>
                    To collaborate with local authorities and organizations: We work in partnership with local authorities, non-governmental organizations, and other stakeholders to identify suitable planting locations, secure necessary resources, and coordinate tree planting efforts effectively.
                    <br>
                    <br>
                    To evaluate and improve the program: We continuously assess the impact of our reforestation initiatives and gather feedback from participants and stakeholders to make necessary improvements.
                </p>

                <h3>Program Components</h3>
                <p>
                    Community Education and Awareness: This component involves conducting awareness campaigns, seminars, and workshops to educate communities about the benefits of reforestation. Topics include the role of trees in carbon sequestration, air quality improvement, and biodiversity conservation.
                    <br>
                    <br>
                    Tree Planting Activities: This component focuses on organizing tree planting events in collaboration with local authorities, schools, and environmental groups. These events aim to involve community members of all ages in planting trees in designated areas.
                    <br>
                    <br>
                    Tree Care and Maintenance: We provide guidance on tree care and maintenance to ensure the survival and growth of planted trees. This includes information on proper watering, pruning, and protection from pests and diseases.
                    <br>
                    <br>
                    Advocacy for Sustainable Forestry Practices: We advocate for sustainable forestry practices and responsible land management to protect existing forests and promote the sustainable use of forest resources.
                </p>

                <h3>Evaluation and Monitoring</h3>
                <p>
                    The Reforestation Initiative will be regularly evaluated to assess its impact on reforestation efforts. Key performance indicators include the number of trees planted, the survival rate of planted trees, and improvements in local biodiversity. Feedback from program participants and stakeholders will guide ongoing enhancements to the program.
                </p>

                <h3>Conclusion</h3>
                <p>
                    The Reforestation Initiative is dedicated to promoting the importance of reforestation and engaging communities in tree planting initiatives. Through education, collaboration, and responsible tree care, we aim to contribute to a healthier environment for current and future generations by restoring our natural landscapes.
                </p>
            </div>
            <div class="description-info">
                <h3>Members:</h3>
                <p>
                    Sarah Johnson <br />
                    Michael Lee <br />
                    Ashley Rodriguez <br />
                    Brandon Singh <br />
                    Rachel Chen <br />
                    Jason Patel <br />
                    Melissa Wong <br />
                    Christopher Kim <br />
                    Olivia Martinez <br />
                    William Chen <br />
                </p>
            </div>
            <div class="launch-button">
                <a href="launchEvent.php" class="launch-link">
                    <ion-icon name="aperture-outline"></ion-icon>
                    <span>Set</span>
                </a>
            </div>

            <!-- Continue with the rest of the content -->
        </div>
    </div>
</body>

</html>