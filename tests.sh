#!/usr/bin/env bash

composer lint
php -d pcov.directory='.' vendor/bin/phpunit --coverage-html build

