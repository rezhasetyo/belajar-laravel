@extends('template/master')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"> 
@endpush

@section('content')
<div class="jumbotron">
<div class="col-10">
    <br><h3 style="text-align:center;">Daftar Hutang</h3>
    <div>
            <div class="text-left mb-2">
              <a href="{{ url('hutang/create') }}">
              <button class="btn btn-primary">
                    Tambah Hutang
                </button>
              </a>
            </div>
        </div>
    <table id="example1" class="table table-light mt-4">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tanggal Hutang</th>
                <th scope="col">Jatuh Tempo</th>
                <th scope="col" style="width:10%">Hutang</th>
                <th scope="col">Cicilan</th>
                <th scope="col" style="width:13%;" ><div align="center">Aksi</div></th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($datas as $key=>$value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->alamat }}</td>
                <td>{{ showDateTime3($value -> tanggal_hutang) }}</td>
                <td>{{ showDateTime3($value -> jatuhTempo) }}</td>
                <td>@currency($value->hutang)</td>
                <td>{{ $value->cicilan->waktu }}</td>
                <td align="center">
                    <form action="{{ url('hutang/'.$value->id) }}" method="POST">
                    @csrf
                        <!-- Button Edit -->
                        <a class="btn btn-info btn-sm" href="{{ url( 'hutang/' .$value->id. '/edit' ) }}">Edit</a>

                        <!-- Button Modal Delete -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $value->id }}">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

<!-- Modal -->
@foreach($datas as $key=>$value)
<div class="modal fade" id="exampleModal{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Hutang !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <form action="{{ url('hutang/'.$value->id) }}" method="POST">
        @csrf
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="hidden" name="_method" value="Delete">
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
        </div>
    </div>
  </div>
</div>
@endforeach
</div>
</div>
@endsection

@push('javascript')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
   $(function () {
        $("#example1").DataTable();
    });
</script>
@endpush