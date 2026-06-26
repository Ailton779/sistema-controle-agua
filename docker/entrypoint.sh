#!/bin/sh
echo "Aguardando banco de dados..."
sleep 5
echo "Rodando migrations..."
php artisan migrate:fresh --force
echo "Rodando seeders..."
php artisan db:seed --force
echo "Iniciando servidor..."
php -S 0.0.0.0:${PORT:-8080} -t public
