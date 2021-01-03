<?php
   session_start();
?>
<html lang="en" >
<head>
   <p style="display:none;" id="wel"><?php echo $_SESSION['login_user']; ?></p>
  <meta charset="UTF-8">
  <title>User Login</title>
  <link rel="stylesheet" href="/css/usr.css">
  <link href="/css/usr1.css" rel="stylesheet">
  <link href="/css/usr2.css" rel="stylesheet">
  <script src="/js/usr1.js"></script>
</head>
<body>
<div class="container">
  <input data-function="swipe" id="swipe" type="checkbox">
  <label data-function="swipe" for="swipe">&#xf057;</label>
  <label data-function="swipe" for="swipe">&#xf0c9;</label>
 
  <div class="headings" id="content">
     <div id="home">
         <p>Welcome, 
         <?php
               //echo $_SESSION['login_user'];
               echo $_SESSION['fname'];
         ?>
         </p>  
         <div id="mod">
            <?php include("models.php"); ?>
         </div>
      </div>
      <div id="book">
         <?php include("book.php"); ?>
      </div>
      <div id="service">
         <div id="all">
            <?php include("serhistory.php"); ?>   
         </div>
         <div id="one">
         </div>
      </div>
      <div id="cpass0">
      <table>
         <tr><th>
            Enter Old Password</th>
            <td><input type=password id="ps0"/></td></tr>
      </table>
      <button id="chp" onclick=changepass()>Change</button>
      </div>   
      <div id="cpass">
      </div>
  </div>
 
  <div class="sidebar">
    <nav class="menu">
      <li><a href="javascript:change(0);" >Home</a></li>
      <li><a href="javascript:change(1);">Book</a></li>
      <li><a href="javascript:change(2);">Service History</a></li>
      <li><a href="javascript:change(3);">Change Password</a></li>
      <li><a href="logout.php">Logout</a></li>
    </nav>
  </div>
  
</div>
  
</body>
<script src="/js/user.js"></script>
</html>