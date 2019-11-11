<?
session_start();
require '../../../connect.php';

if (isset($_POST['updateTaxButton'])) {

    if ($_POST['editTaxId'] != NULL) {
        $editTaxId = $_POST['editTaxId'];
    } else {
        $_SESSION['messageNo']='Tax ID Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_tax.php");
        exit;
    }

    if ($_POST['editTaxCode'] != NULL) {
        $editTaxCode = strtoupper($_POST['editTaxCode']);
    }
    else
    {
        $_SESSION['messageNo']='Tax Code Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_tax.php");
        exit;
    }
    if ($_POST['editTaxPercentage'] != NULL) {
        $editTaxPercentage = $_POST['editTaxPercentage'];
    }
    else
    {
        $_SESSION['messageNo']='Tax Percentage(%) Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_tax.php");
        exit;
    }

    $sqlUpdateTax = "UPDATE `tax` SET `tax_code` = '$editTaxCode', `tax_percentage` = '$editTaxPercentage' WHERE `tax`.`tax_id` = '$editTaxId';";


    if ($connect->query($sqlUpdateTax)) {
        $_SESSION['updateTax'] = 'yes';
        header("Location: ../../../pages/inventory/master/inventory_master_tax.php");
    }else {
        $_SESSION['updateTax'] = 'no';
        header("Location: ../../../pages/inventory/master/inventory_master_tax.php");
    }
}
?>
