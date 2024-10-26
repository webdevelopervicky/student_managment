<?php

include "connection.php";



class changeinnactive{
  public $con;

  function inactive($con,$tabel,$where,$contiction,$colum,$data){
    $this->con = $con;
    $insertsql = "UPDATE $tabel SET 
    $colum = '$data'
   
    WHERE $where = '$contiction'";

     $updateresult = $this->con->query($insertsql);
  }
}
$inactive = new changeinnactive();

if (isset($_GET['registerkey'])) {
  $register_no = $_GET['registerkey'];

$inactive->inactive($conneection->con,'students_managment', 'register_no', $register_no,'status','inactive');
//$updatequery->updateform($conneection->con, 'students_managment', 'register_no', $primeid, 'grade', 'details', null, null, null, null, null, null, null, null, $updategrate, $updatdetails,);
header("Location:student_managment.php");
exit();
}
//================================================================================//

elseif (isset($_GET['primekey'])) {
  $primekeygrade = $_GET['primekey'];
  $deletquery->delete('grade', 'primekey', $primekeygrade);
  header("Location:grade.php");
  exit();
}
//================================active======================================================//

elseif (isset($_GET['register_active'])) {
  $register_active = $_GET['register_active'];
  
  $inactive->inactive($conneection->con,'students_managment', 'register_no', $register_active,'status','active');
  header("Location:inactive.php");
  exit();
}



//===================================deletkey===================================================//

elseif (isset($_GET['deletkey'])) {
  $register_active = $_GET['deletkey'];
  $inactive->inactive($conneection->con,'students_managment', 'register_no', $register_active,'status','delet');
  header("Location:inactive.php");
  exit();
}



//===================================================================================


// if (isset($_GET['registerkey'])) {
 
// } elseif (isset($_GET['primekey'])) {
 
// }
// elseif(isset($_GET['register_active'])){
 
// }
// elseif(isset($_GET['deletkey'])){
  
// }

