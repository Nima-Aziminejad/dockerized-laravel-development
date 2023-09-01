# Dockerized Laravel Application

This project aims to provide a Docker-based environment for developing and deploying a Laravel application. It utilizes various services such as Nginx, PHP, MySQL, and Node.js to facilitate the dockerization process.

## Services

### Nginx

The Nginx service serves as a web server and reverse proxy for the Laravel application. The Nginx configuration is defined in the `nginx/default.conf` file. The Laravel application's root directory is set to `/var/www/html`.

### PHP

The PHP service is responsible for running the Laravel application.

### MySQL

The MySQL service provides a database for the Laravel application. Database configurations can be adjusted in the `docker-compose.yml` file.

### Node.js

The Node.js service is used for compiling user interface components. This service can be used to manage front-end assets and development workflows.

## Project Structure

The project directory structure is as follows:
<!-- TOC -->
* [Dockerized Laravel Application](#dockerized-laravel-application)
  * [etc](#services)
    * [Nginx](#nginx)
    * [PHP](#php)
    * [MySQL](#mysql)
    * [Node.js](#nodejs)
  * [src](#project-structure)
    * [backend](#project-structure)
  * [docker-compose.yml](#)
<!-- TOC -->

## Notes
- The www-data user is used in the PHP service to handle permissions when accessing files from the host.
- Customize the Nginx and PHP configurations in their respective files as needed.
- Access the Laravel application in your browser: http://localhost