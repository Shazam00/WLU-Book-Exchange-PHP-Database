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
	$bookname = $_POST['bookname'];
	$author = $_POST['author'];
	$course = $_POST['course'];
	$price = $_POST['price'];
	$add = $_POST['addbook'];
	$valid = 0;
	If ($bookname == ''){
		echo 'Error: You did not enter a book title!<br/>';	
		$valid = 1;
	}
	If ($author == ''){
		echo 'Error: You did not enter an author!<br/>';	
		$valid = 1;
	}
	If ($course == ''){
		echo 'Error: You did not enter a course!<br/>';	
		$valid = 1;
	}
	// add entry to the database
	If ($valid == 0){
		$conn=mysql_connect("localhost","ramr0560","xxxxx") or die(mysql_error());
		mysql_select_db("ramr0560");
		$query = "insert into Books (bookTitle, author, course, price) values ('$bookname','$author','$course','$price') ";
		$result = mysql_query($query, $conn);
		if($add == 'yes') {
			// connect the user id to book id in the OwnedBooks lookup table
			//get User ID
			$query = "select UserID from Users where username = '$username'";
			$result = mysql_query($query, $conn);
			$data = mysql_fetch_array($result);
			$uid = $data['UserID'];
			echo '<br/>';
			// get book id
			$query = "select bookID from Books where bookTitle = '$bookname'";
			$result = mysql_query($query, $conn);
			$data = mysql_fetch_array( $result );
			$bid = $data['bookID'];
			//add it to the look up table
			$query = "insert into UserBook (UserID, BookID) values ('$uid','$bid') ";
			$result = mysql_query($query, $conn);
		}
		$myFile = "recent.txt";
		$fh = fopen($myFile, 'a') or die("can't open file");
		$stringData = "".$bookname."\n";
		fwrite($fh, $stringData);
		fclose($fh);
		mysql_close($conn);
		header ("Location: http://hopper.wlu.ca/~ramr0560/final/userhome.php");
	}
	echo '<form action="http://hopper.wlu.ca/~ramr0560/final/addbookform.php" method="post">';
	echo '<input type="submit" class="search-submit" name="Add Book" value="Add Book" />';
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
