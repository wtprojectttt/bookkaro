$(document).ready(function () {
    $("#find").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

   

    $("tbody tr").on("click",function (){
        var currow=$(this).closest("tr");

        var col1=currow.find("td:eq(1)").text();
        var col2=currow.find("td:eq(2)").text();
        var col3=currow.find("td:eq(3)").text();
        var col4=currow.find("td:eq(4)").text();
        var col5=currow.find("td:eq(5)").text();

        localStorage.setItem('col1',col1);
        localStorage.setItem('col2',col2);
        localStorage.setItem('col3',col3);
        localStorage.setItem('col4',col4);
        localStorage.setItem('col5',col5);

        window.location.href = "fbooking.html";
    });
});