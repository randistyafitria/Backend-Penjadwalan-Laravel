<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadkul;
use Illuminate\Support\Facades\Validator;

class JadkulController extends Controller
{
     /**
     * index
     * 
     * @return void
     */

    public function index()
    {
        //get data from table jakduls
        $jadkuls = Jadkul::latest()->get();

        return view('jadkul.index', compact(['jadkuls']));

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Jadwal Kuliah',
            'data'    => $jadkuls
        ], 200);

    }

    /**
     * index
     *
     * @return void
     */
    public function create()
    {
        
        //return view('jadkul.create');

    }


    /**
    * show
    *
    * @param  mixed $id
    * @return void
    */
   public function show($id)
   {
       //find jadkul by ID
       $jadkul = Jadkul::findOrfail($id);

       //make response JSON
       return response()->json([
           'success' => true,
           'message' => 'Detail Data Jadwal Kuliah',
           'data'    => $jadkul 
       ], 200);
   }

       /**
    * store
    *
    * @param  mixed $request
    * @return void
    */
   public function store(Request $request)
   {
       //set validation
       $validator = Validator::make($request->all(), [
            'kode_pengampu' => 'required',
            'kode_jam'      => 'required',
            'kode_hari'     => 'required',
            'kode_ruang'    => 'required',
       ]);

       //response error validation
       if ($validator->fails()){
           return response()->json($validator->errors(), 400);
       }

       //save to database
       $jadkul = Jadkul::create([
            'kode_pengampu'     => $request->kode_pengampu,
            'kode_jam'          => $request->kode_jam,
            'kode_hari'         => $request->kode_hari,
            'kode_ruang'        => $request->kode_ruang,
       ]);

       //success save to database
       if($jadkul) {
           return response()->json([
               'success' => true,
               'message' => 'Jadwal Kuliah Created',
               'data'    => $jadkul  

           ], 201);
       }

       //failed save to database
       return response()->json([
           'success' => false,
           'message' => 'Jadwal Kuliah Failed to Save',
       ], 409);
   }

       /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $jadkul
    * @return void
    */
   public function update(Request $request, $id)
   {
       //set validation
       $validator = Validator::make($request->all(),[
            'kode_pengampu' => 'required',
            'kode_jam'      => 'required',
            'kode_hari'     => 'required',
            'kode_ruang'    => 'required',
       ]);

       //response error validation
       if($validator->fails()){
           return response()->json($validator->errors()->toJson());
       }
       $jadkul = Jadkul::findOrfail($id)->update([
            'kode_pengampu'     => $request->kode_pengampu,
            'kode_jam'          => $request->kode_jam,
            'kode_hari'         => $request->kode_hari,
            'kode_ruang'        => $request->kode_ruang,
       ]);
       if($jadkul){
           return response()->json([
               'status'  =>true, 
               'message' =>'Jadwal Kuliah Updated',
                'data'    => $jadkul 
           ], 200);
       } else {
           return response()->json([
               'status'  =>false, 
               'message' =>'Jadwal Kuliah Failed to Update'
           ], 404);
       }
   }

   /**
    * destroy
    *
    * @param  mixed $id
    * @return void
    */
   public function destroy($id)
   {
       //find jadkul by ID
       $jadkul = Jadkul::findOrfail($id);

       if($jadkul){
           
           //delete jadkul
           $jadkul->delete();

           return response()->json([
               'success' => true,
               'message' => 'Jadwal Kuliah Deleted',
           ], 200);
       }

       //data jadkul not found
       return response()->json([
           'success' => false,
           'message' => 'Jadwal Kuliah Not Found',
       ], 404);
   }
}
