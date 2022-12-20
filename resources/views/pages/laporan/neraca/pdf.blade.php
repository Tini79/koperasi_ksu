<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- <script type="text/javascript" src="js/app.js"></script> -->
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
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-6">
                                <table class="table" id="table" border="1">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Activa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('pages.laporan.neraca.child' , ['akun'=> $akunAset])
                                        @include('pages.laporan.neraca.child' , ['akun'=> $akunTransaksi])
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <table class="table" id="table2" border="1">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Pasiva dan Ekuitas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('pages.laporan.neraca.child' , ['akun'=> $akunKewajiban])
                                        @include('pages.laporan.neraca.child' , ['akun'=> $akunEkuitas])
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <table class="table">
                                    <tfoot>
                                        <th class="text-right col-md-5">Jumlah</th>
                                        <td id="totalDebit" class="col-md-3"></td>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="col-6">
                                <table class="table">
                                    <tfoot>
                                        <th class="text-right col-md-5">Jumlah</th>
                                        <td id="totalKredit" class="col-md-3"></td>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

<script>
    try {
        var table = document.getElementById("table"),
            sumValDebit = 0,
            sumValKredit = 0;
        var table2 = document.getElementById("table2");
        console.log(table)
        for (var i = 1; i < table.rows.length; i++) {
            var cellValue = table.rows[i].cells[1].innerHTML;
            var replaceVal = cellValue.replace('Rp', '').replaceAll('.', '');
            sumValDebit = parseFloat(sumValDebit) + parseFloat(replaceVal);
        }

        for (var i = 1; i < table2.rows.length; i++) {
            var cellValue = table2.rows[i].cells[1].innerHTML;
            var replaceVal = cellValue.replace('Rp', '').replaceAll('.', '');
            sumValKredit = parseFloat(sumValKredit) + parseFloat(replaceVal);
        }

        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        })

        document.getElementById("totalDebit").innerHTML = formatter.format(sumValDebit)
        document.getElementById("totalKredit").innerHTML = formatter.format(sumValKredit)

        window.print()
    } catch (e) {
        window.onload = window.print;
    }
</script>

</html>