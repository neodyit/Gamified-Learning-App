<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N-Learn Odyssey - Profile</title>
    <link rel="shortcut icon" href="assets/images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="preload" href="assets/images/profile.jpg" as="image">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/profile.css">
</head>

<body>
    <header>
        <div class="logo">
            <i class="fas fa-rocket"></i>
            N-Learn
        </div>
        <div>
            <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation"><i
                    class="fas fa-bars"></i></button>
        </div>
    </header>

    <div class="overlay" id="overlay"></div>

    <div class="container">
        <nav id="sidebar">
            <ul class="nav-list">
                <li class="nav-item"><a href="index.php"><i class="fas fa-home"></i> Dashboard</a></li>
                <li class="nav-item"><a href="courses.php"><i class="fas fa-book"></i> Courses</a></li>
                <li class="nav-item"><a href="assignments.php"><i class="fas fa-tasks"></i> Assignments</a></li>
                <li class="nav-item"><a href="quizzes.php"><i class="fas fa-brain"></i> Quizzes</a></li>
                <li class="nav-item"><a href="leaderboard.php"><i class="fas fa-trophy"></i> Leaderboard</a></li>
                <li class="nav-item"><a href="profile.php" class="active"><i class="fas fa-user"></i> Profile</a></li>
                <li class="nav-item"><a href="chatbot.php"><i class="fas fa-robot"></i> Chatbot</a></li>
                <li class="nav-item"><a href="#" id="theme-toggle-mobile" aria-label="Mode"><i class="fas fa-moon"></i>
                        Mode</a></li>
                <li class="nav-item"><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
            <div class="user-profile">
                <img src="assets/images/profile.jpg" alt="Profile" class="profile-img">
                <div class="user-details">
                    <h3 id="user-name">QuestMaster</h3>
                    <p class="muted" id="user-class-section">Class 7th | B</p>
                </div>
            </div>
            <div style="display: flex; justify-content: space-around; margin-top: 1rem;">
                <span><i class="fas fa-star" style="color: var(--secondary);"></i> Lvl 20</span>
                <span><i class="fas fa-coins" style="color: var(--primary);"></i> 3,200 XP</span>
            </div>
        </nav>

        <main class="main-content">
            <div class="welcome">
                <h2>My Profile</h2>
                <!-- <p class="muted">Manage your personal details and progress</p> -->
            </div>

            <div class="card">
                <div class="profile-header">
                    <img src="assets/images/profile.jpg" alt="Profile Picture" class="profile-pic">
                    <div class="profile-stats">
                        <h3 id="display-name">QuestMaster</h3>
                        <p class="muted" id="display-class-section">Class 7th | B</p>
                        <button class="action-btn" id="edit-profile-btn">Edit Profile</button>
                    </div>
                </div>
                <div class="profile-details" id="profile-details">
                    <div class="detail-item">
                        <label>Email:</label>
                        <span id="display-email">questmaster@example.com</span>
                    </div>
                    <div class="detail-item">
                        <label>Language:</label>
                        <span id="display-language">English</span>
                    </div>
                    <div class="detail-item">
                        <label>XP:</label>
                        <span id="display-xp">3,200</span>
                    </div>
                    <div class="detail-item">
                        <label>Level:</label>
                        <span id="display-level">20</span>
                    </div>
                </div>
                <div class="edit-form" id="edit-form" style="display: none;">
                    <div class="form-group">
                        <label for="edit-name">Name:</label>
                        <input type="text" id="edit-name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="edit-email">Email:</label>
                        <input type="email" id="edit-email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="edit-class-section">Class & Section:</label>
                        <input type="text" id="edit-class-section" autocomplete="off" placeholder="e.g., 7th | B">
                    </div>
                    <div class="form-group">
                        <label for="edit-language">Language:</label>
                        <select id="edit-language" autocomplete="off">
                            <option value="English">English</option>
                            <option value="Hindi">Hindi</option>
                            <option value="Punjabi">Punjabi</option>
                        </select>
                    </div>
                    <button class="action-btn" id="save-changes-btn">Save Changes</button>
                    <button class="action-btn secondary" id="cancel-edit-btn">Cancel</button>
                </div>
            </div>
        </main>

        <aside class="sidebar-right missions">
            <h2 class="missions-title"><i class="fas fa-bolt"></i> Quick Actions</h2>
            <ul class="mission-list">
                <li><a href="quizzes.php"><i class="fas fa-brain"></i> Take a Quiz</a></li>
                <li><a href="courses.php"><i class="fas fa-book"></i> Courses</a></li>
                <li><a href="leaderboard.php"><i class="fas fa-trophy"></i> Leaderboard</a></li>
            </ul>

            <h2 class="missions-title"><i class="fas fa-lightbulb"></i> Tips</h2>
            <ul class="mission-tips">
                <li>📝 Update your details</li>
                <li>🔒 Keep your email secure</li>
                <li>🌐 Adjust language settings</li>
            </ul>
        </aside>

    </div>

    <script src="assets/js/script.js?v=1.4"></script>
    <script src="assets/js/profile.js"></script>
</body>

</html>