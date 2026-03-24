<?php

namespace App\Application\Person\DTO;

use App\Entities\Person;

class PersonDTO
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $email,
        public ?string $avatar_url,
    ) {}

    public static function makeFromArray(array $data, ?int $id = null): self
    {
        return new self(
            id: $id,
            name: $data['name'],
            email: $data['email'],
            avatar_url: $data['avatar_url'] ?? null
        );
    }

    public function toEntity(): Person
    {
        return new Person(
            id: $this->id,
            name: $this->name,
            email: $this->email,
            avatar_url: $this->avatar_url
        );
    }
}
