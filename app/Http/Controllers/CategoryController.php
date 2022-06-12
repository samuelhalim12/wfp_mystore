<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Medicine;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //query RAW
        // $listdata = DB::select(DB::raw('select * from medicines where category_id = 1'));
        // dd($listdata);

        //query Builder
        // $listdata = DB::table('medicines')->get();

        //Eloquent
        // $listdata = Medicine::all();

        // return view('medicine.index', compact('listdata'));

        //Method#1: Query Builder
        $data = DB::table('categories')
                ->get();

        //Method#2: Eloquent
        $data = Category::all();
        return view('report.all_category', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Category();
        $data->name = $request->get('name');
        $data->description = $request->get('description');
        $data->save();
        return redirect()->route('kategori_obat.index')->with('status','Category has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $cat = Category::find($category);
        // dd($cat);
        $data = $cat;
        return view('category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $cat = Category::find($category);
        // dd($category);
        $cat->name= $request->get('name');
        $cat->description = $request->get('description');
        $cat->save();
        return redirect()->route('kategori_obat.index')->with('status','Category data is changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $cat = Category::find($category);
        // dd($category);
        try {
            $cat->delete();
            return redirect()->route('kategori_obat.index')->with('status','Data category berhasil dihapus');
        } catch (\PDOException $e) {
            $msg = "Data gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan";
            return redirect()->route('kategori_obat.index')->with('error',$msg);
        }
    }
    public function getEditForm(Request $request)
    {
        $id=$request->get('id');
        $data=Category::find($id);
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('category.getEditForm',compact('data'))->render()),200
        );
    }
    public function getEditForm2(Request $request)
    {
        $id=$request->get('id');
        $data=Category::find($id);
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('category.getEditForm2',compact('data'))->render()),200
        );
    }
    public function saveData(Request $request)
    {
        $id=$request->get('id');
        $category=Category::find($id);
        $category->name=$request->get('name');
        $category->description=$request->get('description');
        $category->save();
        return response()->json(array(
            'status'=>'oke',
            'msg'=> 'sukses mengubah data category'),200
        );
    }
    public function deleteData(Request $request)
    {
        try{
            $id=$request->get('id');
            $category=Category::find($id);
            // $category->name=$request->get('name');
            $category->delete();
            return response()->json(array(
                'status'=>'oke',
                'msg'=> 'sukses menghapus data category'),200
            );
        }catch(\PDOException $e){
            return response()->json(array(
                'status'=>'gagal',
                'msg'=> 'gagal menghapus data category'),200
            );
        }
    }
    public function showlist($id_category) {

        // // Method#1: Query Builder
        // $data = DB::table('categories')
        //         ->join('medicines','categories.id','=','medicines.category_id')
        //         ->where('categories.id','=',$id_category)
        //         ->get();
        // //output->get always return ArrayList / Collections
        // $getTotalData = $data->count();

        //Method#2: Eloquent
        $data = Category::find($id_category);
        dd($data);
        $namecategory = $data->name;

        //with find statement, the 'data' will return as single model/class
        $result = $data->medicines;
        // dd($result);

        if($result){
            $getTotalData = $result->count();
        }
        else {
            $getTotalData = 0;
        }

        return view('report.list_medicine_by_category', compact('id_category', 'namecategory', 'result', 'getTotalData'));

    }
    public function showcategory() {

        //Method#1: Query Builder
        $data = DB::table('categories')
                ->get();

        //Method#2: Eloquent
        $data = Category::all();
        return view('report.all_category', compact('data'));
    }
    public function showaggregation(){
        //No 1 & 2
        //Method#1: Query Builder
        // $data = DB::table('categories')->whereNotIn('id',function($q){
        //     $q->select('category_id')->from('medicines');
        // })->get();

        //Method#2: Eloquent
        $data = Category::whereNotIn('id',function($q){
            $q->select('category_id')->from('medicines');
        })->get();

        $catWithNoMed = $data->count();

        //No 3
        //Average price of each medicine category
        //Method#1: Query Builder
        // $data3 = DB::table('categories')
        //         ->leftjoin('medicines','categories.id','=','medicines.category_id')
        //         ->select('categories.name', DB::raw('avg(medicines.price) as average'))
        //         ->groupBy('categories.name')
        //         ->get();
        //Method#2: Eloquent
        $data3 = Category::select('name', DB::raw('avg(medicines.price) as average'))
                ->leftjoin('medicines','categories.id','=','medicines.category_id')
                ->groupBy('categories.name')
                ->get();
        // dd($data3);

        //No 4
        //Show all data in categories that have only 1 medicine
        //Method#1: Query Builder
        // $data4 = DB::table('categories')
        //         ->leftjoin('medicines','categories.id','=','medicines.category_id')
        //         ->select('categories.name', DB::raw('count(medicines.id) as total'))
        //         ->groupBy('categories.name')
        //         ->havingRaw('count(medicines.id) = 1')
        //         ->get();
        //Method#2: Eloquent
        $data4 = Category::select('name', DB::raw('count(medicines.id) as total'))
                ->leftjoin('medicines','categories.id','=','medicines.category_id')
                ->groupBy('categories.name')
                ->havingRaw('count(medicines.id) = 1')
                ->get();
        // dd($data4);

        //No 5
        //Show medicine that have one form
        //Method#1: Query Builder
        // $data5 = DB::table('medicines')
        //         ->select('medicines.generic_name', DB::raw('count(medicines.generic_name) as total'))
        //         ->groupBy('medicines.generic_name')
        //         ->havingRaw('count(medicines.generic_name) = 1')
        //         ->get();
        //Method#2: Eloquent
        $data5 = Medicine::select('generic_name', DB::raw('count(generic_name) as total'))
                ->groupBy('generic_name')
                ->havingRaw('count(generic_name) = 1')
                ->get();
        // dd($data5);

        //No 6
        //Display category and name of medicine that has highest price
        //Method#1: Query Builder
        // $data6 = DB::table('categories')
        //         ->leftjoin('medicines','categories.id','=','medicines.category_id')
        //         ->select('categories.name', 'medicines.generic_name', 'medicines.price')
        //         ->orderBy('medicines.price', 'desc')
        //         ->first();
        //Method#2: Eloquent
        $data6 = Category::select('name', 'medicines.generic_name', 'medicines.price')
                ->leftjoin('medicines','categories.id','=','medicines.category_id')
                ->orderBy('medicines.price', 'desc')
                ->first();
        // dd($data6);
        return view('report.aggregation', compact('data','catWithNoMed','data3','data4','data5','data6'));

    }
    public function showNameFormPrice(){

        //Method#1: Query Builder
        $data = DB::table('medicines')
                ->get();

        //Method#2: Eloquent
        // $data = Medicine::all();
        return view('report.med_name_form_price', compact('data'));
    }
    public function showmednameformcatid(){

        //Method#1: Query Builder
        $data = DB::table('medicines')
                ->join('categories','categories.id','=','medicines.category_id')
                ->get(['medicines.generic_name','medicines.form','medicines.restriction_formula','categories.name']);
        // dd($data);
        //Method#2: Eloquent
        // return view('report.med_name_form_catid', compact('data'));
        return view('layout.conquer', compact('data'));
    }
}
