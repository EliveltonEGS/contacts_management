<?php

namespace App\Domain\Person\Repository;

use App\Domain\Person\Repository\Contracts\PersonRepositoryInterface;
use App\Infrastruture\Repository\BaseRepository;
use App\Models\Person;

class PersonRepository extends BaseRepository implements PersonRepositoryInterface
{
    public function __construct(
        private Person $person
    ) {
        parent::__construct($person);
    }
}
