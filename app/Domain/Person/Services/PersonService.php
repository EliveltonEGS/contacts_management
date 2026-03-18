<?php

namespace App\Domain\Person\Services;

use App\Domain\Person\Repository\Contracts\PersonRepositoryInterface;
use App\Infrastruture\Service\BaseService;

class PersonService extends BaseService
{
    public function __construct(
        private PersonRepositoryInterface $personRepository
    ) {
        parent::__construct($this->personRepository);
    }
}
