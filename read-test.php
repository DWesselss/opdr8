<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "p3-games";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SELECT * FROM games");
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database fout.");
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Read Test</title>
</head>
<body>
    <h1>Games</h1>

    <?php if (count($games) > 0): ?>
        <ul>
            <?php foreach ($games as $game): ?>
                <li><?= htmlspecialchars($game['title']) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Er zijn nog geen games gevonden.</p>
    <?php endif; ?>
</body>
</html>