<?php
session_start();
if ($_SESSION['user'] != 1) {
  header("Location: login.php");
  exit();
}
include "connection.php";
//===============================================================================//
class feestabel
{
  private $con;
  function __construct($con)
  {
    $this->con = $con;
  }
  function feesdetaails()
  {
    $feesdetails = "SELECT SUM(paid) AS totalpaide FROM fees";
    $feesresult = $this->con->query($feesdetails);
    return $feesresult;
  }
 
}
$detailstotal = new feestabel($conneection->con);
$feesdetails = $detailstotal->feesdetaails();
$fees = $feesdetails->fetch_assoc();

//=============================================================================//
class detailstotal
{
  private $con;
  function __construct($con)
  {
    $this->con = $con;
  }
  function detaails()
  {

    $totaldetails = "SELECT SUM(TotalFees) AS overalltotal, SUM(AdvanceFee) AS advance_fees,SUM(Balance)as joinbalance FROM students_managment";
    $totaalresult = $this->con->query($totaldetails);
    return $totaalresult;
  }
  function sumtotals()
  {
    $totaldetails = "SELECT COUNT(fullname) AS total_students FROM students_managment WHERE status = 'active' OR status = 'inactive'";
    $totaalresult = $this->con->query($totaldetails);
    return $totaalresult;
  }
}
$detailstotal = new detailstotal($conneection->con);
$totals  =  $detailstotal->detaails();
$studentcount  =  $detailstotal->sumtotals();

$row = $totals->fetch_assoc();
$students = $studentcount->fetch_assoc();

//=======================activeclass===========================//
class status
{
  private $con;
  function __construct($con)
  {
    $this->con = $con;
  }
  function statusdetails($datas)
  {

    $totaldetails = "SELECT COUNT(status) AS countstudent  FROM students_managment WHERE status = '$datas' ";
    $totaalresult = $this->con->query($totaldetails);
    return $totaalresult;
  }
}
$status = new status($conneection->con);
$statusre = $status->statusdetails('active');
$status = $statusre->fetch_assoc();
//
$status2 = new status($conneection->con);
$statusrein = $status2->statusdetails('inactive');
$statusin = $statusrein->fetch_assoc();

//========================balance show=========================//
$filters = null;
$onlyActive = true;
$joinquery = new jionselect();
$joinqueryfetch = $joinquery->joinselect($conneection->con, 'students_managment', 'grade', 'Grade', 'primekey', $filters, $onlyActive);
$totlbalance = 0;
if ($joinqueryfetch->num_rows > 0) {
  while ($joinrow = $joinqueryfetch->fetch_assoc()) {

    $user_key = $joinrow['register_no'];
    $selectresult = $selectquery->selecttabel($conneection->con, 'fees', $user_key, 'student_key');

    $lastRow = null;
    while ($rowpalance = $selectresult->fetch_assoc()) {
      $lastRow = $rowpalance;
    }
    $balanceToShow = isset($lastRow) ? $lastRow['balance'] : $joinrow['Balance'];
    $totlbalance += $balanceToShow;
  }
}


?>


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

          <li class="nav-item active">
            <a class="nav-link" href="#"><i class="bi bi-speedometer2 pe-2"></i>Dashboard</a>
          </li>
          <li class="nav-item ">
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

  <div class="col-10 p-lg-3 ms-4 ms-lg-0">


    <div class="col-12 p-3" style="height:100%;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
      <p class="h1 pb-4 dask" style="border-bottom:2px solid #6719BD">Dashboard</p>
      <!-----------------------First row-------------------------------------->
      <div class="row mt-5">
        <div class=' col-lg-4 col-12 pe-lg-3'>
          <div class="card">

            <a href="student_managment.php">
              <div class="content text-center">
                <i class="fa-solid fa-users mt-2" style="font-size:50px"></i>
                <p class="mt-3">Total Students : <?php echo $students['total_students'];  ?></p>
                <p>STUDENT MANAGMENT</p>
              </div>
            </a>

          </div>
        </div>

        <div class=' col-lg-4 col-12 pe-3 mt-3 mt-lg-0'>
          <a href="fees.php">
            <div class="card card2">
              <span></span>
              <div class="content text-center">
                <i class="bi bi-cash" style="font-size:50px"></i>
                <p class="">Total Earning : RS:<?php echo  $totalpaid = $fees['totalpaide'] + $row['advance_fees'];  ?></p>
                <p>COLLECT FEES</p>
              </div>
            </div>
          </a>
        </div>

        <div class='col-lg-4 col-12 pe-3  mt-3 mt-lg-0'>
          <a href="fees.php">
            <div class="card card3">
              <span></span>
              <div class="content text-center">
                <i class="bi bi-microsoft" style="font-size:50px"></i>
                <p class="">Total Pending: RS:<?php echo $totlbalance  ?></p>
                <p>COLLECT FEES</p>
              </div>

            </div>
          </a>
        </div>

      </div>
      <!---------------------------------------------Secound row------------------------------------------------->
      <div class="row mt-lg-5 mt-3">
        <div class=' col-lg-4 col-12 pe-3  mt-3 mt-lg-0'>
          <a href="">
            <div class="card card4">

              <div class="content text-center">
                <i class="bi bi-toggle-on" style="font-size:50px"></i>
                <p class="">ACTIVE STUDENTS :<?php echo $status['countstudent'];  ?></p>

              </div>
          </a>

        </div>
      </div>

      <div class='col-lg-4 col-12 pe-3 mt-3 mt-lg-0'>
        <a href="repord.php">
          <div class="card card5">
            <span></span>
            <div class="content text-center">
              <i class="bi bi-file-earmark-pdf" style="font-size:50px"></i>
              <p class="">VIEW REPORTS</p>

            </div>
        </a>
      </div>
    </div>

    <div class='col-lg-4 col-12 pe-3 mt-3 mt-lg-0'>
      <a href="inactive.php">
        <div class="card card6">
          <span></span>
          <div class="content text-center">
            <i class="bi bi-toggle-off" style="font-size:50px"></i>
            <p class="">IN ACTIVE STUDENTS :<?php echo $statusin['countstudent'];  ?></p>

          </div>

        </div>
      </a>
    </div>

  </div>



</div>


</div>
</div>
</div>




<?php
include "script.php";
?>
</body>

</html>