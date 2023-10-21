<?php 
    include('connection.php');
    $query="update rooms set roomno='".$_GET['rn']."', fname='".$_GET['fname']."', lname='".$_GET['lname']."', chkin='".$_GET['chkin']."', chkout='".$_GET['chkout']."' where roomno=".$_GET['rn'];
    mysqli_query($conn,$query);
?>
<meta http-equiv="refresh" content="0; URL='rooms.php'" />