document.getElementById('filter-employee').addEventListener('change', function() {
  const filter = this.value;
  const items = document.querySelectorAll('.card-wrapper');

  items.forEach(function(item) {
      const employeeType = item.querySelector('.card-middle p:nth-child(3)').textContent.trim().toLowerCase();

      if (filter === 'all' || employeeType === filter) {
          item.style.display = 'block';
      } else {
          item.style.display = 'none';
      }
  });
});

document.getElementById('filter-status').addEventListener('change', function() {
  const filterStatus = this.value.toLowerCase();
  const items = document.querySelectorAll('.card-wrapper');

  items.forEach(function(item) {
      const status = item.querySelector('.card-top .active-status') ? 'active' : 'inactive';

      if (filterStatus === 'all' || status === filterStatus) {
          item.style.display = 'block';
      } else {
          item.style.display = 'none';
      }
  });
});

document.getElementById('search').addEventListener('input', function() {
  const searchTerm = this.value.trim().toLowerCase();
  const items = document.querySelectorAll('.card-wrapper');

  items.forEach(function(item) {
      const employeeName = item.querySelector('.card-middle p:nth-child(2)').textContent.toLowerCase();

      if (employeeName.includes(searchTerm)) {
          item.style.display = 'block';
      } else {
          item.style.display = 'none';
      }
  });
});


// Function to initialize checkbox event listeners
function initializeCheckboxListeners() {
  const checkboxes = document.querySelectorAll('.card-wrapper input[type="checkbox"]');
  checkboxes.forEach(function(checkbox) {
      checkbox.addEventListener('change', function() {
          updateCounter();
      });
  });
}

// Function to update the counter based on checked checkboxes
function updateCounter() {
  const checkedCheckboxes = document.querySelectorAll('.card-wrapper input[type="checkbox"]:checked');
  const counter = document.getElementById('counter');
  counter.textContent = checkedCheckboxes.length;
}

// Function to initialize the page
function initializePage() {
  initializeCheckboxListeners();
}

// Call the initializePage function when the page is loaded
window.addEventListener('DOMContentLoaded', initializePage);
