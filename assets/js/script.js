const themeToggles = document.querySelectorAll('[id^="theme-toggle"]');
const navToggle = document.getElementById('nav-toggle');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
const body = document.body;


// Check if user is logged in
    const loggedUser = JSON.parse(localStorage.getItem('user'));

    if (!loggedUser || !loggedUser.email) {
        // Not logged in → redirect to login page
        window.location.href = 'login.php';
    } else {
        // Optional: you can also verify role or other details
        console.log(`Welcome ${loggedUser.name}!`);
    }

    
// Theme toggle
themeToggles.forEach(toggle => {
    toggle.addEventListener('click', () => {
        body.dataset.theme = body.dataset.theme === 'dark' ? 'light' : 'dark';
        const icon = body.dataset.theme === 'dark' ? 'sun' : 'moon';
        themeToggles.forEach(t => t.innerHTML = `<i class="fas fa-${icon}"></i> ${body.dataset.theme === 'dark' ? 'Light' : 'Dark'} Mode`);
        localStorage.setItem('theme', body.dataset.theme || 'light');
    });
});

// Initialize theme
const savedTheme = localStorage.getItem('theme') || 'light';
body.dataset.theme = savedTheme;
themeToggles.forEach(t => t.innerHTML = `<i class="fas fa-${savedTheme === 'dark' ? 'sun' : 'moon'}"></i> ${savedTheme === 'dark' ? 'Light' : 'Dark'} Mode`);

// Load user data from localStorage
function loadUserData() {
    const userData = JSON.parse(localStorage.getItem('user')) || {};
    const userNameElement = document.getElementById('user-name');
    const userClassSectionElement = document.getElementById('user-class-section');
    const welcomeUserNameElement = document.getElementById('welcome-user-name');

    // Set default values if user data is not available
    const userName = userData.name || 'Student1';
    const userGrade = userData.grade || '9th';
    const userSection = userData.section || 'c';

    // Update DOM elements only if they exist
    if (userNameElement) userNameElement.textContent = userName;
    if (userClassSectionElement) userClassSectionElement.textContent = `Class ${userGrade} | ${userSection}`;
    if (welcomeUserNameElement) welcomeUserNameElement.textContent = `Welcome back, ${userName}!`;
}

// Call loadUserData when the page loads
document.addEventListener('DOMContentLoaded', loadUserData);

// Sidebar toggle
navToggle.addEventListener('click', () => {
    const isOpen = sidebar.classList.contains('open');
    sidebar.classList.toggle('open', !isOpen);
    overlay.classList.toggle('show', !isOpen);
    navToggle.setAttribute('aria-expanded', !isOpen);
});

overlay.addEventListener('click', () => {
    sidebar.classList.remove('open');
    overlay.classList.remove('show');
    navToggle.setAttribute('aria-expanded', 'false');
});

// Close on escape
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && sidebar.classList.contains('open')) {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
        navToggle.setAttribute('aria-expanded', 'false');
    }
});

// Resize handler
window.addEventListener('resize', () => {
    if (window.innerWidth > 1200) {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
        navToggle.setAttribute('aria-expanded', 'false');
    }
});