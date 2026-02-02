<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N-Learn Odyssey - Assignments</title>
    <link rel="shortcut icon" href="assets/images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="preload" href="assets/images/profile.jpg" as="image">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/assignments.css">
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
                <li class="nav-item"><a href="assignments.php" class="active"><i class="fas fa-tasks"></i> Assignments</a></li>
                <li class="nav-item"><a href="quizzes.php"><i class="fas fa-brain"></i> Quizzes</a></li>
                <li class="nav-item"><a href="leaderboard.php"><i class="fas fa-trophy"></i> Leaderboard</a></li>
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
                <div>
                    <h2>Assignments</h2>
                    <p class="muted">Manage your assignments and stay on track.</p>
                </div>
                <div class="streak"><i class="fas fa-tasks"></i> 5 Pending</div>
            </div>

            <div class="stats-grid">
                <div class="card">
                    <h2>Upcoming Assignments</h2>
                    <div class="assignments-list" id="upcoming-assignments">
                        <!-- Upcoming assignments will be dynamically inserted here -->
                    </div>
                </div>

                <div class="card">
                    <h2>Completed Assignments</h2>
                    <div class="assignments-list" id="completed-assignments">
                        <!-- Completed assignments will be dynamically inserted here -->
                    </div>
                </div>
            </div>
        </main>

       <aside class="sidebar-right missions">
    <h2 class="missions-title"><i class="fas fa-chart-line"></i> Quick Stats</h2>

    <div class="mission-section">
        <h3 class="mission-subtitle"><i class="fas fa-tasks"></i> Current Progress</h3>
        <ul class="mission-list">
            <li><span class="mission-label">Pending</span><span id="pending-count" class="mission-count">3</span></li>
            <li><span class="mission-label">Completed</span><span id="completed-count" class="mission-count">2</span></li>
            <li><span class="mission-label">Overdue</span>
                <span id="overdue-count" class="mission-count overdue">0</span>
            </li>
        </ul>
    </div>

    <div class="mission-section">
        <h3 class="mission-subtitle"><i class="fas fa-lightbulb"></i> Tips</h3>
        <ul class="mission-tips">
            <li>🎯 Set daily goals</li>
            <li>📒 Review notes before starting</li>
            <li>⚡ Break tasks into smaller steps</li>
        </ul>
    </div>
</aside>

    </div>

    <script src="assets/js/script.js?v=1.4"></script>
    <script src="assets/js/assignments.js"></script>
</body>
</html>