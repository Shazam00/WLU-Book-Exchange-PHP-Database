﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<h1>Search books in Database</h1>
<form action="http://hopper.wlu.ca/~ramr0560/final/searchbooks.php" method="post">
	<b>Enter Specifications</b><br/><br/>
	Book Name <input type="text" name="bookname"  /><br />
	Author <input type="text" name="author"   /><br />
	Course Name <input type="text" name="course"   /><br />
	Price <input type="text" name="price"   /><br /><br />
	<input type="submit" value="Search Books"  />
</form>
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