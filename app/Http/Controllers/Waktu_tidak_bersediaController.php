<?php

namespace App\Http\Controllers;

use App\Models\Wkt_tdk_bersedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class Waktu_tidak_bersediaController extends Controller
{

    //Method GET All
    public function index()
    {
        //get data from table wkt_tdk_bersedias
        $wkt_tdk_bersedias = Wkt_tdk_bersedia::latest()->get();

        return view('waktu_tidak_bersedia.index', compact(['wkt_tdk_bersedias']));

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Waktu Tidak Bersedia',
            'data'    => $wkt_tdk_bersedias
        ], 200);

    }

   //Method GET By ID
   public function show($id)
   {
       //find wkt_tdk_bersedia by ID
       $wkt_tdk_bersedia = Wkt_tdk_bersedia::findOrfail($id);

       //make response JSON
       return response()->json([
           'success' => true,
           'message' => 'Detail Data Waktu Tidak Bersedia',
           'data'    => $wkt_tdk_bersedia 
       ], 200);
   }

   //Method POST data Waktu tidak bersedia
   public function store(Request $request)
   {
       //set validation
       $validator = Validator::make($request->all(), [
           'kode_dosen'      => 'required',
           'kode_hari'       => 'required',
           'kode_jam'        => 'required'
       ]);
       //response error validation
       if ($validator->fails()){
           return response()->json($validator->errors(), 400);
       }
       //save to database
       $wkt_tdk_bersedia = Wkt_tdk_bersedia::create([
           'kode_dosen'      => $request->kode_dosen,
           'kode_hari'       => $request->kode_hari,
           'kode_jam'        => $request->kode_jam
       ]);
       //success save to database
       if($wkt_tdk_bersedia) {
           return response()->json([
               'success' => true,
               'message' => 'Waktu Tidak Bersedia Created',
               'data'    => $wkt_tdk_bersedia  

           ], 201);
       }
       //failed save to database
       return response()->json([
           'success' => false,
           'message' => 'Waktu Tidak Bersedia Failed to Save',
       ], 409);
   }

   //Method PUT data Waktu tidak bersedia by ID
   public function update(Request $request, $id)
   {
       //set validation
       $validator = Validator::make($request->all(),[
           'kode_dosen'=>'required',
           'kode_hari'=>'required',
           'kode_jam'=>'required'
       ]);

       //response error validation
       if($validator->fails()){
           return response()->json($validator->errors()->toJson());
       }
       
       $wkt_tdk_bersedia = Wkt_tdk_bersedia::findOrfail($id)->update([
           'kode_dosen'    =>$request->get('kode_dosen'),
           'kode_hari'     =>$request->get('kode_hari'),
           'kode_jam'      =>$request->get('kode_jam'),
       ]);
       if($wkt_tdk_bersedia){
           return response()->json([
               'status'  =>true, 
               'message' =>'Waktu Tidak Bersedia Updated',
               'data'    => $wkt_tdk_bersedia 
           ], 200);
       } else {
           return response()->json([
               'status'  =>false, 
               'message' =>'Waktu Tidak Bersedia Failed to Update'
           ], 404);
       }
   }

   //Method DELETE data Waktu tidak bersedia by ID
   public function destroy($id)
   {
       //find wkt_tdk_bersedia by ID
       $wkt_tdk_bersedia = Wkt_tdk_bersedia::findOrfail($id);

       if($wkt_tdk_bersedia){
           
           //delete wkt_tdk_bersedia
           $wkt_tdk_bersedia->delete();

           return response()->json([
               'success' => true,
               'message' => 'Waktu Tidak Bersedia Deleted',
           ], 200);
       }

       //data post not found
       return response()->json([
           'success' => false,
           'message' => 'Waktu Tidak Bersedia Not Found',
       ], 404);
   }
}
