<?php 




session_start(); 
include "connection.php";


class Logintabel {
  public $con;
  function __construct($con) {
    $this->con = $con;
  }
  function sudentdetail($username,$userpass){
    
    $sqladmin = "SELECT * FROM admin_login WHERE user_name = '$username' AND user_password = '$userpass'";
    $sqlresultadmin = $this->con->query($sqladmin);
    return $sqlresultadmin;
  }
}
if (isset($_POST['submit'])) {
  $username = $_POST['username']; 
  $userpass = $_POST['password']; 

  $logintabel = new Logintabel($conneection->con);
  $admindetail = $logintabel->sudentdetail($username,$userpass);
    $admindetailrow = $admindetail->fetch_assoc();
   
  if ($admindetail->num_rows > 0) {
    $_SESSION['adminname'] = $admindetailrow['user_name'];
    
    $_SESSION['user'] = 1; 
    header("Location: index.php"); 
    exit(); 
    } else {
    $_SESSION['user'] = 0; 
    echo "<script>alert('Invalid user');</script>"; 
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="style.css">

  <style>
    body {
      width: 100vw;
      height: 100vh;
      justify-content: center;
      align-items: center;
      vertical-align: middle;
      display: flex;
      background: radial-gradient(ellipse at bottom, #0d1d31 0%, #0c0d13 100%);
    }

    .outer {
      width:436px;
      height:315px;
      border-radius: 10px;
      padding: 1px;
      background: radial-gradient(circle 230px at 0% 0%, #ffffff, #0c0d0d);
      position: relative;
    }

    .dot {
      width: 5px;
      aspect-ratio: 1;
      position: absolute;
      background-color: #fff;
      box-shadow: 0 0 10px #ffffff;
      border-radius: 100px;
      z-index: 2;
      right: 10%;
      top: 10%;
      animation: moveDot 6s linear infinite;
    }

    @keyframes moveDot {

      0%,
      100% {
        top: 10%;
        right: 10%;
      }

      25% {
        top: 10%;
        right: calc(100% - 48px);
      }

      50% {
        top: calc(100% - 33px);
        right: calc(100% - 48px);
      }

      75% {
        top: calc(100% - 38px);
        right: 10%;
      }
    }

    .card {
      z-index: 1;
      width: 100%;
      height: 100%;
      border-radius: 9px;
      border: solid 1px #202222;
      background-size: 20px 20px;
      background: radial-gradient(circle 280px at 0% 0%, #444444, #0c0d0d);
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      flex-direction: column;
      color: #fff;
    }

    .ray {
      width: 220px;
      height: 45px;
      border-radius: 100px;
      position: absolute;
      background-color: #c7c7c7;
      opacity: 0.4;
      box-shadow: 0 0 50px #fff;
      filter: blur(10px);
      transform-origin: 10%;
      top: 0%;
      left: 0;
      transform: rotate(40deg);
    }

    .card .text {
      font-weight: bolder;
      font-size: 4rem;
      background: linear-gradient(45deg, #000000 4%, #fff, #000);
      background-clip: text;
      color: transparent;
    }

    .line {
      width: 100%;
      height: 1px;
      position: absolute;
      background-color: #2c2c2c;
    }

    .topl {
      top: 10%;
      background: linear-gradient(90deg, #888888 30%, #1d1f1f 70%);
    }

    .bottoml {
      bottom: 10%;
    }

    .leftl {
      left: 10%;
      width: 1px;
      height: 100%;
      background: linear-gradient(180deg, #747474 30%, #222424 70%);
    }

    .rightl {
      right: 10%;
      width: 1px;
      height: 100%;
    }



    button {
  --primary-color: #645bff;
  --secondary-color: #fff;
  --hover-color: #111;
  --arrow-width: 10px;
  --arrow-stroke: 2px;
  box-sizing: border-box;
  border: 0;
  border-radius: 20px;
  color: var(--secondary-color);
  padding: 8px 12px;
  background: var(--primary-color);
  display: flex;
  transition: 0.2s background;
  align-items: center;
  gap: 0.6em;
  font-weight: bold;
}

button .arrow-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
}

button .arrow {
  margin-top: 1px;
  width: var(--arrow-width);
  background: var(--primary-color);
  height: var(--arrow-stroke);
  position: relative;
  transition: 0.2s;
}

button .arrow::before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  border: solid black;
  border-width: 0 var(--arrow-stroke) var(--arrow-stroke) 0;
  display: inline-block;
  top: -3px;
  right: 3px;
  transition: 0.2s;
  padding: 3px;
  transform: rotate(-45deg);
}

button:hover {
  background-color:white;
  color:black;
}

button:hover .arrow {
  background:black;
  color:black;
}

button:hover .arrow:before {
  right: 0;
}

  </style>
</head>

<body>

 
    <div class="outer">

      <div class="dot"></div>

      <div class="card">

        <div class="ray"></div>
<!--------------------form----------------------------->

<form action="" method="post">
  <div class="form-group position-relative z-1">
    <div class="input-group">
      <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
      <input type="text" class="form-control" placeholder="Enter text"name="username">
    </div>
  </div>

  <div class="form-group mt-5 position-relative">
    <div class="input-group ">

      <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
      <input id="passinput"  type="password" class="form-control" placeholder="Enter password" name="password">
      <span class="input-group-text"><i id="eye" class="bi bi-eye-slash-fill" style=" cursor:pointer;"></i></span>
    </div>
    
  </div>
<div class="text-center mt-4">

<button type="submit"name="submit">
    log in 
    <div class="arrow-wrapper">
        <div class="arrow"></div>

    </div>
</button>

</div>
 
</form>

<!------------------------------------------------->
        <div class="line topl"></div>
        <div class="line leftl"></div>
        <div class="line bottoml"></div>
        <div class="line rightl"></div>
      </div>
    </div>


    <script>

      let eye = document.getElementById('eye');
      let passinput = document.getElementById('passinput');

      eye.addEventListener('click',function(){
        if(passinput.type == "password" ){
          passinput.type = "text";
          eye.classList.remove("bi-eye-slash-fill");
          eye.classList.add("bi-eye-fill");
        }
        else{
          passinput.type = "password";
          eye.classList.remove("bi-eye-fill");
          eye.classList.add("bi-eye-slash-fill");
         
        }
      })
    </script>




</body>

</html>