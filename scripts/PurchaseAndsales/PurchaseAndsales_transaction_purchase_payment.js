$(".select2").select2();

$('#supplierId').on('change', function () {
    $('#dataTable tr').remove();
    var showTableHeading = `
    <tr>
        <th>Supplier Names</th>
        <th>Purchase ID </th>
        <th>Total Purchase Amount</th>
        <th>Amount Payed</th>
        <th>Remaining Balance</th>
        <th>Total Amount</th>
        <th>Total Amount Paid</th>
        <th>Closing Balance</th>
        <th>Action</th>
    </tr>`;
    $("table thead").append(showTableHeading);
    let supplierId = $(this).val();
    if ($(this).val() != "-Select-") {
        $.ajax({
            type: "POST",
            data: {
                'supplier': supplierId
            },
            url: "../../../pages/PurchaseAndsales/processing/get_purchase_payment_list.php",
            success: function (response) {
                let purchaseDetails = JSON.parse(response);
                console.log(purchaseDetails);
                if(purchaseDetails !== "nothing"){
                    let tr = ``;
                    let grossAmountPayed = 0;
                    let grossTotalAmount = 0;
                    let displaySize = purchaseDetails.length;
                    for(let i=0; i<displaySize ; i++){
                        if(i == 0){
                            tr +=`<tr style="vertical-align: middle;" class='align-middle text-center'><td style="vertical-align: middle;" class='align-middle text-center' rowspan="${displaySize}">${purchaseDetails[i].supplier_name}</td>`
                            tr +=`<td>${purchaseDetails[i].purchase_id}</td>`;
                            tr +=`<td>${purchaseDetails[i].total_amount_tax}</td>`;
                            tr +=`<td>${purchaseDetails[i].amount_paid}</td>`;
                            tr +=`<td>${(+purchaseDetails[i].total_amount_tax) - (+purchaseDetails[i].amount_paid)}</td>`;
                            for(let j = 0; j<displaySize;j++){
                                grossTotalAmount += (+purchaseDetails[j].total_amount_tax);
                                grossAmountPayed += (+purchaseDetails[j].amount_paid);
                            }
                            tr += `<td style="vertical-align: middle;" class='align-middle text-center' rowspan="${displaySize}">${grossTotalAmount.toFixed(2)}</td>`;
                            tr += `<td style="vertical-align: middle;" class='align-middle text-center' rowspan="${displaySize}">${grossAmountPayed.toFixed(2)}</td>`;
                            tr += `<td style="vertical-align: middle;" class='align-middle text-center' rowspan="${displaySize}">${(+grossTotalAmount - grossAmountPayed).toFixed(2)}</td>`;
                            tr += `<td style="vertical-align: middle;" class="align-middle text-center" rowspan="${(+displaySize)}"><p><button class="btn btn-primary btn-xs editPurchasePaymentDisplay"><span class="glyphicon glyphicon-pencil"></span></button> <span><button class="btn btn-danger btn-xs deletePurchasePaymentDisplay" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></span> </p></td></<tr>`
                        }else{
                            tr +=`<tr style="vertical-align: middle;" class='align-middle text-center'><td>${purchaseDetails[i].purchase_id}</td>`;
                            tr +=`<td>${purchaseDetails[i].total_amount_tax}</td>`;
                            tr +=`<td>${purchaseDetails[i].amount_paid}</td>`;
                            tr +=`<td>${((+purchaseDetails[i].total_amount_tax) - (+purchaseDetails[i].amount_paid)).toFixed(2)}</td></tr>`;
                        }
                    }
                    $("table tbody").append(tr)
                }else{
                    let tr = `<tr class="text-center "><td colspan='11'><strong>No Purchase and Payment has been done with this supplier</strong> </td></tr>`;
                    $("table tbody").append(tr);
                }
            }
        });
    } else {
        let tr = `<tr class="text-center "><td colspan='11'><strong>Select the Supplier </strong> </td></tr>`;
        $("table tbody").append(tr);
    }
});