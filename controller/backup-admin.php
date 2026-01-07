<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N-Learn Odyssey - Teacher's Dashboard</title>
    <link rel="shortcut icon" href="assets/images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="preload" href="assets/images/profile.jpg" as="image">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/teachers.css">
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
                <li class="nav-item"><a href="teachers.php" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                <li class="nav-item"><a href="courses.php"><i class="fas fa-book"></i> Courses</a></li>
                <li class="nav-item"><a href="students.php"><i class="fas fa-users"></i> Students</a></li>
                <li class="nav-item"><a href="assignments.php"><i class="fas fa-tasks"></i> Assignments</a></li>
                <li class="nav-item"><a href="grades.php"><i class="fas fa-chart-bar"></i> Grades</a></li>
                <li class="nav-item"><a href="chatbot.php"><i class="fas fa-robot"></i> Chatbot</a></li>
                <li class="nav-item"><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
                <li class="nav-item"><a href="#" id="theme-toggle-mobile" aria-label="Mode"><i class="fas fa-moon"></i>
                        Mode</a></li>
                <li class="nav-item"><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
            <div class="user-profile">
                <img src="assets/images/profile.jpg" alt="Profile" class="profile-img">
                <div class="user-details">
                    <h3 id="user-name">EducatorPrime</h3>
                    <p class="muted" id="user-subject-dept">Math | High School</p>
                </div>
            </div>
            <div style="display: flex; justify-content: space-around; margin-top: 1rem;">
                <span><i class="fas fa-star" style="color: var(--secondary);"></i> Lvl 15</span>
                <span><i class="fas fa-coins" style="color: var(--primary);"></i> 4,500 XP</span>
            </div>
        </nav>

        <main class="main-content">
            <div class="welcome">
                <div>
                    <h2 id="welcome-user-name">Welcome back, EducatorPrime!</h2>
                    <p class="muted">Manage your classes and students today.</p>
                </div>
                <div class="streak"><i class="fas fa-fire"></i> 10-Day Streak</div>
            </div>

            <div class="stats-grid">
                <div class="card">
                    <h2>Overall Teaching Progress</h2>
                    <div class="progress-circle">
                        <svg width="120" height="120" viewBox="0 0 160 160">
                            <circle cx="80" cy="80" r="70" fill="none" stroke="rgba(91, 33, 182, 0.2)"
                                stroke-width="20" />
                            <circle cx="80" cy="80" r="70" fill="none" stroke="url(#grad)" stroke-width="20"
                                stroke-dasharray="439.8" stroke-dashoffset="131.94" stroke-linecap="round" />
                            <defs>
                                <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" stop-color="var(--primary)" />
                                    <stop offset="100%" stop-color="var(--secondary)" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <div class="progress-text">70%</div>
                    </div>
                    <p class="muted text-center">Great job guiding your students!</p>
                </div>

                <div class="card">
                    <h2>Quick Stats</h2>
                    <ul style="list-style: none; margin-top: 1rem;">
                        <li style="margin-bottom: 0.5rem;"><strong>Classes:</strong> 8 Active</li>
                        <li style="margin-bottom: 0.5rem;"><strong>Students:</strong> 120 Enrolled</li>
                        <li><strong>Hours:</strong> 80 Taught</li>
                    </ul>
                </div>
            </div>

            <div class="card">
                <h2>Active Courses</h2>
                <div class="courses-list">
                    <div class="course-card">
                        <div>
                            <h3>Advanced Calculus</h3>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 85%;"></div>
                            </div>
                            <p class="muted">85% Student Completion - Ends in 2 weeks</p>
                        </div>
                        <div style="display: flex; gap: 0.5rem;">
                            <button class="action-btn">Manage</button>
                            <button class="action-btn secondary">Details</button>
                        </div>
                    </div>
                    <div class="course-card">
                        <div>
                            <h3>Physics Fundamentals</h3>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 65%;"></div>
                            </div>
                            <p class="muted">65% Student Completion - Ends in 4 weeks</p>
                        </div>
                        <div style="display: flex; gap: 0.5rem;">
                            <button class="action-btn">Manage</button>
                            <button class="action-btn secondary">Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <aside class="sidebar-right">
            <h2>Tasks</h2>
            <div class="missions">
                <h3>Pending</h3>
                <div class="mission-item">
                    <span>Grade Calculus Assignments</span>
                    <span class="badge" style="background: var(--error);"><i class="fas fa-exclamation"></i></span>
                </div>
                <div class="mission-item">
                    <span>Review Physics Labs</span>
                    <span class="badge" style="background: var(--error);"><i class="fas fa-exclamation"></i></span>
                </div>
                <div class="mission-item">
                    <span>Prepare History Quiz</span>
                    <span class="badge" style="background: var(--error);"><i class="fas fa-exclamation"></i></span>
                </div>
                <h3>Completed</h3>
                <div class="mission-item">
                    <span>Graded Algebra Tests</span>
                    <span class="badge"><i class="fas fa-check"></i></span>
                </div>
                <div class="mission-item">
                    <span>Posted Chemistry Notes</span>
                    <span class="badge"><i class="fas fa-check"></i></span>
                </div>
            </div>
            <h2>Achievements</h2>
            <ul style="list-style: none;">
                <li style="margin-bottom: 0.5rem;"><i class="fas fa-medal" style="color: gold;"></i> Master Educator</li>
                <li style="margin-bottom: 0.5rem;"><i class="fas fa-medal" style="color: silver;"></i> Class Mentor</li>
                <li><i class="fas fa-medal" style="color: #cd7f32;"></i> Teaching Star</li>
            </ul>
        </aside>
    </div>

    <script src="assets/js/script.js?v=1.3"></script>
    <script src="assets/js/teachers.js?v=1.3"></script>
</body>

</html>