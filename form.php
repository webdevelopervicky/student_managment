<?php

include "connection.php";
  if (isset($_POST['submit'])) {

    $user_name = $_POST['username'];
    $user_key = $_POST['key'];
    $user_contact = $_POST['contact'];
    $user_totalfee = $_POST['totalfee'];
    $user_balance = $_POST['balance1'];
    $user_paid = $_POST['paid'];
    $user_date = $_POST['date'];
    $user_remark = $_POST['remark'];

    $insertform = new Insert(
      $conneection->con,
      'fees',
      'student_key',
      'student_name',
      'contect',
      'totalfees',
      'balance',
      'paid',
      'paid_date',
      'remark',
      null,
      null,
      null,
      null,
      null,
      $user_key,
      $user_name,
      $user_contact,
      $user_totalfee,
      $user_balance,
      $user_paid,
      $user_date,
      $user_remark,
      null,
      null,
      null,
      null,
      null
    );
  }
header("Location:fees.php")



  ?>