# Sistema de Controle de Consumo de Água

Sistema web em Laravel para controle de leitura de medidores de água de uma associação comunitária.

## Aluno
- José Ailton

## Tecnologias
- PHP 8.4 + Laravel 11
- MySQL
- Blade Templates

## Como instalar

git clone https://github.com/Ailton779/sistema-controle-agua.git
cd sistema-controle-agua
composer install
cp .env.example .env
php artisan key:generate

## Configurar .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_agua
DB_USERNAME=laravel
DB_PASSWORD=password

## Rodar migrations

php artisan migrate

## Iniciar servidor

php artisan serve

## Funcionalidades
- Cadastro, listagem e edição de consumidores
- Registro de leitura mensal com cálculo automático de consumo
- Geração de fatura com valor calculado pela regra de negócio
- Marcação de fatura como paga
- Configuração de taxa fixa e valor excedente
- Link WhatsApp com mensagem pré-preenchida (bônus)

## Regra de cobrança
- Até 10.000 litros: taxa fixa (padrão R$ 25,00)
- Acima de 10.000 litros: taxa fixa + R$ 2,00 por cada 1.000L excedentes
