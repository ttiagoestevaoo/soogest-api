

## About API

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:


## Instalation

Executar os comandos:

```bash

cp .env.example .env
docker-compose run --no-deps php72 composer.phar install
docker-compose run --no-deps php72 php artisan key:generate
docker-compose down
sudo chown -R $USER:$USER vendor node_modules
sudo chown -R :www-data storage
sudo chmod -R g+w storage
```


Executar os comandos:

```bash
docker-compose up -d
docker-compose exec php72 php artisan migrate --seed

```

Passport client configuration

```bash
docker-compose exec php72 php artisan passport:install
Apoś executar o comando, coloque CLIENT_ID e CLIENT_PASSWORD no .env nas variavéis do Passport
Alterar APP_URL no .env para o ip da sua máquina . // xxx.xxx.xx.xx:8001

```