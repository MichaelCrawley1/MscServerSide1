<?php
header("Access-Control-Allow-Origin: http://localhost");
header("Access-Control-Allow-Headers: *");

$connect = mysqli_connect("localhost", "root", "", "project") or die('Error connecting to MySQL server.');

$query = "SELECT * FROM movies";

$result = mysqli_query($connect, $query) or die('Error connecting to MySQL server.');

$json_array = array();



while($row = mysqli_fetch_assoc($result)){

$json_array[] = $row;
}

 

   echo json_encode($json_array);  


?>



