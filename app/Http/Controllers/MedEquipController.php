<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedEquipController extends Controller
{
    public function show($equip_id) {
        $title = [
            '1' => 'Gunting Bedah',
            '2' => 'Stetoskop'
        ];
        $data = [
            '1' => 'med_equip1.jpg',
            '2' => 'med_equip2.jpg'
        ];
        $desc = [
            '1' => "Gunting bedah (lurus), digunakan untuk menggunting bagian-bagian alat tubuh yang akan diamati, seperti usus, jantung, pembuluh darah dan sebagainya. Umumnya digunakan untuk mengadakan bukaan pertama pada bagian tubuh yang akan diperiksa.",
            '2' => "Stetoskop adalah alat medis yang fungsinya tidak hanya untuk mendengar suara detak jantung saja, tetapi juga untuk mendengarkan suara organ lain yang berada di dalam tubuh. Beberapa organ yang dibisa didengarkan oleh alat ini di antaranya adalah suara organ pencernaan, paru-paru, bahkan sampai suara janin yang masih di dalam kandungan pun bisa didengar detak jantungnya."
        ];
        return view('detailproduct',[
            'item' => $data[$equip_id],
            'id' => $equip_id,
            'desc' => $desc[$equip_id],
            'title' => $title[$equip_id]
        ]);
    }
}
