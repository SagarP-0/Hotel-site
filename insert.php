<?php
include("connection.php");
include("title.php");
error_reporting(0);
$query="select roomno from rooms";
$data=mysqli_query($conn,$query);
$count=mysqli_num_rows($data);
echo "<div id='hti' style='display:none'>";
while($res=mysqli_fetch_assoc($data))
    echo $res['roomno'].' ';
echo "</div>";
?>
<html>
<head>
    <script defer src="script.js"></script>
</head>
<body>

<div class="form">
<h2>BOOK A ROOM!</h2><br>
  <form id="form" name = "myform" method="GET" action="insert.php"  oninput=check()>

        <label for="fname">First Name</label><br>
        <input type="text" id="fname" name="fname" placeholder="Enter your first name.." required><br><br>

        <label for="lname">Last Name</label><br>
        <input type="text" id="lname" name="lname" placeholder="Enter your last name.." required><br><br>
     
        <label for="roomno">Room No</label><br>
        <input type="number" id="roomno" name="roomno" placeholder="Your roomno.." required><br><br>
        <div id="roomnoerr"></div>

        <label for="chkin">Check in</label><br>
        <input type="date" id="chkin" name="chkin" placeholder="Your check in date.."  required><br><br>
        <div id="chkinerr"></div>

        <label for="chkout">Check out</label><br>
        <input type="date" id="chkout" name="chkout" placeholder="Your check out date.." required><br><br>
        <div id="chkouterr"></div>

        <input type ="submit" id="submit" name="submit" value ="BOOK"/>
        <input type ="reset" id="reset" name="reset" value ="RESET"/>
    </form>
</div>
</body>
</html>
<?php
if($_GET['submit'])
{
    $fn=$_GET['fname'];
	$ln=$_GET['lname'];
    $rn=$_GET['roomno'];
    $ci=$_GET['chkin'];
    $co=$_GET['chkout'];
    $query="INSERT INTO rooms(fname,lname,roomno,chkin,chkout) VALUES('$fn','$ln','$rn','$ci','$co')";
    $data=mysqli_query($conn,$query);
    if ($data){
        echo "<script>console.log('Data entered succesesfully')</script>";                 
    }
}
?>