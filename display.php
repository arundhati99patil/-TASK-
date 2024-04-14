<html>
<head>
	<title>Display Data</title>
	<style>
		body
		{
			background : #D071f9;
		}
		table
		{
			background-color : white;
		}
		.update ,.delete
		{
			background-color: green;
			color:white;
			border:0;
			outline:none;
			border-radius: 5px;
			height:23px;
			width:80px;
			font-weight: bold;
			cursor:pointer;
		}
		.delete
		{
			background-color: red;
			
		}
	</style>
</head>



<?php
include("connection.php");
error_reporting(0);

$query = "SELECT * from form";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);



 
 //echo $total;




if($total != 0)
{
	?>
        <h2 align='center'><mark>DISPLAYING ALL RECORDS</mark></h2>
      <center>  <table border="1" cellspacing="1" width="85%">
        	<tr>
        	<th width="5%">ID</th>	
        	<th width="5%">Image</th>	
        	<th width="10%">First Name</th>
        	<th width="10%">Last Name</th>
        	<th width="20%">Address</th>
        	<th width="10%">Phone Number</th>
        	<th width="5%">DOB</th>
        	<th width="5%">Age</th>
        	<th width="15%">Operations</th>
            </tr>







	<?php
	while($result= mysqli_fetch_assoc($data))
	{
       echo"<tr>
               <td>".$result['ID']."</td>

               <td><img src= '".$result['Image']."' height='100px' width='100px'></td>

        	   <td>".$result['firstname']."</td>
        	   <td>".$result['lastname']."</td>
        	   <td>".$result['address']."</td>
        	   <td>".$result['phone']."</td>
        	   <td>".$result['DOB']."</td>
        	   <td>".$result['Age']."</td>

        	   <td><a href='update_design.php?id=$result[ID]'><input type='submit' value='Update' class='update'</a>

        	    <a href='delete.php?id=$result[ID]'><input type='submit' value='Delete' class='delete' onclick = 'return checkdelete()'</a></td>



            </tr> 
           ";    
	}
}
else
{
	echo "No records found";
}
?>

</table>

</center>


<script> 
	function checkdelete()
    {
      return confirm('Are you sure you want to delete this data?');
    }
	
</script>