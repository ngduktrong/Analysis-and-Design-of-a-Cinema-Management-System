<?php

namespace App\Http\Controllers;
use App\Models\Phim;

use Illuminate\Http\Request;

class PhimController extends Controller
{
    public function index(){
        $movies = Phim::all();
        return view('phim.index',compact('movies'));
    }
}
