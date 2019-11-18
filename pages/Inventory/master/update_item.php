<?
session_start();
require '../../../connect.php';

if (isset($_POST['updateItemButton'])) {

    if ($_POST['editItemId'] != NULL) {
        $editItemId = $_POST['editItemId'];
    } else {
        $_SESSION['messageNo']='Item Category ID Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_item.php");
        exit;
    }

    if ($_POST['editItemCategory'] != NULL) {
        $editItemCategory =($_POST['editItemCategory']);
    }else{
        $_SESSION['messageNo']='Item Category Name Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_item.php");
        exit;
    }
    if ($_POST['editItemTax'] != NULL) {
        $editItemTax =($_POST['editItemTax']);
    }else{
        $_SESSION['messageNo']='Item Tax Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_item.php");
        exit;
    }
    if ($_POST['editItemName'] != NULL) {
        $editItemName = ucfirst(strtolower($_POST['editItemName']));
    }else{
        $_SESSION['messageNo']='Item Name Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_item.php");
        exit;
    }
    $editItemType = $_POST['editItemType'];
    $sqlUpdateItem = "UPDATE `item` SET `item_category` = '$editItemCategory', `item_name` = '$editItemName',`item_tax` = '$editItemTax',`item_type` = '$editItemType' WHERE `item`.`item_id` = '$editItemId';";

    if ($connect->query($sqlUpdateItem)) {
        $_SESSION['updateItem'] = 'yes';
        header("Location: ../../../pages/inventory/master/inventory_master_item.php");
    }else {
        $_SESSION['updateItem'] = 'no';
        header("Location: ../../../pages/inventory/master/inventory_master_item.php");
    }
}
?>
