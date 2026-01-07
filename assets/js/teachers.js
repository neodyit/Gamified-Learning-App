// assets/js/teachers.js
// Additional JS specific to teacher's dashboard, extending script.js

// Load user data from localStorage (adapted for teacher)
function loadUserData() {
    const userData = JSON.parse(localStorage.getItem('user')) || {};
    const userNameElement = document.getElementById('user-name');
    const userSubjectDeptElement = document.getElementById('user-subject-dept');
    const welcomeUserNameElement = document.getElementById('welcome-user-name');

    // Set default values if user data is not available (teacher-specific)
    const userName = userData.name || 'EducatorPrime';
    const userSubject = userData.subject || 'Math';
    const userDept = userData.dept || 'High School';

    // Update DOM elements only if they exist
    if (userNameElement) userNameElement.textContent = userName;
    if (userSubjectDeptElement) userSubjectDeptElement.textContent = `${userSubject} | ${userDept}`;
    if (welcomeUserNameElement) welcomeUserNameElement.textContent = `Welcome back, ${userName}!`;
}

// Call loadUserData when the page loads (override or extend from script.js if needed)
document.addEventListener('DOMContentLoaded', loadUserData);

// The rest of the functionality (theme toggle, sidebar, etc.) is inherited from script.js