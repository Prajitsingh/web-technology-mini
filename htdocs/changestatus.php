<?php
include("config.php");
$status=$_POST["status"];
$tid=$_POST["tid"];
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $sql="UPDATE SERVICES S SET S.status='$status' WHERE S.TRACKING_NO='$tid'";
    if(mysqli_query($con,$sql)==FALSE)
        echo "0";
}
?>