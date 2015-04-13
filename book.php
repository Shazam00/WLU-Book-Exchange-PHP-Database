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

$conn=mysql_connect("localhost","ramr0560","angr32cunt") or die(mysql_error());
mysql_select_db("ramr0560");

$toAdd = $_POST['select'];

if (empty($toAdd)) {
	echo("You didn't select any books!");
} else {

switch ($_POST['bsubmit']) {

case 'Add to List':
	//get User ID
	$query = "select UserID from Users where username = '$username'";
	$result = mysql_query($query, $conn);
	$data = mysql_fetch_array($result);
	$uid = $data['UserID'];
	$uemail = $data['email'];
	$D = count($toAdd);
	echo("You selected $D book(s): <br/>");
	for($i=0; $i < $D; $i++)
    	{
		$query = "insert into UserBook (UserID, BookID) values ('$uid','$toAdd[$i]') ";
		$result = mysql_query($query, $conn);
      		echo 'Add bookID: '.$toAdd[$i].' To UserID: '.$uid.' !!';
    	}
	echo ' added book(s) to list';
	header ("Location: http://hopper.wlu.ca/~ramr0560/final/userhome.php");
	break;

case 'Request to buy':

	echo 'Requested to buy selected book(s)';

	//get User ID
	$query = "select UserID from Users where username = '$username'";
	$result = mysql_query($query, $conn);
	$data = mysql_fetch_array($result);
	$uid = $data['UserID'];

	$query = "select email from Users where username = '$username'";
	$result = mysql_query($query, $conn);
	$data = mysql_fetch_array($result);
	$uemail = $data['email'];

	// send a request to buy books by bookId to first UserID
	$D = count($toAdd);
	echo("You selected $D book(s): <br/>");
	for($i=0; $i < $D; $i++)
    	{
		$query = "select * from Books where (BookID = '$toAdd[$i]')";
		$result = mysql_query($query, $conn);
		$data = mysql_fetch_array($result);
		$bid = $toAdd[$i];
		$booktitle = $data['bookTitle'];
		$author = $data['author'];
		$course = $data['course'];
		$price = $data['price'];

		$query = "select u.UserID, u.username, u.email from Users u join UserBook ub on (u.UserID = ub.UserID) where (ub.BookID = '$toAdd[$i]')";
		$result = mysql_query($query, $conn);
		$data = mysql_fetch_array($result);
		$rid = $data['username'];
		$sid = $data['UserID'];	
		$email = $data['email'];
		
		if ($uid == $sid){
			echo 'You already own ';
			echo $booktitle;
			echo '</br>';
			continue;
		}		

		echo 'Requested owner of your interest:<br/>';
		echo '<hr/>';
		echo 'To: '.$email.'<br/>';
		echo 'Subject: Laurier Book Exchange Request</br>';
		echo 'Body: '.$username.' would like to buy '.$booktitle.' from you.<br/> ';
		echo 'Let him/her know if you are willing to make an exchange at</br>';
		echo $uemail;
		
		$message = ''.$username.' would like to buy '.$booktitle.' from you.  Let him/her know if you are willing to make an exchange at '.$uemail.' ';
		$subject =  "Laurier Book Exchange Request";
		mail($email, $subject, $message);

		$query = "insert into Requests (SellerID, BuyerID, BookID) values  ('$sid','$uid', '$bid')";
		$result = mysql_query($query, $conn);
    	}

	break;
}
mysql_close($conn);
}

?>
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