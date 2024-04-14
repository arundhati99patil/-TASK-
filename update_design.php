<?php
include("connection.php");

$id =  $_GET['id'];

$query = "SELECT * FROM form WHERE ID='$id'";
$data = mysqli_query($conn, $query);

$result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD operations</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="file.js"></script>
    <script type="text/javascript" src="add.js"></script>
</head>
<body>
<div class="container">
    <form action="#" method="POST" enctype="multipart/form-data" onsubmit="return validateForm(); validateAnswer();">
        <div class="title">UPDATE DETAILS</div>

        <div class="form">
            <div class="input_field">
                <label>First Name</label>
                <input type="text" value="<?php echo $result['firstname']; ?>" id="fname" class="input" name="fname" onkeyup="validateFirstName()" required>
                <div id="fnameError" class="error"></div>
            </div>

            <div class="input_field">
                <label>Last Name</label>
                <input type="text" value="<?php echo $result['lastname']; ?>" class="input" name="lname" id="lname" onkeyup="validateLastName()" required>
                <div id="lnameError" class="error"></div>
            </div>

            <div class="input_field">
                <label>Address</label>
                <textarea class="textarea" onkeyup="validateAddress()" name="address" id="address" required><?php echo $result['address']; ?></textarea>
                <div id="addressError" class="error"></div>
            </div>

            <div class="input_field">
                <label>Phone Number</label>
                <input type="tel" class="input" id="phone" onkeyup="validatePhoneNumber()" value="<?php echo $result['phone']; ?>" name="phone" pattern="[0-9]{10}" placeholder="Enter 10 digit mobile number" required>
                <div id="phoneError" class="error"></div>
            </div>

            <div class="input_field">
                <label>Date of Birth</label>
                <input type="date" class="input" id="dob" name="dob" required value="<?php echo $result['DOB']; ?>" onchange="calculateAge(); validateDateOfBirth()" required>
                <div id="dobError" class="error"></div>
            </div>

            <div class="input_field">
                <label>Age</label>
                <input type="text" value="<?php echo $result['Age']; ?>" class="input" id="age" name="age" readonly>
            </div>

            <div class="input_field">
                <label>Image (PNG/JPEG, max size 2MB):</label>
                <input type="file" id="photo" name="uploadfile" style="width : 100%;" accept=".png, .jpeg" onchange="validatePhoto()">
                <div id="photoError" class="error"></div>
            </div>

            <div class="input_field">
                <label for="addition">What is <span id="num1"></span> + <span id="num2"></span>?</label>
                <input type="number" id="additionAnswer" name="additionAnswer" class="input" required>
            </div>

            <div class="input_field">
                <input type="submit" value="Update Details" class="btn" name="update">
            </div>
        </div>
    </form>
</div>
</body>
</html>

<?php
if(isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $DOB = $_POST['dob'];
    $Age = $_POST['age'];

    // Check if a new image is uploaded
    if(isset($_FILES["uploadfile"]) && $_FILES["uploadfile"]["size"] > 0) {
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "images/" . $filename;
        move_uploaded_file($tempname, $folder);
    } else {
        // No new image uploaded, keep the previous one
        $folder = $result['Image'];
    }

    $query = "UPDATE form SET firstname='$fname', lastname='$lname', address='$address', phone='$phone', DOB='$DOB', Age='$Age', Image='$folder' WHERE ID='$id'";
    $data = mysqli_query($conn, $query);

    if($data) {
        echo "<script>alert('Record Updated')</script>";
        echo "<meta http-equiv = 'refresh' content = '0; url = http://localhost/crud/display.php' />";
    } else {
        echo "Failed to update";
    }
}
?>
