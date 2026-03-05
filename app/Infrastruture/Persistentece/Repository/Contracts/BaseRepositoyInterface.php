<?php

namespace App\Infrastruture\Persistentece\Repository\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseRepositoyInterface
{
    public function all(): LengthAwarePaginator;
    public function show(int $id): ?Model;
    public function create(array $data): Model;
    public function update(int $id, array $data): ?Model;
    public function delete(int $id): bool;
}
