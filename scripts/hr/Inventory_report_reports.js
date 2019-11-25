$('#selectReport').on('change', function () {
    let value = $(this).val();
    window.location= `../../../pages/Inventory/report/Inventory_report_reports.php?report=${value}`;
});