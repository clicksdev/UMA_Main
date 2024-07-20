<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class AdminsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) {
            \App\Models\Admin::create([
                'name' => Str::random(8),
                'email' => Str::random(12).'@mail.com',
                'password' => bcrypt('123456')
            ]);
        }
    }
}
