FROM php:7.4.9-fpm

COPY php.ini /usr/local/etc/php/

# ビルド引数を受け取る（UID/GID）
ARG UID=1000
ARG GID=1000

RUN apt update \
    && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip \
    && docker-php-ext-install pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update

# www-dataユーザーをホストと同じUID/GIDで作成（前に削除）
RUN userdel -f www-data \
    && groupdel www-data || true \
    && groupadd -g ${GID} www-data \
    && useradd -u ${UID} -g www-data -m www-data

WORKDIR /var/www

# Laravelの書き込みディレクトリの権限はentrypointで設定するのでここではやらない

# entrypointスクリプトをコピーして実行権限付与
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# エントリポイント設定
ENTRYPOINT ["entrypoint.sh"]

# 実行ユーザーをwww-dataに切り替え
USER www-data

# エントリポイント設定の記述をしたら、php-fpm を起動することを忘れず記述（絶対に書く！）
CMD ["php-fpm"]