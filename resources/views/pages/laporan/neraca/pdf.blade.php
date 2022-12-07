<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
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
                            <div class="col-md-3">
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
                            <div class="col-md-3">
                                <table class="table">
                                    <tfoot>
                                        <th class="text-right col-md-5">Jumlah</th>
                                        <td id="totalDebit" class="col-md-3"></td>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="col-md-3">
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
                        <div class="col-md-3">
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
        </section>
    </div>
</body>
<script type="text/javascript">
    try {
        var table = document.getElementById("table"),
            sumValDebit = 0,
            sumValKredit = 0;
        for (var i = 1; i < table.rows.length; i++) {
            var cellValue = table.rows[i].cells[1].innerHTML;
            var replaceVal = cellValue.replace('Rp', '').replaceAll('.', '');
            sumValDebit = parseFloat(sumValDebit) + parseFloat(replaceVal);
        }

        for (var i = 1; i < table.rows.length; i++) {
            var cellValue = table.rows[i].cells[2].innerHTML;
            var replaceVal = cellValue.replace('Rp', '').replaceAll('.', '');
            sumValKredit = parseFloat(sumValKredit) + parseFloat(replaceVal);
        }

        document.getElementById("totalDebit").innerHTML = sumValDebit
        document.getElementById("totalKredit").innerHTML = sumValKredit

    } catch (e) {
        window.onload = window.print;
    }
</script>

<!-- <script type="text/javascript">
    var table = document.getElementById("table"),
        sumValDebit = 0,
        sumValKredit = 0;
    for (var i = 1; i < table.rows.length; i++) {
        var cellValue = table.rows[i].cells[1].innerHTML;
        var replaceVal = cellValue.replace('Rp', '').replaceAll('.', '');
        sumValDebit = parseFloat(sumValDebit) + parseFloat(replaceVal);
    }

    for (var i = 1; i < table.rows.length; i++) {
        var cellValue = table.rows[i].cells[2].innerHTML;
        var replaceVal = cellValue.replace('Rp', '').replaceAll('.', '');
        sumValKredit = parseFloat(sumValKredit) + parseFloat(replaceVal);
    }

    document.getElementById("totalDebit").innerHTML = sumValDebit
    document.getElementById("totalKredit").innerHTML = sumValKredit
</script> -->

</html>