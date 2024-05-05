<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = $this->data();
        $exists = Admin::where('username', $admin['username'])->exists();
        if (!$exists) {
            Admin::create($admin);
        }
    }

    public function data()
    {
        return [
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),

        ];
    }
}
