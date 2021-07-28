<?php
    // Connect to MySQL
    $timezone = new DateTimeZone('Asia/Bangkok');
    $date = new DateTime();
    $date->setTimeZone($timezone);

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

    // Do whatever you want with the $uid
     
    $sql = mysqli_query($conn,"SELECT waktu, inputsuhu, suhuatas, deltainputsuhu, deltasuhu, outputKipas, outputPeltier, pwmValueK, pwmValueP, outputFuzzyK, outputFuzzyP from biobox ORDER BY id DESC limit 1");

	while($row=mysqli_fetch_array($sql))
	{
      $waktu = $row['waktu'];
	    $inputsuhu = $row['inputsuhu'];
      $suhuatas = $row['suhuatas'];
      $deltainputsuhu = $row['deltainputsuhu'];
      $deltasuhu = $row['deltasuhu'];
      $outputKipas = $row['outputKipas'];
      $outputPeltier = $row['outputPeltier'];
      $pwmValueK = $row['pwmValueK'];
      $pwmValueP = $row['pwmValueP'];
      $outputFuzzyK = $row['outputFuzzyK'];
      $outputFuzzyP = $row['outputFuzzyP'];

      $databiobox[] = array("waktu" => $waktu,
                        "inputsuhu" => $inputsuhu,
                        "suhuatas" => $suhuatas,
                        "deltainputsuhu" => $deltainputsuhu,
                        "deltasuhu" => $deltasuhu,
                        "outputKipas" => $outputKipas,
                        "outputPeltier" => $outputPeltier,
                        "pwmValueK" => $pwmValueK,
                        "pwmValueP" => $pwmValueP,
                        "outputFuzzyK" => $outputFuzzyK,
                        "outputFuzzyP" => $outputFuzzyP,
                      );
	}
	//Menampilkan konversi data pada tabel dataloger ke format JSON
	echo json_encode($databiobox);
 ?>
