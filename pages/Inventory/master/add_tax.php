<?
session_start();
require '../../../connect.php';

if (isset($_POST['addTaxButton'])) {

    if ($_POST['taxId'] != NULL) {
        $taxId = $_POST['taxId'];
    } else {
        $_SESSION['messageNo']='Tax ID Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_tax.php");
        exit;
    }

    if ($_POST['taxCode'] != NULL) {
        $taxCode = strtoupper($_POST['taxCode']);
    }
    else
    {
        $_SESSION['messageNo']='Tax Code Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_tax.php");
        exit;
    }
    if ($_POST['taxPercentage'] != NULL) {
        $taxPercentage = $_POST['taxPercentage'];
    }
    else
    {
        $_SESSION['messageNo']='Tax Percentage(%) Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_tax.php");
        exit;
    }

    $sqlInsertTax = "INSERT INTO `tax`(`tax_id`, `tax_code`, `tax_percentage`) VALUES ('$taxId','$taxCode','$taxPercentage');";


    if ($connect->query($sqlInsertTax)) {
        $_SESSION['addTax'] = 'yes';
        header("Location: ../../../pages/inventory/master/inventory_master_tax.php");
    }else {
        $_SESSION['addTax'] = 'no';
        header("Location: ../../../pages/inventory/master/inventory_master_tax.php");
    }
}
?>
