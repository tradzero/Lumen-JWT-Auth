<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Requests;
use App\User;

class CreateAdminCommand extends Command
{
    protected $signature = 'account:admin';

    protected $description = 'create admin account';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $admin = User::where('username', 'admin')->first();
        if (! $admin) {
            $admin = new User();
            $admin->username = 'admin';
            $admin->password = '123456';
            $admin->save();

            $this->info('successfuly created');
        } else {
            $this->error('admin account had created');
        }
    }
}