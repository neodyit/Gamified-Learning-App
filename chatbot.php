<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N-Learn Odyssey - Student Chatbot</title>
    <link rel="shortcut icon" href="assets/images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/chatbot.css">
</head>

<body>
    <header class="chat-header">
        <h2>Ai Guru</h2>
        <div class="header-right">
            <span class="status online"><i class="fas fa-circle"></i> Online</span>
            <button id="clear-chat-btn" aria-label="Clear chat history" title="Clear Chat"><i class="fas fa-trash"></i></button>
            <a href="index.php" class="home-icon" aria-label="Return to dashboard">
                <i class="fas fa-home"></i>
            </a>
        </div>
    </header>

    <div class="chat-container">
        <div class="chat-messages" id="chat-messages">
            <!-- Messages here -->
        </div>
        <div class="chat-input">
            <input type="text" id="user-input" placeholder="Ask about courses, assignments, or study tips..." aria-label="Message input">
            <button id="send-btn" aria-label="Send message"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>

    <script src="assets/js/chatbot.js?v=1.4"></script>
</body>

</html>