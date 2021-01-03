<?php
include("config.php");
$cid=$_POST['id'];
$sql="SELECT * FROM SERVICES WHERE C_ID='$cid' ORDER BY DATE_B";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);
if($count==0)
{
    echo "You havent made any Requests!";
}
else
{
    echo "<table>";
    echo "<tr><th>TRACK ID</th><th>BOOKING DATE</th><th>MODEL NO</th><th>VIEW</th></tr>";
    while($row= mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        $tid=$row["TRACKING_NO"];
        $mno=$row["MODEL_NO"];
        $date=$row["DATE_B"];
        echo "<tr><td>".$tid."</td><td>".$date."</td><td>".$mno."</td><td><button id=\"".$tid."\" onclick=view(this.id)>VIEW</button></td></tr>"; 
    }
    echo "</table>";
}
?>