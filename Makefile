init: init-ci
init-ci: docker-down-clear \
	docker-pull docker-build docker-up \
	api-init auth-init frontend-init

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build --pull

api-init: api-composer-install

api-migrations:
	docker-compose run --rm api-php-cli ./bin/console doctrine:migrations:migrate --no-interaction

api-composer-install:
	docker-compose run --rm api-php-cli composer install

auth-init: auth-composer-install auth-migrations

auth-migrations:
	docker-compose run --rm auth-php-cli ./bin/console doctrine:migrations:migrate --no-interaction

auth-composer-install:
	docker-compose run --rm auth-php-cli composer install

frontend-init: frontend-yarn-install

frontend-yarn-install:
	docker-compose run --rm frontend-node-cli yarn install