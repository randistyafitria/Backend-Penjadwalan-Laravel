<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table dosens
        $dosens = Dosen::latest()->get();

        // return view('dosen.index', compact(['dosens']));

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Dosen',
            'data'    => $dosens  
        ], 200);

    }

    /**
     * index
     *
     * @return void
     */
    // public function create()
    // {
    //     return view('dosen.create');

    // }
    
     /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //find dosen by ID
        $dosen = Dosen::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Dosen',
            'data'    => $dosen 
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
            'nidn'   => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $dosen = Dosen::create([
            'nidn'     => $request->nidn,
            'nama'   => $request->nama,
            'alamat'   => $request->alamat,
            'telp'   => $request->telp
        ]);

        //success save to database
        if($dosen) {

            return response()->json([
                'success' => true,
                'message' => 'Dosen Created',
                'data'    => $dosen  
            ], 201);

        } 

        return view('dosen.create');
        
        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Dosen Failed to Save',
        ], 409);

    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $dosen
     * @return void
     */
    public function update(Request $request, Dosen $dosen)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nidn'   => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find dosen by ID
        $dosen = Dosen::findOrFail($dosen->id);
        if($dosen) {

            //update dosen
            $dosen->update([
                'nidn'     => $request->nidn,
                'nama'   => $request->nama,
                'alamat'   => $request->alamat,
                'telp'   => $request->telp
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Dosen Updated',
                'data'    => $dosen  
            ], 200);

        }

        //data dosen not found
        return response()->json([
            'success' => false,
            'message' => 'Dosen Not Found',
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
        //find dosen by ID
        $dosen = Dosen::findOrfail($id);

        if($dosen) {

            //delete dosen
            $dosen->delete();

            return response()->json([
                'success' => true,
                'message' => 'Dosen Deleted',
            ], 200);
        }

        //data dosen not found
        return response()->json([
            'success' => false,
            'message' => 'Dosen Not Found',
        ], 404);
    }
}