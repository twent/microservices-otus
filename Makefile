.SILENT:
default: run

install:
	composer install --working-dir books-microservice --ignore-platform-reqs
	composer install --working-dir comments-microservice --ignore-platform-reqs

run: run-books run-comments
stop: stop-books stop-comments

run-books:
	docker compose --file books-microservice/docker-compose.yml up -d
	docker compose --file books-microservice/docker-compose.yml exec books-app php ../artisan migrate:fresh --seed

run-comments:
	docker compose --file comments-microservice/docker-compose.yml up -d
	docker compose --file comments-microservice/docker-compose.yml exec comments-app php ../artisan migrate:fresh --seed

stop-books:
	docker compose --file books-microservice/docker-compose.yml down --remove-orphans

stop-comments:
	docker compose --file comments-microservice/docker-compose.yml down --remove-orphans