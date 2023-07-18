const container = document.querySelector('.container');
const seats = document.querySelectorAll('.row .seat:not(.occupied)');
const count = document.getElementById('count');
const total = document.getElementById('total');
const movieSelect = document.getElementById('movie');
const nameInput = document.getElementById('name');
const membershipCheckbox = document.getElementById('membership');
const payButton = document.getElementById('pay');

populateUI();
let ticketPrice = 45000; // Set the ticket price to 45000

// Save selected movie index and price
function setMovieData(movieIndex, moviePrice) {
  localStorage.setItem('selectedMovieIndex', movieIndex);
  localStorage.setItem('selectedMoviePrice', moviePrice);
}

// Update total and count
function updateSelectedCount() {
  const selectedSeats = document.querySelectorAll('.row .seat.selected');

  const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));

  localStorage.setItem('selectedSeats', JSON.stringify(seatsIndex));

  const selectedSeatsCount = selectedSeats.length;
  count.innerText = selectedSeatsCount;

  let totalPrice = selectedSeatsCount * ticketPrice;

  if (membershipCheckbox.checked) {
    totalPrice *= 0.7; // Apply 30% discount for members
  }

  total.innerText = totalPrice;
}

// Get data from local storage and populate UI
function populateUI() {
  // Rest of the code

  const selectedMovieIndex = localStorage.getItem('selectedMovieIndex');

  if (selectedMovieIndex !== null) {
    movieSelect.selectedIndex = selectedMovieIndex;
  }
}

// Movie select event
movieSelect.addEventListener('change', (e) => {
  ticketPrice = 45000; // Set the ticket price to 45000
  setMovieData(e.target.selectedIndex, e.target.value);
  updateSelectedCount();
});

// Seat click event
container.addEventListener('click', (e) => {
  
movieSelect.addEventListener('change', (e) => {
  ticketPrice = 45000; // Set the ticket price to 45000
  setMovieData(e.target.selectedIndex, e.target.value);
  updateSelectedCount();
});

// Seat click event
container.addEventListener('click', (e) => {
  if (e.target.classList.contains('seat') && !e.target.classList.contains('occupied')) {
    e.target.classList.toggle('selected');

    updateSelectedCount();
  }
});
// Rest of the code

  updateSelectedCount();
});

// Pay button click event
payButton.addEventListener('click', () => {
  const name = nameInput.value;
  const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'));
  const selectedMovie = movieSelect.options[movieSelect.selectedIndex].text;
  const totalPrice = total.innerText;
  const isMember = membershipCheckbox.checked ? 'Yes' : 'No';

  const orderData = `Name: ${name}\nMovie: ${selectedMovie}\nTotal Price: ${totalPrice}\nMember: ${isMember}`;

  saveToFile(orderData);
});

// Save order data to a .txt file
function saveToFile(data) {
  const element = document.createElement('a');
  const file = new Blob([data], { type: 'text/plain' });
  element.href = URL.createObjectURL(file);
  element.download = 'order.txt';
  element.click();
}
// initial count and total
updateSelectedCount();
