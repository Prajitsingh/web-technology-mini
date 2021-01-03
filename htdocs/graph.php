<?php
    $con = mysqli_connect("localhost:3306","root","","es");
    echo "<table>";
    $sql="SELECT RATING,COUNT(*) as CTN FROM services WHERE STATUS='CLOSE' AND NOT RATING='0' GROUP BY RATING order by RATING";
    $result = mysqli_query($con,$sql);
    $a=array(0,0,0,0,0,0);
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $a[$row["RATING"]]=$row["CTN"];
    }
    echo "<script type=\"text/javascript\">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    // Draw the chart and set the chart values
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
      ['Rating', 'Rating'],
      ['1 Star', ".$a[1]."],
      ['2 Star', ".$a[2]."],
      ['3 Star', ".$a[3]."],
      ['4 Star', ".$a[4]."],
      ['5 Star', ".$a[5]."]
    ]);
    
      // Optional; add a title and set the width and height of the chart
      var options = {'title':'Closed Request Ratings', 'width':550, 'height':400};
    
      // Display the chart inside the <div> element with id=\"piechart\"
      var chart = new google.visualization.PieChart(document.getElementById('home'));
      chart.draw(data, options);
    }
    </script>";
?>