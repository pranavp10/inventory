<?
session_start();
require '../../../connect.php';
if (!empty($_POST['salesId'])) {
    $salesId = $_POST['salesId'];
} else {
    echo "Sales Id Not Entered";
    exit;
}
if ($_POST['customerId'] != '-Select-') {
    $customerId = $_POST['customerId'];
} else {
    echo "supplier Not Selected";
    exit;
}
if (!empty($_POST['salesDate'])) {
    $salesDate = date('Y-m-d', strtotime($_POST['salesDate']));
} else {
    echo "Sales Date Not Entered";
    exit;
}

if (!empty($_POST['lrNumber'])) {
    $lrNumber = $_POST['lrNumber'];
} else {
    $lrNumber = '';
}

if (!empty($_POST['totalQuantityOfSales'])) {
    $totalQuantity = $_POST['totalQuantityOfSales'];
} else {
    echo "Total Quantity Of Sales Not Entered";
    exit;
}
if (!empty($_POST['totalAmountOfSales'])) {
    $totalAmount = $_POST['totalAmountOfSales'];
} else {
    echo "Total Amount Of Sales Not Entered";
    exit;
}
if (!empty($_POST['totalAmountWithTaxOfSales'])) {
    $totalAmountWithTax = $_POST['totalAmountWithTaxOfSales'];
} else {
    echo "Total Amount With Tax Of Sales Not Entered";
    exit;
}

$sqlInsertSales = "INSERT INTO `sales`(`sales_id`, `customer_id`, `sales_date`, `lr_number`, `total_quantity`, `total_amount`, `total_amount_tax`) VALUES ('$salesId','$customerId','$salesDate','$lrNumber','$totalQuantity','$totalAmount','$totalAmountWithTax')";
$sqlDeleteSales = "DELETE FROM `sales` WHERE `sales`.`sales_id` = '$salesId'";

if ($connect->query($sqlDeleteSales)) {
    if ($connect->query($sqlInsertSales)) {
        $sqlInsertSalesList = "INSERT INTO `sales_list`( `sales_id`, `item_category`, `item_code`, `quantity`, `price_per_unit`, `total_amount`, `total_amount_with_tax`) VALUES ";
        $SalesListLength = count($_POST['itemCategory']);
        $sqlInsertSalesListData = "";
        for ($i = 0; $i < $SalesListLength; $i++) {
            if ($i == $SalesListLength - 1) {

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
                $sqlInsertSalesListData .= "('$salesId','$itemCategory','$itemCode','$quantity','$pricePerUnit','$totalAmount','$totalAmountWithTax')";
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
                $sqlInsertSalesListData .= "('$salesId','$itemCategory','$itemCode','$quantity','$pricePerUnit','$totalAmount','$totalAmountWithTax') ,";
            }
        }
        if ($connect->query($sqlInsertSalesList . $sqlInsertSalesListData)) {
            $_SESSION["updateSales"] = 'yes';
            header("Location: ../../../pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_sales.php");
        } else {
            $_SESSION["updateSales"] = 'no';
            header("Location: ../../../pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_sales.php");
        }
    } else {
        $_SESSION["updateSales"] = 'no';
        header("Location: ../../../pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_sales.php");
    }
}else{
    $_SESSION["updateSales"] = 'no';
        header("Location: ../../../pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_sales.php");
}
?>