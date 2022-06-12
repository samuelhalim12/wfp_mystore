<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Eloquent Model
        // $data6 = Transaction::select(DB::raw('buyers.name as buyer'), DB::raw('users.name as cashier'),'medicines.generic_name', 'medicines.price')
        //         ->join('buyers','transaction.buyer_id','=','buyers.id')
        //         ->join('users','transaction.user_id','=','users.id')
        //         ->orderBy('medicines.price', 'desc')
        //         ->first();
        $listdata = Transaction::all();
        return view('transaction.index', compact('listdata'));
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
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
    public function showAjax(Request $request) {
        $id = ($request->get('id'));
        $data = Transaction::find($id);
        $medicines = $data -> medicines;
        return response()->json(array(
            'msg'=> view('transaction.showmodal',compact('data','medicines'))->render()
            ),200);
    }
    public function submit_front()
    {
        $cart = session()->get('cart2');
        // $user = Auth::user();
        $t = new Transaction();
        // $t->user_id=$user->id;
        $t->user_id=1;
        $t->buyer_id=1;
        $t->transaction_date=Carbon::now()->toDateTimeString();
        $t->save();
        $totalharga = $t->insertProduct($cart);
        $t->total = $totalharga;

        session()->forget('cart2');

        return redirect('/');
    }



}
