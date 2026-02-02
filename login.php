<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N-Learn Odyssey - Login</title>
    <link rel="shortcut icon" href="assets/images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #5b21b6;
            --secondary: #ec4899;
            --background: #f8fafc;
            --surface: #ffffff;
            --text: #111827;
            --muted: #6b7280;
            --success: #10b981;
            --warning: #f59e0b;
            --error: #ef4444;
            --shadow: 0 6px 24px rgba(0, 0, 0, 0.08);
            --glass: rgba(255, 255, 255, 0.85);
            --radius: 12px;
            --transition: 0.3s ease-in-out;
            --scrollbar-bg: #e2e8f0;
            --scrollbar-thumb: var(--primary);
        }

        [data-theme="dark"] {
            --primary: #7c3aed;
            --secondary: #f472b6;
            --background: #0f172a;
            --surface: #1e293b;
            --text: #f8fafc;
            --muted: #9ca3af;
            --shadow: 0 6px 24px rgba(0, 0, 0, 0.4);
            --glass: rgba(30, 41, 59, 0.9);
            --scrollbar-bg: #1e293b;
            --scrollbar-thumb: var(--primary);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: background-color var(--transition), color var(--transition);
            overflow-x: hidden;
        }

        body::-webkit-scrollbar {
            width: 6px;
        }

        body::-webkit-scrollbar-track {
            background: var(--scrollbar-bg);
        }

        body::-webkit-scrollbar-thumb {
            background-color: var(--scrollbar-thumb);
            border-radius: 20px;
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-card {
            background-color: var(--glass);
            box-shadow: var(--shadow);
            border-radius: var(--radius);
            padding: 2rem;
            width: 100%;
            backdrop-filter: blur(12px);
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 2rem;
            justify-content: center;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            font-size: 0.9rem;
            color: var(--muted);
            margin-bottom: 0.5rem;
            transition: color var(--transition);
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid rgba(var(--muted), 0.3);
            border-radius: 8px;
            background-color: rgba(var(--surface), 0.8);
            color: var(--text);
            font-size: 1rem;
            transition: border-color var(--transition), box-shadow var(--transition);
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(var(--primary), 0.2);
        }

        .form-group i {
            position: absolute;
            top: 50%;
            right: 1rem;
            color: var(--muted);
            font-size: 1.2rem;
            transform: translateY(-50%);
        }

        .action-btn {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            position: relative;
            overflow: hidden;
            transition: transform var(--transition);
        }

        .action-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.4s ease, height 0.4s ease;
        }

        .action-btn:hover::after {
            width: 200px;
            height: 200px;
        }

        .action-btn:hover {
            transform: scale(1.05);
        }

        .error-message {
            color: var(--error);
            font-size: 0.9rem;
            text-align: center;
            margin-top: 1rem;
            display: none;
        }

        .forgot-password,
        .signup-link {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        .forgot-password a,
        .signup-link a {
            color: var(--primary);
            text-decoration: none;
            transition: color var(--transition);
        }

        .forgot-password a:hover,
        .signup-link a:hover {
            color: var(--secondary);
        }

        .theme-toggle {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            color: var(--text);
            transition: transform var(--transition);
        }

        .theme-toggle:hover {
            transform: scale(1.1);
        }

        @media (max-width: 480px) {
            .container {
                padding: 1rem;
            }

            .login-card {
                padding: 1.5rem;
            }

            .logo {
                font-size: 1.5rem;
            }

            .action-btn {
                padding: 0.6rem;
                font-size: 0.9rem;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            * {
                transition: none !important;
                animation: none !important;
            }
        }

        @font-face {
            font-family: 'Poppins';
            src: url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
            font-display: swap;
        }
    </style>
</head>

<body>
    <button class="theme-toggle" id="theme-toggle" aria-label="Toggle theme"><i class="fas fa-moon"></i> Dark
        Mode</button>
    <div class="container">
        <div class="login-card">
            <div class="logo">
                <i class="fas fa-rocket"></i>
                N-Learn
            </div>
            <h2 style="text-align: center; margin-bottom: 1.5rem;">Login to Your Account</h2>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" value="student1@nlearn.in" placeholder="Enter your email" required>
                <i class="fas fa-envelope"></i>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" value="student123" placeholder="Enter your password" required>
                <i class="fas fa-lock"></i>
            </div>
            <button class="action-btn" id="login-btn">Login</button>
            <div class="error-message" id="error-message">Invalid email or password</div>
            <div class="forgot-password">
                <a href="#">Forgot Password?</a>
            </div>
            <div class="signup-link">
                <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </div>
    </div>

    <script>
        // Dummy user credentials
        const users = [
            { email: "student1@nlearn.in", password: "student123", role: "student", grade: "7", section: "A", name: "QuestMaster" },
            { email: "student2@nlearn.in", password: "student456", role: "student", grade: "9", section: "A", name: "LearnStar" },
            { email: "teacher1@nlearn.in", password: "teacher123", role: "teacher", name: "ProfGuide" },
            { email: "teacher2@nlearn.in", password: "teacher456", role: "teacher", name: "EduMentor" }
        ];

        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;
        const loginBtn = document.getElementById('login-btn');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const errorMessage = document.getElementById('error-message');

        // Theme toggle
        themeToggle.addEventListener('click', () => {
            body.dataset.theme = body.dataset.theme === 'dark' ? 'light' : 'dark';
            const icon = body.dataset.theme === 'dark' ? 'sun' : 'moon';
            themeToggle.innerHTML = `<i class="fas fa-${icon}"></i> ${body.dataset.theme === 'dark' ? 'Light' : 'Dark'} Mode`;
            localStorage.setItem('theme', body.dataset.theme || 'light');
        });

        // Initialize theme
        const savedTheme = localStorage.getItem('theme') || 'light';
        body.dataset.theme = savedTheme;
        themeToggle.innerHTML = `<i class="fas fa-${savedTheme === 'dark' ? 'sun' : 'moon'}"></i> ${savedTheme === 'dark' ? 'Light' : 'Dark'} Mode`;

        // Login handler
        loginBtn.addEventListener('click', () => {
            const email = emailInput.value.trim();
            const password = passwordInput.value.trim();

            // Find user
            const user = users.find(u => u.email === email && u.password === password);

            if (user) {
                localStorage.setItem('user', JSON.stringify({
                    email: user.email,
                    role: user.role,
                    name: user.name,
                    grade: user.grade,
                    section: user.section
                }));

                if (user.role === 'student') {
                    window.location.href = 'index.php';
                } else if (user.role === 'teacher') {
                    window.location.href = 'admin.php';
                }
            } else {
                errorMessage.style.display = 'block';
                setTimeout(() => {
                    errorMessage.style.display = 'none';
                }, 3000);
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' && emailInput.value && passwordInput.value) {
                loginBtn.click();
            }
        });
    </script>
</body>

</html>