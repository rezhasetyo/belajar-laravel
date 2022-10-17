@extends('template/master')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
<div class="jumbotron">
<div class="col-7">
    <br><h3 style="text-align:center;">Bayar Hutang</h3>

    <table id="example1" class="table table-light mt-4">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Hutang</th>
                <th scope="col">Cicilan</th>
                <th scope="col" style="width:13%">Hutang</th>
                <th>Status</th>
                <th scope="col" style="width:13%;" ><div align="center">Aksi</div></th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($datas as $key=>$value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ showDateTime3($value -> tanggal_hutang) }}</td>
                <td>{{ $value->cicilan->waktu }}</td>
                <td>@currency($value->hutang)</td>
                <td>{{ $value->status }}</td>

                @if ($value->status == 'BELUM LUNAS')
                <td align="center"><a class="btn btn-success btn-sm" href="{{ url( 'bayar/' .$value->id ) }}">Bayar</a>
                @else
                <td align="center"><a class="btn btn-primary btn-sm" href="{{ url( 'bayar/' .$value->id ) }}">Lihat</a>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>


@endsection


@push('javascript')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
{{-- <script>
   $(function () {
        $("#example1").DataTable();
    });
</script> --}}
@endpush