@extends('template/master')

@push('css')
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-2MqnjyOiFX3WtU7F"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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

        <form action="{{ url( 'bayar/payment_post/'. $model->id) }}" id="submit_form" method="POST">
          @csrf
          <input type="hidden" name="json" id="json_callback">
          <input type="hidden" name="name" id="name" value="{{ Auth::user()->name }}">
          <input type="hidden" name="email" id="email" value="{{ Auth::user()->email }}">
        </form>
       
    </div>
  </div>
@endsection


@push('javascript')
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $snap_token }}', {
      onSuccess: function(result){
          // alert("payment success!");
          // console.log(result);
          send_response_to_form(result);
      },
      onPending: function(result){
        // alert("wating your payment!");
        // console.log(result);
        send_response_to_form(result);
      },
      onError: function(result){
          // alert("payment failed!");
          // console.log(result);
          send_response_to_form(result);
      },
      onClose: function(){
          alert('you closed the popup without finishing the payment');
      }
    })
  });

  function send_response_to_form(result){
    document.getElementById('json_callback').value = JSON.stringify(result);
    $('#submit_form').submit();
  }
</script>
@endpush