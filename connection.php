<?php  

class database {
    public $con;

    public function __construct($server, $username, $password, $databasename) {

        $this->con = new mysqli($server, $username, $password, $databasename);

        if ($this->con->connect_error) {
          echo "cnnecterror";
        } 

        return $this->con;
    }
}

$conneection = new database("localhost", "root", "", "student_managment");

?>


<?php  
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx SELECT xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx//

class selectform 
{
    public $con;

    public function selecttabel($con, $selecttable, $searchTerm = null, $fullname = null) {
        $this->con = $con;
        $selectsql = "SELECT * FROM $selecttable";
        
        if ($searchTerm) {
            $selectsql .= " WHERE $fullname LIKE '%$searchTerm%' OR $fullname = '$searchTerm' ";
        }
       
        $selectresult = $this->con->query($selectsql); 
        return $selectresult;
    } 
}

$selectquery = new selectform();


//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx insert xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx//
class Insert {
    public $con;

    function __construct($con, $tabel, $col1, $col2 = null, $col3 = null, $col4 = null, $col5 = null, $col6 = null, $col7 = null, $col8 = null, $col9 = null, $col10 = null, $col11 = null, $col12 = null, $col13 = null, $data1, $data2, $data3 = null, $data4 = null, $data5 = null, $data6 = null, $data7 = null, $data8 = null, $data9 = null, $data10 = null, $data11 = null, $data12 = null, $defaultValue) {
        $this->con = $con;


        if ($col13 != null) {
            $insertsql = "INSERT INTO $tabel ($col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9, $col10, $col11, $col12, $col13)
            VALUES('$data1', '$data2', '$data3', '$data4', '$data5', '$data6', '$data7', '$data8', '$data9', '$data10', '$data11', '$data12', '$defaultValue')";
        }
        elseif($col4 == null){
            $insertsql = "INSERT INTO $tabel ($col1, $col2)
            VALUES('$data1','$data2')";
        }
        
        elseif($col10 == null){
            $insertsql = "INSERT INTO $tabel ($col1, $col2,$col3, $col4,$col5, $col6,$col7, $col8)
            VALUES('$data1','$data2','$data3','$data4','$data5','$data6','$data7','$data8')";
        }
       
        $insertresult = $this->con->query($insertsql);

       
    }
}


//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx update xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx//

class update 
{
    public $con;

    function updateform(
        $con, $tabel, $regno, $register_no, 
        $set1, $set2, $set3 = null, $set4 = null, $set5 = null, $set6 = null, 
        $set7 = null, $set8 = null, $set9 = null, $set10 = null, 
        $data1, $data2, $data3 = null, $data4 = null, $data5 = null, 
        $data6 = null, $data7 = null, $data8 = null, $data9 = null, $data10 = null)
    {
        $this->con = $con;

        if (isset($_POST['submit'])) {
            if ($set3 != null) {
              
                $insertsql = "UPDATE $tabel SET 
                    $set1 = '$data1', 
                    $set2 = '$data2'";

                if ($set3 != null) $insertsql .= ", $set3 = '$data3'";
                if ($set4 != null) $insertsql .= ", $set4 = '$data4'";
                if ($set5 != null) $insertsql .= ", $set5 = '$data5'";
                if ($set6 != null) $insertsql .= ", $set6 = '$data6'";
                if ($set7 != null) $insertsql .= ", $set7 = '$data7'";
                if ($set8 != null) $insertsql .= ", $set8 = '$data8'";
                if ($set9 != null) $insertsql .= ", $set9 = '$data9'";
                if ($set10 != null) $insertsql .= ", $set10 = '$data10'";

                $insertsql .= " WHERE $regno = '$register_no'";
            } else {
               
                $insertsql = "UPDATE $tabel SET 
                    $set1 = '$data1', 
                    $set2 = '$data2' 
                    WHERE $regno = '$register_no'";
            }

           
            $updateresult = $this->con->query($insertsql);
        }
    }
}

$updatequery = new update();


//xxxxxxxxxxxxxxxxxxxxxxxxxxxx delete  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx//

class delete {
    public $con ;

    function __construct($con) {
        $this->con = $con;
    }

    function delete($deltabel,$primekey,$givenvalue)
    {
        $deletsql = "DELETE FROM $deltabel WHERE $primekey = '$givenvalue' ";
        $deletresult = $this->con->query($deletsql);
    }
}

$deletquery = new delete($conneection->con);

//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  join query xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx//

class jionselect {
    public function joinselect($con, $table1, $table2, $joinColumn1, $joinColumn2, $filters = [],$onlyActive) {
        $whereClause = [];

        if (!empty($filters['name'])) {
            $whereClause[] = "students_managment.fullname LIKE '%" . $con->real_escape_string($filters['name']) . "%'";
        }


        if (!empty($filters['doj'])) {
            $whereClause[] = "students_managment.joindate = '" . $con->real_escape_string($filters['doj']) . "'";
        }

       
        if (!empty($filters['grade'])) {
            $whereClause[] = "grade.grade = '" . $con->real_escape_string($filters['grade']) . "'";
        }

        if ($onlyActive) {
            $whereClause[] = "students_managment.status = 'active'";
        }


        $whereSQL = '';
        if (count($whereClause) > 0) {
            $whereSQL = "WHERE " . implode(" AND ", $whereClause);
        }

        
        $sql = "SELECT students_managment.*, grade.grade 
                FROM $table1
                JOIN $table2 ON $table1.$joinColumn1 = $table2.$joinColumn2
                $whereSQL";

        return $con->query($sql);
    }
}


?>
