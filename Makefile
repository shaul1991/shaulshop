DOCKER ?= cd docker &&

.PHONY: start
start: erase build up ## clean current environment, recreate dependencies and spin up again

.PHONY: erase
erase: ## stop and delete containers, clean volumes.
		$(DOCKER) docker-compose stop
		$(DOCKER) docker-compose rm -v -f

.PHONY: build
build: ## build environment and initialize composer and project dependencies
		$(DOCKER) docker-compose build

.PHONY: up
up: ## spin up environment
		$(DOCKER) docker-compose up -d
		$(DOCKER) docker-compose exec --user="www-data" shaul_was composer install --no-interaction

