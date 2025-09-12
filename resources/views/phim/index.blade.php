@extends('layouts.app')

@section('content')
    <div>
        <h1>Danh sách phim</h1>
        <a href="{{route('phim.create')}}">Add new movie</a>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Duration</th>
                <th>Genre</th>
                <th>Director</th>
                <th>Release Year</th> 
            </tr>
            @foreach ($movies as $movie )
                <tr>
                    <td>{{ $movie->TenPhim }}</td>
                    <td>{{ $movie->ThoiLuong }}</td>
                    <td>{{ $movie->NgayKhoiChieu }}</td>
                    <td>{{ $movie->DaoDien }}</td>
                    <td>{{ $movie->NuocSanXuat }}</td>
                    <td>
                        <a href="{{route('phim.edit',$movie->MaPhim)}}">Change</a>
                        <form action="{{route('phim.destroy',$movie->MaPhim)}}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            
            @endforeach
        </table>
    </div>

@endsection