  import { dataOverview } from "./data/overview-data.js";
  import { doctors } from "./data/doctors-data.js";
  import { scheduledPatients } from "./data/patients-data.js";

/* script for Overview section */

  let OverviewContentHTML = '';

  dataOverview.forEach((data) => {
    OverviewContentHTML += `
    
          <div class="card ${data.typeOfCard}">
              <div class="card--data">
                  <div class="card--content">
                      <h5 class="card--title">${data.title}</h5>
                      <h1>${data.count}</h1>
                  </div>
                  <i class="${data.icon}"></i>
              </div>
              
          </div>
                    
  `;
  });

  document.querySelector('.js-cards').innerHTML = OverviewContentHTML;

  /* script for doctors section */


document.getElementById('date').addEventListener('change' , function() {
  const filter = this.value;
  const items = document.querySelectorAll('.doctor--card');

  items.forEach(function(item) {
    if (filter === 'all' || item.classList.contains(filter)) {
      item.style.display = 'block';
    } else {
      item.style.display = 'none';
    }
  });
});

let doctorData = '';

doctors.forEach((doctor) => {
  doctorData += `
    <div class="doctor--card ${doctor.status}">
        <div class="img--box--cover">
            <div class="img--box">
                <img src="images/picture-${doctor.image}.jpg" alt="">
            </div>
        </div>
        <p>${doctor.status}</p>
        </div>
  `
});

document.querySelector('.doctors--cards').innerHTML = doctorData;

/* script for scheduled patients */

function renderScheduleList() {
let patientsData = '';

scheduledPatients.forEach((patient) => {
  patientsData += `
  <tr>
  <td>${patient.name}</td>
  <td>${patient.date}</td>
  <td>${patient.gender}</td>
  <td>${patient.age}</td>
  <td><span><button class="ri-edit-line edit edit"><button><button class="ri-delete-bin-line delete js-delete-schedule"><button></span></td>
</tr>
  `
});

document.querySelector('.js-tables-scheduled-patients').innerHTML = patientsData;

document.querySelectorAll('.js-delete-schedule')
  .forEach((deleteList, index) => {
    deleteList.addEventListener('click', () => {
      scheduledPatients.splice(index, 1)
      renderScheduleList();
    })
  });
}

renderScheduleList();

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