<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class AssignPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:assign-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign permissions to roles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo(
            'edit-any-post',
            'delete-any-post',
            'manage-quest',
            'manage-item',
            'edit-any-character',
            'delete-any-character'
        );

        $modRole = Role::findByName('moderator');
        $modRole->givePermissionTo(
            'edit-any-post',
            'delete-any-post',
            'edit-any-character',
            'delete-any-character'
        );

        $this->info('Permissions assigned successfully!');
    }
}
