<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N-Learn Odyssey - Leaderboard</title>
    <link rel="shortcut icon" href="assets/images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="preload" href="assets/images/profile.jpg" as="image">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/leaderboard.css">
    <style>
        .mission-progress {
    height: 8px;
    background: rgba(0,0,0,0.05);
    border-radius: 5px;
    margin-bottom: 0.8rem;
    overflow: hidden;
}

.progress-bar {
    height: 100%;
    border-radius: 5px;
    transition: width 0.5s ease;
}

    </style>
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
                <li class="nav-item"><a href="leaderboard.php" class="active"><i class="fas fa-trophy"></i> Leaderboard</a></li>
                <li class="nav-item"><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
                <li class="nav-item"><a href="chatbot.php"><i class="fas fa-robot"></i> Chatbot</a></li>
                <li class="nav-item"><a href="#" id="theme-toggle-mobile" aria-label="Mode"><i class="fas fa-moon"></i>
                        Mode</a></li>
                <li class="nav-item"><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
            <div class="user-profile">
                <img src="assets/images/profile.jpg" alt="Profile" class="profile-img">
                <div class="user-details">
                    <h3 id="user-name">QuestMaster</h3>
                    <p class="muted" id="user-class-section">Class 7th | A</p>
                </div>
            </div>
            <div style="display: flex; justify-content: space-around; margin-top: 1rem;">
                <span><i class="fas fa-star" style="color: var(--secondary);"></i> Lvl 20</span>
                <span><i class="fas fa-coins" style="color: var(--primary);"></i> 3,200 XP</span>
            </div>
        </nav>

        <main class="main-content">
            <div class="welcome">
                <h2>Leaderboard</h2>
                <p class="muted">See how you rank among the top learners!</p>
            </div>

            <div class="card">
                <div class="leaderboard-controls">
                    <select id="sort-by" class="sort-select">
                        <option value="xp-desc">XP (High to Low)</option>
                        <option value="xp-asc">XP (Low to High)</option>
                        <option value="name-asc">Name (A-Z)</option>
                    </select>
                    <div class="pagination">
                        <button id="prev-page" class="pagination-btn" disabled><i class="fas fa-chevron-left"></i></button>
                        <span id="page-info">Page 1 of 1</span>
                        <button id="next-page" class="pagination-btn"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
                <div class="leaderboard-table" id="leaderboard-table">
                    <!-- Table will be dynamically inserted here -->
                </div>
            </div>
        </main>

        <aside class="sidebar-right missions">
    <h2 class="missions-title"><i class="fas fa-trophy"></i> Your Stats</h2>

    <!-- Rank -->
    <div class="mission-section">
        <h3 class="mission-subtitle"><i class="fas fa-medal"></i> Rank</h3>
        <div class="mission-progress">
            <div class="progress-bar" style="width: 75%; background: var(--primary);"></div>
        </div>
        <ul class="mission-list">
            <li>
                <span class="mission-label">Current Rank</span>
                <span id="user-rank" class="mission-count">5</span>
            </li>
        </ul>
    </div>

    <!-- XP -->
    <div class="mission-section">
        <h3 class="mission-subtitle"><i class="fas fa-coins"></i> XP</h3>
        <div class="mission-progress">
            <div class="progress-bar" style="width: 65%; background: #3b82f6;"></div>
        </div>
        <ul class="mission-list">
            <li>
                <span class="mission-label">Current XP</span>
                <span id="user-xp" class="mission-count">3,200</span>
            </li>
            <li>
                <span class="mission-label">Next Level</span>
                <span class="mission-count">3,500 XP</span>
            </li>
        </ul>
    </div>

    <!-- Level -->
    <div class="mission-section">
        <h3 class="mission-subtitle"><i class="fas fa-star"></i> Level</h3>
        <ul class="mission-list">
            <li>
                <span class="mission-label">Current Level</span>
                <span id="user-level" class="mission-count">20</span>
            </li>
        </ul>
    </div>

    <!-- Leaderboard Tips -->
    <div class="mission-section">
        <h3 class="mission-subtitle"><i class="fas fa-lightbulb"></i> Tips</h3>
        <ul class="mission-tips">
            <li>🏆 Complete quizzes to earn XP</li>
            <li>⭐ Level up with consistent learning</li>
            <li>📈 Check back daily for updated ranks</li>
        </ul>
    </div>
</aside>

    </div>

    <script src="assets/js/script.js?v=1.4"></script>
    <script src="assets/js/leaderboard.js"></script>
</body>
</html>