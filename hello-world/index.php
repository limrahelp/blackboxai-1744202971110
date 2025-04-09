<?php
$message = 'Hello World!';
$timestamp = date('F j, Y, g:i a');
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
        <div class="message">
            <?php echo htmlspecialchars($message); ?>
        </div>
        <div class="timestamp">
            Posted on: <?php echo htmlspecialchars($timestamp); ?>
        </div>
    </div>
</body>
</html>
