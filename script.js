// Clase TravelPackage para representar paquetes turísticos
class TravelPackage {
  constructor(id, destination, date, price, availability) {
    this.id = id;
    this.destination = destination;
    this.date = date;
    this.price = price;
    this.availability = availability;
  }

  // Método para mostrar detalles del paquete turístico
  displayPackage() {
    return `
      <h3>${this.destination}</h3>
      <p>Fecha: ${this.date}</p>
      <p>Precio: $${this.price.toLocaleString()} CLP</p>
      <p>Disponibilidad: ${this.availability}</p>
    `;
  }
}

// Instanciación de objetos TravelPackage
const package1 = new TravelPackage(1, 'París', '2024-07-15', 800000, 'Disponible');
const package2 = new TravelPackage(2, 'Nueva York', '2024-08-20', 960000, 'Disponible');
const package3 = new TravelPackage(3, 'Tokio', '2024-09-10', 1200000, 'Agotado');

// Lista de paquetes turísticos
const travelPackages = [package1, package2, package3];

// Función para buscar paquetes turísticos
function search() {
  const destination = document.getElementById('destination').value.toLowerCase();
  const travelDate = document.getElementById('travel-date').value;

  const resultsContainer = document.getElementById('results-container');
  resultsContainer.innerHTML = '';

  const filteredPackages = travelPackages.filter(pkg => {
    return (pkg.destination.toLowerCase().includes(destination) && (!travelDate || pkg.date === travelDate));
  });

  if (filteredPackages.length === 0) {
    resultsContainer.innerHTML = '<p>No se encontraron resultados</p>';
  } else {
    filteredPackages.forEach(pkg => {
      const pkgElement = document.createElement('div');
      pkgElement.className = 'package';
      pkgElement.innerHTML = pkg.displayPackage();
      resultsContainer.appendChild(pkgElement);
    });
  }
}

// Función para mostrar notificaciones
function showNotification(message) {
  const notifications = document.getElementById('notifications');
  const notification = document.createElement('div');
  notification.className = 'notification';
  notification.innerText = message;
  notifications.appendChild(notification);

  setTimeout(() => {
    notifications.removeChild(notification);
  }, 5000);
}

// Ejemplo de notificaciones en tiempo real
setInterval(() => {
  const randomPackage = travelPackages[Math.floor(Math.random() * travelPackages.length)];
  showNotification(`¡Oferta especial! Viaje a ${randomPackage.destination} por solo $${randomPackage.price.toLocaleString()} CLP.`);
}, 10000);

// Modificación de disponibilidad para simular actualizaciones en tiempo real
setInterval(() => {
  travelPackages.forEach(pkg => {
    if (Math.random() > 0.5) {
      pkg.availability = pkg.availability === 'Disponible' ? 'Agotado' : 'Disponible';
    }
  });
  search();
}, 15000);
function validarFormulario() {
  let nombreHotel = document.getElementById('nombreHotel').value.trim();
  let ciudad = document.getElementById('ciudad').value.trim();
  let pais = document.getElementById('pais').value.trim();
  let fechaViaje = document.getElementById('fechaViaje').value.trim();
  let duracionViaje = document.getElementById('duracionViaje').value.trim();

  if (nombreHotel === '' || ciudad === '' || pais === '' || fechaViaje === '' || duracionViaje === '') {
      alert('Por favor, complete todos los campos.');
      return false;
  }

  let duracionViajeInt = parseInt(duracionViaje);
  if (isNaN(duracionViajeInt) || duracionViajeInt <= 0) {
      alert('La duración del viaje debe ser un número positivo.');
      return false;
  }

  let fechaRegex = /^\d{4}-\d{2}-\d{2}$/;
  if (!fechaRegex.test(fechaViaje)) {
      alert('La fecha de viaje debe estar en el formato YYYY-MM-DD.');
      return false;
  }

  return true;
}

function validateHotelForm() {
  let nombre = document.forms["hotelForm"]["nombre"].value;
  let ubicacion = document.forms["hotelForm"]["ubicacion"].value;
  if (nombre == "" || ubicacion == "") {
      alert("Nombre y ubicación son obligatorios.");
      return false;
  }
  return true;
}

function validateFlightForm() {
  let origen = document.forms["vueloForm"]["origen"].value;
  let destino = document.forms["vueloForm"]["destino"].value;
  if (origen == "" || destino == "") {
      alert("Origen y destino son obligatorios.");
      return false;
  }
  return true;
}