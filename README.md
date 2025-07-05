# 辞書アプリ

Laravelを使用し作成した辞書アプリです。
キーワードとその説明を登録・検索が出来ます。

## 機能
- キーワードと説明の登録
- 登録内容の一覧表示(最新順)
- 登録した内容の更新・削除
- キーワードや説明の検索
- 入力値のバリデーション(必須・文字数制限)

## 使用技術
- PHP 7.4.9
- Laravel 8.83.29
- MySQL
- Docker 28.0.1
- Docker Compose v2.33.1

## 環境設定について
このプロジェクトでは以下の2つの `.env` ファイルを使用しています。

1. **プロジェクトルートの `.env`**
    Dockerビルド時の環境変数（UID/GIDなど）を設定します。
    例: UID=1000
        GID=1000
※このファイルは `docker-compose.yml` と同じ階層に配置してください。

2. **`src` フォルダ内の `.env`**
Laravelの環境設定ファイルです。
`src/.env.example` をコピーして作成し、データベース接続情報などを編集してください。


## インストール方法

1. リポジトリをクローン
2. プロジェクトルートに `.env` ファイルを作成し、`UID` と `GID` を設定
3. `src/.env.example` をコピーして `src/.env` を作成し、Laravel用環境変数を編集
4. `docker-compose up -d --build` を実行
5. Dockerコンテナ内で `composer install` を実行
6. Dockerコンテナ内で `php artisan key:generate` を実行
7. Dockerコンテナ内で `php artisan migrate` を実行
8. ブラウザで `http://localhost` にアクセスして動作確認
