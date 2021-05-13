# CoONet

A Social Network Project to practice Vue.js and Symfony API Platform

# Server Installation

## Environment Variables

Copy `.env_example` to `.env` and set the variables.

## Build and start Docker

`docker-compose up -d --build`

## Install Composer Dependencies

`docker-compose exec coonet-php-apache-service composer install`

## Setup Symfony Database Environment Variables in `/server/.env`

Use the mysql driver instead of postgresql:

`DATABASE_URL="mysql://db_user:db_password@coonet-mysql-service:3306/db_name?serverVersion=5.7"`

Use `coonet-mysql-service` as hostname

## Initialize Database

`docker-compose exec coonet-php-apache-service doctrine:schema:create`

Load fake data:

`docker-compose exec coonet-php-apache-service doctrine:fixtures:load`

## Generate Keys for JWT

Documentation: https://api-platform.com/docs/core/jwt/

## Stop Docker

`docker-compose down`

# Client Installation

`cd client/`

## Install NPM Dependencies

`npm install`

# Developing

## Start Server

`docker-compose up -d`

## Stop Server

`docker-compose down`

## Start Client

`cd client/`

`npm run server`
