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
                    <h6>Bulan {{ date_format($date, "M/Y") }}</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover mx-auto w-100" border="1">
                        <thead>
                            <tr>
                                <th class="p-1 text-center">#</th>
                                <th class="p-1 text-center">Keterangan</th>
                                <th class="p-1 text-center">Tanggal</th>
                                <th class="p-1 text-center">Ref</th>
                                <th class="p-1 text-center">Debet</th>
                                <th class="p-1 text-center">Kredit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bukuBesars as $key => $bukuBesar)
                            <tr>
                                <td class="p-1 text-center">{{ $key + 1 }}.</td>
                                <td class="p-1">{{ $bukuBesar->memorial->keterangan }}</td>
                                <td class="p-1">{{ $bukuBesar->memorial->tanggal }}</td>
                                <td class="p-1">Memorial</td>
                                <td class="p-1">@currency($bukuBesar->debet)</td>
                                <td class="p-1">@currency($bukuBesar->kredit)</td>
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