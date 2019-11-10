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
    if ($_POST['itemName'] != NULL) {
        $itemName = ucfirst(strtolower($_POST['itemName']));
    }
    else
    {
        $_SESSION['messageNo']='Item Name Not Entered';
        header("Location: ../../../pages/Inventory/master/inventory_master_item.php");
        exit;
    }

    $sqlInsertItemCategory = "INSERT INTO `item`(`item_id`, `item_category`, `item_name`) VALUES ('$itemId','$itemCategory','$itemName')";


    if ($connect->query($sqlInsertItemCategory)) {
        $_SESSION['addItem'] = 'yes';
        header("Location: ../../../pages/Inventory/master/inventory_master_item.php");
    }else {
        $_SESSION['addItem  '] = 'no';
        header("Location: ../../../pages/Inventory/master/inventory_master_item.php");
    }
}
?>
