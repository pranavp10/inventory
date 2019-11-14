<?
session_start();
require '../../../connect.php';

if (isset($_POST['deleteDiscountButton'])) {

    if ($_POST['deleteId'] != NULL) {
        $delete_discount_id = $_POST['deleteId'];
    } else {
        echo "ID Not selected";
        exit;
    }
    $sqlDeleteDiscount = "DELETE FROM `discounts_and_flats` WHERE `discounts_and_flats`.`discount_id` ='$delete_discount_id'";
    if ($connect->query($sqlDeleteDiscount)) {
        $_SESSION['deleteDiscount'] = 'yes';
        header("Location: ../../../pages/Inventory/transaction/inventory_transaction_discount_and_flat.php");
    }else {
        $_SESSION['deleteDiscount'] = 'no';
        header("Location: ../../../pages/Inventory/transaction/inventory_transaction_discount_and_flat.php");
    }
}