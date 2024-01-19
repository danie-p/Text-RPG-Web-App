<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class DeleteRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-role';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete role';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $role = Role::findByName('editor');
        $role->delete();

        $this->info('Role deleted successfully!');
    }
}
