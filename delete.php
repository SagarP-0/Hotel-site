<?php 
    //<td> <a href='delete.php?rn=$res[roomno]'> Delete </a> </td>
    include("connection.php");
    $query="DELETE from rooms where roomno = ".$_GET['rn'];
    mysqli_query($conn,$query);
?>
<meta http-equiv="refresh" content="0; URL='rooms.php'" />


