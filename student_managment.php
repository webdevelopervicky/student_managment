<?php
session_start();
include "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Document</title>
  <style>
    .content {
      display: none;
    }

    .activepage {
      display: block;
    }

    .pagination {
      margin: 10px;
    }

    .pagination button {
      padding: 5px;
      margin: 2px;
    }

    :root {
      --bg-color: #f0f0f0;
      /* Define the background color */
    }

    .tablecolor thead th,
    .tablecolor tbody td {
      background-color: rgba(255, 255, 255, 0.1) !important;
      color: var(--text-color);
    }

    .input__container {
      position: relative;
      background: rgba(255, 255, 255, 0.664);
      padding: 5px 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 5px;
      border-radius: 22px;
      max-width: 300px;
      transition: transform 400ms;
      transform-style: preserve-3d;
      /* transform: rotateX(15deg) rotateY(-20deg); */
      /* perspective: 500px; */
    }

    .shadow__input {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      left: 0;
      bottom: 0;
      z-index: -1;
      filter: blur(30px);
      border-radius: 20px;
      background-color: #999cff;
      background-image: radial-gradient(at 85% 51%, hsla(60, 60%, 61%, 1) 0px, transparent 50%),
        radial-gradient(at 74% 68%, hsla(235, 69%, 77%, 1) 0px, transparent 50%),
        radial-gradient(at 64% 79%, hsla(284, 72%, 73%, 1) 0px, transparent 50%),
        radial-gradient(at 75% 16%, hsla(283, 60%, 72%, 1) 0px, transparent 50%),
        radial-gradient(at 90% 65%, hsla(153, 70%, 64%, 1) 0px, transparent 50%),
        radial-gradient(at 91% 83%, hsla(283, 74%, 69%, 1) 0px, transparent 50%),
        radial-gradient(at 72% 91%, hsla(213, 75%, 75%, 1) 0px, transparent 50%);
    }

    .input__button__shadow {
      cursor: pointer;
      border: none;
      background: none;
      transition: transform 400ms, background 400ms;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 12px;
      padding: 5px;
    }

    .input__button__shadow:hover {
      background: rgba(255, 255, 255, 0.411);
    }

    .input__search {
      width: 100%;
      border-radius: 20px;
      outline: none;
      border: none;
      padding: 8px;
      position: relative;
    }

    .btn-rounded {
      border-radius: 50% !important;
      padding: 10px 15px;
    }

    /* button */
    .btnprev {
      font-size: 1.2rem;
      border: none;
      outline: none;
      border-radius: 0.4rem;
      cursor: pointer;
      text-transform: uppercase;
      background-color: rgb(14, 14, 26);
      color: rgb(234, 234, 234);
      font-weight: 700;
      transition: 0.6s;
      box-shadow: 0px 0px 60px #1f4c65;
      -webkit-box-reflect: below 10px linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.4));
    }

    .btnprev:active {
      scale: 0.92;
    }

    .btnprev:hover {
      background: rgb(2, 29, 78);
      background: linear-gradient(270deg, rgba(2, 29, 78, 0.681) 0%, rgba(31, 215, 232, 0.873) 60%);
      color: rgb(4, 4, 38);
    }

    /* edit button */
    .lock-button {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: rgb(20, 20, 20);
      border: none;
      font-weight: 600;

      align-items: center;
      justify-content: center;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
      cursor: pointer;
      transition-duration: 0.3s;
      overflow: hidden;
      position: relative;
      text-decoration: none !important;
    }

    .lock-svgIcon {
      width: 17px;
      transition-duration: 0.3s;
    }

    .lock-svgIcon path {
      fill: white;
    }

    .lock-button:hover {
      border-radius: 50px;
      transition-duration: 0.3s;
      background-color: rgb(255, 69, 69);
      align-items: center;
    }

    .lock-button:hover .lock-svgIcon {
      width: 20px;
      transition-duration: 0.3s;
      -webkit-transform: rotate(360deg);
    }

    .lock-button::before {
      display: none;
      color: white;
      transition-duration: 0.3s;
    }

    .lock-button:hover::before {
      display: block;
      opacity: 1;
      transform: translateY(0px);
      transition-duration: 0.3s;
    }
  </style>
</head>

<body>
  <div class="container-fluid g-0">


    <?php
    include "header.php";
    ?>

    <div class="row g-0 p-0">
      <div class="col-lg-2 col-12 bg-dark g-0">
        <!-------------------------------------NAVBAR-------------------------------------->

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
          <button class="navbar-toggler position-absolute" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav flex-column text-center text-lg-start " style="width: 100%;">
              <div class="navbar-brand text-center admin">
                <i class="bi bi-person-fill gradient-text" style="font-size:50px;"></i>
                <p class="gradient-text"><?php echo  $_SESSION['adminname'];  ?></p>
              </div>

              <li class="nav-item ">
                <a class="nav-link" href="index.php"><i class="bi bi-speedometer2 pe-2"></i>Dashboard</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="student_managment.php"><i class="fa-solid fa-users pe-2"></i>Student Managment</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="inactive.php"><i class="bi bi-toggle-off pe-2"></i>In active students</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="grade.php"><i class="bi bi-microsoft pe-2"></i>Grade</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="fees.php"><i class="bi bi-cash pe-2"></i>Fees Section</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="repord.php"><i class="bi bi-file-earmark-pdf pe-2"></i>Rebord Section</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="setting.php"><i class="bi bi-gear-fill pe-2"></i>Setting</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="logout.php"><i class="bi bi-power pe-2"></i>Log out</a>
              </li>

            </ul>
          </div>
        </nav>
      </div>

      <!-------------main contend--------------------------->

      <div class="col-12 col-lg-10 p-lg-3 ms-lg-0">

        <div class="col-12 p-3" style="height:100%;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
          <div class="row p-2 g-0" style="border-bottom:2px solid #6719BD">
            <div class="col-12 col-lg-9">
              <p class="h1 pb-4 dask">Manage Students</p>
            </div>
            <div class="col-12 col-lg-3 ">

              <a href="addstudents.php"> <button class="buttonadd ms-5 mt-3">
                  Add New Students
                  <i class="bi bi-plus-circle icon"></i>
                </button></a>

            </div>
          </div>


          <div class="row p-2 g-0">
            <div class="col-12 p-2 border">
              Manage Student
            </div>

            <div class="col-12 p-2 border">

              <!---------------------------------top section--------------------------------------->
              <div class="row g-0 pt-2">
                <div class="col-9" style="font-size:15px">show
                  <select style="width:50px" name="your_select_name" id="your_select_id">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                  </select> entries
                </div>

                <div class="col-lg-3 col-12 mt-2 mt-lg-0 text-end">
                  <form method="GET" action="">
                    <div class="input__container">
                      <div class="shadow__input"></div>
                      <button type="submit" class="input__button__shadow">
                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" height="20px" width="20px">
                          <path d="M4 9a5 5 0 1110 0A5 5 0 014 9zm5-7a7 7 0 104.2 12.6.999.999 0 00.093.107l3 3a1 1 0 001.414-1.414l-3-3a.999.999 0 00-.107-.093A7 7 0 009 2z" fill-rule="evenodd" fill="#17202A"></path>
                        </svg>
                      </button>
                      <input type="text" name="search" class="input__search" placeholder="search" value="<?php echo isset($_GET['search']) ? ($_GET['search']) : ''; ?>">
                    </div>
                  </form>
                </div>
              </div>
              <!------------------------------------------------------------------------------->
              <div class="row g-0">
                <div class="col-12 px-4 table-responsive" style="font-size:15px">

                  <!-------------------------------tabel--------------------------------------------->
                  <table class="table tablecolor mt-5 ">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">INTERN_ID</th>
                        <th scope="col">Name|Contact</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Joined on</th>
                        <th scope="col">Fees</th>
                        <!-- <th scope="col">Balance</th> -->
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                  <!-------------------------------------------------------------------->
                      <div class="content activepage">
                        <tbody>

                          <!-----------------------------------SELECT ---------------------------------------------------->
                          <?php

                          $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                          $selectsql = "SELECT * FROM students_managment WHERE status = 'active'";
                          $selecresult = $conneection->con->query($selectsql);
                         
                          if ($selecresult->num_rows > 0) {
                            $si = 1;
                            while ($row = $selecresult->fetch_assoc()) { ?>

                              <tr>
                                <td><?php echo $si++  ?></td>
                                <td><?php echo $row['register_no'] ?></td>
                                <td><?php echo  $row['fullname'] . "<br>" . $row['Contact']; ?></td>
                                <td><?php echo  $row['Grade']  ?></td>
                                <td><?php echo  $row['joindate']  ?></td>
                                <td><?php echo  $row['TotalFees']  ?></td>
                                <!-- <td><?php //echo  $row['Balance']  ?></td> -->
                                <td>
                                  <!---------------------send the primerykey in editpage------------------------>
                                  <a href=""><button class="lock-button bg-success">
                                      <svg class="lock-svgIcon" viewBox="-0.5 -0.5 16 16">
                                        <svg class="edit-svgIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                          <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg>
                                      </svg>
                                    </button></a>

                                  <a href="editstudent.php?register_no=<?php echo $row['register_no']; ?>">

                                    <button class="lock-button">
                                      <svg class="lock-svgIcon" viewBox="-0.5 -0.5 16 16">
                                        <svg class="edit-svgIcon" viewBox="0 0 512 512">
                                          <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                        </svg>
                                      </svg>
                                    </button>


                                  </a>
                                  <a href="empty.php?registerkey=<?php echo $row['register_no'];  ?>" onclick="return confirmRedirect();">
                                    <button class="lock-button bg-danger">
                                      <svg class="edit-svgIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                      </svg>
                                    </button></a>
                                </td>
                              </tr>

                          <?php  }
                          } else {
                            echo "<tr><td colspan='8'>No results found</td></tr>";
                          }
                          ?>
                        </tbody>
                      </div>

                      <!----------------------------------------------------------------------------------->
                      
                      <!----------------------------------------------------------------------------------->
                    

                  </table>
                  <div class="row g-0 d-flex justify-content-end pe-3 ">
                    <div class="pagination justify-content-end">
                      <button class="btn btnprev px-0 text-white bg-black" onclick="prevPage()" style="width:50px;font-size:12px">prev</button>
                      <button class="btn btnprev px-0 ms-2 text-white bg-black" onclick="nextPage()" style="width:50px;font-size:12px">next</button>
                    </div>
                  </div>
                  <!--------------------------------------------------------------------------->



                </div>
              </div>


            </div>
          </div>
          <!--------------------------------------------------------------->
        </div>
      </div>

    </div>
  </div>

  </div>


 

  <?php include "script.php";  ?>
</body>

</html>