<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class CreatePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create and define permissions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Permission::create(['name' => 'edit-any-post']);
        Permission::create(['name' => 'delete-any-post']);
        Permission::create(['name' => 'manage-quest']);
        Permission::create(['name' => 'manage-item']);
        Permission::create(['name' => 'edit-any-character']);
        Permission::create(['name' => 'delete-any-character']);

        $this->info('Permissions created successfully!');
    }
}
