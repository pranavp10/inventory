$(document).ready(function () {
    $(".deleteTax").on("click", function () {
        $("#deleteTax").modal("show");

        $tr = $(this).closest("tr");
        var data = $tr
            .children("td")
            .map(function () {
                return $(this).text();
            })
            .get();
        $("#displayBox").text(
            `(ID = ${data[0]}) and (Tax Code = ${data[1]}) will be deleted !!!`
        );
        $("#deleteId").val(data[0]);
    });
});

$(document).ready(function () {
    $(".editTax").on("click", function () {
        $("#editTax").modal("show");

        $tr = $(this).closest("tr");
        var data = $tr
            .children("td")
            .map(function () {
                return $(this).text();
            })
            .get();
        $("#editTaxId").val(data[0]);
        $("#editTaxCode").val(data[1]);
        var extractPercentage = data[2].split('%');
        $("#editTaxPercentage").val(+extractPercentage[0]);
    });
});



function addTax() {
    $taxId = $("#taxId");

    $.ajax({
        //create an ajax request to display.php
        type: "POST",
        url: "../../../pages/Inventory/master/get_tax_id.php",
        success: function (response) {
            var id = JSON.parse(response);
            id = +id + 1;
            $taxId.val(`TAX-${id}`);
        }
    });
}


$('#taxTable').DataTable()
