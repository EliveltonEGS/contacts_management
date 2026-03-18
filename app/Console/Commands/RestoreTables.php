<?php

namespace App\Console\Commands;

use App\Models\Contact;
use App\Models\Person;
use Illuminate\Console\Command;

class RestoreTables extends Command
{
    protected $signature = 'app:restore-tables';

    protected $description = 'Restore tables';

    public function handle(): int
    {
        Contact::onlyTrashed()->restore();
        Person::onlyTrashed()->restore();
        return Command::SUCCESS;
    }
}
