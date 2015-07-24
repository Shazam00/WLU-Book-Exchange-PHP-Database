<?php


$conn=mysql_connect("localhost","ramr0560","xxxxx") or die(mysql_error());
mysql_select_db("ramr0560");


$command = $_POST['bsubmit'];
$RequestID = $_POST['RequestID'];


switch ($command) {
	case 'Completed':
		//echo '<br/>Update UserBooks Table';
		// fetch request by id
		$query = "select * from Requests where (RequestID = '$RequestID')";
		$result = mysql_query($query, $conn);
		$data = mysql_fetch_array($result);

		//store relevant information
		$owner = $data['SellerID'];
		$buyer = $data['BuyerID'];
		$bookid = $data['BookID'];

		//remove User book entry
		$query = "delete from UserBook where (UserID = ".$owner.") and ( BookID = ".$bookid." ) ";
		echo $query;
		$result = mysql_query($query, $conn);
		//add User book entry
		$query = "insert into UserBook (UserID, BookID) Values ('$buyer', '$bookid')";
		$result = mysql_query($query, $conn);

		// remove request
		//echo '<br/>Remove RequestID='.$RequestID.' from Requests Table';
		$query = "delete from Requests where (RequestID = ".$RequestID.")";
		$result = mysql_query($query, $conn);


		//increment served file by 2
		$myFile = "served.txt";
		$fh = fopen($myFile, 'r');
		
		$served = fgets($fh);
		//echo "#";
		//echo $served;
		//echo "#";
		$served = $served + 2; 
		//echo "#";
		//echo $served;
		//echo "#";
		fclose($fh);
		$myFile = "served.txt";
		$fh = fopen($myFile, 'w');
		fwrite($fh, $served);
		fclose($fh);
		
		break;
	case 'Declined':
	
		//echo '<br/>Remove RequestID='.$RequestID.' from Requests Table';
		$query = "delete from Requests where (RequestID = ".$RequestID.")";
		$result = mysql_query($query, $conn);
		break;

	case 'Cancel':
	
		//echo '<br/>Remove RequestID='.$RequestID.' from Requests Table';
		$query = "delete from Requests where (RequestID = ".$RequestID.")";
		$result = mysql_query($query, $conn);
		break;
}

mysql_close($conn);
header( 'Location: http://hopper.wlu.ca/~ramr0560/final/messages.php' ) ;
?>
