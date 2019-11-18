<?
session_start();
require '../../../connect.php';

if (isset($_POST['updateCreditLimitButton'])) {

    if ($_POST['editCreditLimitId'] != NULL) {
        $editCreditLimitId = $_POST['editCreditLimitId'];
    } else {
        echo "Credit Limit ID Not Entered";
        exit;
    }
    if ($_POST['editFromDate'] != NULL) {
        $editFromDate = date('Y-m-d',strtotime($_POST['editFromDate']));
    } else {
        echo "From Date Not Entered";
        exit;
    }
    if ($_POST['editToDate'] != NULL) {

        $editToDate = date('Y-m-d',strtotime($_POST['editToDate']));
    } else {
        echo "To Date Not Entered";
        exit;
    }
    if ($_POST['editCreditLimitValue'] != NULL) {
        $editCreditLimitValue = $_POST['editCreditLimitValue'];
    } else {
        echo "Credit Limit Value Not Entered";
        exit;
    }

    $sqlUpdateCreditLimit = "UPDATE `credit_limit` SET `credit_limit_value` = '$editCreditLimitValue', `credit_limit_from_date` = '$editFromDate', `credit_limit_to_date` = '$editToDate' WHERE `credit_limit`.`credit_limit_id` = '$editCreditLimitId';";
    if ($connect->query($sqlUpdateCreditLimit)) {
        $_SESSION["updateCreditLimit"] = 'yes';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_credit_limit.php");
    }else {
        $_SESSION["updateCreditLimit"] = 'no';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_credit_limit.php");
    }
}else{
    echo 'You did not click the button';
}
?>
