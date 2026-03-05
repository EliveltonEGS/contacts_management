<?php

namespace App\Domain\Contact\Repository\Contracts;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface ContactRepositoryInterface
{
    // Functions default
    public function all(): LengthAwarePaginator;
    public function show(int $id): ?Model;
    public function create(array $data): Model;
    public function update(int $id, array $data): ?Model;
    public function delete(int $id): bool;
}
