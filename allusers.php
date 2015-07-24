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


$conn=mysql_connect("localhost","ramr0560","xxxxx") or die(mysql_error());
mysql_select_db("ramr0560");


$query = "select * from Users ORDER BY username ASC";

$result = mysql_query($query, $conn);

echo '<br/><p><h2>Viewing all Users</h2></p></br>';

echo '<form action="http://hopper.wlu.ca/~ramr0560/final/modifyfriends.php" method="post">';

echo '<table border="1" width="400" >';


echo '<tr>';
echo '<th>Select User</th>';
echo '<th>Username</th>';
echo '<th>Owned Books</th>';
echo '</tr>';

while($data = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo '<td><input type="checkbox" name="select[]" value='.$data['UserID'].'></td>';
  echo "<td><a href=viewuserbooks.php?UserID=" . $data['UserID'] . ">".$data['username']."</td>";
  $q = "select count(*) from UserBook where UserID = ".$data['UserID']." ";
  $r = mysql_query($q, $conn);
  $owned = mysql_result($r, 0);
  echo "<td>" . $owned . "</td>";
  echo "</tr>";
  }
echo "</table>";

echo '<input type="submit" class="search-submit" name="bsubmit" value="Add Friend(s)" />';
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
