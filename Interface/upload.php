<?php
    // Connect to MySQL
   
    $servername = "localhost";
    $username = "bioboxmy_bioboxku";
    $password = "******";
    $dbname = "bioboxmy_biobox";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    // Prepare the SQL statement
    
  $data = $_POST['inputsuhu'];

    // Do whatever you want with the $uid
     
    $sql = "UPDATE setpoint SET inputsuhu='$data'";   
    $insert = mysqli_query($conn, $sql);

    if ($conn->query($sql) === TRUE) {
        echo "Input suhu sudah diset";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
?>
