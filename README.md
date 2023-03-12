## PHP Microservices Learning Intensive

Simplest app for learning microservices & microservices communication with REST API.

### Microservices (Lumen 10):
1. Books (`http://localhost:8000/api/v1/books/{id}`)
2. Comments (`http://localhost:8001/api/v1/comments/{id}`)

### Every microservice contains:
1. Webserver (PHP-fpm + Nginx)
2. Database (PostgreSQL)
3. Cache (Redis)

## How to run:
1. Clone this repo
2. Create a Docker network for microservices communication by running `docker network create otus-microservices`
3. Create `.env` files for all microservices.
4. Change dir to root project. Run `make install`
5. Run `make`
6. Check `http://localhost:8000/api/v1/books/20` for example
7. Run `make stop` for down containers.

> [OTUS - Build a microservices backend (Video)](https://www.youtube.com/watch?v=AOmjQRW3Lb0)