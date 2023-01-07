<?php

class Album
{
    public function __construct(
        public string $email,
        public string $prive,
        public string $nom,
        public string $id
    )
    {
    }

    public function verify(): bool
    {
        $isValid = true;

        if ($this->email === '') {
            $isValid = false;
        }

        return $isValid;
    }
}
