$(function(){
    var minTimes = new Array();
    var aveTimes = new Array();
    var maxTimes = new Array();
    var fisrtTry = 0;
    var areaChartData = {
        labels:["00:00","01:00","02:00","03:00","04:00","05:00","06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00", "24:00"],
        datasets: [
            {
                label: "Minimum Time",
                fillColor: "rgba(255, 255, 51, 1)",
                strokeColor: "rgba(255, 255, 51, 0.9)",
                pointColor: "rgba(255, 255, 51, 1)",
                pointStrokeColor: "#c1c7d1",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(255, 255, 51, 1)",
                data: []//, 37, 19, 68, 24, 55]
            },
            {
                label: "Average Time",
                fillColor: "rgba(100, 128, 233, 1)",
                strokeColor: "rgba(100, 128, 233, 0.9)",
                pointColor: "#3b8bba",
                pointStrokeColor: "rgba(100, 128, 233, 1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(100, 128, 233, 1)",
                data: []//, 40, 19, 86, 27, 90]
            },
            {
                label: "Maximum Time",
                fillColor: "rgba(255, 51, 51, 1)",
                strokeColor: "rgba(255, 51, 51, 0.9)",
                pointColor: "#3b8bba",
                pointStrokeColor: "rgba(255, 51, 51, 1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(255, 51, 51, 1)",
                data: []//, 78, 65, 12, 76, 16]
            }
        ]
    };
    var areaChartOptions = {
        //Boolean - If we should show the scale at all
        showScale: true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines: false,
        //String - Colour of the grid lines
        scaleGridLineColor: "rgba(0,0,0,.05)",
        //Number - Width of the grid lines
        scaleGridLineWidth: 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,
        //Boolean - Whether the line is curved between points
        bezierCurve: true,
        //Number - Tension of the bezier curve between points
        bezierCurveTension: 0.3,
        //Boolean - Whether to show a dot for each point
        pointDot: false,
        //Number - Radius of each point dot in pixels
        pointDotRadius: 4,
        //Number - Pixel width of point dot stroke
        pointDotStrokeWidth: 1,
        //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        pointHitDetectionRadius: 20,
        //Boolean - Whether to show a stroke for datasets
        datasetStroke: true,
        //Number - Pixel width of dataset stroke
        datasetStrokeWidth: 2,
        //Boolean - Whether to fill the dataset with a color
        datasetFill: true,
        //String - A legend template
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio: true,
        //Boolean - whether to make the chart responsive to window resizing
        responsive: true
    };

    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas);
    var lineChartOptions = areaChartOptions;
    var updateInterval = 5000;

    function update()
    {
        /*var currentDy = '2016-11-28';//currentDt.getFullYear() + "-" + currentDt.getMonth() + "-" + currentDt.getDay();
            var currentHr = '20:00';currentDt.getHours() + ":" + currentDt.getMinutes();*/
        $.get('graphic', {}, function(data){ //{ hour : currentHr, date : currentDy}
            var datos = jQuery.parseJSON(data);
            var minData = areaChartData.datasets[0].data;
            var aveData = areaChartData.datasets[1].data;
            var maxData = areaChartData.datasets[2].data;
            for (var i=0; i<datos.length; i++){
                minData[i] = datos[i].minTime;
                aveData[i] = datos[i].aveTime;
                maxData[i] = datos[i].maxTime;
            }
            areaChartData.datasets[0].data = minData;
            areaChartData.datasets[1].data = aveData;
            areaChartData.datasets[2].data = maxData;
            //alert(data);
        });
        lineChartOptions.datasetFill = false;
        lineChart.Line(areaChartData, lineChartOptions);
        setTimeout(update, updateInterval);
        if(fisrtTry == 0)
            updateInterval = updateInterval * 10;
    }

    update();
});