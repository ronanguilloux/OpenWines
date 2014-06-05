#
# Makefile
# ronan, 2014-03-05 10:40
#

help:
	@echo
	@echo "Available tasks:"
	@echo
	@echo "\tTo run front-end assets building: make integration"
	@echo "\tTo install: make install"
	@echo "\tTo fetch updated sources: make gitPull"
	@echo "\tTo drop db: make dropDb"
	@echo "\tTo clear all caches (dev/prod): make clear"
	@echo "\tTo redeploy: Update a git-based release in a production environment"
	@echo

dropDb:
	@echo
	@echo "Drop database..."
	@php app/console doctrine:database:drop --force

createDb:
	@echo
	@echo "Create database..."
	@php app/console doctrine:database:create
	@php app/console doctrine:schema:update --force

clear:
	@echo
	@echo "Resetting cache..."
	@php app/console cache:clear --env=dev
	@php app/console cache:clear --env=prod --no-debug

integration:
	@echo
	@cd integration
	@gulp build
	@cd ../

gitPull:
	@git pull origin master
	@sudo chmod -R 777 app/cache/*
	@composer install --optimize-autoloader
	@php app/console doctrine:schema:update --force

buildAssets:
	@php app/console assets:install --symlink

explainDeploy:
	@echo "git pull origin master + update db schema + build integration + copy new assets + rebuild prod cache"
	@echo "Note you can change the git remote repo username in .git/config"

done:
	@echo
	@echo "Done."

# Tasks sets:

install: createDb clear done
reinstall: dropDb install
deploy: explainDeploy gitPull buildAssets clear done

# vim:ft=make
