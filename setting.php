<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* Style remains the same */
    .package {
      width: 500px;
      height: 554px;
      background-image: linear-gradient(163deg, #ff00ff 0%, #3700ff 100%);
      border-radius: 20px;
      text-align: center;
      transition: all 0.25s cubic-bezier(0, 0, 0, 1);
    }

    .package:hover {
      box-shadow: 0px 0px 30px 1px rgba(204, 0, 255, 0.3);
    }

    .package2 {
      width: 500px;
      height: 554px;
      background-color: #1a1a1a;
      border-radius: 10px;
      transition: all 0.25s cubic-bezier(0, 0, 0, 1);
      padding: 15px;
      cursor: pointer;
    }

    .package2:hover {
      transform: scale(0.98);
      border-radius: 18px;
    }

    /* Form Styles */
    .login-box {
      width: 400px;
      padding: 40px;
      margin: 20px auto;
      background: transparent;
      box-sizing: border-box;
      box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
      border-radius: 10px;
    }

    @media screen and (max-width: 560px) { 

      .package {
      width:363px;
      
    }
    .login-box {
      width: 303px;
      
    }
    
    .package2 {
      width: 364px;
      margin: 0px 0px;
      
    }


    }

    .login-box p:first-child {
      margin: 0 0 30px;
      padding: 0;
      color: #fff;
      text-align: center;
      font-size: 1.5rem;
      font-weight: bold;
      letter-spacing: 1px;
    }

    .login-box .user-box {
      position: relative;
    }

    .login-box .user-box input {
      width: 100%;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      margin-bottom: 30px;
      border: none;
      border-bottom: 1px solid #fff;
      outline: none;
      background: transparent;
    }

    .login-box .user-box label {
      position: absolute;
      top: 0;
      left: 0;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      pointer-events: none;
      transition: .5s;
    }

    .login-box .user-box input:focus~label,
    .login-box .user-box input:valid~label {
      top: -20px;
      left: 0;
      color: #fff;
      font-size: 12px;
    }

    .login-box form button {
      position: relative;
      display: inline-block;
      padding: 10px 20px;
      font-weight: bold;
      color: #fff;
      font-size: 16px;
      text-decoration: none;
      text-transform: uppercase;
      overflow: hidden;
      transition: .5s;
      margin-top: 40px;
      letter-spacing: 3px
    }

    .login-box button:hover {
      background: #fff;
      color: #272727;
      border-radius: 5px;
    }

    .login-box button span {
      position: absolute;
      display: block;
    }

    .login-box button span:nth-child(1) {
      top: 0;
      left: -100%;
      width: 100%;
      height: 2px;
      background: linear-gradient(90deg, transparent, #fff);
      animation: btn-anim1 1.5s linear infinite;
    }

    @keyframes btn-anim1 {
      0% {
        left: -100%;
      }

      50%,
      100% {
        left: 100%;
      }
    }

    .login-box button span:nth-child(2) {
      top: -100%;
      right: 0;
      width: 2px;
      height: 100%;
      background: linear-gradient(180deg, transparent, #fff);
      animation: btn-anim2 1.5s linear infinite;
      animation-delay: .375s
    }

    @keyframes btn-anim2 {
      0% {
        top: -100%;
      }

      50%,
      100% {
        top: 100%;
      }
    }

    .login-box button span:nth-child(3) {
      bottom: 0;
      right: -100%;
      width: 100%;
      height: 2px;
      background: linear-gradient(270deg, transparent, #fff);
      animation: btn-anim3 1.5s linear infinite;
      animation-delay: .75s
    }

    @keyframes btn-anim3 {
      0% {
        right: -100%;
      }

      50%,
      100% {
        right: 100%;
      }
    }

    .login-box button span:nth-child(4) {
      bottom: -100%;
      left: 0;
      width: 2px;
      height: 100%;
      background: linear-gradient(360deg, transparent, #fff);
      animation: btn-anim4 1.5s linear infinite;
      animation-delay: 1.125s
    }

    @keyframes btn-anim4 {
      0% {
        bottom: -100%;
      }

      50%,
      100% {
        bottom: 100%;
      }
    }

    .login-box p:last-child {
      color: #aaa;
      font-size: 14px;
    }

    .login-box button.a2 {
      color: #fff;
      text-decoration: none;
    }

    .login-box button.a2:hover {
      background: transparent;
      color: #aaa;
      border-radius: 5px;
    }
  </style>
</head>

<body>
  <div class="container-fluid g-0">
    <?php include "header.php"; ?>

    <div class="row g-0 p-0">
      <div class="col-lg-2 col-12 bg-dark g-0">
        <!-- Sidebar remains the same -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
          <button class="navbar-toggler position-absolute" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav flex-column text-center text-lg-start" style="width: 100%;">
              <div class="navbar-brand text-center admin">
                <i class="bi bi-person-fill gradient-text" style="font-size:50px;"></i>
                <p class="gradient-text"><?php echo $_SESSION['adminname']; ?></p>
              </div>
              <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="bi bi-speedometer2 pe-2"></i>Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="student_managment.php"><i class="fa-solid fa-users pe-2"></i>Student Management</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="inactive.php"><i class="bi bi-toggle-off pe-2"></i>Inactive Students</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="grade.php"><i class="bi bi-microsoft pe-2"></i>Grade</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="fees.php"><i class="bi bi-cash pe-2"></i>Fees Section</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="repord.php"><i class="bi bi-file-earmark-pdf pe-2"></i>Report Section</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="setting.php"><i class="bi bi-gear-fill pe-2"></i>Setting</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="bi bi-power pe-2"></i>Log out</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>

      <div class="col-lg-10 col-12 p-lg-3 ms-lg-0">
      <?php
        if (isset($_POST['changesubmit'])) {
          $new_password = $_POST['newpass'];
          $old_password = $_POST['oldpass'];
          $username = $_SESSION['adminname'];

          
          $checkpass_query = "SELECT * FROM admin_login WHERE user_name = '$username' AND user_password = '$old_password'";
          $checkpass_result = $conneection->con->query($checkpass_query);

          if ($checkpass_result->num_rows > 0) {
            $updatepass_query = "UPDATE admin_login SET user_password = '$new_password' WHERE user_name = '$username'";
            $updatepass_result = $conneection->con->query($updatepass_query);

            if ($updatepass_result) {
              echo "<script>alert('Password changed successfully!');</script>";
            } else {
              echo "<script>alert('Failed to update the password.');</script>";
            }
          } else {
          
            echo "<script>alert('Incorrect old password. Please try again.');</script>";
          }
        }
        ?>

        <div class="package mx-lg-auto my-5">
          <div class="package2">
            <div class="login-box">
              <p>Change Password</p>
              <form method="post" onsubmit="return validation();">
                <div class="user-box">
                  <input required name="oldpass" type="password">
                  <label>Old Password</label>
                </div>
                <div class="user-box">
                  <input required name="newpass" id="newpass" type="password">
                  <label>New Password</label>
                </div>
                <div class="user-box">
                  <input required name="confirmpass" id="confirmpass" type="password">
                  <label>Confirm Password</label>
                </div>

                <button class="btn" type="submit" name="changesubmit">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  Make Changes
                </button>
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function validation() {
      let newpass = document.getElementById('newpass').value;
      let confirm = document.getElementById('confirmpass').value;

      if (newpass !== confirm) {
        alert('Confirm password does not match the new password');
        return false;
      }
      return true;
    }
  </script>

  <?php include "script.php"; ?>
</body>
</html>
