<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clothescircle";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

$shipmentID = filter_input(INPUT_POST, 'shipid');

$sql = "DELETE FROM SHIPMENT
		WHERE shipment.Shipment_ID = '$shipmentID';";

		
if($conn->multi_query($sql) === TRUE and $conn->affected_rows > 0)
{
	echo "Records deleted successfully";
	echo "<br>";
}
else
{
	if ($conn->error)
		echo "Error: " . $sql . "<br>" . $conn->error;
	else
		echo "Error: Couldn't delete the record. '$shipmentID' does not exist.";
}

$conn->close();

?>