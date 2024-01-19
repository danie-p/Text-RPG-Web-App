<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class AssignRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:assign-roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign roles to special users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $admin = User::find(1);     // 1 = user id
        $role_admin = Role::findByName('admin');
        $admin->assignRole($role_admin);

        $modB = User::find(2);
        $modC = User::find(3);
        $role_mod = Role::findByName('moderator');
        $modB->assignRole($role_mod);
        $modC->assignRole($role_mod);

        $this->info('Roles assigned successfully!');
    }
}
