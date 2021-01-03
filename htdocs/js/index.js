var myIndex = 0;
var type=""
var x = document.getElementsByClassName("fade");
carousel();
function carousel() 
{
  var i;

  for (i = 0; i < x.length; i++) 
  {
    x[i].style.display = "none";  
  } 	
  myIndex++;
  if (myIndex > x.length)
	myIndex = 1;    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel,5000);    
}
function changelink(x)
{
  var ids=['e1','otp','fpsw']
  document.getElementById('otp').setAttribute("style","display:none;");
  document.getElementById('fpsw').setAttribute("style","display:none;");
  document.getElementById('e1').setAttribute("style","display:block;");
  document.getElementById('fpemail').value="";
  document.getElementById('fpotp').value="";
  document.getElementById('fpass1').value="";
  document.getElementById('fpass2').value="";
  type=x  
  document.getElementById('type').innerHTML='<b>'+type;
  change(4);
}
function change(x)
{
  child=document.getElementById("con").children;
  for(var i=0;i<child.length;i++)
    if(i==x)
      child[i].style.display="block";
    else
      child[i].style.display="none";
}

function pchk()
{
  var p1=document.getElementById("pass1").value;
  var p2=document.getElementById("pass2").value;

  if(p1!=p2)
    document.getElementById("m1").style.display="block";
  else
    document.getElementById("m1").style.display="none";

  if(p1.length<8)
    document.getElementById("m2").style.display="block";
  else
    document.getElementById("m2").style.display="none";

  if(p1.match(/[a-z]/)==null || p1.match(/[A-Z]/)==null) 
    document.getElementById("m3").style.display="block";
  else
    document.getElementById("m3").style.display="none";

  if(p1.match(/[0-9]/)==null) 
    document.getElementById("m4").style.display="block";
  else
    document.getElementById("m4").style.display="none"; 

  if(p1.match(/[^a-zA-Z0-9]/)==null) 
    document.getElementById("m5").style.display="block";
  else
    document.getElementById("m5").style.display="none"; 

  var msgs=document.getElementById("pass").children;
  for(var i=0;i<msgs.length;i++)
    if(msgs[i].style.display=='block')
      break;
  if(i==msgs.length)
    document.getElementById("rbtn").disabled=false;
  else 
    document.getElementById("rbtn").disabled=true;
}
function fnpass(id)
{
  var vis=0
  var ids=['e1','otp','fpsw']
  var data = new FormData();
  if(id=='fpemail')
  {
    data.append('type',type)
    data.append('email', document.getElementById('fpemail').value);
    data.append('oem','set')
  }
  else if(id=='fpotp')
  {
    data.append('type',type)
    data.append('email', document.getElementById('fpemail').value);
    data.append('otp', document.getElementById('fpotp').value);
  }
  else
  {
    data.append('type',type)
    data.append('email', document.getElementById('fpemail').value);
    data.append('pass', document.getElementById('fpass2').value);
  }
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() //On submit button click
        {
            if (this.readyState == 4 && this.status == 200) //data ready and http status is ok
            {
              if(this.responseText=="-1")
              {
                alert("Please Connect To Internet");
                vis=0;
              }

              if(this.responseText=="0")
                {
                  alert("Server Error");
                  vis=0;
                }
              else if(this.responseText=="1")
              {
                  alert("Email is not Registered");
                  id.value="";
                  vis=0;
              }
              else if(this.responseText=="2")
              {
                  alert("Invalid OTP");
                  id.value="";
                  vis=1;
              }
              else if(this.responseText=="VE")
              {
                vis=1;
                alert('OTP SENT TO EMAIL ADDRESS')
              }
              else if(this.responseText=="VO")
              {
                vis=2;
                alert('OTP MATCHED')
              }
              else if(this.responseText=="S")
              {
                alert('Password Changed Successfully!')
                change(2)
              }
              for(var i=0;i<ids.length;i++)
              {
                id=ids[i]
                if(i==vis)
                  document.getElementById(id).setAttribute("style","display:block;");
                else
                  document.getElementById(id).setAttribute("style","display:none;");
              }
            }
        };
        xmlhttp.open("POST", "fp.php", true);
        xmlhttp.send(data);
}