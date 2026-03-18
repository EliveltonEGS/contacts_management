<?php

namespace App\Application\Person\DTO;

class PersonUpdateDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email
    ) {}

    public static function makeFromArray(array $data, int $id): self
    {
        return new self(
            id: $id,
            name: $data['name'],
            email: $data['email']
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name'  => $this->name,
            'email' => $this->email,
        ];
    }
}
