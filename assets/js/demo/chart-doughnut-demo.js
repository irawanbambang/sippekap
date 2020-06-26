//doughnut
var ctxD = document.getElementById("doughnutChart1").getContext('2d');
var myLineChart = new Chart(ctxD, {
type: 'doughnut',
data: {
labels: ["Laki - Laki", "Perempuan"],
datasets: [{
data: [300, 50],
backgroundColor: ["#6495ED", "#DCDCDC"],
hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
}]
},
options: {
responsive: true
}
});