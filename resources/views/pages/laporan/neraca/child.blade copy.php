<tr>
    @if($akun->akun_id == 3)
    <td class="col-md-5">{{$akun->nama_akun}}</td>
    <!-- diambil dari detail memorial -->
    <td class="col-md-3">@currency($akun->saldo_total_debet)</td>
    @endif
    @if($akun->akun_id == 20)
    <td class="col-md-5">{{$akun->nama_akun}}</td>
    <!-- diambil dari detail memorial -->
    <td class="col-md-3">@currency($akun->saldo_total_debet)</td>
    @endif
    @if($akun->akun_id == 28 || $akun->akun_id == 29 || $akun->akun_id == 30 || $akun->akun_id == 39)
    <td class="col-md-5">{{$akun->nama_akun}}</td>
    <!-- diambil dari detail memorial -->
    <td class="col-md-3">@currency($akun->saldo_total_kredit)</td>
    @endif
</tr>
@foreach ($akun->childs as $child)
@include('pages.laporan.neraca.child', ['akun' => $child])
@endforeach