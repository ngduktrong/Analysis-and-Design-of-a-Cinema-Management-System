<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Phim;

class CustomerHomeController extends Controller
{
    public function show($id){
        $phim =  Phim::findOrFail($id);
        return view('home.show',compact('phim'));
    }
    public function index(){
        $today = now()->toDateString();

        $phimDangChieu = Phim::where('NgayKhoiChieu' ,'<=',$today)->get();

        $phimSapChieu = Phim::where('NgayKhoiChieu','>',$today)->get();
        return view('home.index',compact('phimDangChieu','phimSapChieu'));
    }
}
