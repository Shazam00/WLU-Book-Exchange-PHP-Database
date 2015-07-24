<?php

session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: http://hopper.wlu.ca/~ramr0560/final/index.php");
}

$username = $_SESSION['login'];
$conn=mysql_connect("localhost","ramr0560","xxxxx") or die(mysql_error());
mysql_select_db("ramr0560");


$date=getdate(time());
echo " ".$date['weekday']." ".$date['month']." ".$date['mday'].", ".$date['year'];
echo "<br/>Current Time: ".$date['hours'].":".$date['minutes']." ";

//get User ID
$query = "select UserID, email from Users where username = '$username'";
$result = mysql_query($query, $conn);
$data = mysql_fetch_array($result);
$uid = $data['UserID'];


$query = "SELECT * FROM UserBook where UserID = ".$uid." ";
$result = mysql_query($query, $conn);
$owned = mysql_num_rows($result);

$query = "SELECT * FROM Requests where BuyerID = ".$uid." OR SellerID = ".$uid."  ";
$result = mysql_query($query, $conn);
$pending = mysql_num_rows($result);

echo '
<div id="header">
		<h1 id="logo"><a href="http://hopper.wlu.ca/~ramr0560/final/userhome.php">Laurier</a></h1>	
		
		<!-- Cart -->
		<div id="cart">
			<a href="http://hopper.wlu.ca/~ramr0560/final/userchange.php" class="cart-link">Logged in as: '.$username.'</a>
			<div class="cl">&nbsp;</div>
			<span>Books Owned: <strong>'.$owned.'</strong></span>
			&nbsp;&nbsp;
			<span>Pending: <strong>'.$pending.'</strong></span>
		</div>
		<!-- End Cart -->
		
		<!-- Navigation -->
		<div id="navigation">
			<ul>
			    <li><a href="http://hopper.wlu.ca/~ramr0560/final/userhome.php">Home</a></li>
			    <li><a href="http://hopper.wlu.ca/~ramr0560/final/messages.php">Inbox</a></li>
			    <li><a href="http://hopper.wlu.ca/~ramr0560/final/viewfriends.php">Friends</a></li>
			    <li><a href="http://hopper.wlu.ca/~ramr0560/final/allusers.php">Users</a></li>
			    <li><a href="http://hopper.wlu.ca/~ramr0560/final/contact.php">About</a></li>
			    <li><a href="http://hopper.wlu.ca/~ramr0560/final/logout.php">Log out</a></li>
			</ul>
		</div>
		<!-- End Navigation -->
	</div>
';

?>


