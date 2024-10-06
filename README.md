# LogTur - Sistema de Gerenciamento
Sistema de Gerenciamento de Operações para agentes de viagens. 

![Capturar](https://github.com/user-attachments/assets/16c45ade-c023-4c68-9e14-602e67c606f2)

## Tecnologias Utilizadas

- [x] Livewire 3
- [x] Laravel 10
- [x] PHP 8.1
- [x] MySQL
- [x] Docker
- [x] Digital Ocean - Droplets[VM para hospedagem]
- [x] PHP Storm

## Instalação do projeto

Clone o projeto
```sh
git clone https://github.com/AguineleQueiroz/leiatur.git
```
Acesse a pasta do projeto executando o seguinte comando:
```sh
cd leiatur
```
Crie o arquivo com as variáveis de ambiente:
```sh
cp .env.example .env
```
Atualize as variáveis de ambiente listadas abaixo:
```
APP_NAME="LeiaTur"
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```
Execute o comandos abaixo para criar os containers do projeto:
```sh
docker-compose up -d
```
Acesse o container da aplicação:
```sh
docker-compose exec backend bash
```
Instale as dependências do projeto rodando:
```sh
composer install
```
Rode as migrations do projeto:
```
php artisan migrate
```
Gere a key do projeto LeiaTur:
```sh
php artisan key:generate
```


Agora você já pode acessar a aplicação através da url abaixo:
[http://localhost](http://localhost)
