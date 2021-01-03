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
  if(i==1)
    att();
    if(i==x)
        child[i].style.display="block";
    else
      child[i].style.display="none";
  }
}
function att() 
{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById("att").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "att.php?q=admin", true);
        xmlhttp.send();
}
function print()
{
  var a = document.getElementById('tab').innerHTML;
  var b = document.getElementById('tab').getElementsByTagName('input');
  var c=`<style>td,th,table{
    border: 1px solid black;
    border-collapse: collapse;
    width: 33%;
    }
    table{
      padding: 3%;
    }</style>`;
  for(var i=0;i<b.length;i++)
  {
    re=new RegExp(`<input.*id="id${i}">`)//input with type and id[num]
    if(b[i].checked)
      a=a.replace(re,'Present');
    else
      a=a.replace(re,'Absent');
  }
  
  window.frames["print_frame"].document.title = "Attendance";
  window.frames["print_frame"].document.body.innerHTML = c+a;
  window.frames["print_frame"].window.print();//To print the iframe
}
function retData()
{
  var sType=document.getElementById("sType").value;//Different service status
  var data = new FormData();
  data.append('sType', sType);
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
                retData();
            }
        };
        xmlhttp.open("POST", "changestatus.php", true);
        xmlhttp.send(data);
} 
