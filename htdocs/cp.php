<?php
include("config.php");
$opass=$_POST["opass"];
$id=$_POST["id"];
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["npass"])==NULL)
    {
        if(substr($id,0,1)=="E")
        $sql="SELECT * FROM EMPLOYEE WHERE PSW='$opass' AND E_ID='$id'";
        else
        $sql="SELECT * FROM CUSTOMER WHERE PSW='$opass' AND C_ID='$id'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);

        if($count==1)
        {
        echo "<br>";
        echo "<table>";
        echo "<tr><th>New Password</th><td><input type=password id=\"ps1\"/></td></tr>";
        echo "<tr><th>Re-enter New Password</th><td><input type=password id=\"ps2\"/></td></tr>";
        echo "</table>";
        echo "<button onclick=cpass()>Confirm</button>";
        }
        else
        {
            echo "0";
        }
    }
    else
    {
        $npass=$_POST["npass"];
        $id=$_POST["id"];
        if(substr($id,0,1)=="E")//1 for employee, 0 for customer
         $sql="UPDATE EMPLOYEE SET PSW='$npass' WHERE E_ID='$id'";
        else
         $sql="UPDATE CUSTOMER SET PSW='$npass' WHERE C_ID='$id'";
        if(mysqli_query($con,$sql)==FALSE)
            echo "0";
        else
            echo "1";
    }

}
?>