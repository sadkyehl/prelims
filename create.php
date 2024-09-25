<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create an Account</title>
</head>
<body>
	<?php
	include "connect.php";
	include "style.php";
	session_start();
	echo "<form action='#' method='post'>";
	
	//echo "<div class='mais'>";
	echo "<div class='conbox'>";
	echo "<h2>Registration</h2>";
	//echo "<input type='text' name='lname' minlength='3' placeholder='Enter Last Name'>";
	echo "<input type='text' name='uname' minlength='3' placeholder='Enter Username'>";
	echo "<br><br><input type='text' name='snum' minlength='9' maxlength='9' placeholder='Enter Student #'>";
	echo "<br><br><input type='password' name='upass' minlength='3' placeholder='Enter Password'>";	
	echo "<div class='conbutton'>";
	echo "<br><input type='submit' name='create' value='Create'>";
	echo "</div>";
	/*echo "</div>";
	echo "<div class='mais'>";
	echo "</div>";*/
	


if (isset($_SESSION['pumasok'])){
	echo "<script>window.location.href='loggedin.php'</script>";
}	

if(isset($_POST['create'])) {
	if (!empty($_POST['uname'])
		&& !empty($_POST['snum'])
		&& !empty($_POST['upass'])) {

	/*$_SESSION['uname'] = $_POST['uname'];
	$_SESSION['snum'] = $_POST['snum'];
	$_SESSION['upass'] = $_POST['upass'];

	$rdmcode = random_int(555555, 777777);
	$_SESSION['recode'] = $rdmcode;
	include "smtpreg.php";*/

		//$fullname = $_POST['lname'].', '.$_POST['fname'];
            $kweri = mysqli_query($conn,
                "INSERT INTO users (username,snum,userpass,type)
                VALUES ('".$_POST['uname']."',
                	'" . $_POST['snum'] . "',
                	'" . md5($_POST['upass']) . "',
                	'User')");

            echo "<script>alert('Account created. Log in after a few seconds.')</script>";
            echo "<script>window.location.href='index.php'</script>";
        
    }else{
            echo "<script>alert('Please fill out the empty fields.')</script>";
        }}
	
	echo "</form>";
	echo "</div>";
	?>

</body>
</html>