<?php

namespace App\Application\Contact\DTO;

class ContactCreateDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $contact,
        public readonly string $email
    ) {}

    public static function makeFromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            contact: $data['contact'],
            email: $data['email']
        );
    }
}
