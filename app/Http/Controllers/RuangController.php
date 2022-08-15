<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;
use Illuminate\Support\Facades\Validator;

class RuangController extends Controller
{
    /**
     * index
     * 
     * @return void
     */

     public function index()
     {
         //get data from table ruangs
         $ruangs = Ruang::latest()->get();

         return view('ruang.index', compact(['ruangs']));

         //make response JSON
         return response()->json([
             'success' => true,
             'message' => 'List Data Ruang',
             'data'    => $ruangs
         ], 200);

     }

     /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //find ruang by ID
        $ruang = Ruang::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Ruang',
            'data'    => $ruang 
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
            'nama'      => 'required',
            'kapasitas' => 'required',
            'jenis'     => 'required',
        ]);

        //response error validation
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $ruang = Ruang::create([
            'nama'      => $request->nama,
            'kapasitas' => $request->kapasitas,
            'jenis'     => $request->jenis,
        ]);

        //success save to database
        if($ruang) {
            return response()->json([
                'success' => true,
                'message' => 'Ruang Created',
                'data'    => $ruang  

            ], 201);
        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Ruang Failed to Save',
        ], 409);
    }

        /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $ruang
     * @return void
     */
    public function update(Request $request, Ruang $ruang)
    {
        //set validation
        $validator = Validator::make($request->all(),[
            'nama'      =>'required',
            'jenis'     =>'required',
            'kapasitas' =>'required',
        ]);

        //response error validation
        if($validator->fails()){
            return response()->json($validator->errors()->toJson());
        }

        //find ruang by ID
        $ruang = Ruang::findOrFail($ruang->id);
        if($ruang) {

            //update ruang
            $ruang->update([
                'nama'   => $request->nama,
                'jenis'   => $request->jenis,
                'kapasitas'   => $request->kapasitas
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Ruang Updated',
                'data'    => $ruang  
            ], 200);

        }

        //data ruang not found
        return response()->json([
            'success' => false,
            'message' => 'Ruang Not Found',
        ], 404);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //find ruang by ID
        $ruang = Ruang::findOrfail($id);

        if($ruang){
            
            //delete ruang
            $ruang->delete();

            return response()->json([
                'success' => true,
                'message' => 'Ruang Deleted',
            ], 200);
        }

        //data ruang not found
        return response()->json([
            'success' => false,
            'message' => 'Ruang Not Found',
        ], 404);
    }
}