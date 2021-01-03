<?php
include("config.php");
$tid=$_POST["id"];
$eid=$_POST["EID"];
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $sql="UPDATE SERVICES S SET S.status='SCH',S.E_ID='$eid' WHERE S.status='OPEN' AND S.TRACKING_NO='$tid'";
    if(mysqli_query($con,$sql)==FALSE)
        echo "0";
    echo "<table>";
    $sql="SELECT S.TRACKING_NO,C.FNAME,C.PHONE,S.ADDR FROM SERVICES S,CUSTOMER C WHERE S.C_ID=C.C_ID AND S.TRACKING_NO='$tid'";
    $result = mysqli_query($con,$sql);

    if($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
            
        $tid=$row['TRACKING_NO'];
        $name=$row['FNAME'];
        $phone=$row['PHONE'];
        $address=$row['ADDR'];
        /*$pay=$row['PAYMENT'];
        if($pay==0)
            $pay="Not Done";
        else
            $pay="Done";*/
        echo "<tr><th>ID</th><th>NAME</th><th>PHONE</th><th>ADDRESS</th><th>CLOSE</th></tr>";
        echo "<tr><td >".$tid."</td><td>".$name."</td><td>".$phone."</td><td>".$address."</td><td><button id=\"".$tid."\" onclick=changestatus(this.id,'CLOSE')>CLOSE</button></td></tr>";        

    } 
    echo "</table>";
}
?>