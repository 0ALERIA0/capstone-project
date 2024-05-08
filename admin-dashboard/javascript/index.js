document.getElementById('doctors-status').addEventListener('change', function() {
  const filterStatus = this.value.toLowerCase();
  const doctorCards = document.querySelectorAll('.doctor--card');

  doctorCards.forEach(function(card) {
      const status = card.dataset.status;

      if (filterStatus === 'all' || status === filterStatus) {
          card.style.display = 'block';
      } else {
          card.style.display = 'none';
      }
  });
});



/* start of script for chart and bar */

const xValues = ['January','February','March','April','May','Jun','July','August','September', 'October', 'November', 'December'];
const yValues = [120,132,140,112,140,152,128,182,99,192,156,204];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 10, max:300}}],
    }
  }
});


const XValues = ["Emergency", "Checkup", "Other"];
const YValues = [56, 208, 329];
const barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797"
];

new Chart("myDonutChart", {
  type: "doughnut",
  data: {
    labels: XValues,
    datasets: [{
      backgroundColor: barColors,
      data: YValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Cactello Total Patients 2024"
    }
  }
});