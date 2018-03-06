Symfony Project Edition
========================

Welcome to the Symfony Project - a simple example catalog that you can 
use as the skeleton for your new products catalog.

Installation
============

Symfony-project work with PHP 7.0 or later and MySQL 5.4 or later (please check requirements)

### From repository

Get Symfony-Catalog source files from GitHub repository:
```
git clone https://github.com/Konstyantin/Symfony-project.git %path%
```

Download `composer.phar` to the project folder:
```
cd %path%
curl -s https://getcomposer.org/installer | php
```

Install composer dependencies with the following command:
```
php composer.phar install

```

Update schema
================
You can update schema via the command line by using the doctrine:schema:update --force command:
  
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
php bin/console doctrine:schema:update --force 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Migrations
================
All of the migrations functionality is contained in a few console commands:  
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
php bin/console 

doctrine:migrations
  :diff     Generate a migration by comparing your current database to your mapping information.
  :execute  Execute a single migration version up or down manually.
  :generate Generate a blank migration class.
  :migrate  Execute a migration to a specified version or the latest available version.
  :status   View the status of a set of migrations.
  :version  Manually add and delete migration versions from the version table.
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Loading Fixtures
================
You can load fixtures via the command line by using the doctrine:fixtures:load command:
  
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
php bin/console doctrine:fixtures:load 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Running test suite
==================
Tests are located in tests directory. By default test suites:
  
  * unit
  
  * acceptance
  
Tests can be executed by running

~~~~~~~~
php vendor/bin/codecept run acceptance
~~~~~~~~

~~~~~~~~
php vendor/bin/codecept run unit
~~~~~~~~