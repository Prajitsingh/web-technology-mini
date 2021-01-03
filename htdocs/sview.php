<?php
if(isset($_POST))
{
    include("config.php");
    $tid=$_POST["tid"];
    $sql="SELECT * FROM SERVICES WHERE TRACKING_NO='$tid'";
    $res = mysqli_query($con,$sql);
    $row= mysqli_fetch_array($res,MYSQLI_ASSOC);
    $addr=$row["ADDR"];
    $model=$row["MODEL_NO"];
    $status=$row["STATUS"];
    $rating=$row["RATING"];
    echo "<table>";
    echo "<tr><th>Track ID</th><td id=\"ctid\">".$tid."</td></tr>";
    echo "<tr><th>Model Number</th><td>".$model."</td></tr>";
    echo "<tr><th>Status</th><td>".$status."</td></tr>";
    if($status=="OPEN")
    {
        echo "<tr><td colspan='2'>Technical Executive Will be assigned Soon!</td></tr>";
    }
    else 
    {
        echo "";
        $eid=$row["E_ID"];
        $sql1="SELECT * FROM EMPLOYEE WHERE E_ID='$eid'";
        $res1 = mysqli_query($con,$sql1);
        $row1= mysqli_fetch_array($res1,MYSQLI_ASSOC);
        $name=$row1["FNAME"];
        $ph=$row1["PHONE"];
        echo "<tr><td colspan=\"2\">Executive Information</td></tr>";
        echo "<tr><th>Executive Name : </th><td>".$name."</td></tr>";
        echo "<tr><th>Contact No : </th><td>".$ph."</td></tr>";
        if($status=="CLOSE")
        {
            echo "<tr><td>Current Rating : </td><td id=\"orat\">".$rating."</td></tr>";
            echo "<tr><td>New Rating : </td><td id=\"nrat\">3</td></tr>";
            echo "<tr><td><input class=\"slider\" oninput=chrat() type=\"range\" min=\"1\" max=\"5\" id=\"rating\"/></td>";
            echo "<td colspan=\"2\"><button onclick=changeRating()>Change Rating</button></td></tr>";
        }
    }
    echo "</table>";

}
?>