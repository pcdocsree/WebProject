const allLocations = [
  "Coimbatore", "Gandhipuram", "RS Puram", "Peelamedu", "Race Course",
  "Town Hall", "Saibaba Colony", "Ukkadam", "Singanallur", "Vadavalli",
  "Ganapathy", "Kavundampalayam", "Sarumani Nagar", "Sundarapuram",
  "Koundampalayam", "Thudialur", "Kurichi", "Sulur"
];

const locationInput = document.getElementById('location');
const datalist = document.getElementById('locations-list');

locationInput.addEventListener('input', function() {
  datalist.innerHTML = '';
  const inputValue = this.value.trim().toLowerCase();
  if (!inputValue) return;

  const matches = allLocations.filter(loc =>
    loc.toLowerCase().startsWith(inputValue)
  );
  matches.forEach(loc => {
    const option = document.createElement('option');
    option.value = loc;
    datalist.appendChild(option);
  });
});
