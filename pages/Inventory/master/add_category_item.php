<?
session_start();
require '../../../connect.php';

if (isset($_POST['addItemCategoryButton'])) {

    if ($_POST['itemCategoryId'] != NULL) {
        $itemCategoryId = $_POST['itemCategoryId'];
    } else {
        $_SESSION['messageNo']='Item Category ID Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_item_category.php");
        exit;
    }

    if ($_POST['itemCategoryName'] != NULL) {
        $itemCategoryName = ucfirst(strtolower($_POST['itemCategoryName']));
    }
    else
    {
        $_SESSION['messageNo']='Item Category Name Not Entered';
        header("Location: ../../../pages/inventory/master/inventory_master_item_category.php");
        exit;
    }

    $sqlInsertItemCategory = "INSERT INTO `item_category` (`item_category_id`, `item_category_name`) VALUES ('$itemCategoryId', '$itemCategoryName');";


    if ($connect->query($sqlInsertItemCategory)) {
        $_SESSION['addItemCategory'] = 'yes';
        header("Location: ../../../pages/inventory/master/inventory_master_item_category.php");
    }else {
        $_SESSION['addItemCategory'] = 'no';
        header("Location: ../../../pages/inventory/master/inventory_master_item_category.php");
    }
}
?>
