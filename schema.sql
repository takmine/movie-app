-- moviesテーブルが存在すれば削除（初期化用）
DROP TABLE IF EXISTS movies;

-- moviesテーブルの作成
CREATE TABLE movies (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    review TEXT,
    watched_date DATE,
    created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
)