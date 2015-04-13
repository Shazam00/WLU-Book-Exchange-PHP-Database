<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Laurier Book Exchange</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
	<!-- JS -->
	<script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>	
	<script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>	
	<script src="js/jquery-func.js" type="text/javascript"></script>	
	<!-- End JS -->
</head>
<body>
<!-- Shell -->	
<div class="shell">
	<!-- Header -->	
	<?php
		include("header.php");
	?>
	<!-- End Header -->
	<!-- Main -->
	<div id="main">
		<div class="cl">&nbsp;</div>
		<!-- Content -->
		<div id="content">
<?php
	session_start();
	if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
		header ("Location: http://hopper.wlu.ca/~ramr0560/final");
	}
	$username = $_SESSION['login'];
	$conn=mysql_connect("localhost","ramr0560","angr32cunt") or die(mysql_error());
	mysql_select_db("ramr0560");
	echo 'Username: ',$username;
	echo '<br/>';
	echo 'Inbox (0 new messages)';
	echo '<br/>';
	echo 'Friends';
	echo '<br/>';
	echo '<a href= logout.php>Log out</a>';
	echo '<br/>';
	echo '<hr/>';
	$toDelete = $_POST['select'];
	if (empty($toDelete)) {
		echo("You didn't select any books!");
	} else {
		//get User ID
		$query = "select UserID from Users where username = '$username'";
		$result = mysql_query($query, $conn);
		$data = mysql_fetch_array($result);
		$uid = $data['UserID'];
		$D = count($toDelete);
		echo("You selected $D book(s): <br/>");
		for($i=0; $i < $D; $i++) {
			$query = "delete from UserBook where UserID ='$uid' and BookID ='$toDelete[$i]' ";
			$result = mysql_query($query, $conn);
	      		echo 'Deleted bookID: '.$toDelete[$i].' from UserID: '.$uid.' !!';
    		}
	}
	header ("Location: http://hopper.wlu.ca/~ramr0560/final/userhome.php");
	mysql_close($conn);
?>
<hr/>
<a href= userhome.php>Back to User Main Page</a>
</div>
<!-- End Content -->
<!-- Sidebar -->
<?php
	include("sidebar.php");
?>
<!-- End Sidebar -->	
<div class="cl">&nbsp;</div>
</div>
<!-- End Main -->
<!-- Side Full -->
	<div class="side-full">
	<!-- Text Cols -->
<?php
	include("footer.php");
?>
	<!-- End Text Cols -->
	</div>
	<!-- End Side Full -->
</div>	
<!-- End Shell -->
</body>
</html>