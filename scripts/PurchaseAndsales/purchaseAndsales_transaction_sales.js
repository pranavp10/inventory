$(".date").datepicker({
    autoclose: true,
    format: "dd-mm-yyyy"
});

$(".select2").select2();

$('#searchSalesList').on('click', function () {
    $('#dataTable tr').remove();
    var showTableHeading = `
    <tr>
    <th>Sales Date</th>
    <th>ID</th>
    <th>Customer Names</th>
    <th>Item Name</th>
    <th>Quantity</th>
    <th>Price Per Unit</th>
    <th>Amount</th>
    <th>Tax</th>
    <th>Total Amount</th>
    <th>Grand Total</th>
    <th>Action</th>
    </tr>`;
    $("table thead").append(showTableHeading);
    var customer = $('#customerId').val();
    var fromDate = $('#fromDate').val();
    var toDate = $('#toDate').val();

    $.ajax({
        type: "POST",
        data: {
            'customerId': customer,
            'fromDate': fromDate,
            'toDate': toDate
        },
        url: "../../../pages/PurchaseAndsales/transaction/get_sales_list.php",
        success: function (response) {
            let salesList = JSON.parse(response);
            console.log(salesList);

            let lengthOfSalesList = salesList.length;
            for (let i = 0; i < lengthOfSalesList; i++) {
                let tr = ``;
                let itemList = salesList[i].itemName.split(",");
                let itemListSize = itemList.length;
                tr += `<tr><td style="vertical-align: middle;" class='align-middle text-center' rowspan=${(+itemListSize)}>${salesList[i].salesDate}</td>`;
                tr += `<td style="vertical-align: middle;" class='align-middle text-center' rowspan=${(+itemListSize)}>${salesList[i].salesId}</td>`;
                tr += `<td style="vertical-align: middle;" class='align-middle text-center' rowspan=${(+itemListSize)}>${salesList[i].customerName}</td>`;

                let itemName = salesList[i].itemName.split(",");
                let quantity = salesList[i].quantity.split(",");
                let pricePerUnit = salesList[i].pricePerUnit.split(",");
                let taxCode = salesList[i].taxCode.split(",");
                let totalAmount = salesList[i].totalAmount.split(",");
                let totalAmountWithTax = salesList[i].totalAmountWithTax.split(",");
                for (let j = 0; j < itemListSize; j++) {
                    if (j == 0) {
                        tr += `<td>${itemName[j]}</td>`
                        tr += `<td>${quantity[j]}</td>`
                        tr += `<td>${pricePerUnit[j]}</td>`
                        tr += `<td>${totalAmount[j]}</td>`
                        tr += `<td>${taxCode[j]}</td>`
                        tr += `<td>${totalAmountWithTax[j]}</td>`
                        tr += `<td style="vertical-align: middle;" class='align-middle text-center' rowspan=${(+itemListSize)}>${salesList[i].grandTotal}</td>`;
                        tr += `<td style="vertical-align: middle;" class="align-middle text-center" rowspan="${(+itemListSize)}"><p><button class="btn btn-primary btn-xs editSales"><span class="glyphicon glyphicon-pencil"></span></button> <span><button class="btn btn-danger btn-xs deleteSales" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></span> </p></td></<tr>`
                    } else {
                        tr += `<tr><td>${itemName[j]}</td>`
                        tr += `<td>${quantity[j]}</td>`
                        tr += `<td>${pricePerUnit[j]}</td>`
                        tr += `<td>${totalAmount[j]}</td>`
                        tr += `<td>${taxCode[j]}</td>`
                        tr += `<td>${totalAmountWithTax[j]}</td></tr>`
                    }
                }
                $("table tbody").append(tr);
            }
        }
    });
});

$(document).on("click", ".deleteSales", function () {
    $("#deleteSalesList").modal("show");

    $tr = $(this).closest("tr");
    var data = $tr
        .children("td")
        .map(function () {
            return $(this).text();
        })
        .get();
    $("#displayBox").text(
        `(Sales Transaction Number is ${data[1]}) and Sales Item from the Customer (${data[2]}) will be deleted !!!`
    );
    $("#deleteId").val(data[1]);
});
$(document).on("click", ".editSales", function () {
    $tr = $(this).closest("tr");
    var data = $tr
        .children("td")
        .map(function () {
            return $(this).text();
        })
        .get();
    window.location = `../../../pages/PurchaseAndsales/transaction/edit_sales_list.php?trNumber=${data[1]}&date=${data[0]}&customerId=${data[2]}`;
});