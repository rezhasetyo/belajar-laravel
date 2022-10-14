<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $mahasiswa->nama }}</p>
</div>

<!-- Nim Field -->
<div class="col-sm-12">
    {!! Form::label('nim', 'Nim:') !!}
    <p>{{ $mahasiswa->nim }}</p>
</div>

<!-- Kelas Field -->
<div class="col-sm-12">
    {!! Form::label('kelas', 'Kelas:') !!}
    <p>{{ $mahasiswa->kelas }}</p>
</div>

<!-- Prodi Field -->
<div class="col-sm-12">
    {!! Form::label('prodi', 'Prodi:') !!}
    <p>{{ $mahasiswa->prodi }}</p>
</div>

<!-- Jurusan Field -->
<div class="col-sm-12">
    {!! Form::label('jurusan', 'Jurusan:') !!}
    <p>{{ $mahasiswa->jurusan }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $mahasiswa->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $mahasiswa->updated_at }}</p>
</div>

