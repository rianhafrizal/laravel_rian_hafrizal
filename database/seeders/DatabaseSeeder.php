<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\table_outletFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('table_outlet')->insert([
            'nama' => 'RS '.fake()->name(),
            'alamat' =>fake()->address(),
            'email' => Str::random(10).'@soalb.co.id',
            'telp' => fake()->phoneNumber(),
        ]);
        $outlet= DB::select('select id from table_outlet
                    order by id desc 
                    limit 1');

        $id_oulet=$outlet[0]->id;
        DB::table('table_pasien')->insert([
            'nama' => fake()->name(),
            'alamat' =>fake()->address(),
            'id_outlet' => $id_oulet ,
            'telp' => fake()->phoneNumber(),
        ]);

    }
}
