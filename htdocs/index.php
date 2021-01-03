<?php
   include("config.php");	
   include("login.php");
?>
<html>
	<head>
		<link rel="stylesheet" href="/css/index.css" />
		<title>E-Appliance Service</title>
	</head>
	<body>
		<div id="logo">
			<figure>
				<img src="/img/logo.png" alt="No Logo" width="100%" height="20%"/>
			</figure>
		</div>
		<div class="btn-group">
  			<button class="top-btn" onclick="change(0)">HOME</button>
			<button class="top-btn" onclick="change(1)">ABOUT US</button>
       	    <button class="top-btn" onclick="change(2)">LOGIN</button>
			<button class="top-btn" onclick="change(3)">REGISTER</button>
		</div>
		<div id="con">
			<div id="home">
				<img class="fade" src="/img/f1.jpg">
				<img class="fade" src="/img/f2.jpg">
				<img class="fade" src="/img/f3.jpg">
			</div>
			<div id="abt">
			<ul>
				<font size="5"><b><li>We are a web-based application for local services.</li><br> 
				<li>We help customers hire trusted professionals for all their service needs.</li><br> 
				<li>We are staffed with young, passionate people working tirelessly to make a difference in the lives of people by catering to their service needs at their doorsteps.</li><br>
			    <li>We provide E-appliance repairs within short duration of time satisfying the customer requirements allowing them to manage the schedule.</li><br>
				<li>We are a sure shot destination for your service needs.</li><br></font></b>
			</div>
			<div id="login">
				<div id="usr_login">
					<form method=post action="" name="ulog">
						<legend class="leg"><b>Customer Login</b></legend>
						<fieldset>
							<label>Username</label><br>
							<input type="text" placeholder="Enter Username" name="name" required><br><br>

							<label>Password</label><br>
							<input type="password" placeholder="Enter Password" name="psw" required><br>
								
							<button type="submit" name="usbtn">Login</button>
							<a href="javascript:changelink('CUSTOMER')">Forgot Password</a>							

						</fieldset>
					</form>	
				</div>
				<div id="emp_login">
					<form method=post action="" name="elog">
						<legend class="leg"><b>Employee Login</b></legend>
						<fieldset>
							<label>Username</label><br>
							<input type="text" placeholder="Enter Username" name="name" required><br><br>

							<label>Password</label><br>
							<input type="password" placeholder="Enter Password" name="psw" required><br>
								
							<button type="submit" name="empbtn">Login</button>
							<a href="javascript:changelink('EMPLOYEE')">Forgot Password</a>							
						</fieldset>
					</form>	
				</div>
			</div>
			<div id="reg">
				<div id="form">
					<form method=post action="" name="register">
						<legend class="leg"><b>Registeration</b></legend>
						<div id="p1">
							<label>Name</label><br>
							<input type="text" placeholder="Enter Name" name="name" required><br><br>
							<label>Number (10-digits)</label><br>
							<input type="text" pattern="[0-9]{10}" placeholder="Enter Number" name="num" required><br><br>
							<label>E-mail</label><br>
							<input type="email" placeholder="Enter E-mail" name="email" required><br><br>
						</div>
						<div id="p2">	
							<label>Password</label><br>
							<input id="pass1" type="password" placeholder="Enter Password" oninput="pchk(this.id)" name="psw1" required><br>
							<label>Re-enter Password</label><br>
							<input id="pass2" type="password" placeholder="Re-enter Password" oninput="pchk(this.id)" name="psw2" required><br>
							<button id="rbtn" type="submit" name="regbtn" disabled>Register</button>
						</div>	
							
					</form>
				</div>
				<div id="pass">
					<p id="m1">Passwords Don't Match</p>
					<p id="m2">Must be of length 8</p>
					<p id="m3">Must conatain both cases</p>
					<p id="m4">Must Contain Number</p>
					<p id="m5">Must Contain Symbol</p>
				</div>
			</div>
			<div id="fpass">
				<p id="type"></p>
				<table id="e1">
					<tr>
						<th>Enter Email : </th>
						<td><input type=email id="fpemail"/></td>
					</tr>
					<tr>
						<td colspan="2"><button id="fpemail" onclick=fnpass(this.id)>Submit</button></td>
					</tr>
				</table>
				<table id="otp">	
					<tr>
						<th>Enter OTP : </th>
						<td><input type=text id="fpotp"/></td>
					</tr>
					<tr>
						<td colspan="2"><button id="fpotp" onclick=fnpass(this.id)>Submit</button></td>
					</tr>
				</table>
				<table id="fpsw">
					<tr>
						<th>Password</th>
						<td><input id="fpass1" type="password" placeholder="Enter Password" oninput="pchk(this.id)" name="psw1" required></td>
					</tr>
					<tr>
						<th>Re-enter Password</th>
						<td><input id="fpass2" type="password" placeholder="Re-enter Password" oninput="pchk(this.id)" name="psw2" required></td>
					</tr>
					<tr>
						<td colspan="2">
							<button id="fpassbtn" onclick=fnpass(this.id)>Submit</button>
						</td>
					</tr>
					
				</table>					
			</div>
		</div>
	</body>
	<script src="/js/index.js"></script>
</html>
