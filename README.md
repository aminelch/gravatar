# Gravatar

Gravatar is a small library  for interfacing with **gravatar**

## Installation

First, pull in the package through Composer via the command line:

``` bash
$ composer require aminelch/gravatar
```

## Usage
``` php
$gravatar = new Gravatar("jhondoe@example.com");
$gravatar->setExtension("jpg") //setting image extension 
					->setSize(80) //setting maximaum image size 
					->image() ;  //use this method to get  complete image path
 
```