<?php

namespace App\Application\Person\UseCase;

use App\Domain\Person\Services\PersonService;
use App\Models\Person;

class FindPersonUseCase
{
    public function __construct(
        private PersonService $personService
    ) {}

    public function execute(int $id): Person
    {
        return $this->personService->find($id);
    }
}
