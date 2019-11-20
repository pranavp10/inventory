<?
session_start();
require '../../../connect.php';
if (!empty($_POST['purchaseId'])) {
    $purchaseId = $_POST['purchaseId'];
} else {
    echo "purchase Id Not Entered";
    exit;
}
if ($_POST['supplierId'] != '-Select-') {
    $supplierId = $_POST['supplierId'];
} else {
    echo "supplier Not Selected";
    exit;
}
if (!empty($_POST['purchaseDate'])) {
    $purchaseDate = date('Y-m-d', strtotime($_POST['purchaseDate']));
} else {
    echo "Purchase Date Not Entered";
    exit;
}

if (!empty($_POST['lrNumber'])) {
    $lrNumber = $_POST['lrNumber'];
} else {
    $lrNumber = '';
}

if (!empty($_POST['totalQuantityOfPurchase'])) {
    $totalQuantity = $_POST['totalQuantityOfPurchase'];
} else {
    echo "Total Quantity Of Purchase Not Entered";
    exit;
}
if (!empty($_POST['totalAmountOfPurchase'])) {
    $totalAmount = $_POST['totalAmountOfPurchase'];
} else {
    echo "Total Amount Of Purchase Not Entered";
    exit;
}
if (!empty($_POST['totalAmountWithTaxOfPurchase'])) {
    $totalAmountWithTax = $_POST['totalAmountWithTaxOfPurchase'];
} else {
    echo "Total Amount With Tax Of Purchase Not Entered";
    exit;
}
$sqlInsertPurchase = "INSERT INTO `purchase`(`purchase_id`, `supplier_id`, `purchase_date`, `lr_number`, `total_quantity`, `total_amount`, `total_amount_tax`) VALUES ('$purchaseId','$supplierId','$purchaseDate','$lrNumber','$totalQuantity','$totalAmount','$totalAmountWithTax')";
$sqlDeletePurchaseList = "DELETE FROM `purchase` WHERE `purchase`.`purchase_id` ='$purchaseId'";
if ($connect->query($sqlDeletePurchaseList)) {
    if($connect ->query($sqlInsertPurchase)){

    $sqlInsertPurchaseList = "INSERT INTO `purchase_list`(`purchase_id`, `item_category`, `item_code`, `quantity`, `price_per_unit`, `total_amount`, `total_amount_with_tax`) VALUES ";
    $purchaseListLength = count($_POST['itemCategory']);
    $sqlInsertPurchaseListData ="";
    for ($i = 0; $i < $purchaseListLength; $i++) {
        if ($i == $purchaseListLength - 1) {

            if (!empty($_POST['itemCategory'][$i])) {
                $itemCategory = $_POST['itemCategory'][$i];
            } else {
                exit;
            }
            if (!empty($_POST['itemCode'][$i])) {
                $itemCode = $_POST['itemCode'][$i];
            } else {
                exit;
            }
            if (!empty($_POST['quantity'][$i])) {
                $quantity = $_POST['quantity'][$i];
            } else {
                exit;
            }
            if (!empty($_POST['pricePerUnit'][$i])) {
                $pricePerUnit = $_POST['pricePerUnit'][$i];
            } else {
                exit;
            }
            if (!empty($_POST['totalAmount'][$i])) {
                $totalAmount = $_POST['totalAmount'][$i];
            } else {
                exit;
            }

            if (!empty($_POST['totalAmountWithTax'][$i])) {
                $totalAmountWithTax = $_POST['totalAmountWithTax'][$i];
            } else {
                exit;
            }
            $sqlInsertPurchaseListData .= "('$purchaseId','$itemCategory','$itemCode','$quantity','$pricePerUnit','$totalAmount','$totalAmountWithTax')";
        } else {
            if (!empty($_POST['itemCategory'][$i])) {
                $itemCategory = $_POST['itemCategory'][$i];
            } else {
                exit;
            }
            if (!empty($_POST['itemCode'][$i])) {
                $itemCode = $_POST['itemCode'][$i];
            } else {
                exit;
            }
            if (!empty($_POST['quantity'][$i])) {
                $quantity = $_POST['quantity'][$i];
            } else {
                exit;
            }
            if (!empty($_POST['pricePerUnit'][$i])) {
                $pricePerUnit = $_POST['pricePerUnit'][$i];
            } else {
                exit;
            }
            if (!empty($_POST['totalAmount'][$i])) {
                $totalAmount = $_POST['totalAmount'][$i];
            } else {
                exit;
            }

            if (!empty($_POST['totalAmountWithTax'][$i])) {
                $totalAmountWithTax = $_POST['totalAmountWithTax'][$i];
            } else {
                exit;
            }
            $sqlInsertPurchaseListData .= "('$purchaseId','$itemCategory','$itemCode','$quantity','$pricePerUnit','$totalAmount','$totalAmountWithTax') ,";
        }
    }
    if($connect ->query($sqlInsertPurchaseList.$sqlInsertPurchaseListData)){
        $_SESSION["updatePurchaseList"] = 'yes';
        header("Location: ../../../pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_purchase.php");
    }else{
        $_SESSION["updatePurchaseList"] = 'no';
        header("Location: ../../../pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_purchase.php");
    }
    
} else {
    $_SESSION["updatePurchaseList"] = 'no';
    header("Location: ../../../pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_purchase.php");
}}
exit;
?>