 <?php session_start();  ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Document</title>
     <style>
         p {
             color: var(--text-color) !important;
         }

         table tr,
         td,
         th {
             background-color: transparent !important;
             border: 1px solid var(--text-color) !important;
             color: var(--text-color) !important;
         }


         .e-card {
             margin: 100px auto;
             background: transparent;
             box-shadow: 0px 8px 28px -9px rgba(0, 0, 0, 0.45);
             position: relative;
             width: 650px;
             height: 1000px;
             border-radius: 16px;
             overflow: hidden;
         }

         .wave {
             position: absolute;
             width: 500px;
             height: 700px;
             opacity: 0.6;
             left: 0;
             top: 0;
             margin-left: 50%;
             margin-top: -70%;
             background: linear-gradient(744deg, #af40ff, #5b42f3 60%, #00ddeb);
         }


         .infotop {
             text-align: center;
             font-size: 20px;
             position: absolute;
             top: 5.6em;
             left: 0;
             right: 0;
             color: rgb(255, 255, 255);
             font-weight: 600;
         }

         .name {
             font-size: 14px;
             font-weight: 100;
             position: relative;
             top: 1em;
             text-transform: lowercase;
         }

         .wave:nth-child(2),
         .wave:nth-child(3) {
             top: 210px;
         }

         .playing .wave {
             border-radius: 40%;
             animation: wave 3000ms infinite linear;
         }

         .wave {
             border-radius: 40%;
             animation: wave 55s infinite linear;
         }

         .playing .wave:nth-child(2) {
             animation-duration: 4000ms;
         }

         .wave:nth-child(2) {
             animation-duration: 50s;
         }

         .playing .wave:nth-child(3) {
             animation-duration: 5000ms;
         }

         .wave:nth-child(3) {
             animation-duration: 45s;
         }

         @keyframes wave {
             0% {
                 transform: rotate(0deg);
             }

             100% {
                 transform: rotate(360deg);
             }
         }
     </style>
 </head>

 <body>
     <div class="container-fluid g-0">
         <?php
            include "header.php";
            include "connection.php";

            if (isset($_GET['registerno'])) {
                $registerno = $_GET['registerno'];
            }
            $selectresult = $selectquery->selecttabel($conneection->con, 'students_managment', $registerno, 'register_no');
            if ($selectresult->num_rows > 0) {
                $row = $selectresult->fetch_assoc();
                $gradeno = $row['Grade'];
            }

            $selectresult1 = $selectquery->selecttabel($conneection->con, 'Grade', $gradeno, 'primekey');
            if ($selectresult1->num_rows > 0) {
                $grade = $selectresult1->fetch_assoc();
            }
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
                             <li class="nav-item ">
                                 <a class="nav-link" href="grade.php"><i class="bi bi-microsoft pe-2"></i>Grade</a>
                             </li>
                             <li class="nav-item ">
                                 <a class="nav-link" href="fees.php"><i class="bi bi-cash pe-2"></i>Fees Section</a>
                             </li>
                             <li class="nav-item active">
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

             <div class="col-lg-10 col-12 p-lg-3 ms-lg-0 table-responsive">

                 <div class="e-card playing">
                     <div class="image"></div>

                     <div class="wave"></div>
                     <div class="wave"></div>
                     <div class="wave"></div>

                     <p class="h3 m-3">Fee Report</p>
                     <hr>
                     <p class="h4 m-3">Student Info</p>
                     <div class="infotop ">
                         <table class="table table-bordered mt-4">
                             <tr>
                                 <th>Full Name</th>
                                 <td><?php echo $row['fullname']; ?></td>
                                 <th>Grade</th>
                                 <td><?php echo $grade['grade']; ?></td>
                             </tr>
                             <tr>
                                 <th>Contact</th>
                                 <td><?php echo $row['Contact']; ?></td>
                                 <th>Joined On</th>
                                 <td><?php echo $row['joindate']; ?></td>
                             </tr>
                         </table>

                         <p class="h4 m-3">Fee Info</p>
                         <table class="table table-bordered mt-4">
                             <tr>
                                 <th>Date</th>
                                 <th>Paid</th>
                                 <th>Remarks</th>
                             </tr>
                             <tr>
                                 <td><?php echo $row['joindate'] ?></td>
                                 <td><?php echo $row['AdvanceFee'] ?></td>
                                 <td><?php echo $row['FeeRemark'] ?></td>
                             </tr>
                             <?php
                                $selectresult2 = $selectquery->selecttabel($conneection->con, 'fees', $registerno, 'student_key');

                                if ($selectresult2->num_rows > 0) {
                                    $lastRow = null;
                                    $totalPaid = 0;
                                    while ($rowdate = $selectresult2->fetch_assoc()) {
                                        $totalPaid += $rowdate['paid'];
                                        $lastRow = $rowdate;
                                ?>
                                     <tr>
                                         <td><?php echo $rowdate['paid_date']; ?></td>
                                         <td><?php echo $rowdate['paid']; ?></td>
                                         <td><?php echo $rowdate['remark']; ?></td>
                                     </tr>
                             <?php
                                    }
                                    $balanceToShow = isset($lastRow) ? $lastRow['balance'] : $row['Balance'];
                                }
                                ?>
                         </table>

                         <p><b>Total Fees :</b> <span class="ms-2"><?php echo isset($row['TotalFees']) ? $row['TotalFees'] : 00; ?></span></p>
                         <p><b>Total Paid :</b> <span><?php $totalPaid = isset($totalPaid) ? $totalPaid : 0;
                                                        $advanceFee = isset($row['AdvanceFee']) ? $row['AdvanceFee'] : 0;
                                                        $totalpaidfees = $totalPaid + $advanceFee;;
                                                        echo isset($totalpaidfees) ? $totalpaidfees : 00; ?></span></p>
                         <p><b>Balance :</b> <span><?php echo isset($balanceToShow) ? $balanceToShow : $row['Balance']; ?></span></p>
                     </div>
                 </div>

             </div>
         </div>
     </div>

     </div>
     </div>
     <!----------------------------------------------------------------------------------->


     </div>


     <?php include "script.php" ?>
 </body>

 </html>