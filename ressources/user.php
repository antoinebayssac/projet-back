<?php

class user
{
    public function __construct(
        public string $email,
        public string $password,
        public string $password2,
        public string $firstName,
        public string $lastName,
        public  $age = null,
        public $description = null
    )
    {
    }

    public function verify(): bool
    {
        $isValid = true;

        if ($this->email === '' || $this->firstName === '' || $this->lastName === '') {
            $isValid = false;
        }

        if ($this->password === '' || $this->password !== $this->password2) {
            $isValid = false;
        }

        return $isValid;
    }
}