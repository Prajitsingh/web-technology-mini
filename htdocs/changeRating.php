<?php
include("config.php");
$tid=$_POST["tid"];
$rat=$_POST["rating"];
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $sql="UPDATE SERVICES S SET S.RATING='$rat' WHERE S.TRACKING_NO ='$tid'";
    if(mysqli_query($con,$sql)==FALSE)
        echo "0";
}
?>