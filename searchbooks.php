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
	$bookname = $_POST['bookname'];
	$author = $_POST['author'];
	$course = $_POST['course'];
	$price = $_POST['price'];
	$add = $_POST['addbook'];
	echo 'course: '.$course.' ';
	$valid = 0;
	if ($bookname == "") {
		$bookname = "$$$$";
		$valid = $valid + 1;
	}
	if ($author == "") {
		$author = "$$$$";
		$valid = $valid + 1;
	}
	if ($course == "") {
		$course = "$$$$";
		$valid = $valid + 1;
	}
	if ($valid < 3 ) {
		$conn=mysql_connect("localhost","ramr0560","angr32cunt") or die(mysql_error());
		mysql_select_db("ramr0560");
		$query = "select * from Books where bookTitle LIKE '%".$bookname."%' OR author LIKE '%".$author."%' OR course LIKE '%".$course."%'";
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
			if ($data['price'] > $price){
			continue;
		}
		echo ' <tr>';
		echo ' <td><input type="checkbox" name="select[]" value='.$data['bookID'].'></td>';
		echo ' <td>'.$data['bookTitle'].'</td>';
		echo ' <td>'.$data['author'].'</td>';
		echo ' <td>'.$data['course'].'</td>';
		echo ' <td>'.$data['price'].'</td>';
		echo '	</tr>';
	}
	echo '</table>';
	echo '<input type="submit" class="search-submit" name="bsubmit" value="Add to List" /><br/><br/>';
	echo '<input type="submit" class="search-submit" name="bsubmit" value="Request to buy" />';
	echo '</form>';
	mysql_close($conn);
} elseif ($_GET['bookname'] != "" ) {
	$bookname = ''.$_GET['bookname'].'';
	$conn=mysql_connect("localhost","ramr0560","angr32cunt") or die(mysql_error());
	mysql_select_db("ramr0560");
	$query = 'select * from Books where bookTitle = "'.$bookname.'" ';
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
		echo '<input type="submit" class="search-submit" name="bsubmit" value="Add to List" /><br/><br/>';
		echo '<input type="submit" class="search-submit" name="bsubmit" value="Request to buy" />';
		echo '</form>';
		mysql_close($conn);
	} else {
		echo 'Error: Please Narrow your search terms.';
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