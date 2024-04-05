  import { dataOverview } from "./data/overview-data.js";
  import { doctors } from "./data/doctors-data.js";

  let OverviewContentHTML = '';

 

  dataOverview.forEach((data) => {
    OverviewContentHTML += `
    
          <div class="card ${data.typeOfCard}">
              <div class="card--data">
                  <div class="card--content">
                      <h5 class="card--title">${data.title}</h5>
                      <h1>${data.count}</h1>
                  </div>
                  <i class="${data.icon}"></i>
              </div>
              
          </div>
                    
  `;
  });

  document.querySelector('.js-cards').innerHTML = OverviewContentHTML;
  
  
  console.log(OverviewContentHTML);

document.getElementById('date').addEventListener('change' , function() {
  const filter = this.value;
  const items = document.querySelectorAll('.doctor--card');

  items.forEach(function(item) {
    if (filter === 'all' || item.classList.contains(filter)) {
      item.style.display = 'block';
    } else {
      item.style.display = 'none';
    }
  });
});

let doctorData = '';

doctors.forEach((doctor) => {
  doctorData += `
    <div class="doctor--card ${doctor.status}">
        <div class="img--box--cover">
            <div class="img--box">
                <img src="images/picture-${doctor.image}.jpg" alt="">
            </div>
        </div>
        <p>${doctor.status}</p>
        </div>
  `
});

document.querySelector('.doctors--cards').innerHTML = doctorData;