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
	<h1>Add New Book to Database</h1><br/>
<form action="http://hopper.wlu.ca/~ramr0560/final/addbook.php" method="post">
	<table>
	<tr>
		<td>Book Name</td>
		<td><input type="text" class="field" name="bookname"  /></td>
	</tr>
	<tr>
		<td>Author</td>
		<td><input type="text" class="field" name="author"   /></td>
	</tr>
	<tr>
		<td>Course Name</td>
		<td><input type="text" class="field" name="course"   /></td>
	</tr>
	<tr>
		<td>Price</td>
	<td>
<select name="price" class="field small-field">
	<option value=0 selected="selected">Free</option>
	<option value=5>$5</option>
	<option value=10>$10</option>
	<option value=20>$20</option>
	<option value=30>$30</option>
	<option value=40>$40</option>
	<option value=50>$50</option>
	<option value=60>$60</option>
	<option value=70>$70</option>
	<option value=80>$80</option>
	<option value=90>$90</option>
	<option value=100>$100</option>
	<option value=120>$120</option>
	<option value=130>$130</option>
	<option value=140>$140</option>
	<option value=150>$150</option>
	<option value=160>$160</option>
	<option value=170>$170</option>
	<option value=180>$180</option>
	<option value=190>$190</option>
	<option value=200>$200</option>
</select>
</td>


</tr>
</table>

 <br /><br />
<table>
	<tr>
		<td colspan=2>Add to my book list?</td>
	</tr>
	<tr>
		<td>Yes</td>
		<td><input type="radio" name="addbook"  value="yes" checked="checked"   /></td>
	</tr>
	<tr>
		<td>No</td>
		<td><input type="radio" name="addbook"  value="no"   /><br /></td>
	</tr>
</table>
<input type="submit" class="search-submit" value="Add book"  />
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