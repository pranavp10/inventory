$(".date").datepicker({
    autoclose: true,
    format: "dd-mm-yyyy"
});

$(".select2").select2();

$('#searchPurchaseList').on('click', function () {
    $('#dataTable tr').remove();
    var showTableHeading = `
    <tr>
    <th>Purchase Date</th>
    <th>ID</th>
    <th>Supplier Names</th>
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
    var supplier = $('#supplierId').val();
    var fromDate = $('#fromDate').val();
    var toDate = $('#toDate').val();

    $.ajax({
        type: "POST",
        data: {
            'supplier': supplier,
            'fromDate': fromDate,
            'toDate': toDate
        },
        url: "../../../pages/PurchaseAndsales/transaction/get_purchase_list.php",
        success: function (response) {
            let purchaseList = JSON.parse(response);
            console.log(purchaseList);

            let lengthOfPurchaseList = purchaseList.length;
            for (let i = 0; i < lengthOfPurchaseList; i++) {
                let tr = ``;
                let itemList = purchaseList[i].itemName.split(",");
                let itemListSize = itemList.length;
                tr += `<tr><td style="vertical-align: middle;" class='align-middle text-center' rowspan=${(+itemListSize)}>${purchaseList[i].purchaseDate}</td>`;
                tr += `<td style="vertical-align: middle;" class='align-middle text-center' rowspan=${(+itemListSize)}>${purchaseList[i].purchaseId}</td>`;
                tr += `<td style="vertical-align: middle;" class='align-middle text-center' rowspan=${(+itemListSize)}>${purchaseList[i].supplierName}</td>`;

                let itemName = purchaseList[i].itemName.split(",");
                let quantity = purchaseList[i].quantity.split(",");
                let pricePerUnit = purchaseList[i].pricePerUnit.split(",");
                let taxCode = purchaseList[i].taxCode.split(",");
                let totalAmount = purchaseList[i].totalAmount.split(",");
                let totalAmountWithTax = purchaseList[i].totalAmountWithTax.split(",");
                for (let j = 0; j < itemListSize; j++) {
                    if (j == 0) {
                        tr += `<td>${itemName[j]}</td>`
                        tr += `<td>${quantity[j]}</td>`
                        tr += `<td>${pricePerUnit[j]}</td>`
                        tr += `<td>${totalAmount[j]}</td>`
                        tr += `<td>${taxCode[j]}</td>`
                        tr += `<td>${totalAmountWithTax[j]}</td>`
                        tr += `<td style="vertical-align: middle;" class='align-middle text-center' rowspan=${(+itemListSize)}>${purchaseList[i].grandTotal}</td>`;
                        tr += `<td style="vertical-align: middle;" class="align-middle text-center" rowspan="${(+itemListSize)}"><p><button class="btn btn-primary btn-xs editPurchase"><span class="glyphicon glyphicon-pencil"></span></button> <span><button class="btn btn-danger btn-xs deletePurchase" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></span> </p></td></<tr>`
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

$(document).on("click", ".deletePurchase", function () {
    $("#deletePurchaseList").modal("show");

    $tr = $(this).closest("tr");
    var data = $tr
        .children("td")
        .map(function () {
            return $(this).text();
        })
        .get();
    console.log(data);
    $("#displayBox").text(
        `(Purchase Transaction Number is ${data[1]}) and Purchase Item from the Supplier (${data[2]}) will be deleted !!!`
    );
    $("#deleteId").val(data[1]);
});
$(document).on("click", ".editPurchase", function () {
    $tr = $(this).closest("tr");
    var data = $tr
        .children("td")
        .map(function () {
            return $(this).text();
        })
        .get();
    window.location = "../../../pages/PurchaseAndsales/transaction/edit_purchase_list.php?trNumber=" + data[1];
});