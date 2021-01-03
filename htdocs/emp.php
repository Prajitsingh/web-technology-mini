<?php
   session_start();
?>
<html>
   <head>
      <title>ADMIN</title>   
      <link rel="stylesheet" href="/css/emp.css" />  
      <script type="text/javascript" src="/js/google.js"></script>
      <?php include("graph.php");?>
   </head>
   
   <body>
        <div id="left">
        <button class="navbtn" onclick="change(0)" name="home">HOME</button>
        <button class="navbtn" onclick="change(1)" name="attendance">SERVICES</button>
        <button class="navbtn" onclick="change(2)" name="services">CHANGE PASSWORD</button>
        <a href="logout.php">
            <button class="navbtn" name="logout">LOGOUT</button>
        </a>
        </div>
        <div id="right">
            <div id="top">
                <p id="wel">Welcome, <?php
                echo $_SESSION['login_emp'];
                ?></p>
                <p id="dt">
                </p>
            </div>
            <div id="bottom">
                  <div id="home"></div>
                  <div id="ser">
                   <p>Manage Services</p>
                      <div id="data">
                      
                      </div>
                  </div>  
                  <div id="cpass0">
                    <br>
                      Enter Old Password
                      <input type=password id="ps0"/>
                  <button id="chp" onclick=changepass()>Change</button>
                </div>
                <div id="cpass">
                </div>
            </div>
        </div>
   </body>
   <script src="/js/emp.js"></script>
   <div id="random">
   </div>
</html>