<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N-Learn Odyssey - Quizzes</title>
    <link rel="shortcut icon" href="assets/images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="preload" href="assets/images/profile.jpg" as="image">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/quizzes.css">
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
                <li class="nav-item"><a href="quizzes.php" class="active"><i class="fas fa-brain"></i> Quizzes</a></li>
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
                    <h3 id="user-name"> </h3>
                    <p class="muted" id="user-class-section"> </p>
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
                    <h2 id="welcome-user-name">Welcome back, QuestMaster!</h2>
                    <p class="muted">Test your knowledge with these quizzes.</p>
                </div>
                <div class="streak"><i class="fas fa-brain"></i> 5 Quizzes Available</div>
            </div>

            <div class="card">
                <h2>Available Quizzes</h2>
                <div class="quizzes-list" id="quizzes-list">
                    <!-- Quizzes will be dynamically inserted here -->
                </div>
            </div>
        </main>

        <aside class="sidebar-right missions">
            <h2 class="missions-title"><i class="fas fa-chart-line"></i> Your Courses</h2>

            <!-- Mathematics -->
            <div class="mission-section">
                <h3 class="mission-subtitle"><i class="fas fa-book"></i> Mathematics</h3>
                <div class="mission-progress">
                    <div class="progress-bar" style="width: 75%; background: var(--primary);"></div>
                </div>
                <ul class="mission-list">
                    <li>
                        <span class="mission-label">Modules Completed</span>
                        <span class="mission-count">12</span>
                    </li>
                    <li>
                        <span class="mission-label">Rating</span>
                        <span class="mission-count">4.8 ⭐</span>
                    </li>
                </ul>
            </div>

            <!-- Science -->
            <div class="mission-section">
                <h3 class="mission-subtitle"><i class="fas fa-book"></i> Science</h3>
                <div class="mission-progress">
                    <div class="progress-bar" style="width: 60%; background: #3b82f6;"></div>
                </div>
                <ul class="mission-list">
                    <li>
                        <span class="mission-label">Modules Completed</span>
                        <span class="mission-count">10</span>
                    </li>
                    <li>
                        <span class="mission-label">Rating</span>
                        <span class="mission-count">4.7 ⭐</span>
                    </li>
                </ul>
            </div>

            <!-- Social Studies -->
            <div class="mission-section">
                <h3 class="mission-subtitle"><i class="fas fa-book"></i> Social Studies</h3>
                <div class="mission-progress">
                    <div class="progress-bar" style="width: 40%; background: #f59e0b;"></div>
                </div>
                <ul class="mission-list">
                    <li>
                        <span class="mission-label">Modules Completed</span>
                        <span class="mission-count">15</span>
                    </li>
                    <li>
                        <span class="mission-label">Rating</span>
                        <span class="mission-count">4.5 ⭐</span>
                    </li>
                </ul>
            </div>

            <!-- English -->
            <div class="mission-section">
                <h3 class="mission-subtitle"><i class="fas fa-book"></i> English</h3>
                <div class="mission-progress">
                    <div class="progress-bar" style="width: 85%; background: #10b981;"></div>
                </div>
                <ul class="mission-list">
                    <li>
                        <span class="mission-label">Modules Completed</span>
                        <span class="mission-count">8</span>
                    </li>
                    <li>
                        <span class="mission-label">Rating</span>
                        <span class="mission-count">4.6 ⭐</span>
                    </li>
                </ul>
            </div>

            <!-- Study Tips -->
            <div class="mission-section">
                <h3 class="mission-subtitle"><i class="fas fa-lightbulb"></i> Study Tips</h3>
                <ul class="mission-tips">
                    <li>🎯 Focus on one module at a time</li>
                    <li>📒 Take notes while learning</li>
                    <li>⚡ Review completed modules regularly</li>
                </ul>
            </div>
        </aside>

    </div>

    <script src="assets/js/script.js?v=1.4"></script>
    <script src="assets/js/quizzes.js"></script>
</body>

</html>