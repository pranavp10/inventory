<?
session_start();
require '../../../connect.php';

if (isset($_POST['deletePurchaseListButton'])) {

    if ($_POST['deleteId'] != NULL) {
        $deleteId = $_POST['deleteId'];
    } else {
        echo "ID Not selected";
        exit;
    }
    $sqlDeletePurchaseList = "DELETE FROM `purchase` WHERE `purchase`.`purchase_id` ='$deleteId'";
    if ($connect->query($sqlDeletePurchaseList)) {
        $_SESSION['deletePurchase'] = 'yes';
        header("Location: ../../../pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_purchase.php");
    }else {
        $_SESSION['deletePurchase'] = 'no';
        header("Location: ../../../pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_purchase.php");
    }
}