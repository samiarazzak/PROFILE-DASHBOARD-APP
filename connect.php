<?php

$server = "localhost";
$username = "root";
$password ="";

$connect= mysqli_connect($server,$username,$password);

if(!$connect){
die("connection is not connected". mysqli_connect_errno());

}
else {
//  echo"connection successfully connected";

}

?>