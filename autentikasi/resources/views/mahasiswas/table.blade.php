<div class="table-responsive">
    <table class="table" id="mahasiswas-table">
        <thead>
        <tr>
            <th>Nama</th>
        <th>Nim</th>
        <th>Kelas</th>
        <th>Prodi</th>
        <th>Jurusan</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mahasiswas as $mahasiswa)
            <tr>
                <td>{{ $mahasiswa->nama }}</td>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->kelas }}</td>
            <td>{{ $mahasiswa->prodi }}</td>
            <td>{{ $mahasiswa->jurusan }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['mahasiswas.destroy', $mahasiswa->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('mahasiswas.show', [$mahasiswa->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('mahasiswas.edit', [$mahasiswa->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
