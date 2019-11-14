$("#discountId").on("change", function () {
    $('#discountTable tr').remove();
    var showTableHeading = `
    <tr>
        <th>Discount Id</th>
        <th>Discount Name</th>
        <th>Discount Between</th>
        <th>Discount Category</th>
        <th>Discount Item</th>
        <th>Discount Value</th>
        <th>Minimum Amount</th>
        <th>Action</th>
    </tr>`;
    $("table thead").append(showTableHeading);
    var discountId = $(this).val();
    if (discountId == "-Select-") {
        var displayDiscount = `<tr class='text-center'><td colspan="8">Select the Discount Name</td></tr>`
        $("table tbody").append(displayDiscount);
    } else {
        var tr = ``;
        $.ajax({
            type: "POST",
            data: {
                'discountId': discountId
            },
            url: "../../../pages/Inventory/transaction/get_discount_details.php",
            success: function (response) {
                var data = JSON.parse(response);
                var totalNoOfRows = 0;
                var arrayLength = data.length;
                for (let i = 0; i < arrayLength; i++) {
                    let arraySize = data[i].item.split(",").length;
                    totalNoOfRows += (+arraySize);
                } if(data.length == 1 && data[0].item.split(",").length ===1){
                    tr += `<tr><td style="vertical-align: middle;" class='align-middle text-center' rowspan=${(+totalNoOfRows*2)+1}>${data[0].discountId}</td>`
                    tr += `<td style="vertical-align: middle;" class='align-middle text-center' rowspan=${(+totalNoOfRows*2)+1}>${data[0].discountName}</td>`
                    tr += `<td style="vertical-align: middle;" class='align-middle text-center' rowspan=${(+totalNoOfRows*2)+1}>${data[0].fromDate} To ${data[0].toDate}</td>`

                    for (let i = 0; i < arrayLength; i++) {

                        if (i === 0) {
                            let size = data[i].item.split(",").length;
                            let item = data[i].item.split(",");
                            let discountType = data[i].discountType.split(",");
                            let discountValue = data[i].discountValue.split(",");
                            let minimum = data[i].minimum.split(",");
                            tr += `<td style="vertical-align: middle;" class='align-middle text-center' rowspan=${size}>${data[i].itemCat}</td>`;

                            for (let j = 0; j < size; j++) {
                                if (j === 0) {
                                    tr += `<td class='align-middle text-center'>${item[j]}</td>`;
                                    var disValue = discountType[j] == "percent" ? `${discountValue[j]}%` : `Flat- ₹${discountValue[j]}`;
                                    tr += `<td class='align-middle text-center'>${disValue}</td>`;
                                    tr += `<td class='align-middle text-center'>${minimum[j]}</td>`;
                                    tr += `<td style="vertical-align: middle;" class='align-middle text-center' rowspan=${+totalNoOfRows*2}><p><button class="btn btn-primary btn-xs editEmployee" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button> <span><button class="btn btn-danger btn-xs deleteDiscount" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></span> </p></td></tr>`
                                } else {
                                    tr += `<td class='align-middle text-center'>${item[j]}</td>`;
                                    var disValue = discountType[j] == "percent" ? `${discountValue[j]}%` : `Flat- ₹${discountValue[j]}`;
                                    tr += `<td class='align-middle text-center'>${disValue}</td>`;
                                    tr += `<td class='align-middle text-center'>${minimum[j]}</td></tr>`;
                                }
                            }

                        } else {
                            let size = data[i].item.split(",").length;
                            let item = data[i].item.split(",");
                            let discountType = data[i].discountType.split(",");
                            let discountValue = data[i].discountValue.split(",");
                            let minimum = data[i].minimum.split(",");
                            tr += `<td style="vertical-align: middle;" class='align-middle text-center' rowspan=${size}>${data[i].itemCat}</td>`;
                            for (let j = 0; j < size; j++) {
                                tr += `<td class='align-middle text-center'>${item[j]}</td>`;
                                var disValue = discountType[j] == "percent" ? `${discountValue[j]}%` : `Flat- ₹${discountValue[j]}`;
                                tr += `<td class='align-middle text-center'>${disValue}</td>`;
                                tr += `<td class='align-middle text-center'>${minimum[j]}</td></tr>`;
                            }
                        }
                    }
                }
                else{
                    tr += `<tr><td style="vertical-align: middle;" class='align-middle text-center' rowspan=${(+totalNoOfRows*2)+1}>${data[0].discountId}</td></tr>`
                    tr += `<tr><td style="vertical-align: middle;" class='align-middle text-center' rowspan=${(+totalNoOfRows*2)+1}>${data[0].discountName}</td></tr>`
                    tr += `<tr><td style="vertical-align: middle;" class='align-middle text-center' rowspan=${(+totalNoOfRows*2)+1}>${data[0].fromDate} To ${data[0].toDate}</td></tr>`

                    for (let i = 0; i < arrayLength; i++) {

                        if (i === 0) {
                            let size = data[i].item.split(",").length;
                            let item = data[i].item.split(",");
                            let discountType = data[i].discountType.split(",");
                            let discountValue = data[i].discountValue.split(",");
                            let minimum = data[i].minimum.split(",");
                            tr += `<tr><td style="vertical-align: middle;" class='align-middle text-center' rowspan=${size}>${data[i].itemCat}</td>`;

                            for (let j = 0; j < size; j++) {
                                if (j === 0) {
                                    tr += `<td class='align-middle text-center'>${item[j]}</td>`;
                                    var disValue = discountType[j] == "percent" ? `${discountValue[j]}%` : `Flat- ₹${discountValue[j]}`;
                                    tr += `<td class='align-middle text-center'>${disValue}</td>`;
                                    tr += `<td class='align-middle text-center'>${minimum[j]}</td>`;
                                    tr += `<td style="vertical-align: middle;" class='align-middle text-center' rowspan=${+totalNoOfRows*2}><p><button class="btn btn-primary btn-xs editEmployee" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button> <span><button class="btn btn-danger btn-xs deleteDiscount" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></span> </p></td></tr>`
                                } else {
                                    tr += `<td class='align-middle text-center'>${item[j]}</td>`;
                                    var disValue = discountType[j] == "percent" ? `${discountValue[j]}%` : `Flat- ₹${discountValue[j]}`;
                                    tr += `<td class='align-middle text-center'>${disValue}</td>`;
                                    tr += `<td class='align-middle text-center'>${minimum[j]}</td></tr>`;
                                }
                            }

                        } else {
                            let size = data[i].item.split(",").length;
                            let item = data[i].item.split(",");
                            let discountType = data[i].discountType.split(",");
                            let discountValue = data[i].discountValue.split(",");
                            let minimum = data[i].minimum.split(",");
                            tr += `<tr><td style="vertical-align: middle;" class='align-middle text-center' rowspan=${size}>${data[i].itemCat}</td>`;
                            for (let j = 0; j < size; j++) {
                                tr += `<td class='align-middle text-center'>${item[j]}</td>`;
                                var disValue = discountType[j] == "percent" ? `${discountValue[j]}%` : `Flat- ₹${discountValue[j]}`;
                                tr += `<td class='align-middle text-center'>${disValue}</td>`;
                                tr += `<td class='align-middle text-center'>${minimum[j]}</td></tr>`;
                            }
                        }
                    }
                }
                $("table tbody").append(tr);
            }
        });
    }
});


$(document).on("click", ".deleteDiscount", function () {
    $("#deleteDiscount").modal("show");

    $tr = $(this).closest("tr");
    var data = $tr
        .children("td")
        .map(function () {
            return $(this).text();
        })
        .get();
    $("#displayBox").text(
        `(ID is ${data[0]}) and (${data[1]}) Discount will be deleted !!!`
    );
    $("#deleteId").val(data[0]);
});