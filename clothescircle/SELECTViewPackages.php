
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

  #$ngo = filter_input(INPUT_POST, 'ngo');

  if ($query="SELECT PID, NGO
              FROM sort_destination
              WHERE NGO='Oxfam' OR NGO='Community Recycling'
			  ORDER BY NGO") {
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
      echo "PackageID: " .$row["PID"]; 
      echo "    Partner: " .$row["NGO"]; echo '</br>';
    }
    echo '</br>';
    ?>
</body>
</html>
