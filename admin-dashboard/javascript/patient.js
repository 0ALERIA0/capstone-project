const modal = document.getElementById('modal-wrapper');
const addButton = document.getElementById('add-record');
const closeX = document.getElementsByClassName('close')[0];
const cancelButton = document.getElementById('cancel-button');
const addRecordsButton = document.getElementById('add-button')

addButton.onclick = function() {
    modal.style.display = 'block';
}

closeX.onclick = function() {
    modal.style.display = 'none';
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

cancelButton.onclick = function() {
    modal.style.display = 'none';
}

addRecordsButton.onclick = function() {
    addRecord();
    displayRecord();
    modal.style.display = 'none';
}


//script for displaying records
let patientRecord = JSON.parse(localStorage.getItem('patientRecord')) ||

[{
    fname: 'Darrelle',
    lname: 'Talisic',
    mname: 'Bandong',
    gender: 'Male',
    phoneNumber: '0912345678',
    birthDate: '09/19/2000',
    patientAge: '23',
    maritalStatus: 'Single',
    staddress: 'Basil st.',
    bgaddress: 'Langkaan 2',
    munaddress: 'Dasmarinas',
    caddress: 'Cavite',
    countryAddress: 'Philippines',
    zipcode: '4114'
}]

let firstNameInput = document.getElementById('first-name');
let lastNameInput = document.getElementById('last-name');
let middleNameInput = document.getElementById('middle-name');


let phoneNumberInput = document.getElementById('input-number');
let birthdayInput = document.getElementById('input-birthday');
let ageInput = document.getElementById('age');

let streetInput = document.getElementById('street-add');
let barangayInput = document.getElementById('barangay');
let municipalityInput = document.getElementById('municipality');
let cityInput = document.getElementById('city');
let countryInput = document.getElementById('country');
let zipcodeInput = document.getElementById('zip-code');

// code to get gender value
let genderInput = document.getElementById('gender');

// code to get marital status value
let maritalStatusInput = document.getElementById('marital-status');

// funtion to add records
function addRecord() {
    let fname = firstNameInput.value;
    let lname = lastNameInput.value;
    let mname = middleNameInput.value;
    let gender = genderInput.value;
    let phoneNumber = phoneNumberInput.value;
    let birthDate = birthdayInput.value;
    let patientAge = ageInput.value;
    let maritalStatus = maritalStatusInput.value;
    let staddress = streetInput.value;
    let bgaddress = barangayInput.value;
    let munaddress = municipalityInput.value;
    let caddress = cityInput.value;
    let countryAddress = countryInput.value;
    let zipcode = zipcodeInput.value;

    if (fname && lname && mname && gender && phoneNumber && birthDate && patientAge && maritalStatus && zipcode) {

        patientRecord.push({
            fname: fname,
            lname: lname,
            mname: mname,
            gender: gender,
            phoneNumber: phoneNumber,
            birthDate: birthDate,
            patientAge: patientAge,
            maritalStatus: maritalStatus,
            staddress: staddress,
            bgaddress: bgaddress,
            munaddress: munaddress,
            caddress: caddress,
            countryAddress: countryAddress,
            zipcode: zipcode
        })

        localStorage.setItem('patientRecord', JSON.stringify(patientRecord));
    }
    
    displayRecord()
    renderPagination(patientRecord);
}




//function to display records
function displayRecord() {
    const startIndex = (currentPage - 1) * itemPerPage;
    const endIndex = startIndex + itemPerPage;
    const paginatedData = patientRecord.slice(startIndex, endIndex)
    recordListHTML = "";

    paginatedData.forEach((records) => {
        recordListHTML += `
        <tr class="content-line" >
            <td class="name-record">${records.lname},${records.fname} ${records.mname}</td>
            <td class="sex-record">${records.gender}</td>
            <td class="lastModified-record"></td>
            <td class="edit-delete"><button id="open-modal" class="ri-eye-fill modal-click"><button class="ri-edit-box-fill edit"></button><button class="ri-delete-bin-4-fill delete"></button></button></td>
        </tr>
        `;
    })

    document.querySelector('.content-grid').innerHTML = recordListHTML;

    const modalRecord = document.getElementById('modal-record')
    const closeModal = document.getElementById('close-record-modal');

document.querySelectorAll('.modal-click')
  .forEach((modalOpen, index) => {
    modalOpen.addEventListener('click', () => {
        modalRecord.style.display = 'block';
    })
  });

closeModal.onclick = function() {
    modalRecord.style.display = 'none';
}

renderPagination(patientRecord);
}

//script for pagination

const table = document.getElementById('patient-table');
const pagination = document.getElementById('pagination');

const itemPerPage = 10;
let currentPage = 1;

// Function to render pagination buttons
function renderPagination(patientRecord) {
    const totalPages = Math.ceil(patientRecord.length / itemPerPage);
  
    let buttons = '';
    for (let i = 1; i <= totalPages; i++) {
      buttons += `<button onclick="goToPage(${i})" class="pagination-buttons">${i}</button>`;
    }
  
    pagination.innerHTML = buttons;
  }
  
  // Function to navigate to a specific page
  function goToPage(page) {
    currentPage = page;
    displayRecord()
  }
  
  // Function to navigate to the previous page
  function prevPage() {
    if (currentPage > 1) {
      currentPage--;
      displayRecord()
    }
  }
  
  // Function to navigate to the next page
  function nextPage() {
    const totalPages = Math.ceil(patientRecord.length / itemPerPage);
    if (currentPage < totalPages) {
      currentPage++;
      displayRecord();
    }
  }
renderPagination(patientRecord);

displayRecord();