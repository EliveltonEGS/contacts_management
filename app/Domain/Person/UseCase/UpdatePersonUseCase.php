<?php

namespace App\Domain\Person\UseCase;

use App\Application\Person\DTO\PersonUpdateDTO;
use App\Domain\Person\Services\PersonService;
use App\Models\Person;

class UpdatePersonUseCase
{
    public function __construct(
        private PersonService $personService
    ) {}

    public function execute(PersonUpdateDTO $dto): Person
    {
        return $this->personService->update($dto->id, $dto->toArray());
    }
}
