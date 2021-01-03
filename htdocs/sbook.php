<?php
if(isset($_POST))
{
    include("config.php");
    $sql1="SELECT MAX(TRACKING_NO) AS TRACKING_NO FROM SERVICES";
    $res1 = mysqli_query($con,$sql1);
    $row1= mysqli_fetch_array($res1,MYSQLI_ASSOC);
    $nid=$row1["TRACKING_NO"]+1;
    $cid=$_POST["id"];
    $addr=$_POST["addr"];
    $pd=$_POST["pd"];
    $model=$_POST["model"];
    $sql2="INSERT INTO SERVICES(TRACKING_NO,C_ID,MODEL_NO,ADDR,PROBDESC) VALUES('$nid','$cid','$model','$addr','$pd')";
    if(mysqli_query($con,$sql2)==FALSE)
        echo "0";
    else
        echo "1";
}
?>