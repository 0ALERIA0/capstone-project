import { inventoryItems } from "./data/inventory-data.js";


function displayItems() {
   let inventoryListHTML = "";

    inventoryItems.forEach((items) => {
        inventoryListHTML += `
        <tr>
            <td>${items.id}</td>
            <td>${items.itemName}</td>
            <td>${items.category}</td>
            <td>${items.Quantity}</td>
            <td><button>See details</button><button>edit</button><button>delete</button></td>
        </tr>
        `
    })

    document.querySelector('.inventory-content-items').innerHTML = inventoryListHTML;
}
displayItems();