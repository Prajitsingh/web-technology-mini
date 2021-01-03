function time()
{
  t=new String(new Date());
  document.getElementById("dt").innerHTML= t.substring(0,24);
}
time();
setInterval(time,1000);
function change(x)
{
  child=document.getElementById("bottom").children;
  for(var i=0;i<child.length;i++)
  {
    if(x==0)
      drawChart();
    if(x==2)
        document.getElementById('ps0').value="";
    if(x==1)
        retData();
    if(i==x)
        child[i].style.display="block";
    else
      child[i].style.display="none";
  }
}
function retData()
{
  var eid=document.getElementById('wel').innerText.substring(9);
  var data = new FormData();
  data.append('sType', 'OPEN');
  data.append('EID',eid);
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() //On submit button click
        {
            if (this.readyState == 4 && this.status == 200) //data ready and http status is ok
            {
                document.getElementById("data").innerHTML = this.responseText;//response from services.php is stored
            }
        };
        xmlhttp.open("POST", "services.php", true);
        xmlhttp.send(data);
}
function view(id,view)
{
    var data = new FormData();
    var eid=document.getElementById('wel').innerText.substring(9);
    data.append('id', id);
    data.append('EID',eid);
    var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() //On submit button click
          {
              if (this.readyState == 4 && this.status == 200) //data ready and http status is ok
              {
                if(this.responseText=="0")
                  alert("Service is Viewed By Other Employee");
                else
                  document.getElementById("data").innerHTML = this.responseText;//response from services.php is stored
              }
          };
          xmlhttp.open("POST", "view.php", true);
          xmlhttp.send(data);
}
function changestatus(tid,status)
{
  var data = new FormData();
  data.append('tid', tid);
  data.append('status',status);
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() //On submit button click
        {
            if (this.readyState == 4 && this.status == 200) //data ready and http status is ok
            {
              if(this.responseText=="0")
                alert("Server Error");
              else
                change(1);
            }
        };
        xmlhttp.open("POST", "changestatus.php", true);
        xmlhttp.send(data);
} 
function changepass()
{
    var data = new FormData();
    data.append('opass', document.getElementById('ps0').value);
    data.append('id',document.getElementById('wel').innerText.substring(9));//to get employee id
    var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() //On submit button click
          {
              if (this.readyState == 4 && this.status == 200) //data ready and http status is ok
              {
                if(this.responseText=="0")
                  alert("Server Error");
                else
                {
                document.getElementById("cpass").innerHTML = this.responseText;
                change(3);
                }  
              }
          };
          xmlhttp.open("POST", "cp.php", true);
          xmlhttp.send(data);   
}
function cpass()
{
    var data = new FormData();
    data.append('opass', 'kk');
    data.append('npass',document.getElementById('ps1').value);
    data.append('id',document.getElementById('wel').innerText.substring(9));//to get employee id
    var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() //On submit button click
          {
              if (this.readyState == 4 && this.status == 200) //data ready and http status is ok
              {
                if(this.responseText=="0")
                  alert("Server Error");
                else
                    document.getElementById("cpass").innerHTML = '<br>Password successfully changed!!!';
                  
              }
          };
          xmlhttp.open("POST", "cp.php", true);
          xmlhttp.send(data);   
}
