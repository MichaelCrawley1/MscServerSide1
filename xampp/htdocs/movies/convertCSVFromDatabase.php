<?php
header("Access-Control-Allow-Origin: http://localhost");
header("Access-Control-Allow-Headers: *");
header("Content-type: text/html");

$connect = mysqli_connect("localhost", "root", "", "project") or die('Error connecting to MySQL server.');

$query = "SELECT * FROM movies";

$result = mysqli_query($connect, $query) or die('Error connecting to MySQL server.');


$all_data ="";


while($row = mysqli_fetch_assoc($result)){

$all_data.=  $row['title']. " , " . $row['year']. " , " . $row['genre']. " , " . $row['leadActor']. " , " .$row['director']. " , ";
}

echo $all_data;


 

  

/*

echo '<pre>';
print_r($json_array);
echo '</pre>';
mysqli_close ($connect);
*/
?>



