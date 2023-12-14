#!/bin/bash

echo pwd
cd /var/www/html/kompass || exit
git pull
composer update
