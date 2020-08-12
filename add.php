<?php

if (isset($_POST['submit']) && $_POST['submit'] != '') {
    // require the db connection
    require_once 'includes/db.php';

    $Name = (!empty($_POST['Name'])) ? $_POST['Name'] : '';
    $Email = (!empty($_POST['Email'])) ? $_POST['Email'] : '';
    $MobileNo = (!empty($_POST['Mobile No.'])) ? $_POST['Mobile No.'] : '';
    $DateofBirth = (!empty($_POST['Date of Birth'])) ? $_POST['Date of Birth'] : '';
    $Pincode = (!empty($_POST['Pincode'])) ? $_POST['Pincode'] : '';
    $id = (!empty($_POST['student_id'])) ? $_POST['student_id'] : '';

    if (!empty($id)) {
        // update the record
        $stu_query = "UPDATE `students` SET Name='" . $Name . "',Email='" . $Email . "',Mobile No.= '" . $MobileNo . "', Dateof Birth='" . $DateofBirth . "'. Pincode='" . $Pincode . "' WHERE id ='" . $id . "'";
        $msg = "update";
    } else {
        // insert the new record
        $stu_query = "INSERT INTO `students` (Name,Email,Mobile No.,DateOfBirth, Pincode) VALUES ('" . $Name . "', '" . $Email . "', '" . $MobileNo . "', '" . $DateofBirth . "', '" . $Pincode . "' )";
        $msg = "add";
    }

    $result = mysqli_query($conn, $stu_query);

    if ($result) {
        header('location:/crud/index.php?msg=' . $msg);
    }

}

if (isset($_GET['id']) && $_GET['id'] != '') {
    // require the db connection
    require_once 'includes/db.php';

    $stu_id = $_GET['id'];
    $stu_query = "SELECT * FROM `students` WHERE id='" . $stu_id . "'";
    $stu_res = mysqli_query($conn, $stu_query);
    $results = mysqli_fetch_row($stu_res);
    $Name = $results[1];
    $Email = $results[2];
    $MobileNo = $results[3];
    $DateofBirth = $results[4];
    $Pincode = $results[5];

} else {
    $Name = "";
    $Email = "";
    $MobileNo = "";
    $DateofBirth = "";
    $Pincode = "";
    $stu_id = "";
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php';?>
<body>
   <?php include 'partial/nav.php';?>

    <div class="container">
        <div class="formdiv">
        <div class="info"></div>
        <form method="POST" action="">
            <div class="form-group row">
                <label for="Name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-7">
                <input type="text" name="Name" class="form-control" id="Name" placeholder="Name" value="<?php echo $Name; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-7">
                <input type="text" name="Email" class="form-control" id="Email" placeholder="Email" value="<?php echo $Email; ?>">
                </div>
            </div>
            <div class="form-group row">
            <label for="Mobile No." class="col-sm-3 col-form-label">Mobile No.</label>
            <div class="col-sm-7">
                <select class="form-control" name="Mobile No." id="Mobile No.">
                  <input type="Mobile" name="Mobile No." required>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="DateOfBirth" class="col-sm-3 col-form-label">Date of Birth</label>
                <div class="col-sm-7">
                <input type="date" value="<?php echo $DateofBirth; ?>" name="DateOfBirth" class="form-control" id="DateOfBirth" placeholder="DateOfBirth">
                </div>
            </div>
            <div class="form-group row">
            <label for="Pincode" class="col-sm-3 col-form-label">Pincode</label>
            <div class="col-sm-7">
                <select class="form-control" name="Pincode" id="Pincode">
                <input type="number" name="pincode" required>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-7">
                <input type="hidden" name="student_id" value="<?php echo $stu_id; ?>">
                <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
