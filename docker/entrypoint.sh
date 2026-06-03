#!/usr/bin/env bash
set -e

mkdir -p storage/app storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

if [ -n "${DB_HOST:-}" ]; then
    echo "Waiting for database at ${DB_HOST}:${DB_PORT:-3306}..."
    until mysqladmin ping -h"${DB_HOST}" -P"${DB_PORT:-3306}" -u"${DB_USERNAME:-root}" -p"${DB_PASSWORD:-}" --silent; do
        sleep 2
    done
fi

php artisan config:clear >/dev/null 2>&1 || true
php artisan route:clear >/dev/null 2>&1 || true
php artisan view:clear >/dev/null 2>&1 || true

exec "$@"
