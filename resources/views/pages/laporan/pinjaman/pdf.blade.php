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
                    <h4>Laporan Pinjaman</h4>
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
                            <th class="p-1 text-center col-2">Rekening Pinjaman</th>
                            <th class="p-1 text-center col-2">Agunan</th>
                            <th class="p-1 text-center col-2">Angsuran</th>
                            <th class="p-1 text-center col-2">Saldo Pinjaman</th>

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
        </section>
    </div>
</body>
<script>
    window.print()
</script>

</html>