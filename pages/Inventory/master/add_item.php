<?
session_start();
require '../../../connect.php';

if (isset($_POST['addItemButton'])) {

    if ($_POST['itemId'] != NULL) {
        $itemId = $_POST['itemId'];
    } else {
        $_SESSION['messageNo']='Item Category ID Not Entered';
        header("Location: ../../../pages/Inventory/master/inventory_master_item.php");
        exit;
    }

    if ($_POST['itemCategory'] != NULL) {
        $itemCategory = $_POST['itemCategory'];
    }
    else
    {
        $_SESSION['messageNo']='Item Category Name Not Entered';
        header("Location: ../../../pages/Inventory/master/inventory_master_item.php");
        exit;
    }
    if ($_POST['itemTax'] != NULL) {
        $itemTax = $_POST['itemTax'];
    }
    else
    {
        $_SESSION['messageNo']='Item Tax Not Entered';
        header("Location: ../../../pages/Inventory/master/inventory_master_item.php");
        exit;
    }
    if ($_POST['itemName'] != NULL) {
        $itemName = ucfirst(strtolower($_POST['itemName']));
    }
    else
    {
        $_SESSION['messageNo']='Item Name Not Entered';
        header("Location: ../../../pages/Inventory/master/inventory_master_item.php");
        exit;
    }
    $itemType = $_POST['itemType'];

    $sqlInsertItemCategory = "INSERT INTO `item`(`item_id`, `item_category`, `item_tax`, `item_name`,`item_type`) VALUES ('$itemId','$itemCategory','$itemTax','$itemName','$itemType')";


    if ($connect->query($sqlInsertItemCategory)) {
        $_SESSION['addItem'] = 'yes';
        header("Location: ../../../pages/Inventory/master/inventory_master_item.php");
    }else {
        $_SESSION['addItem  '] = 'no';
        header("Location: ../../../pages/Inventory/master/inventory_master_item.php");
    }
}
?>
