//doughnut
var ctxD = document.getElementById("doughnutChart").getContext('2d');
var myLineChart = new Chart(ctxD, {
type: 'doughnut',
data: {
labels: ["Dalam Kota", "Luar Kota"],
datasets: [{
data: [300, 50],
backgroundColor: ["#808080", "#ADFF2F"],
hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
}]
},
options: {
responsive: true
}
});