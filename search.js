$(document).ready(function () {
    $("#find").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    let table;

    table=$("table").DataTable({
        pageLength : 13,
        colReader: true,
        columns : columns,
        data: data


    });

    $("table").on("click","tbody tr",function (){
        const ro = table.row().data();
        console.log(ro);
    });
});