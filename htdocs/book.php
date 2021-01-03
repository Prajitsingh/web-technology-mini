<?php
#include("config.php");
$sql1="SELECT P.P_ID,P.P_TYPE FROM PRODUCT P";
$res1 = mysqli_query($con,$sql1);
echo "<table>";
echo "<tr><th>Model Number</th><td><select id=\"mno\">";
while($row1= mysqli_fetch_array($res1,MYSQLI_ASSOC))
{
    $type=$row1["P_TYPE"];
    $pid=$row1["P_ID"];
    echo "<optgroup label=\"".$row1["P_TYPE"]."\">";
    $sql2="SELECT M.MODEL_NO FROM MODEL M WHERE M.P_ID='$pid'";
    $res2 = mysqli_query($con,$sql2);
    while($row2= mysqli_fetch_array($res2,MYSQLI_ASSOC))
    {
        echo "<option>".$row2["MODEL_NO"]."</option>";
    }
    echo "</optgroup>";
}
echo "</select></td></tr>";
echo "<tr><th>Problem Description</th><td><textarea id=\"pd\" maxlength=50 rows=10 placeholder=\"Max 50 Charcters\" required></textarea></td></tr>";
echo "<tr><th>Address</th><td><textarea id=\"addr\" maxlength=100 placeholder=\"Max 100 Charcters\" rows=10 required></textarea></td></tr>";
//echo "<tr><th>Pincode 560-0</th><td><input type=number min=0 max=99 id=\"pin\" placeholder=\"00-99\" required></td></tr>";
echo "</table>";
echo "<button onclick=submitRequest()>Submit Request</button>";
?>
