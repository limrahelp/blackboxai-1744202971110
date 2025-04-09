<?php
$pdo = null;
$db_error = '';
$message = 'Hello World!';
$timestamp = date('F j, Y, g:i a');

try {
    require_once __DIR__ . '/config/db.php';
    
    if ($pdo) {
        // Fetch the latest message from the database
        $stmt = $pdo->query("SELECT message, created_at FROM messages ORDER BY created_at DESC LIMIT 1");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            $message = $result['message'];
            $timestamp = date('F j, Y, g:i a', strtotime($result['created_at']));
        }
    }
} catch (Exception $e) {
    $db_error = "Database connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World App</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome!</h1>
        <?php if ($db_error): ?>
            <div class="error" style="color: #e53e3e; margin-bottom: 1rem;">
                <?php echo htmlspecialchars($db_error); ?>
            </div>
        <?php endif; ?>
        <div class="message">
            <?php echo htmlspecialchars($message); ?>
        </div>
        <div class="timestamp">
            Posted on: <?php echo htmlspecialchars($timestamp); ?>
        </div>
    </div>
</body>
</html>
