@extends('jumbotron/template')
@section('content')

<div class="jumbotron">
<div class="col-9">
    <br><h3 style="text-align:center;">Daftar Hutang</h3>
    <a href="{{ url('laravel/create') }}" class="btn btn-primary float-right mb-2">Tambah</a>
    <table class="table table-light mt-4">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">Hutang</th>
                <th scope="col" style="width:15%;" ><div align="center">Aksi</div></th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($datas as $key=>$value)
            <tr>
                <td scope="row" >{{ $loop->iteration }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->jenis_kelamin }}</td>
                <td>{{ $value->tanggal_lahir }}</td>
                <td>{{ $value->alamat }}</td>
                <td>{{ $value->hutang }}</td>
                <td align="center">
                    <form action="{{ url('laravel/'.$value->id) }}" method="POST">
                    @csrf
                        <!-- Button Edit -->
                        <a class="btn btn-info btn-sm" href="{{ url( 'laravel/' .$value->id. '/edit' ) }}">Edit</a>
                        
                        <!-- Button Delete
                        <input type="hidden" name="_method" value="Delete">
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button> -->

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
        <form action="{{ url('laravel/'.$value->id) }}" method="POST">
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