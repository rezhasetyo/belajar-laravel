@extends('template/master')

@push('css')
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
<script type="text/javascript"
  src="https://app.sandbox.midtrans.com/snap/snap.js"
  data-client-key="SB-Mid-client-2MqnjyOiFX3WtU7F"></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
@endpush

@section('content')
<div class="jumbotron">
    <div class="col-6">
    <br><h3>BAYAR HUTANG</h3>
        <div class="form-group mt-3">
            <p><b>Nama : </b>           {{ $model->nama }}</p>
            <p><b>Jenis Kelamin : </b>  {{ $model->jenis_kelamin }}</p>
            <p><b>Alamat :</b>          {{ $model->alamat }}</p>
            <p><b>Tanggal Hutang :</b>  {{ showDateTime3($model->tanggal_hutang) }}</p>
            <p><b>Cicilan Paket :</b>   {{ $model->cicilan->waktu }}</p>
            <p><b>Jumlah Hutang :</b>   @currency($model->hutang)</p>
            <p><b>Jatuh Tempo :</b>     {{ showDateTime3($model->jatuhTempo) }}</p>
            <p><b>Tanggal Bayar :</b>   
              @if ($model->tanggal_bayar == NULL) @else {{ showDateTime3($model->tanggal_bayar)}}
              @endif  </p>
            <p><b>Status :</b>          {{ $model->status }}</p>
            <p><b>Jaminan :</b></p>
            <img class="form-control" src="{{asset('web/images/jaminan/'. $model->jaminan)}}" style="height:300px;">
        </div>
            
        
        @if ($model->status == 'BELUM LUNAS')
          <button class="btn btn-success" id="pay-button">Bayar</button>
          <a href="{{ url('bayar') }}"><button class="btn btn-danger">Batal</button></a>
        @else
          <a href="{{ url('bayar') }}"><button class="btn btn-danger">Kembali</button></a>
        @endif
       
    </div>
  </div>
@endsection


@push('javascript')
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $snap_token }}');
      // customer will be redirected after completing payment pop-up
    });
</script>
@endpush