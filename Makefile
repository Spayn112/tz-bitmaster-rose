run:
	docker-compose run --rm app php fixtures/texttest_fixture.php 5

test:
	docker-compose run --rm app composer tests

phpstan:
	docker-compose run --rm app composer phpstan

cs-fix:
	docker-compose run --rm app composer fix-cs

cs-check:
	docker-compose run --rm app composer check-cs

shell:
	docker-compose run --rm app sh
