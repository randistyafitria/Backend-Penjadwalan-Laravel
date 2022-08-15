<?php

namespace App\Http\Controllers;

use App\Models\Pengampu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengampuController extends Controller
{
    public function index()
    {
        //get data from table pengampus
        $pengampus = Pengampu::latest()->get();

        return view('pengampu.index', compact(['pengampus']));

        return response()->json([
            'success' => true,
            'message' => 'List Data Pengampu',
            'data'    => $pengampus
        ], 200);

    }
   public function show($id)
   {
      
    $pengampu = Pengampu::findOrfail($id);

      
       return response()->json([
           'success' => true,
           'message' => 'Detail Data Pengampu',
           'data'    => $pengampu
       ], 200);
   }

      
   public function store(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'kode_mk'      => 'required',
           'kode_dosen' => 'required',
           'kelas'     => 'required',
           'tahun_akademik' => 'required'
       ]);


       if ($validator->fails()){
           return response()->json($validator->errors(), 400);
       }

      
       $pengampu = Pengampu::create([
           'kode_mk'      => $request->kode_mk,
           'kode_dosen' => $request->kode_dosen,
           'kelas'     => $request->kelas,
           'tahun_akademik'     => $request->tahun_akademik
       ]);

       
       if($pengampu) {
           return response()->json([
               'success' => true,
               'message' => 'Pengampu Created',
               'data'    => $pengampu 

           ], 201);
       }

       return response()->json([
           'success' => false,
           'message' => 'Pengampu Failed to Save',
       ], 409);
   }
   public function update(Request $request, Pengampu $pengampu)
   {
       $validator = Validator::make($request->all(),[
        'kode_mk'      => 'required',
        'kode_dosen' => 'required',
        'kelas'     => 'required',
        'tahun_akademik'     => 'required',
       ]);

       //response error valkodeation
       if($validator->fails()){
           return response()->json($validator->errors()->toJson());
       }

       //find pengampu by ID
        $pengampu = Pengampu::findOrFail($pengampu->id);
        if($pengampu) {

            //update pengampu
            $pengampu->update([
                'kode_mk'     => $request->kode_mk,
                'kode_dosen'   => $request->kode_dosen,
                'kelas'   => $request->kelas,
                'tahun_akademik'   => $request->tahun_akademik
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pengampu Updated',
                'data'    => $pengampu  
            ], 200);

        }

        //data pengampu not found
        return response()->json([
            'success' => false,
            'message' => 'Pengampu Not Found',
        ], 404);
   }
   public function destroy($id)
   {
       //find pengampu by kode
       $pengampu = Pengampu::findOrfail($id);

       if($pengampu){
           
           //delete pengampu
           $pengampu->delete();

           return response()->json([
               'success' => true,
               'message' => 'pengampu Deleted',
           ], 200);
       }

       //data pengampu not found
       return response()->json([
           'success' => false,
           'message' => 'pengampu Not Found',
       ], 404);
   }
}