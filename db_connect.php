<?php
// 本番環境(Render)かローカル環境かを判定
$is_production = getenv('RENDER');

if ($is_production) {
    // Renderの環境変数をパースして接続情報を取得
    $db_url = getenv('DATABASE_URL');
    $db_info = parse_url($db_url);
    $host = $db_info['host'];
    $dbname = ltrim($db_info['path'], '/');
    $user = $db_info['user'];
    $pass = $db_info['pass'];
    $dsn = "pgsql:host={$host};port=5432;dbname={$dbname}";
} else {
    // ローカル環境の接続情報
    $host = 'localhost';
    $dbname = 'movie_review_app';
    $user = 'movie_user';
    $pass = 'ijlbsv61074'; // ローカルで設定したパスワード
    $dsn = "pgsql:host={$host};port=5432;dbname={$dbname}";
}

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // 本番環境では詳細なエラーメッセージを表示しない
    error_log('Database Connection Error: ' . $e->getMessage());
    exit('データベースに接続できませんでした。');
}