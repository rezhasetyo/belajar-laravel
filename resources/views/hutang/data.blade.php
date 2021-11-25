@extends('jumbotron/template')
@section('content')

<div class="jumbotron">
<div class="col-6">
    <br><h3>Daftar Hutang</h3>
    <a href="{{ url('hutang/create') }}" class="btn btn-primary float-right mb-2">Tambah</a>
    <table class="table table-light mt-4">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <!-- <th scope="col">Tanggal Lahir</th> -->
                <!-- <th scope="col">Jenis Kelamin</th> -->
                <th scope="col">Alamat</th>
                <th scope="col">Hoetang</th>
                <th scope="col" colspan="2"><div align="center">Aksi</div></th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($datas as $key=>$value)
            <tr>
                <td scope="row" >{{ $loop->iteration }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->alamat }}</td>
                <!-- <td></td> -->
                <!-- <td></td> -->
                <td>{{ $value->hutang }}</td>
                <td align="right">
                    <a class="btn btn-info btn-sm" href="{{ url( 'hutang/' .$value->id. '/edit' ) }}">
                        Edit
                    </a>
                </td>
                <td align="left">
                    <form action="{{ url('hutang/'.$value->id) }}" method="POST">
                    @csrf
                        <input type="hidden" name="_method" value="Delete">
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>








@endsection