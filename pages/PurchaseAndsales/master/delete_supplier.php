<?
session_start();
require '../../../connect.php';

if (isset($_POST['deleteSupplierButton'])) {

    if ($_POST['deleteSupplierId'] != NULL) {
        $deleteSupplierId = $_POST['deleteSupplierId'];
    } else {
        echo "Employee ID Not selected";
        exit;
    }
    $sqlDeleteSupplierId = "DELETE FROM `supplier_or_company` WHERE `supplier_or_company`.`supplier_id` ='$deleteSupplierId'";
    if ($connect->query($sqlDeleteSupplierId)) {
        $_SESSION['deleteSupplier'] = 'yes';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_supplier.php");
    }else {
        $_SESSION['deleteSupplier'] = 'no';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_supplier.php");
    }
}
?>
