<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Account</title>
  <link rel="icon" type="image/png" href="login/images/icons/civicicon.png" />
  <link rel="stylesheet" href="css/dashboard.css" />
  <link rel="stylesheet" href="css/my_account.css" />

  <style>
    .main {
      background-color: #E1E1E1;
      border-radius: 50% 0px 0px 50%;
    }

    body {
      background-color: #E1E1E1;
    }

    .input-container {
      position: relative;
    }

    .input-container .edit-icon {
      position: absolute;
      top: 50%;
      right: 10px;
      /* Adjust the distance from the right side */
      transform: translateY(-50%);
      cursor: pointer;
    }

    .edit-icon {
      cursor: pointer;
      font-size: 20px;
      color: green;
      /* Default color when not editing */
      transition: font-size 0.3s;
      /* Add transition on font size */
    }

    .editing .edit-icon {
      font-size: 24px;
      /* Enlarge font size when in edit mode */
      color: blue;
      /* Change color when in edit mode */
    }

    h1 {
      margin-right: 70px;
      margin-top: 10px;
    }

    .admin-info {
      margin-top: 96%;

    }
  </style>
</head>

<body>
  <div class="main">
    <div class="topbar">
      <!-- =========== Scripts =========  -->
      <script src="js/dashboard.js"></script>

      <!-- ====== ionicons ======= -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

      <!-- =============== My account form ================ -->

      <a href="dashboard.php">
        <div class="back-button">
          <ion-icon name="return-down-back-outline"></ion-icon>
        </div>
      </a>

      <h1>My Account</h1>

      <div class="container-acc">
        <input type="file" id="file" accept="image/*" hidden />
        <div class="img-area" data-img="">
          <i class="bx bxs-cloud-upload icon"></i>
          <h3>Upload Image</h3>
          <p>Image size must be less than <span>2MB</span></p>
        </div>
        <button class="select-image">Edit Image</button>
      </div>

      <script src="js/my_account.js"></script>

      <!-- =============== My account details ================ -->
      <div class="admin-info">
        <div class="form-group">
          <label for="account-id">Name:</label>
          <div class="input-container">
            <input type="text" id="account-id" name="account-id" value="John D. Smith" readonly />
            <span class="edit-icon" onclick="enableEdit('account-id')">✎</span>
          </div>
        </div>
        <div class="form-group">
          <label for="gender">Gender:</label>
          <div class="input-container">
            <input type="text" id="gender" name="gender" value="Male" readonly />
            <span class="edit-icon" onclick="enableEdit('gender')">✎</span>
          </div>
        </div>
        <div class="form-group">
          <label for="bday">Birthday:</label>
          <div class="input-container">
            <input type="text" id="bday" name="bday" value="January 22, 1990" readonly />
            <span class="edit-icon" onclick="enableEdit('bday')">✎</span>
          </div>
        </div>
        <div class="form-group">
          <label for="cpnum">Contact Number:</label>
          <div class="input-container">
            <input type="text" id="cpnum" name="cpnum" value="09123456789" readonly />
            <span class="edit-icon" onclick="enableEdit('cpnum')">✎</span>
          </div>
        </div>
        <div class="form-group">
          <label for="cpnum">Account ID:</label>
          <div class="input-container">
            <input type="text" id="cpnum" name="cpnum" value="20-12345" readonly />
          </div>
        </div>

        <div class="form-group">
          <label for="email">Email Account:</label>
          <div class="input-container">
            <input type="email" id="email" name="email" value="20-12345@g.batstate-u.edu.ph" readonly />
            <span class="edit-icon" onclick="enableEdit('email')">✎</span>
          </div>
        </div>

        <div class="form-group">
          <label for="campus">Campus:</label>
          <div class="input-container">
            <input type="text" id="campus" name="campus" value="Pablo Borbon Batangas" readonly />
          </div>
        </div>
        <div class="form-group">
          <label for="position">Position:</label>
          <div class="input-container">
            <input type="text" id="position" name="position" value="CICS Dean" readonly />
            <span class="edit-icon" onclick="enableEdit('position')">✎</span>
          </div>
        </div>
        <div class="form-group">
          <label for="socmed">Social Media:</label>
          <div class="input-container">
            <input type="text" id="socmed" name="socmed" value="Linkin:linkin.com/example" readonly />
            <span class="edit-icon" onclick="enableEdit('socmed')">✎</span>
          </div>
        </div>

      </div>
      <script>
        function enableEdit(fieldName) {
          const field = document.getElementById(fieldName);
          const inputContainer = field.parentElement;

          // Toggle the "editing" class on the input container
          inputContainer.classList.toggle("editing");

          // Toggle the "readonly" attribute of the input field
          field.readOnly = !field.readOnly;
        }
      </script>
</body>

</html>