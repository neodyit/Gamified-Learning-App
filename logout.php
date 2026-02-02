<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Logging Out...</title>
    <script>

        localStorage.removeItem('user');
        window.location.href = 'login.php';
    </script>
</head>

<body>
    <p>Logging out, please wait…</p>
</body>

</html>