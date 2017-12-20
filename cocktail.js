function addRow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;

    if(rowCount < 15) {
        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;

        for(var index = 0; index < colCount; index++) {
            var newCell = row.insertCell(index);
            newCell.innerHTML = table.rows[0].cells[index].innerHTML;
        }
    } else {
        alert("Die Maximale Anzahl an Zutaten wurde erreicht");
    }
}

function removeRow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;

    if(rowCount <= 1) {
        alert("Es können nicht alle Zeilen entfernt werden");
        return
    }

    table.deleteRow(rowCount - 1);
}
