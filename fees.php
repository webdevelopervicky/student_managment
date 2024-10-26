<?php    
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>
  <style>
    .buttonmodel {
      text-decoration: none;
      line-height: 1;
      border-radius: 1.5rem;
      overflow: hidden;
      position: relative;
      box-shadow: 10px 10px 20px rgba(0, 0, 0, .05);
      background-color: #fff;
      color: #121212;
      border: none;
      cursor: pointer;
    }

    .button-decor {
      position: absolute;
      inset: 0;
      background-color: var(--clr);
      transform: translateX(-100%);
      transition: transform .3s;
      z-index: 0;
    }

    .button-content {
      display: flex;
      align-items: center;
      font-weight: 600;
      position: relative;
      overflow: hidden;
    }

    .button__icon {
      width: 48px;
      height: 40px;
      background-color: var(--clr);
      display: grid;
      place-items: center;
    }

    .button__text {
      display: inline-block;
      transition: color .2s;
      padding: 2px 1.5rem 2px;
      padding-left: .75rem;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
      max-width: 150px;
    }

    .button:hover .button__text {
      color: #fff;
    }

    .button:hover .button-decor {
      transform: translate(0);
    }

    .modal-body {
      padding: 20px;
    }

    .form-control:hover,
    .form-control:focus {
      background-color: #f0f0f0;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #00965e;
      border-color: #00965e;
    }

    #myModal .modal-dialog {
      max-width: 600px;
      margin: 1.75rem auto;
      border-radius: 10px;
    }

    #myModal .modal-content {
      background-color: #ffffff;
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    #myModal .modal-header {
      background-color: #007bff;
      color: white;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
      padding: 15px 20px;
    }

    #myModal .modal-title {
      font-size: 1.5rem;
      font-weight: bold;
    }

    #myModal .btn-close {
      color: white;
      opacity: 1;
    }

    #myModal .form-group label {
      font-weight: bold;
      color: #333;
    }

    #myModal .form-control {
      border-radius: 5px;
      border: 1px solid #ccc;
      padding: 10px;
    }

    #myModal input[readonly] {
      background-color: #f5f5f5;
      color: black;
      cursor: not-allowed;
    }

    #myModal .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 1rem;
      font-weight: bold;
      width: 100%;
    }

    #myModal .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    #myModal .modal-body {
      padding: 20px;
    }

    #myModal .form-group {
      margin-bottom: 1.5rem;
    }


    #myModal .form-control {
      box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    }


    #myModal .form-control:focus {
      border-color: #007bff;
      box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
    }
  </style>
</head>

<body>
  <div class="container-fluid g-0">
    <?php
    include "header.php";
    include "connection.php";
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
              <li class="nav-item active">
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

        <div class="col-12 p-3" style="height:100%;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
          <div class="row g-0 p-2" style="border-bottom:2px solid #6719BD">
            <div class="col-9">
              <p class="h1 pb-4 dask">Fees</p>
            </div>
            
          </div>

          <!------------------------- search ----------------------------------->

          <div class="row g-0 mt-3">
          <form method="POST" action="">
              <fieldset>
                <legend style="font-size: 20px;">search :</legend>
                <div class="row">
                  <div class="form-group col-lg-3 col-12 ps-lg-5 ">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="ps-1 py-1 rounded" style="width:170px" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                  </div>

                  <div class="form-group col-lg-4 col-12 ps-lg-5 mt-2 mt-lg-0">
                    <label for="doj">Date of joining</label>
                    <input type="date" name="doj" class="px-4 py-1 rounded" value="<?php echo isset($_POST['doj']) ? $_POST['doj'] : ''; ?>">
                  </div>

                  <div class="form-group col-lg-3 col-12 mt-2 mt-lg-0">
                    <label for="grade">Grade</label>
                    <select name="grade" class="py-1 rounded ms-2" style="border-radius:20x">
                      <option value="">Select Grade</option>
                      <?php
                      $selecresult = $selectquery->selecttabel($conneection->con, "grade");
                      if ($selecresult->num_rows > 0) {
                        while ($row = $selecresult->fetch_assoc()) { ?>
                          <option value="<?php echo $row['grade']; ?>" <?php echo (isset($_POST['grade']) && $_POST['grade'] == $row['grade']) ? 'selected' : ''; ?>>
                            <?php echo $row['grade']; ?>
                          </option>
                      <?php }
                      } ?>
                    </select>
                  </div>

                  <div class="form-group col-2 mt-lg-0 mt-2">
                    <div class="pagination">
                      <button type="submit" class="btn btnprev px-0 text-white bg-success" style="width:50px;font-size:12px">Filter</button>
                      <button type="reset" class="btn btnprev px-0 ms-2 text-white bg-danger" style="width:50px;font-size:12px" onclick="window.location.href = window.location.pathname;">Reset</button>
                    </div>
                  </div>
                </div>
              </fieldset>
            </form>


          </div>

          <!---------------------------------------------------------------------------------------->

          <div class="row p-2">
            <div class="col-12 p-2 border">
              Manage Fees
            </div>
            <div class="col-12 p-2 border">

              <!---------------------------------top section--------------------------------------->
              
              <!------------------------------------------------------------------------------->
              <div class="row">
                <div class="col-12 px-4 table-responsive" style="font-size:15px">

                  <!-------------------------------tabel--------------------------------------------->
                  <table class="table tablecolor mt-5">
                    <thead>
                      <tr>
                        <th scope="col">Name/Contact</th>
                        <th scope="col">Fees</th>
                        <th scope="col">Balance</th>
                        <th scope="col">Grade</th>
                        <th scope="col">DOJ</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <!-------------------------------------------------------------------->
                    <div class="content activepage">
                      <tbody>

                        <!-----------------------------------join SELECT tabel---------------------------------------------------->
                        <?php
                        $filters = [
                          'name' => isset($_POST['name']) ? $_POST['name'] : '',
                          'doj' => isset($_POST['doj']) ? $_POST['doj'] : '',
                          'grade' => isset($_POST['grade']) ? $_POST['grade'] : ''
                        ];
                        $onlyActive = true;
                        $joinquery = new jionselect();
                        $joinqueryfetch = $joinquery->joinselect($conneection->con, 'students_managment', 'grade', 'Grade', 'primekey', $filters,$onlyActive);
                        ?>

                        <!-----------------------------------join SELECT tabel---------------------------------------------------->
                        <?php

                        //$joinqueryfetch = $joinquery->joinselect($conneection->con, 'students_managment', 'grade', 'Grade', 'primekey');
                        $totlbalance = 0;
                        if ($joinqueryfetch->num_rows > 0) {
                          while ($joinrow = $joinqueryfetch->fetch_assoc()) {

                            $user_key = $joinrow['register_no'];
                            $selectresult = $selectquery->selecttabel($conneection->con, 'fees', $user_key, 'student_key');
                           
                            $lastRow = null;
                            while ($row = $selectresult->fetch_assoc()) {
                              $lastRow = $row;
                            }
                            $balanceToShow = isset($lastRow) ? $lastRow['balance'] : $joinrow['Balance'];
                            $totlbalance += $balanceToShow
                           
                        ?>
                            <tr>
                            
                              <td><?php echo $joinrow['fullname'] . "<br>" . $joinrow['Contact']; ?></td>
                              <td><?php echo $joinrow['TotalFees']; ?></td>
                              <td><?php echo  $balanceToShow ; ?></td>
                              <td><?php echo $joinrow['grade']; ?></td>
                              <td><?php echo $joinrow['joindate']; ?></td>
                              <!----------------------MODEL BUTTON------------------------>
                              <td>
                                <button type="" class="button buttonmodel" data-bs-target="#myModal" data-bs-toggle="modal" style="--clr: #00ad54;"
                                  data-fullname="<?php echo $joinrow['fullname']; ?>"
                                  data-contact="<?php echo $joinrow['Contact']; ?>"
                                  data-totalfees="<?php echo $joinrow['TotalFees']; ?>"
                                  data-balance="<?php echo $balanceToShow; ?>"
                                  data-primekey="<?php echo $joinrow['register_no']; ?>">
                                  <span class="button-decor"></span>
                                  <div class="button-content">
                                    <div class="button__icon">
                                      <i class="bi bi-cash text-white"></i>
                                    </div>
                                    <span class="button__text" style="font-size:12px">Collect Fee</span>
                                  </div>
                                </button>
                              </td>
                            </tr>
                        <?php
                          }
                        }
                        ?>

                      </tbody>
                    </div>

                  </table>
                  <div class="row d-flex justify-content-end pe-3 ">
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

  <!------------------------------MODEL----------------------------------------->


  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content text-black">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Collect Fees</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="form.php" method="post">
            <div class="form-group row mb-3">
              <label for="" class="col-3 col-form-label">Name:</label>
              <div class="col-9">
                <input type="text" id="modal-fullname" class="form-control" name="username" readonly style="color: black; background-color: #f5f5f5;">
              </div>
            </div>

            <div class="form-group row mb-3">

              <div class="col-9">
                <input type="hidden" id="modal-key" class="form-control" name="key">
              </div>
            </div>

            <div class="form-group row mb-3">
              <label for="" class="col-3 col-form-label">Contact:</label>
              <div class="col-9">
                <input type="text" id="modal-contact" class="form-control" name="contact" readonly style="color: black; background-color: #f5f5f5;">
              </div>
            </div>
            <div class="form-group row mb-3">
              <label for="" class="col-3 col-form-label">Total Fee:</label>
              <div class="col-9">
                <input type="text" id="modal-totalfees" class="form-control" name="totalfee" readonly style="color: black; background-color: #f5f5f5;">
              </div>
            </div>
            <div class="form-group row mb-3">
              <label for="" class="col-3 col-form-label">Balance:</label>
              <div class="col-9">
                <input type="hidden" name="balance1" id="model-totel">
                <input type="text" id="modal-balance" class="form-control" name="balance" readonly style="color: black; background-color: #f5f5f5;">
              </div>
            </div>

            <div class="form-group row mb-3">
              <label for="" class="col-3 col-form-label">Paid:</label>
              <div class="col-9">
                <input type="text" id="modal-paid" name="paid" class="form-control"required>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label for="" class="col-3 col-form-label">Date:</label>
              <div class="col-9">
                <input type="date" id="modal-date" name="date" class="form-control"required>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label for="" class="col-3 col-form-label">Remark:</label>
              <div class="col-9">
                <input type="text" id="modal-remark" name="remark" class="form-control"required>
              </div>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!------------------------------------------------------------------------>

  </div>
  <script>
    var modal = document.getElementById('myModal');
    modal.addEventListener('show.bs.modal', function(event) {
      var button = event.relatedTarget;
      var fullname = button.getAttribute('data-fullname');
      var contact = button.getAttribute('data-contact');
      var totalfees = button.getAttribute('data-totalfees');
      var balance = button.getAttribute('data-balance');
      var primekey = button.getAttribute('data-primekey');

      document.getElementById('modal-fullname').value = fullname;
      document.getElementById('modal-contact').value = contact;
      document.getElementById('modal-totalfees').value = totalfees;
      document.getElementById('modal-balance').value = balance;
      document.getElementById('modal-key').value = primekey;
      document.getElementById('modal-paid').addEventListener('input', function() {
        var paidAmount = document.getElementById('modal-paid').value || 0;
        var currentBalance = balance;
        var newBalance = currentBalance - paidAmount;
        document.getElementById('model-totel').value = newBalance;
        document.getElementById('modal-balance').value = newBalance;
      })
    });

    
  </script>

  <?php include "script.php" ;
  $_SESSION['balance'] = $totlbalance?>
</body>

</html>