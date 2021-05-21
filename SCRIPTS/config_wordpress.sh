#!/bin/bash

tmp_pass=0
if [ $tmp_pass = 0 ]; then
        tmp_pass=`head -c 30 /dev/random | base64`
        echo "${tmp_pass:0:30}" #cut to 10 characters after base64 conversion
fi
echo "<?php" >> /var/www/$1/wordpress/wp-config.php
echo "define('DB_NAME', '$1');" >> /var/www/$1/wordpress/wp-config.php
echo "define('DB_USER', '$1');" >> /var/www/$1/wordpress/wp-config.php
echo "define('DB_PASSWORD', '$2');" >> /var/www/$1/wordpress/wp-config.php
echo "define('DB_HOST','localhost');" >> /var/www/$1/wordpress/wp-config.php
echo "define('DB_CHARSET', 'utf8');" >> /var/www/$1/wordpress/wp-config.php
echo "define('DB_COLLATE', '');" >> /var/www/$1/wordpress/wp-config.php

echo "define ('AUTH_KEY',         '${tmp_pass:0:30}');" >> /var/www/$1/wordpress/wp-config.php
echo "define ('SECURE_AUTH_KEY',  '${tmp_pass:0:30}');" >> /var/www/$1/wordpress/wp-config.php
echo "define ('LOGGED_IN_KEY',    '${tmp_pass:0:30}');" >> /var/www/$1/wordpress/wp-config.php
echo "define ('NONCE_KEY',        '${tmp_pass:0:30}');" >> /var/www/$1/wordpress/wp-config.php
echo "define ('AUTH_SALT',        '${tmp_pass:0:30}');" >> /var/www/$1/wordpress/wp-config.php
echo "define ('SECURE_AUTH_SALT', '${tmp_pass:0:30}');" >> /var/www/$1/wordpress/wp-config.php
echo "define ('LOGGED_IN_SALT',   '${tmp_pass:0:30}');" >> /var/www/$1/wordpress/wp-config.php
echo "define ('NONCE_SALT',       '${tmp_pass:0:30}');" >> /var/www/$1/wordpress/wp-config.php

echo "table_prefix = 'wp_';" >> /var/www/$1/wordpress/wp-config.php
echo "define ('WP_DEBUG', false);" >> /var/www/$1/wordpress/wp-config.php
echo "if (!defined('ABSPATH') );" >> /var/www/$1/wordpress/wp-config.php
echo "	define('ABSPATH', dirname(__FILE__) . '/');" >> /var/www/$1/wordpress/wp-config.php
echo "require_once(ABSPATH . 'wp-settings.php');" >> /var/www/$1/wordpress/wp-config.php
echo "?>" >> /var/www/$1/wordpress/wp-config.php
