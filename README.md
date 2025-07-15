#FashionablyLate

##環境構築

1. .env ファイルの作成
 cp .env.example .env

1. アプリケーションキーを生成
 docker-compose exec app php artisan key:generate

1. Dockerコンテナのビルドと起動
 docker-compose up -d --build

1. Laravelコンテナに入る
 docker-compose exec app bash

1. マイグレーションとシーディングを実行
 php artisan migrate --seed

##使用技術(実行環境)

• PHP 8.3 • Laravel 8.83.29 • MySQL 8.0.35 • Docker / docker-compose • Laravel Fortify • Laravel Pagination

##ER図
<img width="673" height="418" alt="スクリーンショット 2025-07-15 14 02 15" src="https://github.com/user-attachments/assets/2178133a-f27f-435c-bc4f-c7dec0c66027" />

￼
##URL

• お問合せ画面:http://localhost:8081/contact • 登録ページ(管理画面):http://localhost:8081/register • ログインページ(管理画面):http://localhost:8081/login • 管理画面:http://localhost:8081/admin • phpMyAdmin: http://localhost:8082
