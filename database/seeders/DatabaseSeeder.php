<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Center;
use App\Models\Customer;
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

        Customer::create([
            'companyname' => 'mnc',
            'salesname' => '-',
            'node_a' => '-',
            'node_b' => '-',
            'product' => '-',
            'ring' => '-',
            'bandwidth' => '-',
            'pair' => '-',
            'km' => '-',
            'so' => '-',
            'cid' => '-',
            'sid' => '-',
            'net_active' => '-',
            'active_date' => '2023-01-05',
            'hh_access' => '-',
            'backbone' => '-',
            'update_node_a' => '-',
            'update_node_b' => '-',
            'port_node_a' => '-',
            'port_node_b' => '-',
            'status' => 'tidak aktif'
        ]);

        Customer::create([
            'companyname' => 'kompas',
            'salesname' => '-',
            'node_a' => '-',
            'node_b' => '-',
            'product' => '-',
            'ring' => '-',
            'bandwidth' => '-',
            'pair' => '-',
            'km' => '-',
            'so' => '-',
            'cid' => '-',
            'sid' => '-',
            'net_active' => '-',
            'active_date' => '2023-01-05',
            'hh_access' => '-',
            'backbone' => '-',
            'update_node_a' => '-',
            'update_node_b' => '-',
            'port_node_a' => '-',
            'port_node_b' => '-',
            'status' => 'tidak aktif'
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
