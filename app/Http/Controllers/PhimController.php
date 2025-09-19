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

    public function store(Request $request)
    {
        $request ->validate([
            'TenPhim'=>['required','string','max:255'],
            'ThoiLuong'=>['required','numeric','min:1'],
            'NgayKhoiChieu'=> 'required|date',
            'NuocSanXuat'=> 'required',
            'DinhDang'=> 'required',
            'MoTa'=> 'required',
            'DaoDien'=> 'required',
            'DuongDanPoster'=> 'required|url',

        ]);
        Phim::create($request->all());
        return redirect()->route('phim.index')->with('success','Thêm phim thành công');

    }
    public function edit($id){
        $phim = Phim::findOrFail($id);
        return view('phim.edit',compact('phim'));

    }
    public function update(Request $request,$id){
        $phim  = Phim::findOrFail($id);
        $phim->update($request->all());
        return redirect()->route('phim.index')->with('success','Cập nhật phim thành công');
    }
    public function destroy($id){
        $phim = Phim::findOrFail($id);
        $phim->delete();
        return redirect()->route('phim.index')->with('success','Xóa phim thành công');

    }
    public function create(){
        return view('phim.create');
    }

}

