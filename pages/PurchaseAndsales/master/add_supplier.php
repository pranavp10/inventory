<?
session_start();
require '../../../connect.php';

if (isset($_POST['addSupplierOrCompanyButton'])) {

    if ($_POST['supplierId'] != NULL) {
        $supplier_Id = $_POST['supplierId'];
    } else {
        echo "Customer or Company ID Not Entered";
        exit;
    }

    if ($_POST['gstin'] != NULL) {
        $gstin = strtoupper($_POST['gstin']);
    }
    else
    {
        echo "Customer or Company GSTIN Not Entered";
        exit;
    }
    if ($_POST['supplierName'] != NULL) {
        $supplierName = ucfirst(strtolower($_POST['supplierName']));
    }
    else
    {
        echo "Customer or Company Not Entered";
        exit;
    }
    if ($_POST['state'] !== '-select-') {
        $state = $_POST['state'];
    }
    else
    {
        echo "State Not Entered";
        exit;
    }
    if ($_POST['selectCity'] !== '-select-') {
        $city = $_POST['selectCity'];
    }
    else
    {
        echo "City Not Entered";
        exit;
    }
    if ($_POST['cityPinCode'] != NULL) {
        $cityPinCode = $_POST['cityPinCode'];
    }
    else
    {
        echo "city PinCode Not Entered";
        exit;
    }

    if ($_POST['supplierNumber'] != NULL) {
        $rawSupplierNumber = $_POST['supplierNumber'];
        $processNumber = explode("-", $rawSupplierNumber);
        $supplierNumber = "$processNumber[0]$processNumber[1]$processNumber[2]";
    }
    else
    {
        echo "Supplier Number Not Entered";
        exit;
    }
    if ($_POST['supplierEmail'] != NULL) {
        $supplierEmail = $_POST['supplierEmail'];
    }
    else
    {
        $supplierEmail = "";
    }

    if ($_POST['supplierAddress'] != NULL) {
        $supplierAddress = $_POST['supplierAddress'];
    }
    else
    {
        $supplierAddress = "";
    }
    $sqlInsertSupplier = "INSERT INTO `supplier_or_company`(`supplier_id`, `gstin`, `supplier_name`, `state`, `city`, `city_pincode`, `s_phone_number`, `s_email`, `s_address`) VALUES ('$supplier_Id','$gstin','$supplierName','$state','$city','$cityPinCode','$supplierNumber','$supplierEmail','$supplierAddress')";

    if ($connect->query($sqlInsertSupplier)) {
        $_SESSION["addSupplier"] = 'yes';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_supplier.php");
    }else {
        $_SESSION["addSupplier"] = 'no';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_supplier.php");
    }
}else{
    echo 'You did not click the button';
}
?>
