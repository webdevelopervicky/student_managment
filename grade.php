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
              <li class="nav-item ">
                <a class="nav-link" href="student_managment.php"><i class="fa-solid fa-users pe-2"></i>Student Managment</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="inactive.php"><i class="bi bi-toggle-off pe-2"></i>In active students</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link " href="grade.php"><i class="bi bi-microsoft pe-2"></i>Grade</a>
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

      <div class="col-lg-10 col-12 p-lg-3  ms-lg-0">

        <div class="col-12 p-3" style="height:100%;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
          <div class="row g-0 p-2" style="border-bottom:2px solid #6719BD">
            <div class="col-9">
              <p class="h1 pb-4 dask">Grade Levels</p>
            </div>
            <div class="col-lg-3 col-12 ">

              <a href="addnewgrade.php"> <button class="buttonadd ms-5 mt-3">
                  Add New Grade
                  <i class="bi bi-plus-circle icon"></i>
                </button></a>

            </div>
          </div>

          <!------------------------------------------------------------>
          <div class="row g-0 p-2">
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
                  <table class="table tablecolor mt-5">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Details</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <!-------------------------------------------------------------------->
                    <div class="content activepage">
                      <tbody>

                        <!-----------------------------------SELECT ---------------------------------------------------->
                        <?php
                        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
                        $selecresult =  $selectquery->selecttabel($conneection->con, " grade", $searchTerm, "grade");
                        if ($selecresult->num_rows > 0) {
                          $si = 1;
                          while ($row = $selecresult->fetch_assoc()) {
                        ?>
                            <tr>
                              <td><?php echo $si++  ?></td>
                              <td><?php echo $row['grade'] ?></td>
                              <td><?php echo  $row['details'] ?></td>


                              <td>
                                <!---------------------send the primerykey in editpage------------------------>



                                <a href="addnewgrade.php?primegrade=<?php echo $row['primekey']  ?>">

                                  <button class="lock-button">
                                    <svg class="lock-svgIcon" viewBox="-0.5 -0.5 16 16">
                                      <svg class="edit-svgIcon" viewBox="0 0 512 512">
                                        <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                      </svg>
                                    </svg>
                                  </button>


                                </a>
                                <a href="empty.php?primekey=<?php echo $row['primekey'] ?>" onclick="return confirmRedirect();">
                                  <button class="lock-button bg-danger">
                                    <svg class="edit-svgIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                    </svg>
                                  </button></a>
                              </td>
                            </tr>

                        <?php  }
                        }  ?>
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

          <!------------------------------------------------------------>
        </div>




      </div>
    </div>
  </div>

  </div>

  <?php include "script.php"  ?>
</body>

</html>