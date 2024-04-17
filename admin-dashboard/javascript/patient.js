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
}




//function to display records
function displayRecord() {
    recordListHTML = "";

    patientRecord.forEach((records) => {
        recordListHTML += `
        <a id="open-modal"><div class="content-line" >
            <div class="name-record">${records.lname},${records.fname} ${records.mname}</div>
            <div class="sex-record">${records.gender}</div>
            <div class="lastModified-record"></div>
            <div class="edit-delete"><button class="ri-edit-box-fill edit"></button><button class="ri-delete-bin-4-fill delete"></button></div>
        </div></a>
        `;
    })

    document.querySelector('.content-grid').innerHTML = recordListHTML;

    const modalRecord = document.getElementById('modal-record')
const openModal = document.getElementById('open-modal');
const closeModal = document.getElementById('close-record-modal');

document.querySelectorAll('.content-line')
  .forEach((modalOpen, index) => {
    modalOpen.addEventListener('click', () => {
        modalRecord.style.display = 'block';
    })
  });

closeModal.onclick = function() {
    modalRecord.style.display = 'none';
}

    
}

//script for modal of patient record




displayRecord();


displayRecord();