<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
</head>

<body class="bg-white">
    <div class="main-content">
        <section class="section">
            <div class="text-center">
                <div class="mb-5">
                    <h4>Laporan Neraca</h4>
                    <h5>KSU Hita Mandiri Sejahtera</h5>
                    <h6>Bulan {{ $date }}</h6>
                </div>
                <div class="table-responsive">
                    <table class="table" border="1">
                        <thead>
                            <tr>
                                <th class="p-1 text-center">Uraian</th>
                                <th class="p-1 text-center">Debit</th>
                                <th class="p-1 text-center">Kredit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('pages.laporan.neraca.child' , ['akun'=> $akunAset])
                            @include('pages.laporan.neraca.child' , ['akun'=> $akunKewajiban])
                            @include('pages.laporan.neraca.child' , ['akun'=> $akunPendapatan])
                            @include('pages.laporan.neraca.child' , ['akun'=> $akunBebanOperasional])
                            @include('pages.laporan.neraca.child' , ['akun'=> $akunArusKas])
                            @include('pages.laporan.neraca.child' , ['akun'=> $akunSaldoModalAwal])
                            @include('pages.laporan.neraca.child' , ['akun'=> $akunTransaksi])
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-right">Jumlah</th>
                                <td>@currency($akunAset->saldo + $akunKewajiban->saldo + $akunPendapatan->saldo + $akunBebanOperasional->saldo + $akunArusKas->saldo + $akunSaldoModalAwal->saldo + $akunTransaksi->saldo)</td>
                                <td>@currency($akunAset->saldo + $akunKewajiban->saldo + $akunPendapatan->saldo + $akunBebanOperasional->saldo + $akunArusKas->saldo + $akunSaldoModalAwal->saldo + $akunTransaksi->saldo)</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>

    </div>
</body>

</html>