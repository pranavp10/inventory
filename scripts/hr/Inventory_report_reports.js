$('#selectReport').on('change', function () {
    let value = $(this).val();
    if (value === "category") {
        window.location = `../../../pages/Inventory/report/Inventory_report_reports.php?report=${value}&category=-Select-`;
    } else {
        window.location = `../../../pages/Inventory/report/Inventory_report_reports.php?report=${value}`;
    }
});
$('#catCode').on('change', function () {
    let value = $('#selectReport').val();
    let catCode = $(this).val();
    window.location = `../../../pages/Inventory/report/Inventory_report_reports.php?report=${value}&category=${catCode}`;
});