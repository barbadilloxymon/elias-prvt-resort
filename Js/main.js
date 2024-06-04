// Search Function 
let searchBtn = document.querySelector('#search-btn');
let searchBar = document.querySelector('.search-bar-container');

window.scroll = () => {
    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
}

searchBtn.addEventListener('click', () => {
    searchBtn.classList.toggle('fa-times');
    searchBar.classList.toggle('active');
});

// Select menu button and navbar
let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

// Function to close the menu
function closeMenu() {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}

// Toggle menu when menu button is clicked
if (menu && navbar) { // Check if menu and navbar exist
    menu.onclick = () => {
        menu.classList.toggle('fa-times');
        navbar.classList.toggle('active');
    };
}

// Close menu when any item in the menu is clicked
let menuItems = document.querySelectorAll('.header .navbar a');
menuItems.forEach(item => {
    item.addEventListener('click', () => {
        closeMenu();
    });
});

// Your Swiper initialization code for home-slider, room-slider, and gallery-slider
var swiperHome = new Swiper(".home-slider", {
    grabCursor: true,
    loop: true,
    centeredSlides: true,
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var swiperRoom = new Swiper(".room-slider", {
    spaceBetween: 20,
    grabCursor: true,
    loop: true,
    centeredSlides: false,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        991: {
            slidesPerView: 3,
        },
    },
});

var swiperGallery = new Swiper(".gallery-slider", {
    spaceBetween: 10,
    grabCursor: true,
    loop: true,
    centeredSlides: false,
    // autoplay: {
    //     delay: 2000,
    //     disableOnInteraction: false,
    // },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        991: {
            slidesPerView: 3,
        },
    },
});

// Assuming `.box` elements are within `.content` divs which are part of your accordion setup
let accordions = document.querySelectorAll('.faqs .row .content .box');

accordions.forEach(acco => {
    acco.onclick = () => {
        // This will remove 'active' class from all accordion items before adding it to the clicked one
        accordions.forEach(subAcco => {
            subAcco.classList.remove('active');
        });
        acco.classList.add('active');
    };
});

// Add click event listener to navigation buttons
const navButtons = document.querySelectorAll('.navButton');
navButtons.forEach(button => {
    button.addEventListener('click', () => {
        // Remove active class from all navigation buttons
        navButtons.forEach(btn => btn.classList.remove('active'));
        // Add active class to the clicked button
        button.classList.add('active');
    });
});

// Function to handle search action
function handleSearch() {
    var query = document.getElementById('search-bar').value.toLowerCase();

    var sections = {
        'home': '#home',
        'about': '#about',
        'room': '#room',
        'gallery': '#gallery',
        'amenities': '#amenities',
        'faqs': '#faqs',
        'contact': '#contactUs',
    };

    if (sections[query]) {
        document.querySelector(sections[query]).scrollIntoView({ behavior: 'smooth' });
    } else {
        alert('Section not found. Please try searching for: home, about, room, gallery, amenities, faqs, or contact.');
    }
}

// Event listener for form submission
document.getElementById('searchForm').addEventListener('submit', function(e) {
    e.preventDefault();
    handleSearch();
});

// Event listener for search icon click
document.getElementById('search-icon').addEventListener('click', function() {
    handleSearch();
});


document.getElementById('notification-btn').addEventListener('click', function() {
    var popup = document.getElementById('notificationPopup');
    if (popup.style.display === 'none') {
        popup.style.display = 'block';
    } else {
        popup.style.display = 'none';
    }
});



document.getElementById('notification-btn').addEventListener('click', function() {
    var popup = document.getElementById('notificationPopup');
    if (popup.style.display === 'none') {
        popup.style.display = 'block';
    } else {
        popup.style.display = 'none';
    }
});

// Periodically check for new notifications
setInterval(function() {
    fetch('fetch_notifications.php')
        .then(response => response.json())
        .then(data => {
            const popup = document.getElementById('notificationPopup');
            popup.innerHTML = ''; // Clear current notifications
            data.forEach(notification => {
                const p = document.createElement('p');
                p.textContent = notification.message;
                popup.appendChild(p);
            });
        });
}, 5000);


document.getElementById('notification-btn').addEventListener('click', function() {
    var popup = document.getElementById('notificationPopup');
    popup.style.display = popup.style.display === 'none' ? 'block' : 'none';
});


// Assuming you have an endpoint to fetch the latest unread notification
// Replace 'fetchLatestNotification.php' with your actual endpoint
fetch('fetchLatestNotification.php')
  .then(response => response.json())
  .then(data => {
    // Assuming 'notificationPopup' is the container for notifications
    const notificationPopup = document.getElementById('notificationPopup');
    const notificationMessage = document.createElement('p');
    notificationMessage.textContent = data.message;
    notificationPopup.appendChild(notificationMessage);
    // Update any UI to indicate the presence of a new notification
  })
  .catch(error => {
    console.error('Error fetching latest notification:', error);
  });