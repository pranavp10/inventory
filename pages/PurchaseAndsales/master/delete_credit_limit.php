<?
session_start();
require '../../../connect.php';

if (isset($_POST['deleteCreditLimitButton'])) {

    if ($_POST['deleteCreditLimitId'] != NULL) {
        $deleteCreditLimitId = $_POST['deleteCreditLimitId'];
    } else {
        echo "Credit Limit ID Not selected";
        exit;
    }
    $sqlDeleteCreditLimit = "DELETE FROM `credit_limit` WHERE `credit_limit`.`credit_limit_id` ='$deleteCreditLimitId'";
    if ($connect->query($sqlDeleteCreditLimit)) {
        $_SESSION['deleteCreditLimit'] = 'yes';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_credit_limit.php");
    }else {
        $_SESSION['deleteCreditLimit'] = 'no';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_credit_limit.php");
    }
}else{
    echo "Button Not clicked";
}
?>
