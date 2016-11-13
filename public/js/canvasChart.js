
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