# 1. ベースとなる公式のPHP+Apacheイメージを選択します
FROM php:8.3-apache

# 2. サイトの表示に必要なPostgreSQLドライバーをインストールします
RUN docker-php-ext-install pdo pdo_pgsql

# 3. あなたが書いた全てのコードを、コンテナの中の公開フォルダにコピーします
COPY . /var/www/html/

# 4. ファイルの所有者をWebサーバー（Apache）に変更します
RUN chown -R www-data:www-data /var/www/html