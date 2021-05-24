#!/bin/bash

sudo openssl genrsa -out /certificats/$1.key 2048
sudo openssl req -new -key /certificats/$1.key -out /certificats/$1.csr -subj "/C=de/CN=www.$1.com"
sudo openssl x509 -CA /certificats/projecte.crt -CAkey /certificats/projecte.key -req -in /certificats/$1.csr -days 365 -CAcreateserial -sha256 -out /certificats/$1.crt
