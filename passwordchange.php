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

$oldpassword = sha1($_POST['cpassword']); 
$newpassword = sha1($_POST['npassword']); 
$vnewpassword = sha1($_POST['vnpassword']); 


$valid = 0;

if($_POST['cpassword'] ==  '' ){
     	echo 'Please enter your current password.<br/>';
	$valid = 1;
}


if($_POST['npassword'] !=  $_POST['vnpassword']){
     	echo 'New passwords do not match.<br/>';
	$valid = 1;
}


if ($valid == 0) {

$conn=mysql_connect("localhost","ramr0560","angr32cunt") or die(mysql_error());
mysql_select_db("ramr0560");

//get User ID
$query = "select UserID, email from Users where username = '$username'";
$result = mysql_query($query, $conn);
$data = mysql_fetch_array($result);
$uid = $data['UserID'];

$query = "select count(*) from Users where UserID = ".$uid." and password = '$oldpassword' ";
$result = mysql_query($query, $conn);

if(!$result) {
      echo 'Cannot run query.';
      exit;
}
$row = mysql_fetch_row($result);
$count = $row[0];
    
    if ( $count > 0 ) {
	// visitor's name and password combination are correct
	$query = "update Users set password='$newpassword' where UserID = ".$uid." ";
	//echo $query;
	$result = mysql_query($query, $conn);
	echo 'Password has been successfully changed.</br>';
    }
    else
    {
	// visitor's name and password combination are not correct
	echo 'Current Password entered is incorrect.</br>';
	echo 'Password change has failed.</br>';
    }
mysql_close($conn);

} 

echo '<br/><form action="http://hopper.wlu.ca/~ramr0560/final/userchange.php" method="post">';
echo '<input type="submit" class="search-submit" name="back" value="Go Back" />';
echo '</form>';

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