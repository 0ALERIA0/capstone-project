

// Function to render pagination buttons
function renderPagination(inventoryItems) {
    const totalPages = Math.ceil(inventoryItems.length / itemPerPage);
  
    let buttons = '';
    for (let i = 1; i <= totalPages; i++) {
        buttons += `<button class="pagination-buttons" data-page="${i}">${i}</button>`;
    }
  
    pagination.innerHTML = buttons;
  
    // Attach event listeners to pagination buttons
    document.querySelectorAll('.pagination-buttons').forEach(button => {
        button.addEventListener('click', () => {
            goToPage(parseInt(button.dataset.page));
        });
    });
}
  
  // Function to navigate to a specific page
  function goToPage(page) {
    currentPage = page;
    displayItems();
  }
  
  // Function to navigate to the previous page
  function prevPage() {
    if (currentPage > 1) {
      currentPage--;
      displayItems();
    }
  }
  
  // Function to navigate to the next page
  function nextPage() {
    const totalPages = Math.ceil(inventoryItems.length / itemPerPage);
    if (currentPage < totalPages) {
      currentPage++;
      displayItems();
    }
  }

  
  document.getElementById('previous-page').addEventListener('click', prevPage);
document.getElementById('next-page').addEventListener('click', nextPage);


function searchItems() {
    const searchQuery = searchBar.value.trim().toLowerCase();
    const filteredItems = inventoryItems.filter(item => item.itemName.toLowerCase().includes(searchQuery));
    displayItems(filteredItems);
}

renderPagination(inventoryItems);

displayItems();