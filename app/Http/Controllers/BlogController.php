<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index ()
    {
        $orang = ['bubu', 'shun'];
        return view('blog/home', ['orang' => $orang]);
    }

    public function show ($id)
    {
        $nilai = 'ini adalah linknya ' . $id;
        //$user = 'Randistya';
        $users = ['boya', 'cipung'];
        return view('blog/single', ['blog' => $nilai, 'users' => $users]);
    }
}
