<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => '1',
            'generic_name' => 'fentanil',
            'form' => 'inj 0,05 mg/mL (i.m./i.v.)',
            'restriction_formula' => '5 amp/kasus',
            'description' => 'Hanya untuk nyeri berat dan harus diberikan oleh tim medis yang dapat melakukan resusitasi',
            'TK1' => '0',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '1'
        ]);
        DB::table('products')->insert([
            'id' => '2',
            'generic_name' => 'hidromorfon',
            'form' => 'tab lepas lambat 8 mg',
            'restriction_formula' => '30 tab/bulan',
            'description' => '',
            'TK1' => '0',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '1'
        ]);
        DB::table('products')->insert([
            'id' => '3',
            'generic_name' => 'kodein',
            'form' => 'tab 10 mg',
            'restriction_formula' => '30 tab/bulan',
            'description' => '',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '1'
        ]);
        DB::table('products')->insert([
            'id' => '4',
            'generic_name' => 'asam mefenamat',
            'form' => 'kaps 250mg',
            'restriction_formula' => '30 kaps/bulan',
            'description' => '',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '2'
        ]);
        DB::table('products')->insert([
            'id' => '5',
            'generic_name' => 'ibuprofen',
            'form' => 'tab 200 mg',
            'restriction_formula' => '30 tab/bulan',
            'description' => '',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '2'
        ]);
        DB::table('products')->insert([
            'id' => '6',
            'generic_name' => 'ketoprofen',
            'form' => 'inj 50 mg/mL',
            'restriction_formula' => '',
            'description' => '',
            'TK1' => '0',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '2'
        ]);
        DB::table('products')->insert([
            'id' => '7',
            'generic_name' => 'alopurinol',
            'form' => 'tab 100 mg*',
            'restriction_formula' => '30 tab/bulan',
            'description' => 'Tidak diberikan pada saat nyeri akut',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '3'
        ]);
        DB::table('products')->insert([
            'id' => '8',
            'generic_name' => 'kolkisin',
            'form' => 'tab 500 mcg',
            'restriction_formula' => '30 tab/bulan',
            'description' => '',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '3'
        ]);
        DB::table('products')->insert([
            'id' => '9',
            'generic_name' => 'probenesid',
            'form' => 'tab 500 mg',
            'restriction_formula' => '30 tab/bulan',
            'description' => '',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '3'
        ]);
        DB::table('products')->insert([
            'id' => '10',
            'generic_name' => 'amitriptilin',
            'form' => 'tab 25 mg',
            'restriction_formula' => '30 tab/bulan',
            'description' => '',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '4'
        ]);
        DB::table('products')->insert([
            'id' => '11',
            'generic_name' => 'gabapentin',
            'form' => 'kaps 100 mg',
            'restriction_formula' => '60 kaps/bulan',
            'description' => 'Hanya untuk neuralgia pascaherpes atau nyeri neuropati diabetikum',
            'TK1' => '0',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '4'
        ]);
        DB::table('products')->insert([
            'id' => '12',
            'generic_name' => 'karbamazepin',
            'form' => 'tab 100 mg',
            'restriction_formula' => '60 tab/bulan',
            'description' => 'Hanya untuk neuralgia trigeminal',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '4'
        ]);
        DB::table('products')->insert([
            'id' => '13',
            'generic_name' => 'bupivakain',
            'form' => 'inj 0,5%',
            'restriction_formula' => '',
            'description' => '',
            'TK1' => '0',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '5'
        ]);
        DB::table('products')->insert([
            'id' => '14',
            'generic_name' => 'bupivakain heavy',
            'form' => 'inj 0,5% + glukosa 8%',
            'restriction_formula' => '',
            'description' => 'Khusus untuk analgesia spinal',
            'TK1' => '0',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '5'
        ]);
        DB::table('products')->insert([
            'id' => '15',
            'generic_name' => 'etil klorida',
            'form' => 'spray 100 mL',
            'restriction_formula' => '',
            'description' => '',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '5'
        ]);
        DB::table('products')->insert([
            'id' => '16',
            'generic_name' => 'deksmedetomidin',
            'form' => 'inj 100mcg/mL',
            'restriction_formula' => '',
            'description' => 'Untuk sedasi pada pasien di ICU, kraniotomi, bedah jantung dan operasi yang memerlukan waktu pembedahan yang lama',
            'TK1' => '0',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '6'
        ]);
        DB::table('products')->insert([
            'id' => '17',
            'generic_name' => 'desfluran',
            'form' => 'ih',
            'restriction_formula' => '',
            'description' => '',
            'TK1' => '0',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '6'
        ]);
        DB::table('products')->insert([
            'id' => '18',
            'generic_name' => 'halotan',
            'form' => 'ih',
            'restriction_formula' => '',
            'description' => 'Tidak boleh digunakan berulang. Tidak untuk pasien dengan gangguan fungsi hati.',
            'TK1' => '0',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '6'
        ]);
        DB::table('products')->insert([
            'id' => '19',
            'generic_name' => 'atropin',
            'form' => 'inj 0,25 ml/mL (i.v./s.k.)',
            'restriction_formula' => '',
            'description' => '',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '7'
        ]);
        DB::table('products')->insert([
            'id' => '20',
            'generic_name' => 'diazepam',
            'form' => 'inj 5 mg/mL',
            'restriction_formula' => '',
            'description' => '',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '7'
        ]);
        DB::table('products')->insert([
            'id' => '21',
            'generic_name' => 'midazolam',
            'form' => 'inj 1 mg/mL (i.v.)',
            'restriction_formula' => 'Dosis rumatan: 1mg/jam(24 mg/hari), Dosis premedikasi: 8 vial/kasus',
            'description' => 'Dapat digunakan untuk premedikasi sebelum induksi anestesi dan rumatan selama anestesi umum',
            'TK1' => '0',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '7'
        ]);
        DB::table('products')->insert([
            'id' => '22',
            'generic_name' => 'deksametason',
            'form' => 'inj 5 mg/mL',
            'restriction_formula' => '20 mg/hari',
            'description' => '',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '8'
        ]);
        DB::table('products')->insert([
            'id' => '23',
            'generic_name' => 'difenhidramin',
            'form' => 'inj 10 mg/mL (i.v./i.m.)',
            'restriction_formula' => '30 mg/hari',
            'description' => '',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '8'
        ]);
        DB::table('products')->insert([
            'id' => '24',
            'generic_name' => 'epinefrin (adrenalin)',
            'form' => 'inj 1 mg/mL',
            'restriction_formula' => '',
            'description' => '',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '8'
        ]);
        DB::table('products')->insert([
            'id' => '25',
            'generic_name' => 'atropin',
            'form' => 'tab 0,5 mg',
            'restriction_formula' => '',
            'description' => '',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '9'
        ]);
        DB::table('products')->insert([
            'id' => '26',
            'generic_name' => 'efedrin',
            'form' => 'inj 50 mg/mL',
            'restriction_formula' => '',
            'description' => '',
            'TK1' => '0',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '9'
        ]);
        DB::table('products')->insert([
            'id' => '27',
            'generic_name' => 'kalsium glukonat',
            'form' => 'inj 10%',
            'restriction_formula' => '',
            'description' => '',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '9'
        ]);
        DB::table('products')->insert([
            'id' => '28',
            'generic_name' => 'diazepam',
            'form' => 'inj 5 mg/mL',
            'restriction_formula' => '10 amp/kasus, kecuali untuk kasus di ICU',
            'description' => 'Tidak untuk i.m.',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '10'
        ]);
        DB::table('products')->insert([
            'id' => '29',
            'generic_name' => 'fenitoin',
            'form' => 'kaps 30 mg*',
            'restriction_formula' => '90 kaps/bulan',
            'description' => '',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '10'
        ]);
        DB::table('products')->insert([
            'id' => '30',
            'generic_name' => 'fenoarbital',
            'form' => 'tab 30 mg*',
            'restriction_formula' => '120 tab/bulan',
            'description' => '',
            'TK1' => '1',
            'TK2' => '1',
            'TK3' => '1',
            'category_id' => '10'
        ]);
    }
}
