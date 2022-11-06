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
                    <h4>Laporan Laba Rugi</h4>
                    <h5>KSU Hita Mandiri Sejahtera</h5>
                    <h6>Bulan {{ $date }}</h6>
                </div>
                <div class="table-responsive">
                    <table class="table" border="1">
                        <thead>
                            <tr>
                                <th>Uraian</th>
                                <th>Debet</th>
                                <th>Kredit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('pages.laporan.labarugi.child' , ['akun'=> $akunPendapatan])
                            @include('pages.laporan.labarugi.child' , ['akun'=> $akunBiaya])
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</body>

</html>