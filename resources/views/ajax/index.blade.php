@extends('jumbotron/template')


@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"> 
@endpush


@section('content')
<div class="jumbotron">
    <div class="col-8">
        <br><h3 style="text-align:center;">Daftar Hutang</h3>
        <!-- <a href="{{ url('hutang/create') }}" class="btn btn-primary float-right mb-2">Tambah</a> -->
        <table id="ajax" class="table table-light mt-4">
            <thead class="table-dark" style="align-text:center;">
                <tr>
                    <!-- <th scope="col">No</th> -->
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Hoetang</th>
                    <!-- <th scope="col" colspan="2"><div align="center">Aksi</div></th> -->
                </tr>
        </thead>

    </table>
</div>
@endsection


@push('javascript')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#ajax').DataTable({
            processing: true,
            serverSide: true,
            "order": [[ 0, "desc" ]],
            ajax: '{!! route('ajax.index') !!}', // memanggil route yang menampilkan data json       // ganti 'index' setelah refac
            columns: [ // mengambil & menampilkan kolom sesuai tabel database
                // {data: 'DT_RowIndex',name: 'DT_RowIndex'},
                {data: 'nama',name: 'nama'},
                {data: 'jenis_kelamin',name: 'jenis_kelamin'},
                {data: 'tanggal_lahir',name: 'tanggal_lahir'},
                {data: 'alamat',name: 'alamat'},
                {data: 'hutang',name: 'hutang' }
                ],
        });
    } );
</script>
@endpush