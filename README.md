# p-appro-1
First look at integrating an external NodeJS API to a Laravel application.

## Project constraints
- Use Docker for the developpment environment

## Install and setup
1. Install Docker Desktop

2. Cloner the repo

```sh
git clone https://github.com/SanSugranes/p-appro-1
```

3. Spin up the containers

```sh
cd ./p-appro-1
docker-compose up -d
```

4. Run migrations and install dependencies 
```sh
docker exec qa-app npm install && composer install && php artisan migrate && npm run build
docker exec qaapi-api npm install
```
DONE!

The Laravel application is available on http://localhost:8000<br>
The Questions API is available on http://localhost:3000
