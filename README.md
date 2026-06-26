# Sistema de Controle de Consumo de Água

Sistema web em Laravel para controle de leitura de medidores de água de uma associação comunitária.

## Aplicação em produção
URL: https://sistema-controle-agua-production.up.railway.app

| Perfil | Email | Senha |
|--------|-------|-------|
| Gestor (admin) | gestor@associacao.com.br | senha123 |
| Leiturista | leiturista@associacao.com.br | senha123 |

## Aluno
- José Ailton

## Tecnologias
- PHP 8.4 + Laravel 13
- MySQL
- Blade Templates
- Docker

## Como instalar localmente

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
DB_USERNAME=root
DB_PASSWORD=

## Rodar migrations e seeders

php artisan migrate
php artisan db:seed

## Iniciar servidor

php artisan serve

## Rodando com Docker

docker-compose up -d --build
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
Acesse em http://localhost:8000

## Funcionalidades
- Autenticação com dois perfis: admin (gestor) e leiturista
- Middleware bloqueando rotas restritas para leituristas
- Cadastro, listagem e edição de consumidores (apenas admin)
- Registro de leitura mensal com cálculo automático de consumo
- Geração de fatura com valor calculado pela regra de negócio
- Marcação de fatura como paga (apenas admin)
- Configuração de taxa fixa e valor excedente (apenas admin)
- Link WhatsApp com mensagem pré-preenchida (bônus)
- Soft Delete em consumidores — registros nunca são apagados
- Log de acesso a dados pessoais (LGPD)
- Lógica de cálculo extraída para FaturaCalculatorService (SOLID)

## Regra de cobrança
- Até 10.000 litros: taxa fixa (padrão R$ 25,00)
- Acima de 10.000 litros: taxa fixa + R$ 2,00 por cada 1.000L excedentes

## Dados coletados (LGPD)
O sistema coleta apenas os dados necessários para a cobrança: nome, endereço, número do medidor e telefone. Nenhum dado sensível como CPF ou RG é coletado.
