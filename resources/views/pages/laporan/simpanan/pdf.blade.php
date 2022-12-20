<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
</head>

<body class="bg-white">
    <div class="main-content">
        <section class="section">
            <div class="text-center">
                <div class="mb-5">
                    <h4>Laporan Simpanan</h4>
                    <h5>KSU Hita Mandiri Sejahtera</h5>
                    <h6>Tanggal {{ $date }}</h6>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th class="p-1 text-center">No.</th>
                            <th class="p-1 text-center col-2">Tanggal</th>
                            <th class="p-1 text-center col-2">Nama</th>
                            <th class="p-1 text-center col-2">Rekening Simpanan</th>
                            <th class="p-1 text-center col-2">Produk Simpanan</th>
                            <th class="p-1 text-center col-2">Transaksi</th>
                            <th class="p-1 text-center col-2">Jumlah Setor/Tarik</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laporanSimpanan as $key => $dataLaporanSimpanan)
                        <tr>
                            <td class="p-1 text-center">{{ $key + 1 }}.</td>
                            <td class="p-1">{{ $dataLaporanSimpanan->tgl_transaksi }}</td>
                            <td class="p-1">{{ $dataLaporanSimpanan->anggota->nama_anggota }}</td>
                            <td class="p-1">{{ $dataLaporanSimpanan->rekening_simpanan->no_rekening }}</td>
                            <td class="p-1">{{ $dataLaporanSimpanan->produk_simpanan->produk }}</td>
                            <td class="p-1">{{ $dataLaporanSimpanan->transaksi }}</td>
                            <td class="p-1">@currency($dataLaporanSimpanan->saldo)</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>
<script>
    window.print()
</script>

</html>