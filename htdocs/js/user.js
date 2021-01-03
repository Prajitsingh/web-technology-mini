function change(x)
{
  child=document.getElementById("content").children;
  for(var i=0;i<child.length;i++)
  {
    if(x==2)
      getserh();
    if(x==3)
        document.getElementById('ps0').value="";
    if(x==1)
    {
      document.getElementById('pd').value="";
      document.getElementById('addr').value="";
    }
    if(i==x)
        child[i].style.display="block";
    else
      child[i].style.display="none";
  }
}
function changepass()
{
    var data = new FormData();
    data.append('opass', document.getElementById('ps0').value);
    data.append('id',document.getElementById('wel').innerText);//to get employee id
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
                change(4);
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
    data.append('id',document.getElementById('wel').innerText);//to get employee id
    var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() //On submit button click
          {
              if (this.readyState == 4 && this.status == 200) //data ready and http status is ok
              {
                if(this.responseText=="0")
                  alert("Server Error");
                else
                    document.getElementById("cpass").innerHTML = 'Password successfully changed!!!';
                  
              }
          };
          xmlhttp.open("POST", "cp.php", true);
          xmlhttp.send(data);   
}
function submitRequest()
{
    var data = new FormData();
    data.append('model', document.getElementById("mno").value);
    data.append('pd', document.getElementById("pd").value);
    /*a=document.getElementById("pin").value;
    if(a.length==1)
      a='0'+a;
    adr=document.getElementById("addr").value+'Pincode 5600'+a;
    data.append('addr', adr); */

    data.append('addr', document.getElementById("addr").value);

    data.append('id', document.getElementById('wel').innerText);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() //On submit button click
    {
        if (this.readyState == 4 && this.status == 200) //data ready and http status is ok
        {
            if(this.responseText=="0")
              alert("Server Error");
            else
            {
              alert("Request Successful");
              change(2);
            }
        }
    };
    xmlhttp.open("POST", "sbook.php", true);
    xmlhttp.send(data);
    return false;
}
function view(tid)
{
  var data = new FormData();
  data.append('tid', tid);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() //On submit button click
  {
    if (this.readyState == 4 && this.status == 200) //data ready and http status is ok
    {
      if(this.responseText=="0")
        alert("Server Error");
      else
      {
        document.getElementById("one").innerHTML = this.responseText;
      }
     }
  };
  xmlhttp.open("POST", "sview.php", true);
  xmlhttp.send(data);
}
function getserh()
{
  var xmlhttp = new XMLHttpRequest();
  var data = new FormData();
  data.append('id', document.getElementById('wel').innerText);
  xmlhttp.onreadystatechange = function() //On submit button click
  {
      if (this.readyState == 4 && this.status == 200) //data ready and http status is ok
      {
          document.getElementById("all").innerHTML=this.responseText;
      }
  };
  xmlhttp.open("POST", "serhistory.php", true);
  xmlhttp.send(data);     
}
function chrat() 
{
  nrat.innerHTML = rating.value;
}
function changeRating()
{
  var data = new FormData();
  data.append('rating', rating.value);
  data.append('tid',ctid.innerText);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() //On submit button click
  {
    if (this.readyState == 4 && this.status == 200) //data ready and http status is ok
    {
      if(this.responseText=="0")
        alert("Server Error");
      else
      { 
        orat.innerText=nrat.innerText;
        alert("Rating Changed Successfully");
        
      }
     }
  };
  xmlhttp.open("POST", "changeRating.php", true);
  xmlhttp.send(data);
}