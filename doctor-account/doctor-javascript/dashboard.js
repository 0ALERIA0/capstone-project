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

// for scedule

const scheduledPatients = [
    {
        name: 'Jon Snow',
        date: '30/07/2024',
        gender: 'Male',
        age: '28 yrs',
    }, {
        name: 'Michael Scofield',
        date: '30/07/2024',
        gender: 'Male',
        age: '32 yrs',
    }, {
        name: 'Sam Winchester',
        date: '29/07/2024',
        gender: 'Male',
        age: '35 yrs',
    }, {
        name: 'Stiles Stilinski',
        date: '29/07/2024',
        gender: 'Male',
        age: '22 yrs',
    }, {
        name: 'Arya Stark',
        date: '29/07/2024',
        gender: 'Female',
        age: '19 yrs',
    }, {
        name: 'Bruce Wayne',
        date: '28/07/2024',
        gender: 'Male',
        age: '37 yrs',
    }, {
        name: 'Daenerys Targaryen',
        date: '28/07/2024',
        gender: 'Female',
        age: '28 yrs',
    }, {
        name: 'Bruce Wayne',
        date: '28/07/2024',
        gender: 'Male',
        age: '37 yrs',
    }, {
        name: 'Bruce Wayne',
        date: '28/07/2024',
        gender: 'Male',
        age: '37 yrs',
    }, {
        name: 'Bruce Wayne',
        date: '28/07/2024',
        gender: 'Male',
        age: '37 yrs',
    }, {
        name: 'Bruce Wayne',
        date: '28/07/2024',
        gender: 'Male',
        age: '37 yrs',
    }, {
        name: 'Bruce Wayne',
        date: '28/07/2024',
        gender: 'Male',
        age: '37 yrs',
    },
];

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