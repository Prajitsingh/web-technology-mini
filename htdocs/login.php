<?php
	session_start();
   if(isset($_SESSION['login_user']))//To keep session alive for user
		header("location: usr.php");
   else if(isset($_SESSION['login_emp']))//To keep session alive for user
    	header("location: emp.php");		
   
	//For user login
	else if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['usbtn'])) {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($con,$_POST['name']);
      $mypassword = mysqli_real_escape_string($con,$_POST['psw']); 
      $sql = "SELECT FNAME,C_ID FROM CUSTOMER WHERE (C_ID = '$myusername' OR EMAIL ='$myusername') and PSW = '$mypassword'";
      $result = mysqli_query($con,$sql);//Set of Rows
      $count = mysqli_num_rows($result);   


      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  $fname=$row["FNAME"]; 	
      $myusername=$row["C_ID"];
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
		 $_SESSION['login_user'] = $myusername;
		 $_SESSION['fname']=$fname;
         header("location: usr.php");
      }else {
		 echo "<script> alert('Invalid credentials'); change(2); </script>";
		  
      }
   }

   //For employee login
   else if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['empbtn'])) {
	// username and password sent from form 
	$myusername = mysqli_real_escape_string($con,$_POST['name']);
	$mypassword = mysqli_real_escape_string($con,$_POST['psw']); 
	$sql = "SELECT E_ID FROM EMPLOYEE WHERE (E_ID = '$myusername' OR EMAIL ='$myusername') and PSW = '$mypassword'";
	$result = mysqli_query($con,$sql);//Set of Rows
	$count = mysqli_num_rows($result);   


	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$myusername=$row["E_ID"];
	
	// If result matched $myusername and $mypassword, table row must be 1 row
	  
	if($count == 1) {
	   $_SESSION['login_emp'] = $myusername;
	   if($myusername=="EI001" or $myusername=="EI002")
	   header("location: admin.php");
	   else
	   header("location: emp.php");
	}else {
	   echo "<script> alert('Invalid credentials'); change(2); </script>";
		
	}
 }
 else if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['regbtn']))
 {
	 $name = mysqli_real_escape_string($con,$_POST['name']);
	 $num = mysqli_real_escape_string($con,$_POST['num']);
	 $pass = mysqli_real_escape_string($con,$_POST['psw1']);
	 $email = mysqli_real_escape_string($con,$_POST['email']);
	 $sql1 = "SELECT C_ID FROM CUSTOMER ORDER BY C_ID DESC";
	 $result = mysqli_query($con,$sql1);
	 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	 $cid=$row['C_ID'];
	 $cid++;
	 $sql2 = "INSERT INTO CUSTOMER VALUES('$cid','$name','$pass','$email','$num',0)";
	 //echo $sql2;
	 if(mysqli_query($con,$sql2))
	 {
		$_SESSION['fname'] = $name;
		$_SESSION['login_user'] = $cid;
		
		header("location: usr.php");
	 }
	 else
	 {
		echo "<script> alert('Server Error'); change(3); </script>";
	 }
	}
 ?>