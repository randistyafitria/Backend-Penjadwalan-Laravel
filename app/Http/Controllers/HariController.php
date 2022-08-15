<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hari;
use Illuminate\Support\Facades\Validator;

class HariController extends Controller
{


    public function index()
    {
        //get data from table hari
        $haris = Hari::latest()->get();

        return view('hari.index', compact(['haris']));

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Hari',
            'data'    => $haris  
        ], 200);

    }

    public function show($id)
    {
        //find hari by ID
        $hari = Hari::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Hari',
            'data'    => $hari 
        ], 200);

    }

    //Method POST data hari
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nama'      => 'required',
        ]);

        //response error validation
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $hari = Hari::create([
            'nama'      => $request->nama,
        ]);

        //success save to database
        if($hari) {
            return response()->json([
                'success' => true,
                'message' => 'Hari Created',
                'data'    => $hari  

            ], 201);
        }
        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Hari Failed to Save',
        ], 409);
    }

    //Method PUT data hari by ID
    public function update(Request $request, Hari $hari)
    {
        //set validation
        $validator = Validator::make($request->all(),[
            'nama'  =>  'required',

        ]);

        //response error validation
        if($validator->fails()){
            return response()->json($validator->errors()->toJson());
        }

        //find hari by ID
        $hari = Hari::findOrFail($hari->id);
        if($hari) {

            //update hari
            $hari->update([
                'nidn'     => $request->nidn,
                'nama'   => $request->nama,
                'alamat'   => $request->alamat,
                'telp'   => $request->telp
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Hari Updated',
                'data'    => $hari  
            ], 200);

        }

        //data hari not found
        return response()->json([
            'success' => false,
            'message' => 'Hari Not Found',
        ], 404);
    }

    //Method DELETE data Hari
    public function destroy($id)
    {
        //find hari by ID
        $hari = Hari::findOrfail($id);

        if($hari){
            
            //delete hari
            $hari->delete();

            return response()->json([
                'success' => true,
                'message' => 'Hari Deleted',
            ], 200);
        }

        //data hari not found
        return response()->json([
            'success' => false,
            'message' => 'Hari Not Found',
        ], 404);
    }
}