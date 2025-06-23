<?php
// フォームデータがPOSTされているかチェック
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // POSTでなければ何もしないでindex.phpにリダイレクト
    header('Location: index.php');
    exit();
}

require_once('db_connect.php');

// フォームから送信されたデータをPOSTメソッドで受け取る
$title = $_POST['title'];
$watched_date = $_POST['watched_date'];
$rating = $_POST['rating'];
$review = $_POST['review'];

// SQL文を準備
$sql = "INSERT INTO movies (title, watched_date, rating, review) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);

// プレースホルダに値をセットして、SQLを実行
try {
    $stmt->execute([$title, $watched_date, $rating, $review]);
    // 成功したらトップページに戻る
    header('Location: index.php');
    exit();
} catch (PDOException $e) {
    // エラー発生時はエラーメッセージを表示
    exit('データベースへの登録に失敗しました。' . $e->getMessage());
}