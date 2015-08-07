Silex Skeleton
==============
### A reusable Silex PHP micro-framework web application framework.

The pupose of silex-skeleton is to make it quick and easy to create a web application using the [Silex PHP micro-framework](https://github.com/silexphp/Silex)

The skeleton also includes support and example code for creating console commands using Silex. 

Installation
------------

### Clone the git repo
- From the command line, or your favorite Git Application, clone this repo to your desired location. `git clone https://github.com/perlnerd/silex-skeleton.git`.

*Note:* The silex-skeleton/html directory is expected to be configured as your web root.  A sample nginx config is included in silex-skeleton/nginx/silex-skeleton.nginx

Usage
-----

Some basic routes have been configured to provide an introduction to how to use Silex.

These include:

##### http://localhost/
- The simplest route.  Renders the application 'home' page using layout.twig

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



