<?php require 'Db.php' ?>

<?php
if(isset($_POST['submitbtn'])) 
{
	session_start();
	error_reporting(0);
	if (!$conn) 
	{
		echo "<script>alert(\"Database error retry after some time !\")</script>";
	}
	$var_client_name = mysqli_real_escape_string($conn, $_POST['client_name']);
	$var_client_emailid = mysqli_real_escape_string($conn, $_POST['client_emailid']);
	$var_client_subject = mysqli_real_escape_string($conn, $_POST['client_subject']);
    $var_client_message = mysqli_real_escape_string($conn, $_POST['client_message']);

	$insertquery = "INSERT INTO contacts(CLIENT_NAME, CLIENT_EMAILID, CLIENT_SUBJECT, CLIENT_MESSAGE) 
    VALUES('$var_client_name', '$var_client_emailid', '$var_client_subject', '$var_client_message')";
		if(mysqli_query($conn, $insertquery)) 
		{
			echo "<script>
                	alert('The message has been Succesfully Delevered...');
                	window.location.replace(\"../index.html\");
				 </script>";
            session_destroy();	
		}
		else
		{
			echo "<script>
            		alert('Data enter by you alreay exist in Database');
            		window.location.replace(\"../index.html\");
				 </script>";
            session_destroy();
        }
}
else
{
	echo 'ERROR: '. mysqli_error($conn);
	header("location: ../index.html");
}
?>