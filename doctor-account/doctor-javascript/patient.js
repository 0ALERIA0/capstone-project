const modal = document.getElementById('modal-wrapper');
const addButton = document.getElementById('add-record');
const closeX = document.getElementsByClassName('close')[0];
const cancelButton = document.getElementById('cancel-button');
const addRecordsButton = document.getElementById('add-button')
const searchInput = document.getElementById('searchbar-record');

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
    firstNameInput.value = "";
    lastNameInput.value = "";
    middleNameInput.value = "";
    genderInput.value = "";
    phoneNumberInput.value = "";
    birthdayInput.value = "";
    ageInput.value = "";
    maritalStatusInput.value = "";
    streetInput.value = "";
    barangayInput.value = "";
    municipalityInput.value = "";
    cityInput.value = "";
    countryInput.value = "";
    zipcodeInput.value = "";
}

addRecordsButton.onclick = function() {
    addRecord();
    displayRecord();
    modal.style.display = 'none';
    firstNameInput.value = "";
    lastNameInput.value = "";
    middleNameInput.value = "";
    genderInput.value = "";
    phoneNumberInput.value = "";
    birthdayInput.value = "";
    ageInput.value = "";
    maritalStatusInput.value = "";
    streetInput.value = "";
    barangayInput.value = "";
    municipalityInput.value = "";
    cityInput.value = "";
    countryInput.value = "";
    zipcodeInput.value = "";
}


document.getElementById('searchbar-record').addEventListener('input', function() {
  const searchTerm = this.value.trim().toLowerCase();
  const rows = document.querySelectorAll('#patient-table tbody tr');

  let showPaginationLink = false;

  // Iterate over each row and check if it matches the search term
  rows.forEach(function(row) {
      const name = row.querySelector('.name-record').textContent.toLowerCase();
      if (name.includes(searchTerm)) {
          row.style.display = 'table-row';
          showPaginationLink = true;
      } else {
          row.style.display = 'none';
      }
  });

  // Show/hide pagination links based on search results
  const paginationLinks = document.querySelectorAll('.pagination-buttons');
  paginationLinks.forEach(function(link) {
      if (showPaginationLink) {
          link.style.display = 'inline-block';
      } else {
          link.style.display = 'none';
      }
  });
});
