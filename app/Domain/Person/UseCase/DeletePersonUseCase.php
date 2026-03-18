<?php

namespace App\Domain\Person\UseCase;

use App\Domain\Person\Services\PersonService;
use App\Models\Person;

class DeletePersonUseCase
{
    public function __construct(
        private PersonService $personService
    ) {}

    public function execute(int $id): bool
    {
        return $this->personService->delete($id);
    }
}
