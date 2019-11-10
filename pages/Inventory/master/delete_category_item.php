<?
session_start();
require '../../../connect.php';

if (isset($_POST['deleteItemCategoryButton'])) {

    if ($_POST['deleteId'] != NULL) {
        $deleteItemCategoryId = $_POST['deleteId'];
    } else {
        $_SESSION['messageNo']='Item Category ID Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_item_category.php");
        exit;
    }
    $sqlDeleteItemCategoryId = "DELETE FROM `item_category` WHERE `item_category`.`item_category_id` = '$deleteItemCategoryId'";
    if ($connect->query($sqlDeleteItemCategoryId)) {
        $_SESSION['deleteItemCategory'] = 'yes';
        header("Location: ../../../pages/inventory/master/inventory_master_item_category.php");
    }else {
        $_SESSION['deleteItemCategory'] = 'no';
        header("Location: ../../../pages/inventory/master/inventory_master_item_category.php");
    }

}
?>
