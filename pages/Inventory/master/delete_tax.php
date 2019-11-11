<?
session_start();
require '../../../connect.php';

if (isset($_POST['deleteTaxButton'])) {

    if ($_POST['deleteId'] != NULL) {
        $deleteTaxId = $_POST['deleteId'];
    } else {
        $_SESSION['messageNo']='Tax ID Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_tax.php");
        exit;
    }
    $sqlDeleteTax = "DELETE FROM `tax` WHERE `tax`.`tax_id` ='$deleteTaxId'";
    if ($connect->query($sqlDeleteTax)) {
        $_SESSION['deleteTax'] = 'yes';
        header("Location: ../../../pages/inventory/master/inventory_master_tax.php");
    }else {
        $_SESSION['deleteTax'] = 'no';
        header("Location: ../../../pages/inventory/master/inventory_master_tax.php");
    }
}
?>
