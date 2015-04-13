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
	$uid = $_GET['UserID'];
	$query = "select username from Users where UserID = '$uid'";
	$result = mysql_query($query, $conn);
	$data = mysql_result($result,0);
	echo 'Viewing '.$data,' s books';
	$query = "select  ub.UserID, ub.BookID , b.bookID, b.bookTitle, b.author, b.course, b.price  from Books b
			join UserBook ub on (ub.BookID = b.bookID) where (ub.UserID = '$uid')";
	$result = mysql_query($query, $conn);	
	echo '<form action="http://hopper.wlu.ca/~ramr0560/final/book.php" method="post">';
	echo '<table border="1" width="400" >
	<tr>
		<th>Select Book</th>
		<th>Book Title</th>
		<th>Author</th>
		<th>Course</th>
		<th>Price</th>
	</tr>';
	while($data = mysql_fetch_array( $result )) {
		echo ' <tr>';
		echo ' <td><input type="checkbox" name="select[]" value='.$data['bookID'].'></td>';
		echo ' <td>'.$data['bookTitle'].'</td>';
		echo ' <td>'.$data['author'].'</td>';
		echo ' <td>'.$data['course'].'</td>';
		echo ' <td>'.$data['price'].'</td>';
		echo '	</tr>';
	}
	echo '</table>';
	echo '<input type="submit" class="search-submit" name="bsubmit" value="Request to buy" />';
	echo '</form>';
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