<?php
$dbServerName="localhost";
$dbuserName="root";
$dbPassword="";
$dbName="reservation";
$connect=mysqli_connect("localhost","root","","reservation");
if(!$connect){
    echo "db not connected".mysqli_error($connect);
}else{
    echo "db is connected successfully";
}
