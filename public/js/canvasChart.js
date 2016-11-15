
$(document).ready(function(){
    var options = {
        legend: false,
        responsive: false
    };
    new Chart(document.getElementById("canvas1"), {
        type: 'doughnut',
        tooltipFillColor: "rgba(51, 51, 51, 0.55)",
        data: {
            labels: [
                "Harian",
                "TKD",
                "USM"
            ],
            datasets: [{
                data: [quiz, tkd, usm],
                backgroundColor: [
                    "#9B59B6",
                    "#26B99A",
                    "#3498DB"
                ],
                hoverBackgroundColor: [
                    "#B370CF",
                    "#36CAAB",
                    "#49A9EA"
                ]
            }]
        },
        options: options
    });
});

window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainerUSM",
        {
            title:{
                text: ""
            },
            theme: "theme2",
            animationEnabled: true,
            axisX: {
                valueFormatString: "Tryout #"
            },
            axisY:{
                valueFormatString: "#0"
            },
            data: [
                {
                    type: "line",
                    showInLegend: true,
                    legendText: "Your Average Score",
                    dataPoints: [
                        { x: 1, y: 71, indexLabel: "gain", markerType: "triangle",  markerColor: "#6B8E23", markerSize: 12},
                        { x: 2 , y: 55, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12  },
                        { x: 3 , y: 50, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12 },
                        { x: 4 , y: 65, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23", markerSize: 12 },
                        { x: 5 , y: 85, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23", markerSize: 12 },
                        { x: 6 , y: 68, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12 },
                        { x: 7 , y: 28, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12 },
                        { x: 8 , y: 90, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23", markerSize: 12 },
                        { x: 9 , y: 24, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12 }
                    ]
                }
            ]
        });
    chart.render();
    var chart1 = new CanvasJS.Chart("chartContainerTKD",
        {
            title:{
                text: ""
            },
            theme: "theme2",
            animationEnabled: true,
            axisX: {
                valueFormatString: "Tryout #"
            },
            axisY:{
                valueFormatString: "#0"
            },
            data: [
                {
                    type: "line",
                    showInLegend: true,
                    legendText: "Your Average Score",
                    dataPoints: [
                        { x: 1, y: 70, indexLabel: "gain", markerType: "triangle",  markerColor: "#6B8E23", markerSize: 12},
                        { x: 2 , y: 55, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12  },
                        { x: 3 , y: 50, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12 },
                        { x: 4 , y: 65, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23", markerSize: 12 },
                        { x: 5 , y: 85, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23", markerSize: 12 },
                        { x: 6 , y: 68, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12 },
                        { x: 7 , y: 28, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12 },
                        { x: 8 , y: 90, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23", markerSize: 12 },
                        { x: 9 , y: 24, indexLabel: "loss", markerType: "cross", markerColor: "tomato" , markerSize: 12 }
                    ]
                }
            ]
        });
    chart1.render();
};

var judulTO = ['TO1','TO2','TO3','TO4','TO5','TO6','TO7','TO8','TO9','TO10','TO11','TO12','TO13','TO14','TO15'];
var nilaiTOUSM = [65, 59, 80,65, 59, 80,65, 59, 80,65, 59, 80,65, 59, 80];
var nilaiTOTKD = [80, 90, 30,40, 30, 55,61, 73, 33,42];
var ketUSM = ['lulus', 'tidak lulus', 'lulus'];
var ketTKD= ['lulus', 'tidak lulus', 'lulus'];
var warnaUSM = ["#1FEF1A","#D90C0C","#1FEF1A"];
var warnaTKD = ["#D90C0C","#D90C0C","#1FEF1A"];
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: judulTO,
        datasets: [{
            label: "USM",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            hoverBackgroundColor: warnaUSM,
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: warnaUSM,
            pointHoverBorderColor: warnaUSM,
            pointHoverBorderWidth: 3,
            pointRadius: 1,
            pointHitRadius: 10,
            data: nilaiTOUSM,
            spanGaps: false,
        },
        {
            label: "TKD",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(153, 102, 255, 0.2)",
            hoverBackgroundColor: warnaTKD,
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: warnaTKD,
            pointHoverBorderColor: warnaTKD,
            pointHoverBorderWidth: 3,
            pointRadius: 1,
            pointHitRadius: 10,
            data: nilaiTOTKD,
            spanGaps: false,
        },
        ]
    },  
    options: {
        scales: {
            yAxes: [{
                display: true,
                ticks: {
                    suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                    // OR //
                    beginAtZero: true   // minimum value will be 0.
                }
            }]
        }
    }
});


var judulTO2 = ['TO1','TO2','TO3'];
var nilaiTO2 = [65, 59, 80];
var ket2 = ['lulus', 'tidak lulus', 'lulus'];
var warna2 = ["green","red","green"];
var ctx = document.getElementById("myChart2");
var myChart2 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: judulTO2,
        datasets: [{
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: warna2,
            pointHoverBorderColor: warna2,
            pointHoverBorderWidth: 3,
            pointRadius: 1,
            pointHitRadius: 10,
            data: nilaiTO2,
            spanGaps: false,
        }]
    },  
    options: {
        title: {
            display: true,
            text: 'Nilai Tryout Harian'
        },
        legend: {
        display: false
        },
    }
});



