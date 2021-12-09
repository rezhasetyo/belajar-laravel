@extends('jumbotron/template')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"> 
@endpush

@push('javascript')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#ajax').DataTable();
    } );
</script>
@endpush



@section('content')
<div class="jumbotron">
<div class="col-8">
    <br><h3 style="text-align:center;">Daftar Hutang</h3>
    <!-- <a href="{{ url('hutang/create') }}" class="btn btn-primary float-right mb-2">Tambah</a> -->
    <table id="ajax" class="table table-light mt-4">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">Hoetang</th>
                <!-- <th scope="col" colspan="2"><div align="center">Aksi</div></th> -->
            </tr>
        </thead>
        
        <tbody>
            @foreach($ajax as $key=>$value)
            <tr>
                <td scope="row" >{{ $loop->iteration }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->jenis_kelamin }}</td>
                <td>{{ $value->tanggal_lahir }}</td>
                <td>{{ $value->alamat }}</td>
                <td>{{ $value->hutang }}</td>
                <!-- <td align="right">
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
                </td> -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection