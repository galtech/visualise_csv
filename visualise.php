<?php
$file = $_GET['file'];

?>
<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" media="screen"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="http://code.highcharts.com/highcharts-more.js"></script>
<script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js"></script>

<title>Visualisation</title>


<script type="text/javascript">

$(document).ready(function(){

var options = {
    chart: {
        renderTo: 'chart-container',
        defaultSeriesType: 'column'
    },
    title: {
        text: 'Categories'
    },
    xAxis: {
        categories: []
    },
    yAxis: {
        title: {
            text: 'Units'
        }
    },
    series: []
};


$.get('uploads/<?php echo $file; ?>', function(data) {
    // Split the lines
    var lines = data.split('\n');
    
    // Iterate over the lines and add categories or series
    $.each(lines, function(lineNo, line) {
        var items = line.split(',');
        
        // header line containes categories
        if (lineNo == 0) {
            $.each(items, function(itemNo, item) {
                if (itemNo > 0) options.xAxis.categories.push(item);
            });
        }
        
        // the rest of the lines contain data with their name in the first 
        // position
        else {
            var series = {
                data: []
            };
            $.each(items, function(itemNo, item) {
                if (itemNo == 0) {
                    series.name = item;
                } else {
                    series.data.push(parseFloat(item));
                }
            });
            
            options.series.push(series);
    
        }
        
    });
    
    // Create the chart
    var chart = new Highcharts.Chart(options);
});


});


</script>

</head>
<body>

<div id="chart-wrapper">

<div id="chart-container"></div>

</div>

<a href="index.php">Back to home</a>

</body>
</html>