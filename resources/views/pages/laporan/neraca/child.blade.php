<tr>
    <td>{{$akun->nama_akun}}</td>
    <td>@currency($akun->saldo_total_debet)</td>
    <td>@currency($akun->saldo_total_kredit)</td>
</tr>
@foreach ($akun->childs as $child)
@include('pages.laporan.neraca.child', ['akun' => $child])
@endforeach