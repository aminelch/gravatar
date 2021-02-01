<?php

    namespace Gravatar {



        /*
             *=============================================================================
             *                              Class Gravatar
             *=============================================================================
             * @author aminelch
             * @package Gravatar
             * This file is part of aminelch\Gravatar.
             * For the full copyright and license information, please view the LICENSE
             * file that was distributed with this source code.
             *
            */

        use Gravatar\Exception\GravatarException;

        class Gravatar
        {
            const GRAVATAR_URL                     = "https://www.gravatar.com/avatar/";
            // const GRAVATAR_DEFAULT_IMAGE_SIZE      = 80;
            const GRAVATAR_DEFAULT_IMAGE_EXTENSION = ['jpg', 'jpeg', 'png'];
            // const GRAVATAR_OPTIONS                 = ['size', 'extension'];

            /**
             * @var string
             */
            private $email;

            /**
             * @var int
             */
            private $size;

            /**
             * @var string
             */
            private $extension = null;



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
             * Change the image size value
             *
             * @param int $size
             *
             * @return Gravatar
             * @throws GravatarException
             */
            public function setSize(int $size): self
            {
                if ($size <= 0) throw new GravatarException("Size must be positive");

                $this->size = $size;
                return $this;
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
             * @return  self
             */
            public function setEmail(string $email): self
            {
                $this->email = $email;
                return $this;
            }

            /**
             * Get the image size
             *
             * @return int
             */
            public function getSize(): int
            {
                return $this->size;
            }



            /**
             * return image extension
             *
             * @return string|null
             */
            public function getExtension(): ?string
            {
                return $this->extension;
            }

            /**
             * set an extension to render image, extension must be 'jpg', 'jpeg' or 'png'
             *
             * @param string $extension
             *
             * @return Gravatar
             * @throws InvalidArgumentException
             */
            public function setExtension(string $extension): self
            {

                if (!in_array($extension, self::GRAVATAR_DEFAULT_IMAGE_EXTENSION)) {
                    throw  new \InvalidArgumentException("extension must be 'jpg', 'jpeg' or 'png'");
                }

                $this->extension = $extension;

                return $this;
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
             *
             * @return string
             */
            public function image(): string
            {
                $url = sprintf("%s%s", self::GRAVATAR_URL, $this->hash($this->email));
                if (!is_null($this->extension)) $url .= sprintf('.%s', $this->extension);
                if ($this->size) $url .= '?s=' . $this->size;
                return $url;
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
                $this->ensureIsValidEmail($email);
                return md5(strtolower(trim($email)));
            }


            /**
             * check if email is valid
             *
             * @param string $email
             *
             * @throw InvalidArgumentException
             */
            private function ensureIsValidEmail(string $email): void
            {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    throw new InvalidArgumentException(
                        sprintf(
                            '"%s" is not a valid email address',
                            $email
                        )
                    );
                }
            }
        }
    }
