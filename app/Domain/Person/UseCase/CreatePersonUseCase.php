<?php

namespace App\Domain\Person\UseCase;

use App\Application\Person\DTO\PersonCreateDTO;
use App\Domain\Person\Services\PersonService;
use App\Models\Person;

class CreatePersonUseCase
{
    public function __construct(
        private PersonService $personService
    ) {}

    public function execute(PersonCreateDTO $dto): Person
    {
        return $this->personService->create($dto->toArray());
    }
}
