<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N-Learn Odyssey - Courses</title>
    <link rel="shortcut icon" href="assets/images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="preload" href="assets/images/profile.jpg" as="image">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/courses.css">
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
                <li class="nav-item"><a href="courses.php" class="active"><i class="fas fa-book"></i> Courses</a></li>
                <li class="nav-item"><a href="assignments.php"><i class="fas fa-tasks"></i> Assignments</a></li>
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
                    <p class="muted" id="user-class-section">Class 7 | A</p>
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
                    <p class="muted">Explore your courses and continue your learning journey.</p>
                </div>
                <div class="streak"><i class="fas fa-fire"></i> 7-Day Streak</div>
            </div>

            <div class="card">
                <h2>Enrolled Courses</h2>
                <div class="courses-list" id="enrolled-courses">
                    <!-- Enrolled courses will be dynamically inserted here -->
                </div>
            </div>
        </main>

        <aside class="sidebar-right">
            <h2>Missions</h2>
            <div class="missions">
                <h3>Pending</h3>
                <div class="mission-item">
                    <span>Calculus Quiz</span>
                    <span class="badge" style="background: var(--error);"><i class="fas fa-exclamation"></i></span>
                </div>
                <div class="mission-item">
                    <span>Physics Lab</span>
                    <span class="badge" style="background: var(--error);"><i class="fas fa-exclamation"></i></span>
                </div>
                <div class="mission-item">
                    <span>History Essay</span>
                    <span class="badge" style="background: var(--error);"><i class="fas fa-exclamation"></i></span>
                </div>
                <h3>Completed</h3>
                <div class="mission-item">
                    <span>Algebra Test</span>
                    <span class="badge"><i class="fas fa-check"></i></span>
                </div>
                <div class="mission-item">
                    <span>Chemistry Notes</span>
                    <span class="badge"><i class="fas fa-check"></i></span>
                </div>
            </div>
        </aside>
    </div>

    <script src="assets/js/script.js?v=1.3"></script>
    <script src="assets/js/courses.js"></script>
</body>
</html>