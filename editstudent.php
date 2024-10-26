<?php

session_start();
include "connection.php";

//============form select=================//


if (isset($_GET['register_no'])) {
    $register_no = $_GET['register_no'];
}

$selectresult = $selectquery->selecttabel($conneection->con, 'students_managment', $register_no, 'register_no');
$rowselect = $selectresult->fetch_assoc();
//=======================================//

//================ updaten =========================//



// $insertform = new Insert();

if (isset($_POST['submit'])) {


    $tabel = 'students_managment';
    $fullname = $_POST['fullname'];
    $contact = $_POST['contact'];
    $parentcontact = $_POST['parentcontact'];
    $Aadhar = $_POST['aadhar'];
    $Grade = $_POST['Grade'];
    $dop = $_POST['dop'];
    $totalfees = $_POST['totalfees'];
    $balance = $_POST['balance'];

    $message = $_POST['message'];
    $Email = $_POST['Email'];


    $updatequery->updateform($conneection->con, $tabel,'register_no', $register_no,'fullname', 'Contact', 'ParentContact', 'Aadhar', 'Grade', 'joindate', 'TotalFees', 'Balance', 'AboutStudent', 'EmailId', $fullname, $contact, $parentcontact, $Aadhar, $Grade, $dop, $totalfees,  $balance,  $message, $Email);
    header("Location: student_managment.php");
    exit();
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

            <div class="col-lg-10 col-12 p-lg-3 ms-lg-0">
                <!----------------------------------top section------------------------------------->
                <div class="col-12 p-3" style="height:100%;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <div class="row g-0" style="border-bottom:2px solid #6719BD">
                        <div class="col-10">
                            <p class="h1 pb-4 dask">Manage Students</p>
                        </div>
                        <div class="col-lg-2 col-12">

                            <a href="student_managment.php"> <button class="buttonadd ms-5 mt-3">
                                    Go Back
                                </button></a>

                        </div>
                    </div>
                    <!--------------------------------------------------------------------------------------->

                    <div class="row m-lg-5 px-lg-5 g-0">
                        <div class="col-12 border">
                            <div class="p-2 text-dark" style="background-color:#DFF0D8">Edit Student Details</div>
                            <form action="" class="p-3" method="post">

                                <fieldset class="p-4 ">
                                    <legend>Personal Information:</legend>
                                    <div class="form-group row mt-2">
                                        <label for="" class="col-sm-2 col-form-label">Full Name*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="fullname" value="<?php echo isset($rowselect['fullname']) ? $rowselect['fullname'] : ""; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="" class="col-sm-2 col-form-label">Contact*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="contact" value="<?php echo isset($rowselect['Contact']) ? $rowselect['Contact'] : ""  ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="" class="col-sm-2 col-form-label">Parent Contact*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="parentcontact" value="<?php echo isset($rowselect['ParentContact']) ? $rowselect['ParentContact'] : ""  ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="" class="col-sm-2 col-form-label">Aadhar*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="aadhar" value="<?php echo isset($rowselect['Aadhar']) ? $rowselect['Aadhar'] : ""  ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="grade" class="col-sm-2 col-form-label">Grade*</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="grade" name="Grade">
                                                <option value="">Select Grade</option>
                                                <option value="1" <?php echo (isset($rowselect['Grade']) && $rowselect['Grade'] == '1') ? 'selected' : ''; ?>>1st Grade</option>
                                                <option value="2" <?php echo (isset($rowselect['Grade']) && $rowselect['Grade'] == '2') ? 'selected' : ''; ?>>2nd Grade</option>
                                                <option value="3" <?php echo (isset($rowselect['Grade']) && $rowselect['Grade'] == '3') ? 'selected' : ''; ?>>3rd Grade</option>
                                                <option value="4" <?php echo (isset($rowselect['Grade']) && $rowselect['Grade'] == '4') ? 'selected' : ''; ?>>4th Grade</option>
                                                <option value="5" <?php echo (isset($rowselect['Grade']) && $rowselect['Grade'] == '5') ? 'selected' : ''; ?>>5th Grade</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row mt-3">
                                        <label for="" class="col-sm-2 col-form-label">DOJ*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="dop" value="<?php echo isset($rowselect['joindate']) ? $rowselect['joindate'] : ""  ?>">
                                        </div>
                                    </div>

                                </fieldset>

                                <!---------------------------------------------------------------------------->


                                <fieldset class="p-4 mt-4">
                                    <legend>Fee Information</legend>
                                    <div class="form-group row mt-2">
                                        <label for="totalfees" class="col-sm-2 col-form-label">Total Fees*</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="totalfees" name="totalfees" oninput="calculateBalance()" value="<?php echo isset($rowselect['TotalFees']) ? $rowselect['TotalFees'] : ""  ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="balance" class="col-sm-2 col-form-label">Balance</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="balance" name="balance" readonly value="<?php echo isset($rowselect['Balance']) ? $rowselect['Balance'] : ""  ?>">
                                        </div>
                                    </div>

                                    <!----------------------------------------------->

                                </fieldset>

                                <fieldset class="p-4 ">
                                    <legend>Optional Information:</legend>
                                    <div class="form-group row mt-2">
                                        <label for="" class="col-sm-2 col-form-label">About Student</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" name="message"><?php echo isset($rowselect['AboutStudent']) ? $rowselect['AboutStudent'] : ""; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="" class="col-sm-2 col-form-label">Email Id</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="Email" value="<?php echo isset($rowselect['EmailId']) ? $rowselect['EmailId'] : ""  ?>">
                                        </div>
                                    </div>



                                </fieldset>
                                <!------------------------------button--------------------------------------->
                                <button class="bookmarkBtn" type="submit" name="submit">
                                    <span class="IconContainer">
                                        <svg viewBox="0 0 384 512" height="0.9em" class="icon">
                                            <path
                                                d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"></path>
                                        </svg>
                                    </span>
                                    <p class="text mt-3">Update</p>
                                </button>

                                <!----------------------------------------------------------------------->
                            </form>

                        </div>
                    </div>

                </div>




            </div>
        </div>
    </div>

    </div>

    <?php include "script.php";  ?>
</body>

</html>