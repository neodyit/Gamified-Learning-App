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

        <aside class="sidebar-right">
            <h2>Your Stats</h2>
            <ul style="list-style: none; font-size: 0.9rem; color: var(--muted);">
                <li style="margin-bottom: 0.5rem;"><strong>Rank:</strong> <span id="user-rank">N/A</span></li>
                <li style="margin-bottom: 0.5rem;"><strong>XP:</strong> <span id="user-xp">3,200</span></li>
                <li><strong>Level:</strong> <span id="user-level">20</span></li>
            </ul>
            <h2>Leaderboard Tips</h2>
            <ul style="list-style: none; font-size: 0.9rem; color: var(--muted);">
                <li style="margin-bottom: 0.5rem;"><i class="fas fa-trophy"></i> Complete quizzes to earn XP</li>
                <li style="margin-bottom: 0.5rem;"><i class="fas fa-star"></i> Level up with consistent learning</li>
                <li><i class="fas fa-chart-line"></i> Check back daily for updated ranks</li>
            </ul>
        </aside>
    </div>

    <script src="assets/js/script.js?v=1.3"></script>
    <script src="assets/js/leaderboard.js"></script>
</body>
</html>