$(document).ready(function() {


    var lineChartData = {
        labels : ["","","","","","",""],
        datasets : [
            {
                fillColor : "rgba(220,220,220,0.5)",
                strokeColor : "rgba(220,220,220,1)",
                pointColor : "rgba(220,220,220,1)",
                pointStrokeColor : "#fff",
                data : [arr,2,3,4,5,6,7]
            },
    
        ]

    };
   
    new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);
   


});