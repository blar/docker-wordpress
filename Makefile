all: web cli

web:
	docker build --tag foobox/wordpress:web --file Dockerfile.d/web .

cli:
	docker build --tag foobox/wordpress:cli --file Dockerfile.d/cli .
