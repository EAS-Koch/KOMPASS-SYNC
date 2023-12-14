#!/bin/bash

cd /var/www/html/your_project || exit
git pull
composer update