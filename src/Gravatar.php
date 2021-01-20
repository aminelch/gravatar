<?php

    namespace aminelch;

    /**
     * Class Gravatar
     * this class is a simple implementation of gravatar service
     *
     * @author aminelch
     * @package Gravatar
     */
    /*
     *=============================================================================
     *                              Class Gravatar
     *=============================================================================
     *@author aminelch
     *@package Gravatar
     *This file is part of aminelch\Gravatar.
     *For the full copyright and license information, please view the LICENSE
     *file that was distributed with this source code.
     *
    */

    class Gravatar
    {
        const GRAVATAR_URL = "https://www.gravatar.com/avatar/";
        /**
         * @var string
         */
        private $email;


        /**
         * Gravatar constructor.
         *
         * @param string $email
         */
        public function __construct(string $email)
        {
            $this->ensureIsValidEmail($email);
            $this->email = $email;

        }

        /**
         * check if email is valid
         *
         * @param string $email
         */
        private function ensureIsValidEmail(string $email): void
        {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new \InvalidArgumentException(
                    sprintf(
                        '"%s" is not a valid email address',
                        $email
                    )
                );
            }
        }

        /**
         * Get the address email to be used
         *
         * @return string
         */
        public function getEmail(): string
        {
            return $this->email;
        }

        /**
         * Set the address email to be used
         *
         * @param string $email
         *
         * @return  void
         */
        public function setEmail(string $email): void
        {
            $this->email = $email;
        }

        /**
         * @return string
         */
        public function __toString(): string
        {
            return $this->image();
        }

        /**
         * Return the URL of a Gravatar
         * @return string  
         */
        public function image(): string
        {

            return self::GRAVATAR_URL . $this->hash($this->email);

        }

        /**
         * get a md5 hash for an email
         *
         * @param $email
         *
         * @return string
         */
        public function hash($email): string
        {

            return md5(strtolower(trim($email)));

        }


    }
