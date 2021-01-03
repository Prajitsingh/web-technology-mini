<?php
include("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $type=$_POST['type'];
    if(isset($_POST['oem']))
    {
        //Send OTP
        $email=$_POST['email'];
        $otp=rand(100000,999999);
        $sql="SELECT * FROM $type WHERE EMAIL='$email'";
        $result = mysqli_query($con,$sql);//Set of Rows
        $count = mysqli_num_rows($result);
        $msg="OTP IS : ".$otp;
        $connected = @fsockopen("www.google.com", 80); 
        if (!$connected)
        {
            echo "-1";
        }
        else if($count==0)
        {
            echo "1";
        }
        else
        {
            $sql="UPDATE $type SET OTP=$otp WHERE EMAIL='$email'";
            mysqli_query($con,$sql);
            mail("$email","E-Appliance Service",$msg);
            //echo "<script>alert(".mail("$email","E-Appliance Service",$msg).")</script>";
            echo "VE";
        }
    }
    else if(isset($_POST['otp']))
    {
        //Chk OTP
        $email=$_POST['email'];
        $otp=$_POST['otp'];
        $sql="SELECT * FROM $type WHERE OTP=$otp AND EMAIL='$email'";
        $result = mysqli_query($con,$sql);//Set of Rows
        $count = mysqli_num_rows($result);    
        if($count==1)
            echo "VO";
        else
            echo "2";
    }
    else
    {
        $email=$_POST['email'];
        $psw=$_POST['pass'];
        $sql="UPDATE $type SET PSW='$psw' WHERE EMAIL='$email'";
        mysqli_query($con,$sql);   
        echo "S";
    }
}
?>