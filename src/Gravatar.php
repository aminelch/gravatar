<?php

    namespace Gravatar;

    /**
     * Class Gravatar
     * this class is a simple implementation of gravatar service
     * @author aminelch
     * @package Gravatar
     */
    class Gravatar
    {
        /**
         * @var string
         */
        private  $email;


        /**
         * Gravatar constructor.
         *
         * @param string $email
         */
        public function __construct(string $email)
        {
            $this->email = $email;

        }

        /**
         * get a md5 hash for an email
         * @param $email
         *
         * @return string
         */
        public function hash($email):string {

            return md5(strtolower(trim($email)));

        }
        /**
         * @return string
         */
        public function getEmail(): string
        {
            return $this->email;
        }

        /**
         * @param string $email
         */
        public function setEmail(string $email): void
        {
            $this->email = $email;
        }






    }
