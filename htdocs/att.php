<?php
include("config.php");
echo "<div id=\"tab\">";
echo "<table>";
echo "<br>";
echo "<tr><th>ID</th><th>NAME</th><th>PRESENT</th></tr>";
$sql="SELECT E_ID,FNAME FROM EMPLOYEE";
$result = mysqli_query($con,$sql);
$i=0;
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{

    $eid=$row['E_ID'];
    $name=$row['FNAME'];
    echo "<tr><td>".$eid."</td><td>".$name."<td><input type=\"checkbox\" id=\"id".$i."\"/></td></tr>";
    $i++;
}
echo "</table>";
echo "</div>";
echo "<pre> <button onclick=\"print()\" name=\"att\">Print</button></pre>";
?>