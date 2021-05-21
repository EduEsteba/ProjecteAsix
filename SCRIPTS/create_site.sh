#!/bin/bash

a=$1
b="DocumentRoot"
c="${b} ${a}"
echo "<VirtualHost *:80>" >> /etc/apache2/sites-available/$2.conf
echo "ServerName $3" >> /etc/apache2/sites-available/$2.conf
echo "ServerAdmin webmaster@localhost" >> /etc/apache2/sites-available/$2.conf
echo "${c}" >> /etc/apache2/sites-available/$2.conf
echo "ErrorLog /var/www/$2/log/error.log"  >> /etc/apache2/sites-available/$2.conf
echo "CustomLog /var/www/$2/log/access.log combined"  >> /etc/apache2/sites-available/$2.conf
echo "</VirtualHost>"  >> /etc/apache2/sites-available/$2.conf

echo "<Directory /var/www/$2>" >> /etc/apache2/sites-available/$2.conf
echo "Options +Indexes" >> /etc/apache2/sites-available/$2.conf
echo "</Directory>" >> /etc/apache2/sites-available/$2.conf
