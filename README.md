Silex Skeleton
==============
### A reusable Silex PHP micro-framework web application framework.

The pupose of silex-skeleton is to make it quick and easy to create a web application using the [Silex PHP micro-framework](https://github.com/silexphp/Silex)

The skeleton also includes support and example code for creating console commands using Silex. 

Installation
------------

### Clone the git repo
- From the command line, or your favorite Git Application, clone this repo to your desired location. `git clone https://github.com/perlnerd/silex-skeleton.git`.

@see http://getcomposer.org for composer details.

Clone this project and then just run `composer update` to fetch the dependencies.

*Note:* The silex-skeleton/html directory is expected to be configured as your web root.  A sample nginx config is included in silex-skeleton/nginx/silex-skeleton.nginx

Usage
-----

Some basic routes have been configured to provide an introduction to how to use Silex.

These include:

##### http://localhost/
- The simplest route.  Renders the application 'home' page using layout.twig

- Diplays a login form if the visitor is not logged in.

- To try user authentication you can run the following in your database to add a user `admin` with the password `admin`:

```
CREATE DATABASE `my_database`;
USE `my_database`;
CREATE TABLE `users` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL DEFAULT '',
  `password` VARCHAR(255) NOT NULL DEFAULT '',
  `roles` VARCHAR(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`username`, `password`, `roles`) VALUES ('admin', 'nhDr7OyKlXQju+Ge/WKGrPQ9lPBSUFfpK+B1xqx/+8zLZqRNX0+5G1zBQklXUFy86lCpkAofsExlXiorUcKSNQ==', 'ROLE_USER');
```
##### http://localhost/encode/{password}
- This simple route displays an encoded version of `password` from the route.  Useful when adding more users to your application.

##### http://localhost/hello/{name}
- A basic intro to passing a variable in the route and the use of a Controller Class.  {name} is an optional word to be used to greet someone.  If you simply call /hello/ 'Guest' will be used as the default value for the greeting.

##### http://localhost/yaml
- A route that shows you how to pass a parameter set in a Yaml config file, and stored in $app to a Twig Template.

##### http://localhost/database
- A route to show the usage of the Doctrine Service Provider, and Doctrine dbal to query a database and display the results.
- This assumes you have a MySQL server and database access configured in the DoctrineServiceProvider declaration in app/bootstrap.php

You could add some test data in MySql like so

```
CREATE DATABASE `my_database`;
USE `my_database`;
CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON my_database.* TO 'username'@'%';
FLUSH PRIVILEGES;
CREATE TABLE `some_data` (
  `first` varchar(255) NOT NULL DEFAULT '',
  `last` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`first`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `some_data` values('dave','davis'),('Don','Donegan'),('Wally','Walter'); 
```

TWIG Templates
--------------

The twig templates use the [Bootstrap](http://getbootstrap.com) HTML, CSS, JS framework.

The basic layout of all pages is defined in views/layout.twig

The layout is based on the source code of [this Tutorial](http://return-true.com/creating-simple-website-using-sensiolabs-symfony-silex-twig/)



