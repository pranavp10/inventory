$('#betweenDate').daterangepicker({
    locale: {
        format: 'DD/MM/YYYY'
    }
});

function getCurrentFiscalYear() {
    //get current date
    var today = new Date();
    //get current month
    var curMonth = today.getMonth();
    var fiscalYr = "";
    if (curMonth > 3) { //
        var nextYr1 = (today.getFullYear() + 1).toString();
        fiscalYr = today.getFullYear().toString() + "-" + nextYr1.charAt(2) + nextYr1.charAt(3);
    } else {
        var nextYr2 = today.getFullYear().toString();
        fiscalYr = (today.getFullYear() - 1).toString() + "-" + nextYr2.charAt(2) + nextYr2.charAt(3);
    }
    return fiscalYr;
}


function getDiscountId() {
    var discountId = $("#discountId");
    var fiscalYear = getCurrentFiscalYear().split('-');
    var date = `${fiscalYear[0][2]}${fiscalYear[0][3]}${fiscalYear[1]}`
    $.ajax({
        //create an ajax request to display.php
        type: "POST",
        data: {
            'date': date
        },
        url: "../../../pages/Inventory/transaction/get_discount_id.php",
        success: function (response) {
            var id = JSON.parse(response);
            id = +id + 1;
            discountId.val(`DAF-${date}-${id}`);
        }
    });
}
getDiscountId();