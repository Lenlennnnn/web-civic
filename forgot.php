<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot Password</title>
  <link rel="stylesheet" href="css/forgot.css" />

</head>

<body>
  <div class="header-container">
    <div class="header-left">CIVICALL</div>
    <div class="header-right">
      <input type="email" placeholder="Email" />
      <input type="password" placeholder="Password" />
      <a href="dashboard.php"><button class="login-button">Login</button></a>
    </div>
  </div>

  <div class="reset-container">
    <h1>Reset your password</h1>
    <hr />
    <p>
      Please insert your Email or Phonee number to get the code to reset your
      password
    </p>
    <div class="reset-method">
      <input type="text" placeholder="Email or Phone Number" />
      <button class="send-button">Send</button>
    </div>
    <div class="reset-method">
      <input type="text" placeholder="Insert code" />
      <a href="newPassword.php"> <button class="proceed-button">Proceed</button></a>
    </div>
  </div>
</body>

</html>