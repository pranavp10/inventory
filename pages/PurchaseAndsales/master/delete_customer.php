<?
session_start();
require '../../../connect.php';

if (isset($_POST['deleteCustomerButton'])) {

    if ($_POST['deleteCustomerId'] != NULL) {
        $deleteCustomerId = $_POST['deleteCustomerId'];
    } else {
        echo "Employee ID Not selected";
        exit;
    }
    $sqlDeleteCustomer = "DELETE FROM `customer_or_company` WHERE `customer_or_company`.`customer_id` = '$deleteCustomerId';";
    if ($connect->query($sqlDeleteCustomer)) {
        $_SESSION['deleteCustomer'] = 'yes';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_customers.php");
    }else {
        $_SESSION['deleteCustomer'] = 'no';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_customers.php");
    }
}
?>
