

## About API

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:


## Info routes

| Routes             | Method |      Send    | Get   |      Auth     |
|-------------------:|-------:|-------------:|------:|--------------:|
| /login             |  POST  |{username:'example@sooges.com.br',password: 'developer'}|{"token_type":"token_type","expires_in":31536000,"access_token":"access_token","refresh_token":"refresh_token"}|N|
| /register          |  POST  |{name: 'User', email: 'example@sooges.com.br', password: 'developer', c_password: 'developer}|{id:1,name: 'User', email: 'example@sooges.com.br'}| N|
| /logout            |  POST  |||S|
| /user              |  GET   | {}|{id:1,name: 'User', email: 'example@sooges.com.br'}|S|
| /tasks             |  POST  | {}|| S|
| /tasks             |  GET   | {}|| S|
| /tasks/{task}      |  GET   | {}|| S|
| /tasks/{task}      |  PUT   | {}|| S|
| /tasks/{task}      | DELETE | {}|| S|
| /projects          |  GET   ||[{id:1, name: 'Project', description: 'Description project', deadline: 'Deadline date format'},{...}]| S|
| /projects          |  POST  |{name: 'Project', description: 'Description project', deadline: 'Deadline date format'}|{id:1, name: 'Project', description: 'Description project', deadline: 'Deadline date format'}| S|
| /projects/{project}|  GET   ||{id:1, name: 'Project', description: 'Description project', deadline: 'Deadline date format'}| S|
| /projects/{project}|  PUT   |{name: 'Project changed', description: 'Description project changed', deadline: 'Deadline date format changed'}|{id:1, name: 'Project changed', description: 'Description project changed', deadline: 'Deadline date format changed'}| S             |
| /projects/{project}| DELETE ||| S|




## Requisites

    - docker >= 19.03.9
    - docker-compose >= 1.25.4

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


```
 - Coloque CLIENT_ID e CLIENT_PASSWORD no .env PASSPORT_CLIENT_ID e PASSPORT_CLIENT_SECRET

 - Alterar APP_URL no .env para o ip da sua máquina . // xxx.xxx.xx.xx:8001