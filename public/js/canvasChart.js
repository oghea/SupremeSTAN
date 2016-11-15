
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

var judulTO = ['TO1','TO2','TO3'];
var nilaiTO = [65, 59, 80];
var ket = ['lulus', 'tidak lulus', 'lulus'];
var warna = ["green","red","green"];
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: judulTO,
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
            pointHoverBackgroundColor: warna,
            pointHoverBorderColor: warna,
            pointHoverBorderWidth: 3,
            pointRadius: 1,
            pointHitRadius: 10,
            data: nilaiTO,
            spanGaps: false,
        }]
    },  
    options: {
        title: {
            display: true,
            text: 'Nilai Tryout USM'
        },
        legend: {
        display: false
        },
    }
});

var judulTO1 = ['TO1','TO2','TO3'];
var nilaiTO1 = [65, 59, 80];
var ket1 = ['lulus', 'tidak lulus', 'lulus'];
var warna1 = ["green","red","green"];
var ctx = document.getElementById("myChart1");
var myChart1 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: judulTO1,
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
            pointHoverBackgroundColor: warna1,
            pointHoverBorderColor: warna1,
            pointHoverBorderWidth: 3,
            pointRadius: 1,
            pointHitRadius: 10,
            data: nilaiTO1,
            spanGaps: false,
        }]
    },  
    options: {
        title: {
            display: true,
            text: 'Nilai Tryout TKD'
        },
        legend: {
        display: false
        },
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
            data: nilaiTO1,
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



