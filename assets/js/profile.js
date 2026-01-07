document.addEventListener('DOMContentLoaded', () => {
    const userName = document.getElementById('user-name');
    const userClassSection = document.getElementById('user-class-section');
    const displayName = document.getElementById('display-name');
    const displayClassSection = document.getElementById('display-class-section');
    const displayEmail = document.getElementById('display-email');
    const displayLanguage = document.getElementById('display-language');
    const displayXp = document.getElementById('display-xp');
    const displayLevel = document.getElementById('display-level');
    const editProfileBtn = document.getElementById('edit-profile-btn');
    const editForm = document.getElementById('edit-form');
    const saveChangesBtn = document.getElementById('save-changes-btn');
    const cancelEditBtn = document.getElementById('cancel-edit-btn');
    const editName = document.getElementById('edit-name');
    const editEmail = document.getElementById('edit-email');
    const editClassSection = document.getElementById('edit-class-section');
    const editLanguage = document.getElementById('edit-language');

    // Load user data from localStorage
    let userData = JSON.parse(localStorage.getItem('user')) || {
        name: 'QuestMaster',
        email: 'questmaster@example.com',
        classSection: '7th | B',
        language: 'English',
        xp: 3200,
        level: 20
    };

    function updateDisplay() {
        userName.textContent = userData.name;
        userClassSection.textContent = userData.classSection;
        displayName.textContent = userData.name;
        displayClassSection.textContent = userData.classSection;
        displayEmail.textContent = userData.email;
        displayLanguage.textContent = userData.language;
        displayXp.textContent = userData.xp;
        displayLevel.textContent = userData.level;
    }

    updateDisplay();

    // Edit profile functionality
    editProfileBtn.addEventListener('click', () => {
        editName.value = userData.name;
        editEmail.value = userData.email;
        editClassSection.value = userData.classSection;
        editLanguage.value = userData.language;
        editForm.style.display = 'block';
        editProfileBtn.style.display = 'none';
    });

    cancelEditBtn.addEventListener('click', () => {
        editForm.style.display = 'none';
        editProfileBtn.style.display = 'block';
    });

    saveChangesBtn.addEventListener('click', () => {
        userData.name = editName.value.trim();
        userData.email = editEmail.value.trim();
        userData.classSection = editClassSection.value.trim();
        userData.language = editLanguage.value;
        localStorage.setItem('user', JSON.stringify(userData));
        updateDisplay();
        editForm.style.display = 'none';
        editProfileBtn.style.display = 'block';
    });
});