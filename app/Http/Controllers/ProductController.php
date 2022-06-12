<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //query RAW
        $listdata = DB::select(DB::raw('select * from products'));
        // dd($listdata);

        //query Builder
        $listdata = DB::table('products')->get();

        //Eloquent
        $listdata = Medicine::all();

        return view('product.index', compact('listdata'));
    }
    public function showInfo()
    {
        return response()->json(array(
            'status' => 'oke',
            'msg' => "<div class='alert alert-info'>
             Did you know? <br>This message is sent by a Controller.'</div>"
        ), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
        //select * from products where id = $product
        $res = Medicine::find($product);

        // dd($res->generic_name);
        $message = "";
        if ($res) {
            $message = $res;
        } else {
            $message = NULL;
        }
        return view('product.show', compact('message'));
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
}
