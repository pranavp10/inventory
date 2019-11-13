<?
session_start();
require '../../../connect.php';

$discountId = $_POST['discountId'];
$discountName = ucfirst($_POST['discountName']);
$fromAndToDate = $_POST['betweenDate'];
$splitDate = explode("-", $fromAndToDate);
$trimTheValue = trim($splitDate[2], " ");
$discountStartDate = "$trimTheValue-$splitDate[1]-$splitDate[0]";
$trimTheValue = trim($splitDate[3], " ");
$discountEndDate = "$splitDate[5]-$splitDate[4]-$trimTheValue";


$sqlInsertDiscountsAndFlats = "INSERT INTO `discounts_and_flats`(`discount_id`, `discount_name`, `discount_from_date`, `discount_to_date`) VALUES ('$discountId','$discountName','$discountStartDate','$discountEndDate')";

if ($connect->query($sqlInsertDiscountsAndFlats)) {
    $_SESSION['addDiscount'] = 'yes';
} else {
    $_SESSION['addDiscount'] = 'no';
    header("Location: ../../../pages/Inventory/transaction/inventory_transaction_discount_and_flat.php");
    exit;
}

$lengthOfItems = count($_POST['itemCategory']);
for ($i = 0; $i < $lengthOfItems; $i++) {
    $itemCat = $_POST['itemCategory'][$i];
    $item = $_POST['itemCode'][$i];
    $valueType = $_POST["discountType$i"];
    $discountValue = $_POST['discountValue'][$i];
    if($_POST['minAmount'][$i] == ''){
        $minimumAmount =0;
    }else{
        $minimumAmount = $_POST['minAmount'][$i];
    }

    $sqlInsertDiscountsAndFlatsDetails = "INSERT INTO `discounts_and_flats_details`(`discount_id`, `item_category`, `item`, `discount_type`, `discount_value`, `minimun_amount`) VALUES ('$discountId','$itemCat','$item','$valueType','$discountValue','$minimumAmount')";
    if ($connect->query($sqlInsertDiscountsAndFlatsDetails)) {
        $_SESSION['addDiscount'] = 'yes';
    } else {
        $_SESSION['addDiscount'] = 'no';
        header("Location: ../../../pages/Inventory/transaction/inventory_transaction_discount_and_flat.php");
        exit;
    }
    header("Location: ../../../pages/Inventory/transaction/inventory_transaction_discount_and_flat.php");
}
?>