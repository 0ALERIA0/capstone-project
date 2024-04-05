const patientList = [
  {
    name: 'darrelle',
    bday: '09000000000',
    add: 'Dasmarinas, Cavite',
    room: '002'
  },
  {
    name: 'joice',
    bday: '09000000000',
    add: 'Silang, Cavite',
    room: '001'
  },
  {
    name: 'heaven',
    bday: '09000000000',
    add: 'Imus, Cavite',
    room: '004'
  },
  {
    name: 'Hestia',
    bday: '09000000000',
    add: 'Bacoor, Cavite',
    room: '003'
  },
  {
    name: 'Maia',
    bday: '09000000000',
    add: 'GMA, Cavite',
    room: '005'
  }
];

renderPatientList();

function renderPatientList () {

  let patientListHTML = '';

  for (let i = 0; i < patientList.length; i++) {
    const patientObject = patientList[i];

    const {name, bday, add, room} = patientObject;
    const html = `
    
    <div>${name}</div>
    <div>${bday}</div>
    <div>${add}</div>
    <div>${room}</div>
    <button onclick="
        patientList.splice(${i}, 1);
        renderPatientList();
      " class="delete-patient-button">Delete</button>
    
    `
    patientListHTML += html;
  }

  document.querySelector('.js-patient-list')
  .innerHTML = patientListHTML;

}

function addPatient() {
  const inputElement = document.querySelector('.js-name-input');
  const name = inputElement.value;

  const dateInputElement = document.querySelector('.js-date-input');
  const bday = dateInputElement.value;

  const addInputElement = document.querySelector('.js-address-input');
  const add = addInputElement.value;

  const roomInputElement = document.querySelector('.js-room-input');
  const room = roomInputElement.value;

  patientList.push({
    name: name,
    bday: bday,
    add: add,
    room: room
  });

  inputElement.value = '';

  renderPatientList();
}

const modal = document.getElementById('patient-form');


window.onclick = function(event) {
if (event.target == modal) {
  modal.style.display = "none";
}
}

