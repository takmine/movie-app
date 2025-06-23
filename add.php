<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>映画の記録 - My Movie Reviews</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>映画の記録</h1>
        <form action="create.php" method="post">
            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="watched_date">鑑賞日</label>
                <input type="date" id="watched_date" name="watched_date" required>
            </div>
            <div class="form-group">
                <label for="rating">評価 (1-5)</label>
                <select id="rating" name="rating" required>
                    <option value="">選択してください</option>
                    <option value="5">★★★★★ (5)</option>
                    <option value="4">★★★★☆ (4)</option>
                    <option value="3">★★★☆☆ (3)</option>
                    <option value="2">★★☆☆☆ (2)</option>
                    <option value="1">★☆☆☆☆ (1)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="review">感想</label>
                <textarea id="review" name="review" rows="5"></textarea>
            </div>
            <button type="submit" class="button">記録する</button>
        </form>
        <br>
        <a href="index.php">一覧に戻る</a>
    </div>
</body>
</html>