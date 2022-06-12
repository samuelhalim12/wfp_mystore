<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class MedicineController extends Controller
// {
//     public function show($medicine_id) {
//         $title = [
//             '1' => 'Panadol',
//             '2' => 'OBH Combi',
//             '3' => 'Paramex',
//         ];
//         $data = [
//             '1' => 'medicines1.jpg',
//             '2' => 'medicines2.jpg',
//             '3' => 'medicines3.jpg'
//         ];
//         $desc = [
//             '1' => "Panadol adalah obat yang mengandung paracetamol. Panadol memiliki beberapa varian yang ditujukan untuk meredakan gejala dan keluhan, seperti demam, flu, sakit kepala, hidung tersumbat, batuk tidak berdahak, dan bersin-bersin.  Panadol juga sering digunakan untuk meredakan sakit gigi dan nyeri otot.",
//             '2' => "OBH Combi adalah obat batuk yang sudah menjadi kepercayaan masyarakat Indonesia selama bertahun-tahun, hingga saat ini. Khasiat dan keefektifannya dalam mengatasi batuk yang disertai dengan gejala flu, demam, bersin-bersin dan hidung tersumbat sudah dibuktikan banyak orang.",
//             '3' => "Paramex adalah produk yang bermanfaat untuk meredakan demam dan nyeri. Beberapa varian paramex juga digunakan untuk meredakan gejala flu, seperti demam, hidung tersumbat, atau batuk kering. Paramex mengandung paracetamol yang bisa meredakan demam dengan cara memengaruhi pusat pengontrol suhu di otak."
//         ];
//         return view('detailproduct',[
//             'item' => $data[$medicine_id],
//             'id' => $medicine_id,
//             'desc' => $desc[$medicine_id],
//             'title' => $title[$medicine_id]
//         ]);
//     }

// }

namespace App\Http\Controllers;

use App\Category;
use App\Medicine;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //query RAW
        $listdata = DB::select(DB::raw('select * from medicines'));
        // dd($listdata);

        //query Builder
        $listdata = DB::table('medicines')->get();

        //Eloquent
        $listdata = Medicine::all();

        return view('medicine.index', compact('listdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collection = Category::all();
        return view('medicine.create', compact('collection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Medicine();
        $data->name = $request->get('generic_name');
        $data->form = $request->get('form');
        $data->restriction_formula = $request->get('restriction_formula');
        $data->description = $request->get('description');
        $data->tk1 = $request->get('tk1');
        $data->tk2 = $request->get('tk2');
        $data->tk3 = $request->get('tk3');
        $data->category_id = $request->get('tk3');
        $data->save();
        return redirect()->route('kategori_obat.index')->with('status','Category has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($medicine)
    {
        //select * from products where id = $medicine
        $res = Medicine::find($medicine);

        // dd($res->generic_name);
        $message = "";
        if ($res) {
            $message = $res;
        } else {
            $message = NULL;
        }
        return view('medicine.show', compact('message'));
    }
    public function showInfo()
    {
        return response()->json(array(
            'status' => 'oke',
            'msg' => "<div class='alert alert-info'>
             Did you know? <br>This message is sent by a Controller.'</div>"
        ), 200);
    }
    public function front_index()
    {
        $medicine = Medicine::all();
        return view('frontend.product', compact('medicine'));
    }
    public function addToCart($id)
    {
        $p = Medicine::find($id);
        $cart = session()->get('cart2');
        if(!isset($cart[$id]))
        {
            $cart[$id] = [
                "name" => $p->generic_name,
                "price" => $p->price,
                "quantity" => 1,
                "photo" => $id.'.jpg'
            ];
        }
        else {
            $cart[$id]['quantity']++;
        }
        session()->put('cart2',$cart);
        return redirect()->back()->with('success','product berhasil ditambahkan ke keranjang');
    }
    public function showHighestPrice()
    {
        $data6 = Medicine::orderBy('price','DESC')->first();
        return response()->json(array(
            'status' => 'oke',
            'msg' => "<div class='alert alert-info'>
                     Did you know? <br>The most expensive product is $data6->generic_name.</div>"
        ), 200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function showNameFormPrice()
    {

        //Method#1: Query Builder
        $data = DB::table('medicines')
            ->get();

        //Method#2: Eloquent
        // $data = Medicine::all();
        return view('report.med_name_form_price', compact('data'));
    }
    public function showmednameformcatid()
    {

        //Method#1: Query Builder
        $data = DB::table('medicines')
            ->join('categories', 'categories.id', '=', 'medicines.category_id')
            ->get(['medicines.generic_name', 'medicines.form', 'medicines.restriction_formula', 'categories.name']);
        // dd($data);
        //Method#2: Eloquent
        // return view('report.med_name_form_catid', compact('data'));
        return view('layout.conquer', compact('data'));
    }
}
