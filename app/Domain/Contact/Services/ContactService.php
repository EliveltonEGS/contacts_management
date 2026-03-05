<?php

namespace App\Domain\Contact\Services;

use App\Application\Contact\DTO\ContactCreateDTO;
use App\Application\Contact\DTO\ContactUpdateDTO;
use App\Domain\Contact\Repository\Contracts\ContactRepositoryInterface;
use App\Models\Contact;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactService
{
    public function __construct(
        private ContactRepositoryInterface $repository
    ) {}

    public function all(): LengthAwarePaginator
    {
        return $this->repository->all();
    }

    public function show(int $id): ?Contact
    {
        return $this->repository->show($id);
    }

    public function create(ContactCreateDTO $dto): Contact
    {
        return $this->repository->create((array) $dto);
    }

    public function update(ContactUpdateDTO $dto): Contact
    {
        return $this->repository->update($dto->id, (array) $dto);
    }
    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
