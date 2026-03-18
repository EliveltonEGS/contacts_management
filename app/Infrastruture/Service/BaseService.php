<?php

namespace App\Infrastruture\Service;

use App\Infrastruture\Repository\Contracts\BaseRepositoyInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseService
{
    public function __construct(
        private BaseRepositoyInterface $baseRepository
    ) {}

    public function all(): LengthAwarePaginator
    {
        return $this->baseRepository->all();
    }

    public function find(int $id): ?Model
    {
        return $this->baseRepository->find($id);
    }

    public function create(array $data): Model
    {
        return $this->baseRepository->create($data);
    }

    public function update(int $id, array $data): Model
    {
        return $this->baseRepository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->baseRepository->delete($id);
    }
}
