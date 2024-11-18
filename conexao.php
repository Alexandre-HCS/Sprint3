<?php

  $servername = "localhost:3306";
 
    $username ="root";
    $password ="";
    $dbname ="drpeanut";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){

    echo " Erro de conexão " . $conn->connect_error;

} else {

}

?>