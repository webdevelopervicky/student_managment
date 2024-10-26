<?php     
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
<?php
// Capture the search filters from POST request
$name = isset($_POST['name']) ? $_POST['name'] : '';
$doj = isset($_POST['doj']) ? $_POST['doj'] : '';
$grade = isset($_POST['grade']) ? $_POST['grade'] : '';

// Start building the SQL query
$sql = "SELECT * FROM students_managment JOIN grade ON students_managment.Grade = grade.primekey WHERE 1=1";

// Modify the query based on search filters
if (!empty($name)) {
    $sql .= " AND fullname LIKE '%$name%'";
}

if (!empty($doj)) {
    $sql .= " AND joindate = '$doj'";
}

if (!empty($grade)) {
    $sql .= " AND grade = '$grade'";
}

// Execute the query
$joinqueryfetch = $conneection->con->query($sql);

if ($joinqueryfetch->num_rows > 0) {
    while ($joinrow = $joinqueryfetch->fetch_assoc()) {
        // Handle the output as shown in your original script
        // Example:
        echo "<tr>";
        echo "<td>" . $joinrow['fullname'] . "<br>" . $joinrow['Contact'] . "</td>";
        echo "<td>" . $joinrow['TotalFees'] . "</td>";
        echo "<td>" . $joinrow['Balance'] . "</td>";
        echo "<td>" . $joinrow['grade'] . "</td>";
        echo "<td>" . $joinrow['joindate'] . "</td>";
        echo "<td><a href='repordshow.php?registerno={$joinrow['register_no']}'>Fee report</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No records found</td></tr>";
}
?>



<form action="fees.php" method="POST"> <!-- Changed to POST -->
  <fieldset>
    <legend style="font-size: 20px;">Search :</legend>
    <div class="row">
      <div class="form-group col-3 ps-5">
        <label for="name">Name</label>
        <input type="text" name="name" class="ps-1 py-1 rounded" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" style="width:170px">
      </div>

      <div class="form-group col-4 ps-5">
        <label for="doj">Date of Joining</label>
        <input type="date" name="doj" class="px-4 py-1 rounded" value="<?php echo isset($_POST['doj']) ? $_POST['doj'] : ''; ?>">
      </div>

      <div class="form-group col-3">
        <label for="grade">Grade</label>
        <select name="grade" id="grade" class="pe-4 py-1 rounded ms-2" style="border-radius:20x">
          <option value="">Select Grade</option>
          <option value="Grade1" <?php echo (isset($_POST['grade']) && $_POST['grade'] == 'Grade1') ? 'selected' : ''; ?>>Grade 1</option>
          <option value="Grade2" <?php echo (isset($_POST['grade']) && $_POST['grade'] == 'Grade2') ? 'selected' : ''; ?>>Grade 2</option>
          <!-- Add more grades as needed -->
        </select>
      </div>

      <div class="form-group col-2">
        <div class="pagination">
          <button type="submit" class="btn btnprev px-0 text-white bg-success" style="width:50px;font-size:12px">Filter</button>
          <a href="fees.php" class="btn btnprev px-0 ms-2 text-white bg-danger" style="width:50px;font-size:12px">Reset</a>
        </div>
      </div>
    </div>
  </fieldset>
</form>


</body>
</html>