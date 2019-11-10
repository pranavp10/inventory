<?
session_start();
require '../../../connect.php';

if (isset($_POST['updateItemCategoryButton'])) {

    if ($_POST['editItemCategoryId'] != NULL) {
        $editItemCategoryId = $_POST['editItemCategoryId'];
    } else {
        $_SESSION['messageNo']='Item Category ID Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_item_category.php");
        exit;
    }

    if ($_POST['editItemCategoryName'] != NULL) {
        $editItemCategoryName = ucfirst(strtolower($_POST['editItemCategoryName']));
    }else{
        $_SESSION['messageNo']='Item Category Name Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_item_category.php");
        exit;
    }

    $sqlUpdateItemCategory = "UPDATE `item_category` SET `item_category_name` = '$editItemCategoryName' WHERE `item_category`.`item_category_id` = '$editItemCategoryId';";


    if ($connect->query($sqlUpdateItemCategory)) {
        $_SESSION['updateItemCategory'] = 'yes';
        header("Location: ../../../pages/inventory/master/inventory_master_item_category.php");
    }else {
        $_SESSION['updateItemCategory'] = 'no';
        header("Location: ../../../pages/inventory/master/inventory_master_item_category.php");
    }
}
?>
