<?php

    use Gravatar\Exception\GravatarException;
    use Gravatar\Gravatar;
    require 'vendor/autoload.php';

    $gravatar = new Gravatar("amine.karismatik@gmail.com");


        $gravatar->setExtension("jpg")
              ->setSize(80)

        ;


   var_dump($gravatar->getVcardProfileData());
