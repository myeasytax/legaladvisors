// app.js - JavaScript for Legal Advisors

// Toggle Dropdown for User Profile
const profileMenu = document.querySelector('.profile-menu');
const dropdown = document.querySelector('.dropdown');

if (profileMenu) {
    profileMenu.addEventListener('mouseover', () => {
        dropdown.style.display = 'block';
    });

    profileMenu.addEventListener('mouseout', () => {
        dropdown.style.display = 'none';
    });
}

// Search Bar Functionality
const searchBar = document.querySelector('.search-bar');
const searchInput = document.querySelector('.search-bar input');
const searchButton = document.querySelector('.search-bar button');

if (searchButton) {
    searchButton.addEventListener('click', () => {
        const query = searchInput.value.trim();
        if (query) {
            window.location.href = `/search?query=${encodeURIComponent(query)}`;
        } else {
            alert('Please enter a search term.');
        }
    });
}

// Smooth Scroll for Navigation Links
const navLinks = document.querySelectorAll('nav a');

navLinks.forEach(link => {
    link.addEventListener('click', (event) => {
        event.preventDefault();
        const targetId = link.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop,
                behavior: 'smooth',
            });
        }
    });
});

// Responsive Navbar Toggle
const navbarToggle = document.querySelector('.navbar-toggle');
const navMenu = document.querySelector('nav');

if (navbarToggle) {
    navbarToggle.addEventListener('click', () => {
        navMenu.classList.toggle('active');
    });
}

// Footer Social Icons Hover Effect
const socialIcons = document.querySelectorAll('.social-icons img');

socialIcons.forEach(icon => {
    icon.addEventListener('mouseover', () => {
        icon.style.transform = 'scale(1.1)';
    });

    icon.addEventListener('mouseout', () => {
        icon.style.transform = 'scale(1)';
    });
});
