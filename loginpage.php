<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
	<?php
	include "connect.php";
	include "style.php";
	session_start();
	$error = "";
	if (!isset($_SESSION['errorctr'])) {
		$_SESSION['errorctr'] = 0;
	}
	echo "<form action='#' method='post'>";

	
	echo "<div class='conbox'>";
	//echo '<img src="retrowbg.jpg" width="50" height="48">';
	echo "<h2>Minimally Retro</h2>";
	echo "<p>USERNAME </p>";
	echo "<input type='text' name='uname' minlength='3' placeholder=''>";
	echo "<p>PASSWORD  </p>";
	//<span>*</span>
	echo "<input type='password' name='upass' minlength='3' placeholder=''>";


	echo "<div class='conbutton'>";
	if ($_SESSION['errorctr'] >= 3) {
	echo "<br><input type='submit' name='usubmit' value='Log in' disabled>";
	echo "<p><span>Too many failed attempts! Please try again later.</span></p>";
session_destroy();
}else{
	
	echo "<br><input type='submit' name='usubmit' value='Log in'>";
	echo "</div>";
	echo "<div class='create'>";
	echo "<br><input type='submit' name='create' value='Create an Account'>";
	echo "</div>";

}

if (isset($_POST['usubmit'])) {
    if (!empty($_POST['uname']) && !empty($_POST['upass'])) {

    	//$encrypt = md5($_POST['upass']);

        $_POST['uname'] = htmlspecialchars($_POST['uname']);
        //$_POST['upass'] = htmlspecialchars($_POST['upass']);
        $_POST['upass'] = md5($_POST['upass']);


        $kweri = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$_POST['uname']."' AND userpass ='".$_POST['upass']."'");
        $nume = mysqli_num_rows($kweri);
        if ($nume > 0) {
            $en = mysqli_fetch_array($kweri);
                $_SESSION['pumasok'] = $en['username'];
                echo "<script>alert('Welcome, {$_POST['uname']}. Redirecting to Homepage....')</script>";
                echo "<script>window.location.href='homepage.php'</script>";
            } else {
            $error = "Username and/or Password is incorrect";
            echo "<p><span>$encrypt</span></p>";
            $_SESSION['errorctr']++;
        }
    } else {
        $error = "Please fill out the empty fields.";
    }}
    if ($error !="") {
    	echo "<p><span>$error</span></p>";
    }

if (isset($_POST['create'])) {
	echo "<script>window.location.href='create.php'</script>";
	}

	echo "</div>";
	echo "</form>";
	echo "</div>";
	?>

</body>
</html>