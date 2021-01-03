<?php
   session_start();
?>
<html>
   <head>
      <title>ADMIN</title>   
      <link rel="stylesheet" href="/css/admin.css" />  
      <script type="text/javascript" src="/js/google.js"></script>
      <?php include("graph.php");?>
   </head>
   
   <body>
        <div id="left">
        <button class="navbtn" onclick="change(0)" name="home">HOME</button>
        <button class="navbtn" onclick="change(1)" name="attendance">ATTENDANCE</button>
        <button class="navbtn" onclick="change(2)" name="services">SERVICES</button>
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
                <div id="att">att</div>
                <div id="ser">
                    <p><b>Manage Services</b></p>
                    <br>
                    <select id="sType">
                        <option value="OPEN">OPEN</option>
                        <option value="SCH">SCHEDULED</option>
                        <option value="CLOSE">CLOSED</option>
                    </select>
                    <button onclick="retData()">Submit</button>
                    <div id="data">
                    </div>
                </div>
            </div>
        </div>
        
   </body>
   <!--To select the part of printing frame-->
   <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
   <script src="/js/admin.js"></script>
   <div id="random">
   </div>
</html>