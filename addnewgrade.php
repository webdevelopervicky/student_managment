<?php
ob_start();
session_start();
include "connection.php";

if (isset($_POST['gradesubmit'])) {
  $Grade = $_POST['Grade'];
  $Detail = $_POST['Detail'];

  $insertform = new Insert($conneection->con, 'grade', 'grade', 'details', null, null, null, null, null, null, null, null, null, null,null,$Grade, $Detail, null, null, null, null, null, null, null, null, null, null,null);
}
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
          <div class="row p-2" style="border-bottom:2px solid #6719BD">
            <div class="col-10">
              <p class="h1 pb-4 dask">Grade Levels</p>
            </div>
            <div class="col-lg-2 col-12 ">

              <a href="grade.php"> <button class="buttonadd ms-lg-5 mt-lg-3">
                  Back
                </button></a>

            </div>
          </div>

          <!------------------------------------------------------------>

          <div class="row justify-content-center">

            <div class="col-lg-7 col-12 border mt-3">
              <div class="row " style="border-bottom:1px solid ;background-color: #DFF0D8;color:black">

                <!-------------form------------------------->
                <!------------------select -------------------------->


                <?php
                if (isset($_GET['primegrade'])) {

                  $primeid = $_GET['primegrade'];
                  $tabel = 'grade';
                  

                  $selectresult = $selectquery->selecttabel($conneection->con, 'grade', $primeid, 'primekey');
                  $rowselect = $selectresult->fetch_assoc();

                  if (isset($_POST['submit'])) {
                    $tabel = 'grade';
                    $updategrate = $_POST['updaateGrade'];
                    $updatdetails = $_POST['updateDetail'];

                    $updatequery->updateform($conneection->con, $tabel, 'primekey', $primeid, 'grade', 'details', null, null, null, null, null, null, null, null, $updategrate, $updatdetails,);
                     header("Location:grade.php");
                  }

                ?>

                  <p class="pt-3">Edit Grade</p>
              </div>
              <form action="" class="pb-3" method="post">
                <div class="form-group row mt-3">
                  <label for="" class="col-sm-3 text-end col-form-label">Grade</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="updaateGrade" value="<?php echo $rowselect['grade']  ?>">
                  </div>
                </div>

                <div class="form-group row mt-3">
                  <label for="" class="col-sm-3 text-end col-form-label">Detail</label>
                  <div class="col-sm-9">
                    <textarea type="text" class="form-control" name="updateDetail"><?php echo $rowselect['details'] ?></textarea>
                  </div>
                </div>

                <button class="bookmarkBtn" type="submit" name="submit">
                  <span class="IconContainer">
                    <svg viewBox="0 0 384 512" height="0.9em" class="icon">
                      <path
                        d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"></path>
                    </svg>
                  </span>
                  <p class="text mt-3">update</p>
                </button>
              </form>


            <?php }
            //=========================insert form ===================================//
            else {  ?>

              <p class="pt-3">Add Grade</p>
            </div>

            <form action="" class="pb-3" method="post">
              <div class="form-group row mt-3">
                <label for="" class="col-sm-3 text-end col-form-label">Grade</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="Grade">
                </div>
              </div>

              <div class="form-group row mt-3">
                <label for="" class="col-sm-3 text-end col-form-label">Detail</label>
                <div class="col-sm-9">
                  <textarea type="text" class="form-control" name="Detail"></textarea>
                </div>
              </div>

              <button class="bookmarkBtn mt-3 mt-lg-0" type="submit" name="gradesubmit">
                <span class="IconContainer">
                  <svg viewBox="0 0 384 512" height="0.9em" class="icon">
                    <path
                      d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"></path>
                  </svg>
                </span>
                <p class="text mt-3">Save</p>
              </button>
            </form>

          <?php }

          ?>






          <!------------------------------------------------------------------>
          </div>
        </div>

      </div>




    </div>
  </div>
  </div>

  </div>

  <?php include "script.php"  ?>
</body>

</html>