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

## Usuários padrão para teste
Crie um usuário admin via tinker:
php artisan tinker
User::create(['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => bcrypt('password'), 'role' => 'admin']);

Crie um leiturista:
User::create(['name' => 'Leiturista', 'email' => 'leiturista@admin.com', 'password' => bcrypt('password'), 'role' => 'leiturista']);

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

## Usuários de teste
| Perfil | Email | Senha |
|--------|-------|-------|
| Gestor (admin) | gestor@associacao.com.br | senha123 |
| Leiturista | leiturista@associacao.com.br | senha123 |