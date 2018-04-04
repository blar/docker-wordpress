all: web cli

web:
	docker build --tag foobox/wordpress:latest-web --file Dockerfile.d/web .

cli:
	docker build --tag foobox/wordpress:latest-cli --file Dockerfile.d/cli .
