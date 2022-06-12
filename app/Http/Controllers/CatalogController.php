<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function show($name) {
        $data = [
            'medicines' => 'Medicines',
            'med_equip' => 'Medicine Equipment',
            '' => 'x'
        ];
        
        return view('catalog',[
            'catalog' => $data[$name]
        ]);
    }
}
