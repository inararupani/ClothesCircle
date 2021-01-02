
<?php

$host = "localhost";
$dbusername="root";
$dbpassword="";
$dbname = "clothescircle";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error()){
  die('Connect Error('. mysqli_connect_error() .')'
    . mysqli_connect_error());
}

else{
  $pid = filter_input(INPUT_POST,'pid');
  $newdate = filter_input(INPUT_POST, 'date');

  $query = "UPDATE pickupdetails
            SET pickupdetails.Pickup_date='$newdate'
            WHERE pickupdetails.PID='$pid'";

			
  if($conn->query($query)){
    echo "Record updated successfully"; echo '</br>';
	echo "New pick-up date for package id " .$pid . ": " .$newdate;

  }
  else{
    echo "Could not update record. Error: ". $query ."
    ". $conn->error;
    echo '</br>';
  }

}
?>


