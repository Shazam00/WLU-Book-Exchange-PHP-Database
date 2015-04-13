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
			<!--    <li><a href="http://hopper.wlu.ca/~ramr0560/final/contact.php">About</a></li>-->
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
			
<h1>Welcome to Laurier Book Exchange</h1>

<br/>
<p>
This web service allows students to buy, sell, and get rid of textbooks in a nice convinent place.
</p>

<br/>
<Table>


<tr>
<th>Total Users</th>
<th>Books Available</th>
<th>Students Helped</th>
</tr>


<?php

$conn=mysql_connect("localhost","ramr0560","angr32cunt") or die(mysql_error());
mysql_select_db("ramr0560");

$q = "select count(*) from Users";
$r = mysql_query($q, $conn);
$numusers = mysql_result($r, 0);

$q = "select count(*) from UserBook";
$r = mysql_query($q, $conn);
$booksowned = mysql_result($r, 0);

$myFile = "served.txt";
$fh = fopen($myFile, 'r') or die("can't open file");
$served = fgets($fh);

fclose($fh);



echo '<tr>';

echo '<td>'.$numusers.'</td>';
echo '<td>'.$booksowned.'</td>';



echo '<td>'.$served.'</td>';

echo '</tr>';

?>

</Table>

</br>
<table >
<tr>
<th><b>Existing User</b></th>
<th><b>New User</b></th>
</tr>
<tr>
<td>
<form action="http://hopper.wlu.ca/~ramr0560/final/login.php" method="post">
<table>
<tr>
<td>User Name</td>
<td><input type="text" class="field" name="username"  /></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" class="field" name="password"   /></td>
</tr>
</table>
	<input type="submit" class="search-submit"  value="Log in"  />
</form>
</td>

<td>
<form action="http://hopper.wlu.ca/~ramr0560/final/createlogin.php" method="post">
<table>
<tr>
<td>User Name</td>
<td><input type="text" class="field" name="username"  /></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" class="field" name="password"   /></td>
</tr>
<tr>
<td>Verify Password</td>
<td><input type="password" class="field" name="vpassword"   /></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" class="field" name="email"   /></td>
</tr>
</table>
	<input type="submit" class="search-submit" value="Create New User" />
</form>
</td>
</tr>
</table>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>			
		</div>
		<!-- End Content -->
		
		<!-- Sidebar -->
		
		<!-- End Sidebar -->
		
		<div class="cl">&nbsp;</div>
	</div>
	<!-- End Main -->
	<!-- Side Full -->
	<div class="side-full">
		<!-- Text Cols -->
<?php
include ("footer.php");
?>
		<!-- End Text Cols -->
	</div>
	<!-- End Side Full -->
</div>	
<!-- End Shell -->
</body>
</html>