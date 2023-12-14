#!/bin/bash

cd /var/www/html/kompass || exit
git pull
composer update
