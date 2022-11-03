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
                    <h4>Buku Besar</h4>
                    <h5>KSU Hita Mandiri Sejahtera</h5>
                    <h6>Tanggal {{ date_format($date, "d/m/Y") }}</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover mx-auto w-100" border="1">
                        <thead>
                            <tr>
                                <th class="p-1 text-center col-1">#</th>
                                <th class="p-1 text-center col-6">Tanggal</th>
                                <th class="p-1 text-center col-6">Nama</th>
                                <th class="p-1 text-center col-6">Rekening Simpanan</th>
                                <th class="p-1 text-center col-6">Produk Simpanan</th>
                                <th class="p-1 text-center col-6">Transaksi</th>
                                <th class="p-1 text-center col-6">Jumlah Setor/Tarik</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bukuKas as $key => $dataBukuKas)
                            @if($dataBukuKas->memorial != null)
                            <tr>
                                <td class="p-1 text-center">{{ $key + 1 }}.</td>
                                @foreach($search as $simpananAnggota)
                            <tr>
                                <td class="p-1">{{ $simpananAnggota->tgl_transaksi }}</td>
                                <td class="p-1">{{ $simpananAnggota->anggota->nama_anggota }}</td>
                                <td class="p-1">{{ $simpananAnggota->rekening_simpanan->no_rekening }}</td>
                                <td class="p-1">{{ $simpananAnggota->produk_simpanan->produk }}</td>
                                <td class="p-1">{{ $simpananAnggota->transaksi }}</td>
                                <td class="p-1">@currency($simpananAnggota->saldo)</td>
                            </tr>
                            @endforeach
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</body>

</html>