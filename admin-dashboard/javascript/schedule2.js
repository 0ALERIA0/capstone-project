// Add an event listener to each date cell in the calendar
document.addEventListener('DOMContentLoaded', function() {
    const dateCells = document.querySelectorAll('.table-calendar tbody td');
    dateCells.forEach(cell => {
        cell.addEventListener('click', function () {
            const date = this.dataset.date;
            const month = this.dataset.month;
            const year = this.dataset.year;
            const specificDate = `${year}-${month}-${date}`; // Construct the specific date
            // Pass the specific date to a function to display only the schedule requests for that date
            displayScheduleRequests(specificDate);
        });
    });
});


// Function to display only the schedule requests for the selected date
function displayScheduleRequests(specificDate) {
    const scheduleCards = document.querySelectorAll('.schedule-cards');
    scheduleCards.forEach(card => {
        const cardDate = card.querySelector('.schedule-date').textContent;
        if (cardDate.trim() === specificDate.trim()) {
            card.style.display = 'block'; // Show schedule request if date matches
        } else {
            card.style.display = 'none'; // Hide schedule request if date does not match
        }
    });
}


const declineModal = document.getElementById('decline-modal');
const declineButton = document.getElementById('decline-button-js');
const closeModal = document.getElementsByClassName('close-modal')[0];

declineButton.onclick = function() {
    declineModal.style.display = 'block';
}

closeModal.onclick = function() {
    declineModal.style.display = 'none';
}


const approveModal = document.getElementById('approve-modal');
const approveButton = document.getElementById('approve-button-js');
const closeApproveModal = document.getElementsByClassName('close-approve-modal')[0];

approveButton.onclick = function() {
    approveModal.style.display = 'block';
}

closeApproveModal.onclick = function() {
    approveModal.style.display = 'none';
}