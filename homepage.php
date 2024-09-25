<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Homepage</title>
</head>
<body>
	<?php
	include "connect.php";
	include "style.php";
	session_start();
	echo "<form action='#' method='post'>";
	echo "<div class='conbox'>";
	echo "<h2>HOMEPAGE!!!!!!</h2>";
	echo "</div>";
	if (!isset($_SESSION['pumasok'])) {
	echo "<script>alert('Please Login first.')</script>";
	echo "<script>window.location.href='login'</script>";
}
 if (isset($_POST['logout'])) {
	unset($_SESSION['pumasok']);
	echo "<script>alert('Successfully logged out.')</script>";
	echo "<script>window.location.href='login'</script>";
	session_destroy();
	} 

	echo "<div class='conbutton'>";
	echo "<input type='submit' name='logout' value ='Logout'>";
	echo "</div>";
echo "</form>";
	?>


</body>
</html>