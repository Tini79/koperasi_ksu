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
                    <h4>Laporan Pinjaman</h4>
                    <h5>KSU Hita Mandiri Sejahtera</h5>
                    <h6>Tanggal {{ date_format($date, "d/m/Y") }}</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover mx-auto w-100" border="1">
                        <thead>
                            <tr>
                                <th class="p-1 text-center">#</th>
                                <th class="p-1 text-center col-6">Tanggal</th>
                                <th class="p-1 text-center col-6">Nama</th>
                                <th class="p-1 text-center col-6">Rekening Pinjaman</th>
                                <th class="p-1 text-center col-6">Agunan</th>
                                <th class="p-1 text-center col-6">Angsuran</th>
                                <th class="p-1 text-center col-6">Saldo Pinjaman</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($laporanPinjaman as $key => $dataLaporanPinjaman)
                            <tr>
                                <td class="p-1 text-center">{{ $key + 1 }}.</td>
                                <td class="p-1">{{ $dataLaporanPinjaman->tanggal_pembayaran }}</td>
                                <td class="p-1">{{ $dataLaporanPinjaman->pinjaman->anggota->nama_anggota }}</td>
                                <td class="p-1">{{ $dataLaporanPinjaman->pinjaman->agunan }}</td>
                                <td class="p-1">{{ $dataLaporanPinjaman->pinjaman->no_pinjaman }}</td>
                                <td class="p-1">@currency($dataLaporanPinjaman->nominal_setoran)</td>
                                <td class="p-1">@currency($dataLaporanPinjaman->pinjaman->jumlah_pinjaman)</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</body>

</html>