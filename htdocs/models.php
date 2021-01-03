<?php
include("config.php");
$sql="SELECT MODEL_NO FROM model";
$result=mysqli_query($con,$sql);
echo "The appliances we service(Model Number) are: <br><br>";
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
    echo $row["MODEL_NO"]."<br>";
}
?>