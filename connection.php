<?php
$servername="localhost";
$username="root";
$password="";
$dbname="hoteldb";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
    echo '<script>console.log("Database successfully connected")</script>';
}
else{
    echo "Connection error due to".mysqli_connect_error();
}
?>