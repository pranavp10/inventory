<?
session_start();
require '../../../connect.php';

if (isset($_POST['deleteItemButton'])) {

    if ($_POST['deleteId'] != NULL) {
        $deleteItemId = $_POST['deleteId'];
    } else {
        $_SESSION['messageNo']='Item Category ID Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_item.php");
        exit;
    }
    $sqlDeleteItemCategoryId = "DELETE FROM `item` WHERE `item`.`item_id` = '$deleteItemId'";
    if ($connect->query($sqlDeleteItemCategoryId)) {
        $_SESSION['deleteItem'] = 'yes';
        header("Location: ../../../pages/inventory/master/inventory_master_item.php");
    }else {
        $_SESSION['deleteItem'] = 'no';
        header("Location: ../../../pages/inventory/master/inventory_master_item.php");
    }

}
?>
