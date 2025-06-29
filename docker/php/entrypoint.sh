#!/bin/bash

echo "✅ Entrypoint running as: $(whoami)"

# Laravelのstorage, bootstrap/cacheに書き込み権限を設定
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# コンテナ内のコマンド（php-fpmなど）を実行
exec "$@"
