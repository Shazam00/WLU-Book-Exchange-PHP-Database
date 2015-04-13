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

//get User ID
$query = "select UserID from Users where username = '$username'";
$result = mysql_query($query, $conn);
$data = mysql_fetch_array($result);
$uid = $data['UserID'];
echo '<br/><p><h2>Pending Exchanges</h2></p></br>';



echo '<h3>Selling</h3>';
echo '<table border="1" width="400" >
	<tr>
	<th>Current Owner</th>
	<th>Book Title</th>
	<th>Author</th>
	<th>Course</th>
	<th>Price</th>
	<th>Book Exchanged</th>
	<th>Denied Trade</th>
	</tr>';
$query = "select  *  from Requests where (SellerID = '$uid')";
$result = mysql_query($query, $conn);
while($data = mysql_fetch_array( $result )) {
	$bid = $data['BookID'];
	$query = "select  *  from Books where (BookID = '$bid')";
	$r = mysql_query($query, $conn);
	$seller = $data['SellerID'];
	$query = "select username from Users where (UserID = '$seller')";
	$s = mysql_query($query, $conn);
	$sd = mysql_fetch_array($s);
	$d = mysql_fetch_array( $r);
	echo ' <tr>';
	echo ' <td>'.$sd['username'].'</td>';
	echo ' <td>'.$d['bookTitle'].'</td>';
	echo ' <td>'.$d['author'].'</td>';
	echo ' <td>'.$d['course'].'</td>';
	echo ' <td>'.$d['price'].'</td>';

	echo ' <td width="50">';
	echo '<form action="http://hopper.wlu.ca/~ramr0560/final/requestchange.php" method="post">';
	echo '<input type="hidden" name="RequestID" value='.$data['RequestID'].'>';
	echo '<input type="submit" class="search-submit" name="bsubmit" value="Completed">';
	echo '</form>';
	echo ' </td>';


	echo ' <td width="50">';
	echo '<form action="http://hopper.wlu.ca/~ramr0560/final/requestchange.php" method="post">';
	echo '<input type="hidden" name="RequestID" value='.$data['RequestID'].'>';
	echo '<input type="submit" class="search-submit" name="bsubmit" value="Declined">';
	echo '</form>';
	echo ' </td>';


	echo '	</tr>';
}
echo '</table><br/>';

echo '<h3>Buying</h3>';
echo '<table border="1" width="400" >
	<tr>
	<th>Current Owner</th>
	<th>Book Title</th>
	<th>Author</th>
	<th>Course</th>
	<th>Price</th>
	<th>Cancel Request</th>
	</tr>';
$query = "select  *  from Requests where (BuyerID = '$uid')";
$result = mysql_query($query, $conn);
while($data = mysql_fetch_array( $result )) {
	$bid = $data['BookID'];
	$query = "select  *  from Books where (BookID = '$bid')";
	$r = mysql_query($query, $conn);
	$seller = $data['SellerID'];
	$query = "select username from Users where (UserID = '$seller')";
	$s = mysql_query($query, $conn);
	$sd = mysql_fetch_array($s);
	$d = mysql_fetch_array( $r);
	echo ' <tr>';
	echo ' <td>'.$sd['username'].'</td>';
	echo ' <td>'.$d['bookTitle'].'</td>';
	echo ' <td>'.$d['author'].'</td>';
	echo ' <td>'.$d['course'].'</td>';
	echo ' <td>'.$d['price'].'</td>';

	echo ' <td width="50">';
	echo '<form action="http://hopper.wlu.ca/~ramr0560/final/requestchange.php" method="post">';
	echo '<input type="hidden" name="RequestID" value='.$data['RequestID'].'>';
	echo '<input type="submit" class="search-submit" name="bsubmit" value="Cancel">';
	echo '</form>';
	echo ' </td>';


	echo '	</tr>';
}
echo '</table>';

mysql_close($conn);
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