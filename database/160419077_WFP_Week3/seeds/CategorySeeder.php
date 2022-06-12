<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => '1',
            'name' => 'Analgesik Narkotik'
        ]);
        DB::table('categories')->insert([
            'id' => '2',
            'name' => 'Analgesik Non Narkotik'
        ]);
        DB::table('categories')->insert([
            'id' => '3',
            'name' => 'Antiprai'
        ]);
        DB::table('categories')->insert([
            'id' => '4',
            'name' => 'Nyeri Neuropatik'
        ]);
        DB::table('categories')->insert([
            'id' => '5',
            'name' => 'Anestetik Lokal'
        ]);
        DB::table('categories')->insert([
            'id' => '6',
            'name' => 'Anestetik Umum dan Oksigen'
        ]);
        DB::table('categories')->insert([
            'id' => '7',
            'name' => 'Obat untuk Prosedur Pre Operatif'
        ]);
        DB::table('categories')->insert([
            'id' => '8',
            'name' => 'Antialergi dan Obat untuk Anafilaksis'
        ]);
        DB::table('categories')->insert([
            'id' => '9',
            'name' => 'Khusus'
        ]);
        DB::table('categories')->insert([
            'id' => '10',
            'name' => 'Antiepilepsi - Antikonvulsi'
        ]);
    }
}
