<?php
session_start();
include "connection.php";

if (isset($_POST['submit'])) {


    $tabel = 'students_managment';
    $fullname = $_POST['fullname'];
    $contact = $_POST['contact'];
    $parentcontact = $_POST['parentcontact'];
    $Aadhar = $_POST['aadhar'];
    $Grade = $_POST['Grade'];
    $dop = $_POST['dop'];
    $totalfees = (float)$_POST['totalfees'];
    $advancefee = (float)$_POST['advancefee'];
    $balance = $_POST['balance'];
    $remark = $_POST['remark'];
    $message = $_POST['message'];
    $Email = $_POST['Email'];
   
    $defaultValue = 'active';

    $balancefees = $totalfees - $advancefee;

    $insertform = new Insert($conneection->con, $tabel, 'fullname', 'Contact', 'ParentContact', 'Aadhar', 'Grade', 'joindate', 'TotalFees', 'AdvanceFee', 'Balance', 'FeeRemark', 'AboutStudent', 'EmailId','status', $fullname, $contact, $parentcontact, $Aadhar, $Grade, $dop, $totalfees, $advancefee, $balancefees, $remark, $message, $Email,'active');
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <style>
        .error {
            border: 2px solid red;
            background-color: #fdd;
        }

        .error-message {
            color: red;
            font-size: 0.9em;
            display: none;
        }

        .success {
            border: 2px solid green;
            background-color: #dfd;
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

            <div class="col-lg-10 col-12 p-lg-3 ms-lg-0">
                <!----------------------------------top section------------------------------------->
                <div class="col-12 p-3" style="height:100%;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <div class="row g-0" style="border-bottom:2px solid #6719BD">
                        <div class="col-10">
                            <p class="h1 pb-4 dask">Manage Students</p>
                        </div>
                        <div class="col-lg-2 col-12">

                            <a href="student_managment.php"> <button class="buttonadd ms-0 ms-lg-5 mt-lg-3">
                                    Go Back
                                </button></a>

                        </div>
                    </div>
                    <!--------------------------------------------------------------------------------------->

                    <div class="row g-0 m-lg-5 px-lg-5 g-0">
                        <div class="col-12 border">
                            <div class="p-2 text-dark" style="background-color:#DFF0D8">Add Student Details</div>
                            <form action="" class="p-3" method="post" onsubmit="return validation()">

                                <fieldset class="p-4">
                                    <legend>Personal Information:</legend>

                                    <div class="form-group row mt-2">
                                        <label for="fullname" class="col-sm-2 col-form-label">Full Name*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="fullname" id="fullname">
                                            <span class="error-message" id="fullname-error">Full name is required.</span>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="contact" class="col-sm-2 col-form-label">Contact*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="contact" id="contact">
                                            <span class="error-message" id="contact-error">Valid contact number is required.</span>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="parentcontact" class="col-sm-2 col-form-label">Parent Contact*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="parentcontact" id="parentcontact">
                                            <span class="error-message" id="parentcontact-error">Valid parent contact number is required.</span>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="aadhar" class="col-sm-2 col-form-label">Aadhar*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="aadhar" id="aadhar">
                                            <span class="error-message" id="aadhar-error">Valid Aadhar number is required.</span>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="Grade" class="col-sm-2 col-form-label">Grade*</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="Grade" name="Grade">
                                                <option value="">Select Grade</option>
                                                <option value="1">1st Grade</option>
                                                <option value="2">2nd Grade</option>
                                                <option value="3">3rd Grade</option>
                                                <option value="4">4th Grade</option>
                                                <option value="5">5th Grade</option>
                                            </select>
                                            <span class="error-message" id="grade-error">Grade selection is required.</span>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="dop" class="col-sm-2 col-form-label">DOJ*</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="dop" id="dop">
                                            <span class="error-message" id="dop-error">Date of Joining is required.</span>
                                        </div>
                                    </div>

                                </fieldset>

                                <fieldset class="p-4 mt-4">
                                    <legend>Fee Information</legend>

                                    <div class="form-group row mt-2">
                                        <label for="totalfees" class="col-sm-2 col-form-label">Total Fees*</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="totalfees" name="totalfees" oninput="calculateBalance()">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="advancefee" class="col-sm-2 col-form-label">Advance Fee*</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="advancefee" name="advancefee" oninput="calculateBalance()">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="balance" class="col-sm-2 col-form-label">Balance</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="balance" name="balance" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="remark" class="col-sm-2 col-form-label">Fee Remark</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="remark">
                                        </div>
                                    </div>

                                </fieldset>

                                <fieldset class="p-4">
                                    <legend>Optional Information:</legend>

                                    <div class="form-group row mt-2">
                                        <label for="message" class="col-sm-2 col-form-label">About Student</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" name="message"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="Email" class="col-sm-2 col-form-label">Email Id</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="Email" id="Email">
                                        </div>
                                    </div>

                                </fieldset>

                                <button class="bookmarkBtn" type="submit" name="submit">
                                    <span class="IconContainer">
                                        <svg viewBox="0 0 384 512" height="0.9em" class="icon">
                                            <path
                                                d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"></path>
                                        </svg>
                                    </span>
                                    <p class="text mt-3">Save</p>
                                </button>

                            </form>

                        </div>
                    </div>

                </div>




            </div>
        </div>
    </div>

    </div>
    <script>
        function calculateBalance() {
            var totalFees = document.getElementById('totalfees').value;
            var advanceFee = document.getElementById('advancefee').value;

            var balance = totalFees - advanceFee;
            document.getElementById('balance').value = balance;
        }


        function validation() {
    let valid = true;

    const fullname = document.getElementById('fullname'); 
    const fullnameError = document.getElementById('fullname-error');

    const contact = document.querySelector('input[name="contact"]');
    const parentcontact = document.querySelector('input[name="parentcontact"]');
    const aadhar = document.querySelector('input[name="aadhar"]');
    const grade = document.querySelector('select[name="Grade"]');
    const dop = document.querySelector('input[name="dop"]');

    const contactError = document.getElementById('contact-error');
    const parentcontactError = document.getElementById('parentcontact-error');
    const aadharError = document.getElementById('aadhar-error');
    const gradeError = document.getElementById('grade-error');
    const dopError = document.getElementById('dop-error');

    if (fullname.value.trim() === "") {
        fullname.classList.add('error');
        fullnameError.style.display = 'block';
        valid = false;
    } else {
        fullname.classList.remove('error');
        fullnameError.style.display = 'none';
    }

    if (contact.value.trim() === "" || contact.value.length !== 10 || isNaN(contact.value)) {
        contact.classList.add('error');
        contactError.style.display = 'block';
        valid = false;
    } else {
        contact.classList.remove('error');
        contactError.style.display = 'none';
    }

    if (parentcontact.value.trim() === "" || parentcontact.value.length !== 10 || isNaN(parentcontact.value)) {
        parentcontact.classList.add('error');
        parentcontactError.style.display = 'block';
        valid = false;
    } else {
        parentcontact.classList.remove('error');
        parentcontactError.style.display = 'none';
    }

    if (aadhar.value.trim() === "" || aadhar.value.length !== 12 || isNaN(aadhar.value)) {
        aadhar.classList.add('error');
        aadharError.style.display = 'block';
        valid = false;
    } else {
        aadhar.classList.remove('error');
        aadharError.style.display = 'none';
    }

    if (grade.value.trim() === "") {
        grade.classList.add('error');
        gradeError.style.display = 'block';
        valid = false;
    } else {
        grade.classList.remove('error');
        gradeError.style.display = 'none';
    }

    if (dop.value.trim() === "") {
        dop.classList.add('error');
        dopError.style.display = 'block';
        valid = false;
    } else {
        dop.classList.remove('error');
        dopError.style.display = 'none';
    }

    return valid;
}

        
    </script>

    
    <script src="script.js"></script>
</body>

</html>