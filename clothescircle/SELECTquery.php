
<html></html>

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

  $destination = filter_input(INPUT_POST, 'destination');

  if ($query="SELECT Shipment_ID, NGO
              FROM shipment
              WHERE shipment.Destination='$destination'") {
      if($query==null){
        echo "No Record Available";
        die();
      }
      else{
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result=$stmt->get_result();
        $rows=$result->fetch_all(MYSQLI_ASSOC);
      }
    }


  }

?>

<html lang="en">
<head></head>
<body>
  <?php
    foreach($rows as $row){
      echo "ShipmentID: " .$row["Shipment_ID"]; 
      echo "    NGO: " .$row["NGO"]; echo '</br></br>';
    }
    echo '</br>';
    ?>
    <!--<button id = "home">Home</button>
    <script>
      document.getElementById("home").onclick = function () {
        location.href="test1.html";
      }
    </script>-->
</body>
</html>
