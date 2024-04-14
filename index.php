<?php include("connection.php"); ?>

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
       	<form action="#" method="POST" enctype="multipart/form-data"onsubmit= "return validateForm();validateAnswer();">
       	<div class="title">Registration Form</div>
       

       <div class="form">
       	  <div class="input_field">
       	  	<label>First Name</label>
       	  	<input type="text" class="input" id="fname" name="fname"onkeyup="validateFirstName()" required>
             <div id="fnameError" class="error"></div>
       	  </div>

       	   <div class="input_field">
       	  	<label>Last Name</label>
       	  	<input type="text" class="input" id="lname" name="lname" onkeyup="validateLastName()" required>
            <div id="lnameError" class="error"></div>
       	  </div>

       	   <div class="input_field">
       	  	<label>Address</label>
       	  	<textarea class="textarea" name="address" id="address"onkeyup="validateAddress()" required></textarea>
            <div id="addressError" class="error"></div>
       	  </div>


       	   <div class="input_field">
       	  	<label>Phone Number</label>
       	  	<input type="tel" class="input"id="phone" name="phone" pattern="[0-9]{10}" placeholder="Enter 10 digit mobile number" onkeyup="validatePhoneNumber()" required>
             <div id="phoneError" class="error"></div>
       	  </div>

       	    <div class="input_field">
       	  	<label>Date of Birth</label>
       	  	<input type="date" class="input" id="dob" name="dob" required onchange="calculateAge();validateDateOfBirth()">
            <div id="dobError" class="error"></div>
       	  </div> 
            

           <div class="input_field">
            <label>Age</label>
            <input type="text" class="input" id="age" name="age" readonly>
          </div> 




         

       	   <div class="input_field" >
       	  	<label>Image (PNG/JPEG, max size 2MB):</label>
       	  	<input type="file" id="photo" name="uploadfile" style="width : 100%;" accept=".png, .jpeg" onchange="validatePhoto()"  required>
             <div id="photoError" class="error"></div>
       	  </div>

          


          <div class="input_field">
     <label for="addition">What is <span id="num1"></span> + <span id="num2"></span>?</label>
                   
              
                
     <input type="number" id="additionAnswer" name="additionAnswer" class="input" required>
               

            </div>
           
             
         

       	  <div class="input_field">
       	  	<input type="submit" value="Register"class="btn" name="register">
       	  </div>

       	  </div>



           </form>


       </div>
</body>
</html>


<?php

    if($_POST['register'])
    {
       
$filename =  $_FILES["uploadfile"]["name"];
$tempname =  $_FILES["uploadfile"]["tmp_name"];
$folder = "images/".$filename;

move_uploaded_file($tempname, $folder);





    	$fname   = $_POST['fname'];
    	$lname   = $_POST['lname'];
    	$address = $_POST['address'];
    	$phone   = $_POST['phone'];
        $dob     = $_POST['dob'];
        $age     = $_POST['age'];

    	// $photo   = $_POST['photo'];
    	// $answer  = $_POST['answer'];


            // if($fname != "" && $lname != "" && $address != "" && $phone != "" && $dob!= "" && $photo != "" && $answer != "")
            // {

            $dob = date('Y-m-d', strtotime($dob));



    	     $query = "INSERT INTO FORM (Image,firstname,lastname,address,phone,DOB,Age)VALUES('$folder','$fname' ,'$lname','$address','$phone','$dob','$age')";
    	       $data  = mysqli_query($conn,$query);

    	       if($data)
    	       {
    		      echo"<script> alert('data inserted into database') </script>";
                  ?>
                  <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/display.php" />

                  <?php
    	       }
    	       else
    	       {
    		      
                  echo"<script> alert('failed') </script>";
    	       }

    	   // }
            // else
    	    //    {
            //         echo "<script>alert('fill the form first');</script>";
    	    //    }

    }
?>