@extends('template/master')


@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"> 
@endpush


@section('content')
<div class="jumbotron">
    <div class="col-8">
        <br><h3 style="text-align:center;">Daftar Hutang</h3>
        <div>
            <div class="text-left mb-2">
                <button class="btn btn-primary" type="button"  data-toggle="modal" data-target="#exampleModal">
                    Tambah Hutang
                </button>
            </div>
        </div>
        
        <table id="ajax" class="table table-light mt-4">
            <thead class="table-dark" style="align-text:center;">
                <tr>
                    <!-- <th scope="col">No</th> -->
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Hutang</th>
                    <!-- <th scope="col" colspan="2"><div align="center">Aksi</div></th> -->
                </tr>
        </thead>
    </table>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
                <label for="nama"> <b>Nama</b></label>
                <input type="text" id="nama" name="nama" class="form-control" 
                placeholder="Input Nama Lengkap">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin"> <b>Jenis Kelamin</b> </label>
                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                    <option>--Pilih Jenis Kelamin--</option>
                    <option value="Laki-laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir"> <b>Tanggal Lahir</b> </label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" 
                placeholder="Inputkan Tanggal Lahir">
            </div>
            <div class="form-group">
                <label for="alamat"> <b>Alamat</b> </label>
                <textarea class="form-control" id="alamat" name="alamat" rows="2" 
                placeholder="Inputkan Alamat Lengkap"></textarea>
            </div>
            <div class="form-group">
                <label for="hutang"> <b>Hutang Berapa?</b> </label>
                <input type="number" id="hutang" class="form-control" name="hutang" 
                placeholder="Jumlah Hutang" >
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
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
                {data: 'tanggal_hutang',name: 'tanggal_hutang'},
                {data: 'alamat',name: 'alamat'},
                {data: 'hutang',name: 'hutang' }
                ],
        });
    } );
</script>
@endpush