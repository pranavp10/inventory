<?
session_start();
require '../../../connect.php';
if (!empty($_POST['paymentId'])) {
    $paymentId = $_POST['paymentId'];
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
if (!empty($_POST['paymentDate'])) {
    $paymentDate = date('Y-m-d', strtotime($_POST['paymentDate']));
} else {
    echo "Purchase Date Not Entered";
    exit;
}

if (!empty($_POST['paymentType'])) {
    $paymentType = $_POST['paymentType'];
} else {
    echo "Total Quantity Of Purchase Not Entered";
    exit;
}

if (!empty($_POST['checkNo'])) {
    $checkNo = $_POST['checkNo'];
} else {
    $paymentType = '';
}
if (!empty($_POST['totalAmountPayed'])) {
    $totalAmountPayed = $_POST['totalAmountPayed'];
} else {
    echo "Total Amount Total Amount Payed Not Entered";
    exit;
}
if (!empty($_POST['totalAmountWithTaxOfPurchase'])) {
    $totalAmountWithTax = $_POST['totalAmountWithTaxOfPurchase'];
} else {
    echo "Total Amount With Tax Of Purchase Not Entered";
    exit;
}

$sqlInsertPurchase = "INSERT INTO `purchase_payment`(`purchase_payment_id`, `supplier_id`, `total_amount`, `remaining_amount`) VALUES ('','','','','')";
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
        $_SESSION["addPurchase"] = 'yes';
        header("Location: ../../../pages/PurchaseAndsales/processing/make_purchase_payment.php");
    }else{
        $_SESSION["addPurchase"] = 'no';
        header("Location: ../../../pages/PurchaseAndsales/processing/make_purchase_payment.php");
    }
    
} else {
    $_SESSION["addPurchase"] = 'no';
    header("Location: ../../../pages/PurchaseAndsales/processing/make_purchase_payment.php");
}
exit;
?>