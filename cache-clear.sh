#!/bin/sh
# @usage bash cache-clear.sh
rm -rf app/cache/dev
rm -rf app/cache/prod
echo ">          - - - php app/console cache:clear"
php app/console cache:clear
echo ">          - - - php app/console cache:clear -e prod"
php app/console cache:clear -e prod
echo ">          - - - php app/console assets:install --symlink"
php app/console assets:install --symlink
