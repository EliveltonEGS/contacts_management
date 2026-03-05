<?php

namespace App\Application\Contact\DTO;

class ContactUpdateDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $contact,
        public readonly string $email
    ) {}

    public static function makeFromArray(array $data, int $id): self
    {
        return new self(
            $id,
            $data['name'],
            $data['contact'],
            $data['email']
        );
    }
}
