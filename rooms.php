<html>
<style>
    #admin{
        display:none;
    }
    #login{
        position:absolute;
        top:25%;
        left:30%;
        width:40%;
    }
    #login>input{
        padding:10px;
        width:50%;
        font-size: 17;
        text-align:center;
        font-weight: 550;
        border-radius: 30px;
        box-shadow: 4px 4px 20px rgba(0,0,0,0.7);
        
    }
    #login>button{
        padding:10px;
        width:20%;
        background-color: rgb(110, 176, 176);
        font-size: 17;
        font-weight: 550;
        border-radius: 30px;
        box-shadow: 4px 4px 20px rgba(0,0,0,0.7);
    }
</style>
<?php
include("connection.php");
include("title.php");
echo '<div id="admin">';
$query="select * from rooms";
$data=mysqli_query($conn,$query);
$count=mysqli_num_rows($data);
if($count>0){
	?>
	<table border="2">
	<tr> 
	<th> Room No </th>
	<th> First Name </th>
	<th> Last name </th>
	<th> Check in  </th>
    <th> Check out  </th>
	<th colspan="2"> Operations </th>
	</tr>
<?php 
while($res=mysqli_fetch_assoc($data))
{
echo "<tr> 
<td contenteditable='true' id='sn".$res['roomno']."'>".$res['roomno']."</td>
<td contenteditable='true' id='fname".$res['roomno']."'>".$res['fname']."</td>
<td contenteditable='true' id='lname".$res['roomno']."'>". $res['lname']."</td> 
<td contenteditable='true' id='chkin".$res['roomno']."'>". $res['chkin']."</td>
<td contenteditable='true' id='chkout".$res['roomno']."'>". $res['chkout']."</td>
<td onclick=update(".$res['roomno'].")>Update</td>
<td> <a href='delete.php?rn=$res[roomno]'> Delete </a> </td>
</tr>"; 
}
}
else{
    echo "No record found";
}
?>
</table>
</div>
<div id="login">
    <input id="in" type="password"><button onclick="check()" >Check</button>
</div>
<script>
    function check(){
        let x=document.getElementById('in').value;
        if(x=="pwd123"){
            document.getElementById('admin').style.display="block";
            document.getElementById('login').style.display="none";
        }

    }
    function update(s){
        f=document.getElementById("fname"+s).innerText;
        l=document.getElementById("lname"+s).innerText;
        ci=document.getElementById("chkin"+s).innerText;
        co=document.getElementById("chkout"+s).innerText;
        link="update.php?rn="+s+"&fname="+f+"&lname="+l+"&chkin="+ci+"&chkout="+co;
        //console.log(link);
        window.location=link;
      }
</script>
</html>