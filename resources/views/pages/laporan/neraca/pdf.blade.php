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
                    <table class="table" id="table" border="1">
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
                            @include('pages.laporan.neraca.child' , ['akun'=> $akunBebanOperasional])
                            @include('pages.laporan.neraca.child' , ['akun'=> $akunTransaksi])
                        </tbody>
                    </table>
                    <table class="table">
                        <tfoot>
                            <th class="text-right col-md-5">Jumlah</th>
                            <td id="totalKredit" class="col-md-3"></td>
                            <td id="totalDebit" class="col-md-3"></td>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </div>
</body>
<script type="text/javascript">
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
</script>

</html>