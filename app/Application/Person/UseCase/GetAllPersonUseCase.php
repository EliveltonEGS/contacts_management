<?php

namespace App\Application\Person\UseCase;

use App\Domain\Person\Services\PersonService;
use Illuminate\Pagination\LengthAwarePaginator;

class GetAllPersonUseCase
{
    public function __construct(
        private PersonService $personService
    ) {}

    public function execute(): LengthAwarePaginator
    {
        return $this->personService->all();
    }
}
