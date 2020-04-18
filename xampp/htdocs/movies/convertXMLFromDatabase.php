<?php
header("Access-Control-Allow-Origin: http://localhost");
header("Access-Control-Allow-Headers: *");
header("Content-type: text/xml");






$connect = mysqli_connect("localhost", "root", "", "project") or die('Error connecting to MySQL server.');

$query = "SELECT * FROM movies";

$result = mysqli_query($connect, $query) or die('Error connecting to MySQL server.');

function sqlToXml($queryResult, $rootElementName, $childElementName)
{ 

$xml_data =  "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>\n"; 
$xml_data.= "<".$rootElementName. ">" ;



while($row = mysqli_fetch_object($queryResult)){

$xml_data.= "<".$childElementName. ">";


for ($i = 0; $i < mysqli_num_fields($queryResult); $i++)
        { 
   $fieldName = mysqli_fetch_field_direct($queryResult, $i) ->name;

    

$xml_data.= "<".$fieldName.">";

if(!empty($row->$fieldName))
                $xml_data .= $row->$fieldName; 
            else
              $xml_data .= "null"; 


$xml_data .= "</" . $fieldName . ">"; 

}

$xml_data .= "</" . $childElementName . ">"; 

}

$xml_data .= "</" . $rootElementName . ">"; 
 
    return $xml_data; 
}

echo sqlToXml($result, "movies", "movie");