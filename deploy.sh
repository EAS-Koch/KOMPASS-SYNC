#!/bin/bash

echo "$PWD"

cd /var/www/html/your_project || exit
git pull
composer update