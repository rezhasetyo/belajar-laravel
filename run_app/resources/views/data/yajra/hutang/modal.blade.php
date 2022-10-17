@foreach($datas as $key=>$value)
<div class="modal fade" id="exampleModal{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin membayar hutang ini?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
                <label for="nama"> <b>Nama</b></label>
                <input type="text" class="form-control" value="{{ $value->nama }}" disabled>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin"> <b>Jenis Kelamin</b> </label>
                <input type="text" class="form-control" value="{{ $value->jenis_kelamin }}" disabled>
            </div>
            <div class="form-group">
                <label for="alamat"> <b>Alamat</b> </label>
                <input type="text" class="form-control" value="{{ $value->alamat }}" disabled>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir"> <b>Tanggal Hutang</b> </label>
                <input type="text" class="form-control" value="{{ showDateTime3($value -> tanggal_hutang) }}" disabled>
            </div>
            <div class="form-group">
                <label for="hutang"> <b>Jumlah Hutang</b> </label>
                <input type="text" class="form-control" value="@currency($value->hutang)" disabled>
            </div>
            <div class="form-group">
                <label for="hutang"> <b>Cicilan</b> </label>
                <input type="text" class="form-control" value="{{ $value->cicilan->waktu }}" disabled>
            </div>
            <div class="form-group">
                <label for="hutang"> <b>Jatuh Tempo</b> </label>
                <input type="text" class="form-control" value="{{ showDateTime3($value -> jatuhTempo) }}" disabled>
            </div>
            <div class="form-group">
                <label for="hutang"> <b>Jaminan</b> </label>
                <img class="form-control" src="{{asset('web/images/jaminan/'. $value->jaminan)}}" style="height:300px;">
            </div>
        </form>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button class="btn btn-success" id="pay-button{{ $value->id }}">Bayar</button>
        </div>
    </div>
  </div>
</div>
@endforeach