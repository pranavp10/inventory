<?
session_start();
require '../../../connect.php';
if (!empty($_POST['paymentId'])) {
    $paymentId = $_POST['paymentId'];
} else {
    echo "purchase Payment Id Not Entered";
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
    echo "Payment Date Not Entered";
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
    $checkNo = '';
}
if (!empty($_POST['totalAmountPayed'])) {
    $totalAmountPayed = $_POST['totalAmountPayed'];
} else {
    echo "Total Amount Total Amount Payed Not Entered";
    exit;
}


$sqlInsertPurchase = "INSERT INTO `purchase_payment`(`purchase_payment_id`, `supplier_id`, `total_amount`, `payment_date`, `payment_type`, `check_no`) VALUES ('$paymentId','$supplierId','$totalAmountPayed','$paymentDate','$paymentType','$checkNo')";
if($connect ->query($sqlInsertPurchase)){

    $sqlInsertPurchaseList = "INSERT INTO `purchase_payment_list`(`purchase_payment_id`, `purchase_id`, `amount_paid`) VALUES ";
    $paymentListLength = count($_POST['balance']);
    $sqlInsertPurchasePaymentListData ="";
    for ($i = 0; $i < $paymentListLength; $i++) {
        if ($i == $paymentListLength - 1) {

            if (!empty($_POST['purchaseId'][$i])) {
                $purchaseId = $_POST['purchaseId'][$i];
            } else {
                exit;
            }
            if (!empty($_POST['amountToPay'][$i])) {
                $amountToPay = $_POST['amountToPay'][$i];
            } else {
                exit;
            }
            $sqlInsertPurchasePaymentListData .= "('$paymentId','$purchaseId','$amountToPay')";
        } else {
            if (!empty($_POST['purchaseId'][$i])) {
                $purchaseId = $_POST['purchaseId'][$i];
            } else {
                exit;
            }
            if (!empty($_POST['amountToPay'][$i])) {
                $amountToPay = $_POST['amountToPay'][$i];
            } else {
                exit;
            }
            $sqlInsertPurchasePaymentListData .= "('$paymentId','$purchaseId','$amountToPay') ,";
        }
    }
    if($connect ->query($sqlInsertPurchaseList.$sqlInsertPurchasePaymentListData)){
        $_SESSION["addPurchasePayment"] = 'yes';
        header("Location: ../../../pages/PurchaseAndsales/processing/PurchaseAndsales_processing_purchase_payment.php");
    }else{
        $_SESSION["addPurchasePayment"] = 'no';
        header("Location: ../../../pages/PurchaseAndsales/processing/PurchaseAndsales_processing_purchase_payment.php");
    }
    
} else {
    $_SESSION["addPurchasePayment"] = 'no';
    header("Location: ../../../pages/PurchaseAndsales/processing/PurchaseAndsales_processing_purchase_payment.php");
}
exit;
?>