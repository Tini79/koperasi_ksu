<tr>
    <td class="col-md-5">{{$akun->nama_akun}}</td>
    <!-- diambil dari detail memorial -->
    <td class="col-md-3">@currency($akun->saldo_total_debet)</td>
</tr>
@foreach ($akun->childs as $child)
@include('pages.laporan.neraca.child', ['akun' => $child])
@endforeach