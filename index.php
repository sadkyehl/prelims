<?php
$url = isset($_GET['url']) ? $_GET['url'] : 'index';

switch ($url) {
	case 'Home':
		include 'homepage.php';
		break;
	case 'Login':
		include 'loginpage.php';
		break;
	default:
		echo "<script>window.location.href='Login'</script>";
		break;
}
?>	