# Makefile

install:
	cp .env.example .env
	npm install
	npm run build
	composer install
	php artisan key:generate
	php artisan migrate --seed

up:
	npm run build

docker-install:
	cp .env.example .env
	docker compose up --build -d nginx
	docker compose run --rm npm install
	docker compose run --rm npm run build
	docker compose exec -it php composer install
	docker compose exec -it php php artisan key:generate
	docker compose exec -it php php artisan migrate --seed

docker-up:
	docker compose up -d nginx
	docker compose run --rm npm run build
