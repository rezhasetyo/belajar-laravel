@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="card text-center single_post">
                <div class="card-header">
                    {{ $orma->name }}
                </div>
                <div class="card-body">
                    <div class="img-post">
                        <center><img class="d-block img-fluid" src="/image/{{ $orma->image }}" alt="" style="width:15rem;height:15rem;"></center> 
                    </div>
                    </br>
                    <h5 class="card-title">{{ $orma->name }}</h5>
                    <p class="card-text">{{ $orma->detail }}</p>
                    <a href="{{ route('orma.index') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div class="card-footer text-muted">
                    Ditambahkan {{ $orma->created_at }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection