<?php

    use aminelch\Gravatar;
    require 'vendor/autoload.php';

    $gravatar = new Gravatar("amine.karismatik@gmail.com");

    $gravatar->setExtension("jpg")
             ->setSize(-2);

    var_dump($gravatar->image());
