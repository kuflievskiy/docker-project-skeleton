#!/bin/bash
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar

php wp-cli.phar core download --allow-root
cp wp-config-sample.php wp-config.php
sed -i "s/database_name_here/dbname/" wp-config.php
sed -i "s/username_here/dbuser/" wp-config.php
sed -i "s/password_here/dbpass/" wp-config.php
sed -i "s/localhost/container_dbhost/" wp-config.php

php wp-cli.phar db clean --yes --allow-root
php wp-cli.phar core install --url=http://localhost:8080 --title=Test --admin_user=admin --admin_password=admin --admin_email=kuflievskiy@gmail.com --allow-root