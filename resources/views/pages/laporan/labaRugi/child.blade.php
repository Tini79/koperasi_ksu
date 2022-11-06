<tr>
    <td>{{$akun->nama_akun}}</td>
    <td>@currency($akun->debet_shu)</td>
    <td>@currency($akun->kredit_shu)</td>
</tr>
@foreach ($akun->childs as $child)
@include('pages.laporan.labarugi.child', ['akun' => $child])
@endforeach