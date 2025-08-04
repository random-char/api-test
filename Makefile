env:
	cp .env.example .env

composer:
	docker run --rm --interactive --tty --volume $$PWD:/app composer update

init:
	docker compose run --rm php-fpm php yii init

up:
	docker compose up -d