import { inventoryItems } from "./data/inventory-data.js";


let itemNameInput = document.getElementById('item-name-input');
let itemCategoryInput = document.getElementById('input-select-category');
let itemQuantityInput = document.getElementById('input-item-quantity');
let itemIdCounter = localStorage.getItem('itemIdCounter');
let itemModal = document.getElementById('register-modal');
const itemTable = document.getElementById('table-item');
const pagination = document.getElementById('pagination');


if (!itemIdCounter) {
    localStorage.setItem('itemIdCounter', 1);
    itemIdCounter = 1;
} else {
    itemIdCounter = parseInt(itemIdCounter);
}

function addItem() {
    let itemName = itemNameInput.value;
    let category = itemCategoryInput.value;
    let Quantity = itemQuantityInput.value;
    
    if (itemName && category && Quantity) {
        // Check if item with the same name already exists
        if (inventoryItems.some(item => item.itemName === itemName)) {
            document.querySelector('.invalid-input').innerHTML = `<p id="already-exists">Item Aready exists!!</p>`
            return; // Stop execution if item already exists
        }

        let ID = itemIdCounter++;
        inventoryItems.push({
            ID: ID,
            itemName: itemName,
            category: category,
            Quantity: Quantity
        });
        localStorage.setItem('inventoryItems', JSON.stringify(inventoryItems));
        localStorage.setItem('itemIdCounter', itemIdCounter);
        displayItems();
        itemNameInput.value = "";
        itemCategoryInput.value = "";
        itemQuantityInput.value = "";
        itemModal.style.display = 'none';
    } else {
        document.querySelector('.invalid-input').innerHTML = `<p id="already-exists">Please Fill in All Fields!!</p>`
    }

    renderPagination(inventoryItems);
}

function displayItems() {
    const startIndex = (currentPage - 1) * itemPerPage;
    const endIndex = startIndex + itemPerPage;
    const paginatedData = inventoryItems.slice(startIndex, endIndex)
    let inventoryListHTML = "";

    paginatedData.forEach((item) => {
        inventoryListHTML += `
            <tr>
                <td>${item.ID}</td>
                <td>${item.itemName}</td>
                <td>${item.category}</td>
                <td>${item.Quantity}</td>
                <td><button>See details</button><button>edit</button><button>delete</button></td>
            </tr>`;
    });

    document.querySelector('.inventory-content-items').innerHTML = inventoryListHTML;
    renderPagination(inventoryItems)
    
}

document.getElementById('confirm-button-item').addEventListener('click', addItem);



//modal javasript
document.getElementById('register-item').addEventListener('click', () => {
    itemModal.style.display = 'block';
    document.querySelector('.invalid-input').innerHTML = ""
})

document.getElementById('cancel-button-item').addEventListener('click', () => {
    itemModal.style.display = 'none';
    itemNameInput.value = "";
    itemCategoryInput.value = "";
    itemQuantityInput.value= "";
    document.querySelector('.invalid-input').innerHTML = "";
})

window.onclick = function(event) {
    if(event.target == itemModal) {
        itemModal.style.display = 'none';
    }
}

const itemPerPage = 20;
let currentPage = 1;

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

renderPagination(inventoryItems);

displayItems();