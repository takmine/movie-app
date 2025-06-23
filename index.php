<?php
require_once('db_connect.php'); // DB接続ファイルを読み込む

// データベースから映画データを全件取得
$stmt = $pdo->query('SELECT * FROM movies ORDER BY watched_date DESC, created_at DESC');
$movies = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Movie Reviews</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>My Movie Reviews</h1>
        <a href="add.php" class="button">＋ 新しい映画を記録する</a>

        <?php if (empty($movies)): ?>
            <p class="empty-message">まだレビューはありません。最初の映画を記録してみましょう！</p>
        <?php else: ?>
            <?php foreach ($movies as $movie): ?>
                <div class="movie-item">
                    <h2><?php echo htmlspecialchars($movie['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p>評価：<span class="rating"><?php echo str_repeat('★', $movie['rating']) . str_repeat('☆', 5 - $movie['rating']); ?></span></p>
                    <p>鑑賞日：<?php echo htmlspecialchars($movie['watched_date'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php if (!empty($movie['review'])): ?>
                        <p class="review-text"><?php echo nl2br(htmlspecialchars($movie['review'], ENT_QUOTES, 'UTF-8')); ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>