$("#date").datepicker({
    autoclose: true,
    format: "dd-mm-yyyy"
});
$("#date").on("change", function () {
    let date = $("#date").val();
    $.ajax({
        type: "POST",
        data: {
            'date': date,
        },
        url: "../../../pages/PurchaseAndsales/transaction/remaining_stock_display.php",
        success: function (response) {
            let stockList = JSON.parse(response);
            console.log(stockList);
        }
    });
});
