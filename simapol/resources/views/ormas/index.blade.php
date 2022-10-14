@extends('layouts.app')
    
@section('content')
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Data Ormawa</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('orma.create') }}"> Create New Product</a>
                </div>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Ormawa</th>
            <th>Kode</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($ormas as $orma)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $orma->name }}</td>
            <td>{{ $orma->kode_ormas }}</td>
            <td>
                <form action="{{ route('orma.destroy',$orma->id) }}" method="POST">
    
                    <a class="btn btn-info" href="{{ route('orma.show',$orma->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('orma.edit',$orma->id) }}">Edit</a>
    
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $ormas->links() !!}
</div>
        
@endsection