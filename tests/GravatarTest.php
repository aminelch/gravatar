<?php

    namespace Tests\Gravatar ;

    use Gravatar\Gravatar;
    use PHPUnit\Framework\TestCase;

    class GravatarTest extends TestCase
    {

        public function testCanBeCreatedFromValidEmailAddress(): void
        {
            $gravatar = new Gravatar("joedoe12@gmail.com");
            $this->expectException("GravatarException");
        }

    }