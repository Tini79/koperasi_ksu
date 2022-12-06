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
