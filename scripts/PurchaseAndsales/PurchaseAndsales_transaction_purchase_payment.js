$(".select2").select2();

$('#supplierId').on('change', function () {
    $('#dataTable tr').remove();
    var showTableHeading = `
    <tr>
    <th>Supplier Names</th>
        <th>Payment Code</th>
        <th>Payment Date</th>
        <th>Payment Type</th>
        <th>Purchase ID </th>
        <th>Total Purchase Amount</th>
        <th>Amount Payed</th>
        <th>Remaining Balance</th>
        <th>Closing Balance</th>
        <th>Total Amount</th>
        <th>Action</th>
    </tr>`;
    $("table thead").append(showTableHeading);
    if ($(this).val() != "-Select-") {
        
    } else {
        let tr = `<tr class="text-center "><td colspan='11'><strong>Select the Supplier </strong> </td></tr>`;
        $("table tbody").append(tr);
    }
});