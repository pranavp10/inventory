<?
session_start();
require '../../../connect.php';

if (isset($_POST['updateSupplierButton'])) {

    if ($_POST['editSupplierId'] != NULL) {
        $editSupplierId = $_POST['editSupplierId'];
    } else {
        echo "Customer or Company ID Not Entered";
        exit;
    }

    if ($_POST['editGstin'] != NULL) {
        $editGstin = strtoupper($_POST['editGstin']);
    }
    else
    {
        echo "Customer or Company GSTIN Not Entered";
        exit;
    }
    if ($_POST['editSupplierName'] != NULL) {
        $editSupplierName = ucfirst(strtolower($_POST['editSupplierName']));
    }
    else
    {
        echo "Customer or Company Not Entered";
        exit;
    }
    if ($_POST['editState'] !== '-select-') {
        $editState = $_POST['editState'];
    }
    else
    {
        echo "State Not Entered";
        exit;
    }
    if ($_POST['editSelectCity'] !== '-select-') {
        $editSelectCity = $_POST['editSelectCity'];
    }
    else
    {
        echo "City Not Entered";
        exit;
    }
    if ($_POST['editCityPinCode'] != NULL) {
        $editCityPinCode = $_POST['editCityPinCode'];
    }
    else
    {
        echo "city PinCode Not Entered";
        exit;
    }

    if ($_POST['editSupplierNumber'] != NULL) {
        $editSupplierNumber = $_POST['editSupplierNumber'];
        $processNumber = explode("-", $editSupplierNumber);
        $editSupplierNumber = "$processNumber[0]$processNumber[1]$processNumber[2]";
    }
    else
    {
        echo "customerNumber Not Entered";
        exit;
    }
    if ($_POST['editSupplierEmail'] != NULL) {
        $editSupplierEmail = $_POST['editSupplierEmail'];
    }
    else
    {
        $editSupplierEmail = "";
    }

    if ($_POST['editSupplierAddress'] != NULL) {
        $editSupplierAddress = $_POST['editSupplierAddress'];
    }
    else
    {
        $editSupplierAddress = "";
    }
    $sqlUpdateSupplier = "UPDATE `supplier_or_company` SET `gstin`='$editGstin',`supplier_name`='$editSupplierName',`state`='$editState',`city`='$editSelectCity',`city_pincode`='$editCityPinCode',`s_phone_number`='$editSupplierNumber',`s_email`='$editSupplierEmail',`s_address`='$editSupplierAddress' WHERE `supplier_id`='$editSupplierId' ";

    if ($connect->query($sqlUpdateSupplier)) {
        $_SESSION["updateSupplier"] = 'yes';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_supplier.php");
    }else {
        $_SESSION["updateSupplier"] = 'no';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_supplier.php");
    }
}else{
    echo 'You did not click the button';
}
?>
