<?php

namespace YassineChe\LaravelDokan\Commands;

use Illuminate\Console\Command;

class LaravelDokanCommand extends Command
{
    public $signature = 'laravel-dokan';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
