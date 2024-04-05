document.getElementById('filter-employee').addEventListener('change' , function() {
  const filter = this.value;
  const items = document.querySelectorAll('.employee-card');

  items.forEach(function(item) {
    if (filter === 'all' || item.classList.contains(filter)) {
      item.style.display = 'block';
    } else {
      item.style.display = 'none';
    }
  });
});