<?php

namespace App\Domain\Contact\Repository;

use App\Domain\Contact\Repository\Contracts\ContactRepositoryInterface;
use App\Infrastruture\Persistentece\Repository\BaseRepository;
use App\Models\Contact;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    public function __construct(
        private Contact $model
    ) {
        parent::__construct($model);
    }
}
