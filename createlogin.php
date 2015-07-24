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
	<div id="header">
		<h1 id="logo"><a href="http://hopper.wlu.ca/~ramr0560/final/">Laurier</a></h1>	
		<!-- Navigation -->
		<div id="navigation">
			<ul>
			</ul>
		</div>
		<!-- End Navigation -->
	</div>
	<!-- End Header -->
	<!-- Main -->
	<div id="main">
		<div class="cl">&nbsp;</div>
		<!-- Content -->
		<div id="content">
<?php
	$username = $_POST['username'];
	$password = sha1($_POST['password']); 
	$vpassword = sha1($_POST['vpassword']); 
	$email = $_POST['email'];
	$valid = 0;
	if($_POST['password'] ==  '' ){
	     	echo 'Please enter a password<br/>';
		$valid = 1;
	}
	if($password !=  $vpassword ){
	     	echo 'passwords dont match<br/>';
		$valid = 1;
	}
	if($email ==  '' ){
	     	echo 'Please enter valid e-mail address<br/>';
		$valid = 1;
	}
	if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
	    	echo "Valid email address detected<br/>";
	} else {
		echo "Email address is not valid<br/>";
		$valid = 1;
	}
	if ($username == '') {
		echo 'You did not enter a username<br/>';
		$valid = 1;
	} else {
		$conn=mysql_connect("localhost","ramr0560","xxxxx") or die(mysql_error());
		mysql_select_db("ramr0560");
		$query = "select count(*) from Users where username = '$username'";
		$result = mysql_query($query, $conn);
		if(!$result) {
	      		echo 'Cannot run query.';
	      		exit;
	    	}
	    	$row = mysql_fetch_row($result);
	    	$count = $row[0];
	    	if ( $count > 0 ) {
	      		// visitor's name and password combination are correct
	      		echo 'Error, username has been taken<br/>';
	      		$valid = 1;
	    	}
	}
	if ($valid == 0){
		// create user
		$query = "insert into Users (username, password, email) values ('$username','$password','$email') ";
		$result = mysql_query($query, $conn);
		echo ''.$username.' has been created! Please log in on the main page.<br/>';
		echo '<br/><form action="http://hopper.wlu.ca/~ramr0560/final/" method="post">';
		echo '<input type="submit" class="search-submit" name="Add Book" value="Log in" />';
		echo '</form>';
	} else {
		echo '<br/><form action="http://hopper.wlu.ca/~ramr0560/final/" method="post">';
		echo '<input type="submit" class="search-submit" name="Add Book" value="Try Again" />';
		echo '</form>';
	}
	mysql_close($conn);
?>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>	
			
		</div>
		<!-- End Content -->
		
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
