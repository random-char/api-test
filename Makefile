env:
	cp .env.example .env

composer:
	docker run --rm --interactive --tty --volume $$PWD:/app composer install

init-yii:
	docker compose run --rm php-fpm php init

up:
	docker compose up -d

test:
	docker compose run --rm php-fpm ./vendor/bin/codecept run -v
