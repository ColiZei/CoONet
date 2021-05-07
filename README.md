# CoONet

A Social Network Project to practice Vue.js and Symfony

# Installation

## Environment Variables

Copy `.env_example` to `.env` and set the variables.

## Build and start Docker

`docker-compose up -d --build`

## Install Composer Dependencies

`docker-compose exec coonet-php-apache-service composer install`

## Setup Symfony Database Environment Variables in `/app/.env`

Use the mysql driver instead of postgresql:

`DATABASE_URL="mysql://db_user:db_password@coonet-mysql-service:3306/db_name?serverVersion=5.7"`

Use `coonet-mysql-service` as hostname

## Initialize Database

`docker-compose exec coonet-php-apache-service doctrine:schema:create`

## Stop Docker

`docker-compose down`

# Developing

## Start Docker

`docker-compose up -d`

## Stop Docker

`docker-compose down`
