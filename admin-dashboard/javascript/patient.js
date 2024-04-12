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

let modified = new Date(document.lastModified);

let patientRecord = [{
    fname: 'darrelle',
    lname: 'talisic',
    mname: 'bandong',
    gender: 'male',
    phoneNumber: '091234567',
    birthDate: '19/09/2000',
    patientAge: '23',
    maritalStatus: 'married',
    staddress: 'valle verde',
    bgaddress: 'langkaan 2',
    munaddress: 'dasmarinas',
    caddress: 'cavite',
    countryAddress: 'phillipines',
    zipcode: '4114'
}, {
    fname: 'Joice',
    lname: 'Baguis',
    mname: 'Mendoza',
    gender: 'female',
    phoneNumber: '091234567',
    birthDate: '22/06/2003',
    patientAge: '20',
    maritalStatus: 'married',
    staddress: 'Putol',
    bgaddress: 'Tibig',
    munaddress: 'Silang',
    caddress: 'cavite',
    countryAddress: 'phillipines',
    zipcode: '4117'
}, {
    fname: 'Girlie',
    lname: 'Bandong',
    mname: 'Niemes',
    gender: 'female',
    phoneNumber: '091234567',
    birthDate: '11/02/1980',
    patientAge: '27',
    maritalStatus: 'married',
    staddress: 'valle verde',
    bgaddress: 'langkaan 2',
    munaddress: 'dasmarinas',
    caddress: 'cavite',
    countryAddress: 'phillipines',
    zipcode: '4114'
},
]

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
    }
    displayRecord()
}

//function to display records
function displayRecord() {
    recordListHTML = "";

    patientRecord.forEach((records) => {
        recordListHTML += `
        <div class="content-line">
            <div class="name-record">${records.lname},${records.fname} ${records.mname}</div>
            <div class="sex-record">${records.gender}</div>
            <div class="lastModified-record">${modified}</div>
            <div class="edit-delete"><button class="ri-edit-box-fill edit"></button><button class="ri-delete-bin-4-fill delete"></button></div>
        </div>
        `;
    })

    document.querySelector('.content-grid').innerHTML = recordListHTML;
}



displayRecord();