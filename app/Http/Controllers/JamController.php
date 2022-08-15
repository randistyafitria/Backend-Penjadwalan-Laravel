<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jam;
use Illuminate\Support\Facades\Validator;

class JamController extends Controller
{
    /**
     * index
     * 
     * @return void
     */

     public function index()
     {
         //get data from table jams
         $jams = Jam::latest()->get();

         return view('jam.index', compact(['jams']));

         //make response JSON
         return response()->json([
             'success' => true,
             'message' => 'List Data Jam',
             'data'    => $jams
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
        //find post by ID
        $jam = Jam::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Jam',
            'data'    => $jam 
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
            'range_jam' => 'required',
            'aktif'     => 'required',
        ]);

        //response error validation
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $jam = Jam::create([
            'range_jam' => $request->range_jam,
            'aktif'     => $request->aktif,
        ]);

        //success save to database
        if($jam) {
            return response()->json([
                'success' => true,
                'message' => 'Jam Created',
                'data'    => $jam  

            ], 201);
        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Jam Failed to Save',
        ], 409);
    }

        /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, $id)
    {
        //set validation
        $validator = Validator::make($request->all(),[
            'range_jam' => 'required',
            'aktif'     => 'required',
        ]);

        //response error validation
        if($validator->fails()){
            return response()->json($validator->errors()->toJson());
        }
        
        $jam = Jam::findOrfail($id)->update([
            'range_jam'  =>$request->get('range_jam'),
            'aktif'      =>$request->get('aktif'),
        ]);
        if($jam){
            return response()->json([
                'status'  =>true, 
                'message' =>'Jam Updated',
                'data'    => $jam 
            ], 200);
        } else {
            return response()->json([
                'status'  =>false, 
                'message' =>'Jam Failed to Update'
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
        //find jam by ID
        $jam = Jam::findOrfail($id);

        if($jam){
            
            //delete jam
            $jam->delete();

            return response()->json([
                'success' => true,
                'message' => 'Jam Deleted',
            ], 200);
        }

        //data jam not found
        return response()->json([
            'success' => false,
            'message' => 'Jam Not Found',
        ], 404);
    }
}