<?php
include("config.php");
$type=$_POST["sType"];
if($type=="OPEN")
    $pq="onclick=changestatus(this.id,'CLOSE')>CLOSE</button></td></tr>";
else if($type=="CLOSE")
    $pq="onclick=changestatus(this.id,'OPEN')>OPEN</button></td></tr>";
else
    $pq="onclick=changestatus(this.id,'OPEN')>RESET</button></td></tr>";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    echo "<div id=\"tab1\">";
    echo "<table>";
    echo "<tr><th>ID</th><th>NAME</th><th>PHONE</th><th>CHANGE</tr>";
    $sql="SELECT S.TRACKING_NO,C.FNAME,C.PHONE FROM SERVICES S,CUSTOMER C WHERE S.C_ID=C.C_ID AND S.STATUS='$type'";
    if(isset($_POST["EID"]))
    {
        $eid=$_POST["EID"];
        $sql="SELECT S.TRACKING_NO,C.FNAME,C.PHONE FROM SERVICES S,CUSTOMER C,REPAIRS R,MODEL M,PRODUCT P WHERE S.C_ID=C.C_ID AND S.STATUS='$type' AND M.P_ID=P.P_ID AND P.P_ID=R.P_ID AND R.E_ID='$eid' AND S.MODEL_NO=M.MODEL_NO";
        $pq="onclick=view(this.id,'VIEW')>VIEW</button></td></tr>";
    }
    $result = mysqli_query($con,$sql);
    $i=0;
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {

        $tid=$row['TRACKING_NO'];
        $name=$row['FNAME'];
        $phone=$row['PHONE'];
        echo "<tr><td>".$tid."</td><td>".$name."</td><td>".$phone."</td><td><button id=\"".$tid."\"".$pq;
        $i++;
    }
    echo "</table>";
    echo "</div>";
}
?>