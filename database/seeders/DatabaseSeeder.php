<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Center;
use App\Models\Stasiun;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin',
        	'username' => 'admin',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('12345'),
        	'role' => 'admin',
        ]);

        Center::create([
            'data_center' => 'jakarta',
        	'area' => 'jakarta',
        ]);

        Stasiun::create([
            'daop' => 'jakarta',
        	'nama_stasiun' => 'jakarta',
        	'kodkod' => 'jakarta',
        	'kmtsta' => 'jakarta',
        	'line' => 'jakarta',
        	'remark' => 'jakarta',
        	'rel_aktif_no_bb' => 'jakarta',
        	'ring' => 'jakarta',
        	'segmen' => 'jakarta',
        ]);
    }
}
