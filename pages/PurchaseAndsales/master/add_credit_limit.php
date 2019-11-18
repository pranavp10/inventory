<?
session_start();
require '../../../connect.php';

if (isset($_POST['addCreditLimitButton'])) {

    if ($_POST['creditLimitId'] != NULL) {
        $creditLimitId = $_POST['creditLimitId'];
    } else {
        echo "Credit Limit ID Not Entered";
        exit;
    }
    if ($_POST['fromDate'] != NULL) {
        $fromDate = date('Y-m-d',strtotime($_POST['fromDate']));
    } else {
        echo "From Date Not Entered";
        exit;
    }
    if ($_POST['toDate'] != NULL) {

        $toDate = date('Y-m-d',strtotime($_POST['toDate']));
    } else {
        echo "To Date Not Entered";
        exit;
    }
    if ($_POST['customerId'] != '-select-') {
        $customerId = $_POST['customerId'];
    } else {
        echo " Company or Customer Not selected ";
        exit;
    }
    if ($_POST['creditLimitValue'] != NULL) {
        $creditLimitValue = $_POST['creditLimitValue'];
    } else {
        echo "Credit Limit Value Not Entered";
        exit;
    }

    $sqlInsertCreditLimit = "INSERT INTO `credit_limit`(`credit_limit_id`, `customer_id`, `credit_limit_value`, `credit_limit_from_date`, `credit_limit_to_date`) VALUES ('$creditLimitId','$customerId','$creditLimitValue','$fromDate','$toDate')";
    if ($connect->query($sqlInsertCreditLimit)) {
        $_SESSION["addCreditLimit"] = 'yes';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_credit_limit.php");
    }else {
        $_SESSION["addCreditLimit"] = 'no';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_credit_limit.php");
    }
}else{
    echo 'You did not click the button';
}
?>
