@extends('template/master')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

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
    <br><h3 style="text-align:center;">Daftar Hutang</h3>

    <table id="example1" class="table table-light mt-4">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Hutang</th>
                <th scope="col">Cicilan</th>
                <th scope="col" style="width:10%">Hutang</th>
                <th scope="col" style="width:13%;" ><div align="center">Aksi</div></th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($datas as $key=>$value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ showDateTime3($value -> tanggal_hutang) }}</td>
                <td>@currency($value->hutang)</td>
                <td>{{ $value->cicilan->waktu }}</td>
                <td align="center">
                    <a class="btn btn-success btn-sm" id="pay-button">Bayar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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