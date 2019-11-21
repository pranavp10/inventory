<?
session_start();
require '../../../connect.php';

if (isset($_POST['deleteSalesListButton'])) {

    if ($_POST['deleteId'] != NULL) {
        $deleteId = $_POST['deleteId'];
    } else {
        echo "ID Not selected";
        exit;
    }
    $sqlDeletePurchaseList = "DELETE FROM `sales` WHERE `sales`.`sales_id` ='$deleteId'";
    if ($connect->query($sqlDeletePurchaseList)) {
        $_SESSION['deleteSales'] = 'yes';
        header("Location: ../../../pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_sales.php");
    }else {
        $_SESSION['deleteSales'] = 'no';
        header("Location: ../../../pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_sales.php");
    }
}