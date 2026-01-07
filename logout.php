
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logging Out...</title>
    <script>
        // Remove the stored user data
        localStorage.removeItem('user');

        // Optionally clear theme or other keys if needed
        // localStorage.removeItem('theme');

        // Redirect back to the login page
        window.location.href = 'login.php';
    </script>
</head>
<body>
    <p>Logging out, please wait…</p>
</body>
</html>
