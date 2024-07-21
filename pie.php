<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

</head>
<body>
    
<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        This pie chart shows how the chart legend can be used to provide
        information about the individual slices.
    </p>
</figure>

<?php
include("configASL.php");

$conn=mysqli_connect("localhost","root","","feedback");
session_start();
$targetScore = 5;  

$sql = "SELECT COUNT(*) as count FROM feeds where faculty_id='5fffefc28686f' AND subject='PHP' AND roll='5' AND q1='5' ";


$result = $conn->query($sql);


while($row = $result->fetch_assoc()) {
    echo "Count of people with score 5: " . $row["count"];
}
 ?>
 <script>
    Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares in March, 2022',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Poor',
            y: 74.77,
            sliced: true,
            selected: true
        },  {
            name: 'Good',
            y: 12.82
        },  {
            name: 'Better',
            y: 4.63
        }, {
            name: 'Best',
            y: 2.44
        }, {
            name: 'Excellent',
            y: 2.02
        }
        ]
    }]
});
    </script>

</body>
</html>